
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

//window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
//
// const app = new Vue({
//     el: '#app'
// });


'use strict';

// Depends
let $ = require('jquery');
require('./bootstrap');

// Modules
let Forms = require('./components/forms');
let Slider = require('./components/slider');
let Popup = require('./components/popup');
let Fancy_select = require('./components/fancyselect');
let Jscrollpane = require('./components/jscrollpane');
let Fancybox = require('./components/fancybox');
let Chosen = require('./components/chosen');


// Are you ready?
$(function() {
  new Forms();
  new Popup();
  new Fancy_select();
  new Jscrollpane();
// new LightGallery();
  new Slider();
//  new Jslider();
  new Fancybox();
  new Chosen();

  $(".chosen-select").chosen();
// Прокрутка к якорю
  $('.go_to').each(function() {
    var $this = $(this);
    $this.click(function() {
      var scroll_el = $($this.data('destination'));
      if ($(scroll_el).length != 0) {
        $('html, body').animate({
          scrollTop: $(scroll_el).offset().top
        }, 500);
      }
      return false;
    });
  });

  $('.fixed-up-btn').on('click', function(event) {
      event.preventDefault();
      $('body,html').animate({scrollTop: 0}, 1000);
      return false;
  });
  // TOP MENU CATALOG
  var $toggleElem = $('.js-toggle');
  $toggleElem.mouseover(function(e) {
    e.preventDefault();
    var $toggleTarget = $($(this).data('toggle'));
    $('.top-menu-catalog-wrp').not($toggleTarget).removeClass('is-open');
    $toggleTarget.toggleClass('is-open');
    e.stopPropagation();
    hideOnClickOutside($(this).data('toggle'));
  });
  $('.header').on('mouseleave', function(){
      $('.top-menu-catalog-wrp').removeClass('is-open');
  });
  $('.top-navigation-wrp').on('mouseenter', function(){
      $('.top-menu-catalog-wrp').removeClass('is-open');
  });
  // $('.top-menu-catalog-wrp').mouseout(function (e) {
  //   $(this).removeClass('is-open');
  // });

  // var $toggleElemSize = $('.js-toggle');
  // $toggleElemSize.click(function (e) {
  //     e.preventDefault();
  //     var $toggleTargetSize = $($(this).data('toggle'));
  //     $toggleTargetSize.toggleClass('active');
  //     e.stopPropagation();
  //     hideOnClickOutside($(this).data('toggle'));
  // });

//  HOVER IN TOP MENU CATALOG
  var $toggleElemHover = $('.js-hover-toggle');
  $toggleElemHover.hover(function(e) {
    e.preventDefault();
    var $toggleTargetHover = $($(this).data('toggle'));
    $('.catalog-img').not($toggleTargetHover).removeClass('unactive');
    $toggleTargetHover.toggleClass('unactive');
    e.stopPropagation();
    hideOnClickOutside($(this).data('toggle'));
  });

  var $toggleElemHide = $('.js-toggle-click-btn');
  $toggleElemHide.click(function(e) {
    e.preventDefault();
    var $toggleTargetHide = $($(this).data('toggle'));
    $toggleTargetHide.slideToggle(500);
    $(this).addClass('unactive');
    e.stopPropagation();
  });
  //
  // var $toggleElemHide = $('.js-toggle-one-click-btn');
  // $toggleElemHide.click(function(e) {
  //   e.preventDefault();
  //   var $toggleTargetHide = $(this).parent().find('form');
  //   $toggleTargetHide.slideToggle(500);
  //   $(this).addClass('unactive');
  //   e.stopPropagation();
  // });
    var $toggleElemHide = $('.js-toggle-one-click-btn');
    $toggleElemHide.click(function(e) {
        e.preventDefault();
        var $toggleTargetHide = $(this).parent().next('form');
        $toggleTargetHide.slideToggle(500);
        $(this).parent().addClass('unactive').removeClass('hover-pro-card-btn-container');
        e.stopPropagation();
    });

  function hideOnClickOutside(element) {
    $(document).click(function(event) {
      if (!$(event.target).closest(element).length) {
        if ($(element).is(':visible') && $(element).hasClass('is-open')) {
          $(element).removeClass('is-open');
        }
      }
    });
  }
   // BURGER MENU
  $('.btn-menu').click(function() {
    $(this).find('.burger-menu').toggleClass('open-menu');
  });
  // CATEGORY`S ASIDE MENU
  $('.aside-filter-menu-item-btn-toggle').click(function(event) {
    event.preventDefault();
    $(this).toggleClass('filters-open');
    // $(this).prev('.aside-filter-menu-item-filters').toggleClass('unactive');
    $(this).prev('.aside-filter-menu-item-filters').slideToggle(300);
    $(this).parent().next('.product-accordion-text').slideToggle(300);
  });

  // PRODUCT PAGE ACCORDION
  // $('.product-accordion-item').click(function() {
  //   // event.preventDefault();
  //   $(this).find('.aside-filter-menu-item-btn-toggle').toggleClass('filters-open');
  //   $(this).next('.product-accordion-text').slideToggle(300);
  // });

  // INFORMATION ACCORDION
  $('.information-accordion').click(function() {
    // event.preventDefault();
    $(this).find('.aside-filter-menu-item-btn-toggle').toggleClass('filters-open');
    $(this).next('.information-accordion-links').slideToggle(300);
  });
  //   $('.information-accordion').click(function() {
  //   // event.preventDefault();
  //   $(this).find('.aside-filter-menu-item-btn-toggle').toggleClass('filters-open');
  //   $(this).next('.information-accordion-links').toggleClass('unactive');
  // });

  setTimeout(function(){$( window ).resize()}, 100);

  // $('.product-card-like').click(function() {
  //   $(this).next('.product-card-like-inactive').toggleClass('inactive-wishlist-icon');
  // });
  // $('.product-card-like-inactive').click(function() {
  //   $(this).toggleClass('inactive-wishlist-icon');
  // });

  $('input[name="user-birth"]').mask('99/99/9999');
  // $('input[name="phone"]').mask('+38 (999) 999-99-99');
  // $('.response-phone-input').mask('380 999 999 99 99');

    // $('.minus').click(function () {
    //     var $input = $(this).parent().find('input');
    //     var count = parseInt($input.val()) - 1;
    //     count = count < 1 ? 1 : count;
    //     $input.val(count);
    //     $input.change();
    //     return false;
    // });
    // $('.plus').click(function () {
    //     var $input = $(this).parent().find('input');
    //     $input.val(parseInt($input.val()) + 1);
    //     $input.change();
    //     return false;
    // });

    $("#sorting-select").chosen().change( function(){
      var values = {
        'От дешевых к дорогим': 'ico-1',
        'От дорогих к дешевым': 'ico-2'
      };
      var sclass = '';

      if(typeof values[$(this).val()] !== 'undefined'){
        sclass = values[$(this).val()];
      }

      $('#sorting_select_chosen .chosen-single span').attr('class', sclass);
    });

    $('.edit-profile').click(function(event) {
        event.preventDefault();
        if($(this).hasClass('active')){
            var data = {
                fio: $('[name="fio"]').val(),
                phone: $('[name="phone"]').val(),
                email: $('[name="email"]').val(),
                user_birth: $('[name="user-birth"]').val()
            };

            $.post('/saveUserData', data, function(response){
                window.location = window.location;
            });
        }
        $(this).toggleClass('active');
        $('.profile-data-wrp').toggleClass('unactive');
        $('.profile-edit-data-wrp').toggleClass('unactive');
    });

    $('.user-password').click(function(event) {
        event.preventDefault();
        $(this).toggleClass('unactive');
        $('.password-edit').toggleClass('unactive');
    });

    $('.password-btn').click(function(event) {
        event.preventDefault();
        var data = {
            password: $('[name="pass"]').val(),
            password_confirmation: $('[name="repass"]').val()
        };

        $.post('/user/updatePassword', data, function(response){
            if(response.success){
                swal('Сохранено', 'Данные успешно сохранениы!', 'success');
            }else{
                swal('Ошибка', 'Не удалось сохранить данные', 'error');
            }
            $('.password-edit').toggleClass('unactive');
        });
    });

    $('.top-menu-catalog-section li a').hover(function(){
        var newSrc = $(this).data('src');
        if(typeof newSrc !== 'undefined' && newSrc != ''){
            $(this).parents('.top-menu-catalog-container').find('.top-menu-catalog-img img').attr('src', newSrc);
            // $('.top-menu-catalog-img img').attr('src', newSrc);
        }
    })
});

require('./custom.js');