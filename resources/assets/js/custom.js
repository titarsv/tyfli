'use strict';
// Depends
var $ = require('jquery');
var swal = require('sweetalert2');

// Are you ready?
$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

  // Выбор вариации
  $('.variation-radio, .result-price .count_field').change(function(){
      var attrs = [];
      $('.variation-radio:checked').each(function(){
          var val = $(this).val();
          if(val != ''){
              attrs.push(val);
          }
      });
      var hash = attrs.sort().join('_');

      $('[name="variation"]').prop('checked', false);
      var input = $('#var_'+hash);
      if(hash != '' && input.length){
          input.prop('checked', true);
          location.hash = hash;
          var price = parseFloat(input.data('price'));
          $('.product-price').html(price);
      }else{
          if($('.variation-radio').length == 0){
              var price = parseFloat($('.product-price').data('price'));
              $('.product-price').html(price);
          }else{
              history.pushState("", document.title, window.location.pathname + window.location.search);
              $('.product-price').html($('.product-price').data('price'));
          }
      }
      hideVariationOptions();
  });

  function flushNextSelects(select){
      var selects = $('.variation-select');
      for(var i=selects.index(select)+1; i<selects.length; i++){
          selects.eq(i).find('option:first-child').prop('selected', true);
      }
  }

  function clearVariations(variations, attrs, attr){
      var new_variations = [];
      for(var v=0; v<variations.length; v++){
          var isset = true;
          if(variations[v].indexOf(attr) < 0){
              isset = false;
          }
          for(var a=0; a<attrs.length; a++){
              if(variations[v].indexOf(attrs[a]) < 0 ){
                  isset = false;
              }
          }
          if(isset){
              new_variations.push(variations[v]);
          }
      }
      return new_variations;
  }

  function hideVariationOptions(){
      var variations = [];
      var current_select;
      $('[name="variation"]').each(function(){
          variations.push($(this).attr('id').replace('var_', ''));
      });
      var selects = $('.variation-select');
      var attrs = [];
      if(selects.length > 1){
          if(selects.eq(0).val() !== '')
            attrs.push(selects.eq(0).val());

          for(var i=1; i<selects.length; i++){
              current_select = selects.eq(i);
              current_select.find('option').each(function(){
                var opt_var = clearVariations(variations, attrs, $(this).val());
                if(opt_var.length == 0){
                    $(this).attr('disabled', 'disabled').css('display', 'none');
                    if(current_select.val() == $(this).val()){
                        current_select.find('option:first-child').prop('selected', true);
                    }
                }else{
                    $(this).prop('disabled', false).css('display', 'block');
                }
            });
            if(selects.eq(i).val() !== ''){
                attrs.push(selects.eq(i).val());
            }else{
                // i++;
                // while(i<selects.length){
                //     console.log(selects.eq(i));
                //     selects.eq(i).find('option').prop('disabled', false).css('display', 'block');
                //     i++;
                // }
                // break;
            }
          }
      }
  }

    var hash_parts = location.hash.replace('#', '').split('_');
    if(hash_parts.length){
        for(var i=0; i<hash_parts.length; i++){
            var option = $('.prod-size-item input[value="'+hash_parts[i]+'"]');
            option.prop('checked', true);
            option.trigger('change');
        }
    }

    $('.btn_buy').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        var $this = $(this);
        var qty = $('.result-price .count_field').val();
        var data = {
            action: 'add',
            product_id: $this.data('prod-id'),
            quantity: qty > 1 ? qty : 1
        };
        // var variations = $('.variation-select');
        // if(variations.length){
        //     var v = variations.serializeArray();
        //     if(v.length){
        //         data['variations'] = [];
        //         for(var variation in v){
        //             data['variations'][v[variation].name.replace(/attr\[(\d+)\]/, "$1")] = v[variation].value;
        //         }
        //     }
        // }

        var variation = $('[name="variation"]:checked');
        if(variation.length){
            data['variation'] = variation.val();
        }

        $("#order-popup").load("/cart/update", data, function(cart){
            $.magnificPopup.open({
                items: {
                    src: '#order-popup'
                },
                type: 'inline'
            }, 0);
            update_cart_quantity();
        });
        //update_cart(data);
    });

    /*
     * Добавление отзывов комментариев
     */
    $('form.review-form, form.answer-form').on('submit', function(e){
        e.preventDefault();
        var $this = $(this);

        $.ajax({
            url: '/review/add',
            data: $(this).serialize(),
            method: 'post',
            dataType: 'json',
            beforeSend: function() {
                $this.find('.error-message').fadeOut(300);
                $this.find('button[type="submit"]').html('Отправляем...');
            },
            success: function (response) {
                if(response.error){
                    var html = '';
                    $.each(response.error, function(i, value){
                        html += value + '<br>';
                    });
                    $('#error-' + response.type + ' > div').html(html);
                    $('#error-' + response.type).fadeIn(300);
                } else if(response.success) {
                    $('#error-' + response.type + ' > div').html(response.success);
                    $('#error-' + response.type).fadeIn(300);

                    setTimeout(function(){
                        $this.slideUp('slow');
                        $('.review-btn').fadeIn('slow');
                    },2500);
                    $('form.' + response.type + '-form')[0].reset();
                }
                $this.find('button[type="submit"]').html('Оставить отзыв')
            }
        });
    });

    window.sortBy = function(sort){
        var locate = location.search.split('&');
        var new_location = '';

        jQuery.each(locate, function (i, value) {
            var parameters = value.split('=');
            if (parameters[0] != 'sort') {
                new_location += value + '&';
            }
        });

        location.search = new_location + 'sort=' + sort;
    };

    /**
     * Отображение полей в зависимости от выбранного способа доставки
     */
    $('.order-page__form').on('change', '#checkout-step__delivery', function(){
        if ($(this).val() != 0) {
            $('.checkout-step__body').addClass('checkout-step__body_loader');
            $('.checkout-step__body_second .error-message').fadeOut(300);
            $('.checkout-step__body_second .error-message__text').html('');
            var data = {
                delivery: $(this).val(),
                order_id: $('#current_order_id').val()
            };

            $("#checkout-delivery-payment").load("/checkout/delivery", data, function (cart) {
                //$('select').fancySelect();
            });
            $('.checkout-step__body').removeClass('checkout-step__body_loader');
        }
    });

    /**
     * Удаление товара из корзины
     */
    $('#order-popup, #order_cart_content').on('click', '.mc_item_delete', function(){
        var $this = $(this);
        update_cart({
            action: 'remove',
            product_id: $this.data('prod-id')
        });
        $(this).parent('li').slideUp('slow').promise().done(function() {
            $(this).remove();
            if ($('.order-page__item').length != 0) {
                $('.order-page-inner').show();
            }
            else {
                $('.order-page-inner').hide();
                $('.order-page__empty').css('display', 'flex');
            }
        });
    });

    /**
     * Обновление колличества товара в корзине
     */
    $('#order-popup, #order_cart_content').on('input change', '.count_field', function(){
        var $this = $(this);
        update_cart({
            action: 'update',
            product_id: $this.data('prod-id'),
            quantity: $this.val()
        });
    });

    /**
     * Кнопка уменьшения колличества товара в корзине
     */
    $('#order-popup, #order_cart_content').on('click', '.cart_minus', function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });

    /**
     * Кнопка увеличения колличества товара в корзине
     */
    $('#order-popup, #order_cart_content').on('click', '.cart_plus', function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });

    /**
     * Обработка оформления заказа
     */
    $('#order-checkout').on('submit', function(e){
        e.preventDefault();
        var form = $(this);
        var error_div = form.find('.error-message');

        $.ajax({
            url: '/order/create',
            type: 'post',
            data: $(this).serialize(),
            beforeSend: function(){
                $('.checkout-step__body').addClass('checkout-step__body_loader');
                $('.checkout-step__body_second .error-message').fadeOut(300, function(){
                    $('.checkout-step__body_second .error-message__text').html('');
                });
                $('select, input').removeClass('input-error');
            },
            success: function(response) {

                if (response.error) {
                    var html = '';
                    $.each(response.error, function (id, text){
                        var error = id.split('.');
                        $('[name="' + error[0] + '[' + error[1] + ']"').addClass('input-error');
                        html += text + '<br>';
                    });
                    $('.cart-block_checkout .error-message__text').html(html);
                    $('.cart-block_checkout').removeClass('checkout-step__body_loader');
                    $('.cart-block_checkout .error-message').fa
                    deIn(300);
                } else if (response.success) {
                    console.log(response);
                    if (response.success == 'liqpay') {
                        // $('body').prepend(
                        //     '<form method="POST" id="liqpay-form" action="' + response.liqpay.url + '" accept-charset="utf-8">' +
                        //     '<input type="hidden" name="data" value="' + response.liqpay.data + '" />' +
                        //     '<input type="hidden" name="signature" value="' + response.liqpay.signature + '" />' +
                        //     '</form>');
                        // $('#liqpay-form').submit();
                        LiqPayCheckout.init({
                            data: response.liqpay.data,
                            signature:  response.liqpay.signature,
                            embedTo: "#liqpay_checkout",
                            mode: "embed" // embed || popup
                        }).on("liqpay.callback", function(data){
                            console.log(data.status);
                            console.log(data);
                            window.location = '/checkout/complete?order_id=' + response.order_id;
                        }).on("liqpay.ready", function(data){
                            $('#liqpay_checkout').css('display', 'block');
                        }).on("liqpay.close", function(data){
                            window.location = '/checkout/complete?order_id=' + response.order_id;
                        });
                    } else if (response.success == 'redirect') {
                        window.location = '/checkout/complete?order_id=' + response.order_id;
                    }
                }
            }
        })
    });

    $('.subscribe-form').on('submit', function(e){
        e.preventDefault();

        $.ajax({
            url: '/subscribe',
            data: $(this).serialize(),
            method: 'post',
            dataType: 'json',
            success: function(response){
                if (response.email){
                    swal('Подписка', response.email[0], 'error');
                } else if (response.success) {
                    swal('Подписка', response.success, 'success');
                }

                $('.subscribe-form').find('input[type="email"]').val('');
            }
        });
    });

    jQuery('.wishlist-add, .prod-card-wish').on('click', function () {
        var $this = $(this);
        var data = {};
        data['user_id'] = $this.attr('data-user-id');
        data['product_id'] = $this.attr('data-prod-id');
        if ($this.hasClass('active')) {
            data['action'] = 'remove';
        } else {
            data['action'] = 'add';
        }
        $.ajax({
            url: '/wishlist/update', type: 'POST', data: data, dataType: 'JSON',
            success: function (response) {
                if (response.count !== false) {
                    if($this.parents('.grid-product-card').length){
                        $this.parents('.grid-product-card').find('.prod-card-wish').toggleClass('active');
                    }else{
                        $this.toggleClass('active');
                    }
                }
            }
        });
    });

    $('.show-more-filters').click(function(e){
        e.preventDefault();
        $(this).parent().find('.overflow-scroll').css('height', 'auto');
        $(this).hide();
    });

    $('#filters input').change(function(){
        var url = $(this).data('url')
        if(typeof url !== 'undefined' && location.pathname != url){
            location = url;
        }
    });

    $('.hover-prod-card').on('mouseenter, mousemove', function (e) {
        var slider = $(this).find('.slick-slider:not(.slick-initialized)');

        if (slider.length) {
            slider.slick();
        }
        $(this).find('.slick-slider').slick('setPosition');
    });

    $('.homepage-product-card-color a').click(function(e){
        e.preventDefault();
        var i = $(this).data('id');
        var slider = $(this).parents('.grid-product-card').find('.slick-slider');
        slider.slick('slickGoTo', i);
    });

    $('#checkout-btn').click(function (e) {
        e.preventDefault();
        var validate = true;
        if($('#safe-agreement').prop('checked') == false){
            $('#safe-agreement').addClass('not-valid');
            validate = false;
        }else{
            $('#safe-agreement').removeClass('not-valid');
        }
        if($('#public-agreement').prop('checked') == false){
            $('#public-agreement').addClass('not-valid');
            validate = false;
        }else{
            $('#public-agreement').removeClass('not-valid');
        }

        if(validate){
            //$(this).parents('form').submit();

            $.ajax({
                url: '/order/create',
                type: 'post',
                data: $(this).parents('form').serialize(),
                beforeSend: function(){
                    $('.checkout-step__body').addClass('checkout-step__body_loader');
                    $('.checkout-step__body_second .error-message').fadeOut(300, function(){
                        $('.checkout-step__body_second .error-message__text').html('');
                    });
                    $('select, input').removeClass('input-error');
                },
                success: function(response) {
                    if (response.error) {
                        var html = '';
                        $.each(response.error, function (id, text){
                            var error = id.split('.');
                            $('[name="' + error[0] + '[' + error[1] + ']"').addClass('input-error');
                            html += text + '<br>';
                        });
                    } else if (response.success) {
                        if (response.success == 'liqpay') {
                            LiqPayCheckout.init({
                                data: response.liqpay.data,
                                signature:  response.liqpay.signature,
                                embedTo: "#liqpay_checkout",
                                mode: "embed" // embed || popup
                            }).on("liqpay.callback", function(data){
                                console.log(data.status);
                                console.log(data);
                                window.location = '/checkout/complete?order_id=' + response.order_id;
                            }).on("liqpay.ready", function(data){
                                $('#liqpay_checkout').css('display', 'block');
                            }).on("liqpay.close", function(data){
                                window.location = '/checkout/complete?order_id=' + response.order_id;
                            });
                        } else if (response.success == 'redirect') {
                            swal('Заказ оформлен!', 'Номер заказа: '+response.order_id, 'success');
                            setTimeout(function(){
                                window.location = '/user/history';
                            }, 5000);
                            //window.location = '/checkout/complete?order_id=' + response.order_id;
                        }
                    }
                }
            })
        }else{
            return false;
        }
    });

    $('#delivery-popup .save').click(function(){
        $('#current-delivery').text($('[for="'+$('#delivery-popup [name="delivery"]:checked').attr('id')+'"]').text());
        $.magnificPopup.close();
    });

    $('#delivery-popup .cancel').click(function(){
        $.magnificPopup.close();
    });

    // $('#delivery-popup [name="delivery"]').change(function(){
    //     $('#current-delivery').text($('[for="'+$(this).attr('id')+'"]').text());
    // });

    $('#pay-popup .save').click(function(){
        $('#current-pay').text($('[for="'+$('#pay-popup [name="payment"]:checked').attr('id')+'"]').text());
        $.magnificPopup.close();
    });

    $('#pay-popup .cancel').click(function(){
        $.magnificPopup.close();
    });
    // $(document).on('click', '.edit-profile.active', function () {
    //     var data = {
    //         fio: $('[name="fio"]').val(),
    //         phone: $('[name="phone"]').val(),
    //         email: $('[name="email"]').val(),
    //         user_birth: $('[name="user-birth"]').val()
    //     };
    //
    //     $.post('/saveUserData', data, function(response){
    //         window.location = window.location;
    //     });
    // })

    $('[name="subscr-type"]').change(function(){
        $.post('/user/updateSubscr', {subscr: $('[name="subscr-type"]:checked').val()}, function(response){
            if(response.success){
                swal('Сохранено', 'Данные успешно сохранениы!', 'success');
            }else{
                swal('Ошибка', 'Не удалось сохранить данные', 'error');
            }
        });
    });
    $('.profile-address-btn').click(function(e){
        e.preventDefault();
        var data = {
            city: $('[name="city"]').val(),
            post_code: $('[name="post_code"]').val(),
            street: $('[name="street"]').val(),
            house: $('[name="house"]').val(),
            flat: $('[name="flat"]').val()
        };

        $.post('/user/updateAddress', data, function(response){
            if(response.success){
                swal('Сохранено', 'Данные успешно сохранениы!', 'success');
            }else{
                swal('Ошибка', 'Не удалось сохранить данные', 'error');
            }
        });
    });

    $('.sign-up-form').submit(function (e) {
        if($('#email').val() == '' || $('#first_name').val() == '' || $('#phone').val() == '' || $('#password').val() == '' || $('#passwordr').val() == ''){
            e.preventDefault();
        }
    });

    $('.sign-up-form input').on('keyup', function(){
        if($('#email').val() != '' && $('#first_name').val() != '' && $('#phone').val() != '' && $('#password').val() != '' && $('#passwordr').val() != ''){
            $('.registr-btn').css('background-color', '#5F98B9');
        }else{
            $('.registr-btn').css('background-color', '#9DACB4');
        }
    });

    $('.sign-in-form').submit(function (e) {
        if($('#email').val() == '' || $('#pass').val() == ''){
            e.preventDefault();
        }
    });

    $('.sign-in-form input').on('keyup', function(){
        if($('#email').val() != '' && $('#pass').val() != ''){
            $('.registr-btn').css('background-color', '#5F98B9');
        }else{
            $('.registr-btn').css('background-color', '#9DACB4');
        }
    });

    $('#redirect_select').change(function(){
        if(window.location.href != $(this).val()){
            window.location = $(this).val();
        }
    });

});

/**
 * Обновление корзины
 * @param data
 */
function update_cart(data){
    $("#order-popup").load("/cart/update", data, function(cart){
        var order_cart_content = $('#order_cart_content');
        if(order_cart_content.length > 0){
            order_cart_content.load("/cart #order_cart_content");
        }
        //$('.cart_scroll_wrapper').jScrollPane();
        update_cart_quantity();
        //if(order_cart_content.length == 0)
        //    $('#cart').trigger('click');
    });
}

function update_cart_quantity() {
    var quantity = $('.order-popup__count-items').data('qty');
    var price = $('.popup-total-price p span').first().text();
    if(quantity){
        if($('.in-cart-info .quantity').length){
            $('.in-cart-info .quantity').text(quantity);
        }else{
            $('.in-cart-info').append('<p class="quantity">'+quantity+'</p>');
        }
        if($('.in-cart-info .price').length){
            $('.in-cart-info .price').text(price);
        }else{
            $('.in-cart-info').append('<p><span class="price">'+price+'</span> грн</p>');
        }
    }else{
        $('.in-cart-info p').remove();
    }
}

/**
 * Загрузка городов и отделений Новой Почты
 * @param id
 * @param value
 */
window.newpostUpdate = function(id, value) {
    if (id == 'city') {
        var data = {
            city_id: value
        };
        var path = '/checkout/warehouses';
        var selector = jQuery('#checkout-step__warehouse');
    } else if (id == 'region') {
        var data = {
            region_id: value
        };
        var path = 'checkout/cities';
        var selector = jQuery('#checkout-step__city');
    }

    jQuery.ajax({
        url: path,
        data: data,
        type: 'post',
        dataType: 'json',
        beforeSend: function() {
            jQuery('.checkout-step__body_second .error-message').fadeOut(300);
            jQuery('.checkout-step__body').addClass('checkout-step__body_loader');
            jQuery('.checkout-step__body_second .error-message__text').html('');
            jQuery('#checkout-step__warehouse').html('<option value="0">Сначала выберите город!</option>');
            jQuery('#checkout-step__warehouse').trigger('refresh');
        },
        success: function(response){
            if (response.error) {
                jQuery('.checkout-step__body_second .error-message__text').html(response.error);
                jQuery('.checkout-step__body').removeClass('checkout-step__body_loader');
                jQuery('.checkout-step__body_second .error-message').fadeIn(300);
            } else if (response.success) {
                var html = '<option value="0">Выберите город</option>';
                jQuery.each(response.success, function(i, resp){
                    if (id == 'city') {
                        var info = resp.address_ru;
                    } else if (id == 'region') {
                        var info = resp.name_ru;
                    }
                    html += '<option value="' + resp.id + '">' + info + '</option>';
                });
                selector.html(html);
                selector.trigger('update.fs');
                jQuery('.checkout-step__body').removeClass('checkout-step__body_loader');
            }
        }
    })
};