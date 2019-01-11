@extends('public.layouts.main', ['root_category' => $root_category])
@section('meta')
    <title>
        @if(empty($product->meta_title))
            {!! $product->name !!}} купить по выгодной цене
        @else
            {!! $product->meta_title !!}
        @endif
    </title>

    @if(empty($product->meta_description))
        <meta name="description" content="Купить {!! $product->name !!}} в Харькове">
    @else
        <meta name="description" content="{!! $product->meta_description !!}">
    @endif

    <meta name="keywords" content="{!! $product->meta_keywords !!}">
    @if(!empty($product->robots))
        <meta name="robots" content="{!! $product->robots !!}">
    @endif

    <!-- Код тега ремаркетинга Google -->
    <script type="text/javascript">
        var google_tag_params = {
            dynx_itemid: '{{ $product->id }}',
            dynx_pagetype: 'offerdetail',
            dynx_totalvalue: '{{ $product->price }}',
        };
    </script>
    <script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = 789556637;
        var google_custom_params = window.google_tag_params;
        var google_remarketing_only = true;
        /* ]]> */
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
    </script>

    @include('public.layouts.microdata.product', ['product' => $product, 'gallery' => $gallery, 'brand' => $brand])
    @include('public.layouts.microdata.open_graph', [
     'title' => empty($product->meta_title) ? $product->name.' купить по выгодной цене' : $product->meta_title,
     'description' => empty($product->meta_description) ? 'Купить '.$product->name.' в Харькове' : $product->meta_description,
     'image' => !empty($product->image) ? $product->image->url() : '/images/logo.png'
     ])
@endsection

@section('breadcrumbs')
    {!! Breadcrumbs::render('product', $product, $product->categories) !!}
@endsection

@section('content')
    <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/789556637/?guid=ON&amp;script=0"/>
        </div>
    </noscript>

    <section>
        <div class="container">
            <div class="row">
                <div class="visible-xs-inline-block col-xs-12">
                    <div class="product-card-text">
                        <h1 class="title">{{ $product->name }}</h1>
                        <p>Код товара: <span>{{ $product->articul }}</span></p>
                        @if(!empty($brand))
                            <a href="{{env('APP_URL')}}/catalog/tovary/brend-{{ $brand->value }}">
                                <p>Бренд: <span>{{ $brand->name }}</span></p>
                            </a>
                        @endif
                    </div>
                    <div class="homepage-product-card-price">
                        <p>{{ round($product->price, 2) }}<span> грн</span></p>
                        @if(!empty($product->old_price))
                            <span class="old-price">{{ round($product->old_price, 2) }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <div class="js-slider slick-slider product-img-slider" data-slick='{"slidesToShow": {{ !empty($gallery) && count($gallery)> 1 ? '2' : '1' }}, "lazyLoad": "ondemand", "vertical": true, "dots": false, "arrows": true, "verticalSwiping": true, "responsive":[{"breakpoint":768,"settings":{"slidesToShow": 1, "vertical": false, "arrows": false, "dots": true, "verticalSwiping": false, "lazyLoad": "ondemand"}}]}'>
                        @forelse($gallery as $image)
                            @if(is_object($image))
                                <div class="product-photo">
                                    <img src="{{ $image->url('product') }}" alt="{{ $product->name }}">
                                </div>
                            @endif
                        @empty
                            <div class="product-photo">
                                @if(empty($product->image))
                                    <img src="/uploads/no_image.jpg" alt="">
                                @else
                                    <img src="{{ $product->image->url('product') }}" alt="">
                                @endif
                            </div>
                        @endforelse
                    </div>
                    <div class="back-link">
                        <a href="#" onclick="window.history.back();" class="default-link-hover">Назад к списку товаров</a>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <form action="" class="product-form">
                        <div class="product-card-text hidden-xs">
                            <h2 class="title">{{ $product->name }}</h2>
                            <p>Код товара: <span>{{ $product->articul }}</span></p>
                            @if($brand)
                                <a href="{{env('APP_URL')}}/catalog/tovary/brend-{{ $brand->value }}">
                                    <p>Бренд: <span>{{ $brand->name }}</span></p>
                                </a>
                            @endif
                        </div>
                        @if(count($colors) > 1)
                            <div class="prod-color-wrp">
                                @foreach($colors as $key => $item)
                                    <div>
                                        <label for="prod-color-{{ $key }}" class="prod-color" style="background-color: {{ $item['color']->value }}" onclick="location='{{env('APP_URL')}}/product/{{ $item['slug'] }}'"></label>
                                        <input type="radio" name="prod-color" value="" id="prod-color-{{ $key }}" class="radio"{{ $item['slug'] === $product->url_alias ? ' checked' : '' }}>
                                        <span class="radio-custom"></span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="prod-price hidden-xs">
                            <p>Цена: <span class="product-price" data-price="{{ round($product->price, 2) }}">{{ round($product->price, 2) }}</span>грн</p>
                            @if(!empty($product->old_price))
                                <span class="old-price">{{ round($product->old_price, 2) }}</span>
                            @endif
                        </div>
                        @foreach($variations as $attr_key => $variation)
                            <div class="prod-size-wrp">
                                @foreach($variation['values'] as $key => $val)
                                    <div class="prod-size-item">
                                        <input type="radio" name="variation-{{ $attr_key }}" value="{{ $key }}" id="prod-size-{{ $key }}" class="radio variation-radio" {{ $val['stock'] == 0 ? ' disabled="disabled"' : '' }}>
                                        <label for="prod-size-{{ $key }}" class="prod-size{{ $val['stock'] == 0 ? ' disabled' : '' }}">{{ $val['name'] }}</label>
                                    </div>
                                @endforeach
                                @if($variation['name'] == 'Размер')
                                    <a href="{{env('APP_URL')}}/page/sizes" class="size-link js-toggle" aria-label="Open Navigation" data-toggle=".size-table-popup">Таблица размеров</a>

                                    <div class="size-table size-table-popup hidden-xs">
                                        <div class="size-tabl-title">
                                            <h5>Таблица размеров</h5>
                                            <img src="/images/homepage-icons/close popup icon.svg" class="size-tabl-popup-close js-toggle" data-toggle=".size-table" alt="">
                                        </div>
                                        @php
                                            $categories = $product->categories;
                                            $table = 'womens';
                                            if(!empty($categories) && $categories->first()->get_root_category()->name == 'Для мужчин'){
                                                $table = 'mens';
                                            }
                                        @endphp
                                        @if($table == 'womens')
                                            <h6>Женская обувь</h6>
                                            <div class="size-tabl__table">
                                                <ul class="size-tabl__table-head">
                                                    <li class="size-tabl__table-cell">Длина стопы, см</li>
                                                    <li class="size-tabl__table-cell">Украина</li>
                                                </ul>
                                                <ul class="size-tabl__table-row">
                                                    <li class="size-tabl__table-cell">21,5</li>
                                                    <li class="size-tabl__table-cell">35</li>
                                                </ul>
                                                <ul class="size-tabl__table-row">
                                                    <li class="size-tabl__table-cell">22,5</li>
                                                    <li class="size-tabl__table-cell">36</li>
                                                </ul>
                                                <ul class="size-tabl__table-row">
                                                    <li class="size-tabl__table-cell">23,5</li>
                                                    <li class="size-tabl__table-cell">37</li>
                                                </ul>
                                                <ul class="size-tabl__table-row">
                                                    <li class="size-tabl__table-cell">24,5</li>
                                                    <li class="size-tabl__table-cell">38</li>
                                                </ul>
                                                <ul class="size-tabl__table-row">
                                                    <li class="size-tabl__table-cell">25,5</li>
                                                    <li class="size-tabl__table-cell">39</li>
                                                </ul>
                                                <ul class="size-tabl__table-row">
                                                    <li class="size-tabl__table-cell">26</li>
                                                    <li class="size-tabl__table-cell">40</li>
                                                </ul>
                                                <ul class="size-tabl__table-row">
                                                    <li class="size-tabl__table-cell">26,5</li>
                                                    <li class="size-tabl__table-cell">41</li>
                                                </ul>
                                            </div>
                                        @else
                                            <h6>Мужская обувь</h6>
                                            <div class="size-tabl__table">
                                                <ul class="size-tabl__table-head">
                                                    <li class="size-tabl__table-cell">Длина стопы, см</li>
                                                    <li class="size-tabl__table-cell">Украина</li>
                                                </ul>

                                                <ul class="size-tabl__table-row">
                                                    <li class="size-tabl__table-cell">25</li>
                                                    <li class="size-tabl__table-cell">39</li>
                                                </ul>

                                                <ul class="size-tabl__table-row">
                                                    <li class="size-tabl__table-cell">26</li>
                                                    <li class="size-tabl__table-cell">40</li>
                                                </ul>

                                                <ul class="size-tabl__table-row">
                                                    <li class="size-tabl__table-cell">27</li>
                                                    <li class="size-tabl__table-cell">41</li>
                                                </ul>

                                                <ul class="size-tabl__table-row">
                                                    <li class="size-tabl__table-cell">28</li>
                                                    <li class="size-tabl__table-cell">42</li>
                                                </ul>

                                                <ul class="size-tabl__table-row">
                                                    <li class="size-tabl__table-cell">29</li>
                                                    <li class="size-tabl__table-cell">43</li>
                                                </ul>

                                                <ul class="size-tabl__table-row">
                                                    <li class="size-tabl__table-cell">30</li>
                                                    <li class="size-tabl__table-cell">44</li>
                                                </ul>

                                                <ul class="size-tabl__table-row">
                                                    <li class="size-tabl__table-cell">31</li>
                                                    <li class="size-tabl__table-cell">45</li>
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        @endforeach
                        @foreach($variations_prices as $variation => $val)
                        <input class="hidden" type="radio" id="var_{{ $variation }}" name="variation" value="{{ $val['id'] }}" data-price="{{ $val['price'] }}">
                        @endforeach
                        <div class="prod-btn">
                            <input type="button" value="КУПИТЬ" class="buy-btn btn_buy" data-prod-id="{{ $product->id}}">
                            <div class="append-btn wishlist-add{{ $product->in_wish() ? ' active' : '' }}" data-prod-id="{{ $product->id}}" data-user-id="{{ $user ? $user->id : 0}}">
                                <i class="product-card-like">&#xE801</i>
                                <i class="inactive-wishlist-icon fill-wish-heart">&#xE807</i>
                            </div>
                        </div>
                    </form>

                    <div class="prod-description hidden-xs">
                        {!! $product->description  !!}
                    </div>
                    <ul class="prod-characteristics">
                        @foreach($product_attributes as $name => $attr)
                            @if($name !== 'Бренд')
                                <li>
                                    {{ $name }}:
                                    <p>
                                        @foreach($attr as $val)
                                            {{ $val['name'] }};
                                        @endforeach
                                    </p>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <div class="one-click-btn-wrp">
                        <a href="javascript:void(0);" class="one-click-btn js-toggle-click-btn"  data-toggle=".one-click-form">
                            <p>Купить в 1 клик</p>
                        </a>
                        <form action="" class="one-click-form unactive ajax_form"
                              data-error-title="Ошибка отправки!"
                              data-error-message="Попробуйте отправить заявку через некоторое время."
                              data-success-title="Спасибо за заявку!"
                              data-success-message="Наш менеджер свяжется с вами в ближайшее время.">
                            <input type="hidden" name="form" value="Быстрый заказ" data-title="Форма">
                            <input type="hidden" name="product_name" value="{{ $product->name }}" data-title="Название товара">
                            <input type="hidden" name="product_id" value="{{ $product->id }}" data-title="ID товара">
                            <input type="hidden" name="product_articul" value="{{ $product->articul }}" data-title="Артикул товара">
                            <input type="text" name="name" class="one-click-form-input" placeholder="имя" data-title="Имя"><input type="text" name="phone" class="one-click-form-input" placeholder="тел." data-validate-required="Обязательное поле" data-validate-uaphone="Неправильный номер" data-title="Телефон"><input type="submit" value="Отправить" class="send-btn one-click-form-btn">
                        </form>
                    </div>
                    <div class="prod-description visible-xs-block">
                        <p>
                            {!! $product->description  !!}
                        </p>
                    </div>
                    <div class="product-accordion-wrp">
                        <div class="product-accordion-item">
                            <div class="aside-filter-menu-item-title">
                                <p>Доставка и возврат</p>
                            </div>
                            <div class="aside-filter-menu-item-btn-toggle filters-open">
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                        <div class="product-accordion-text unactive">
                            <ul class="tabs-menu product-accordion-tabs nav nav-tabs margin">
                                <li class="active"><a href="#deliv-ukr" data-toggle="tab">Украина</a></li>
                                <li><a href="#deliv-kh" data-toggle="tab">Харьков</a> </li>
                                <li><a href="#deliv-abroad" data-toggle="tab">За пределы Украины</a></li>
                            </ul>
                            <div class="tabs tab-content jScrollPane">
                                <div class="tab-pane product-tab active" id="deliv-ukr">
                                    <h5>Доставка по Украине</h5>
                                    <p>  Мы осуществляем доставку по Украине самым распространённым на сегодняшний день экспресс - перевозчиком «Новая Почта». Оплата возможна как наложенным платежом, так и по полной оплате на карту.
                                        Отправки заказов осуществляются в течении 1-3 суток с момента заказа, получить более подробную информацию можно позвонив по одному из трех наших телефонов.
                                        Получить свою пару обуви Вы можете в любом понравившемся Вам отделении « Новой Почты», которое Вы можете подобрать на официальном сайте «Новой Почты». Или же сообщите нашему менеджеру Ваш адрес, и он самостоятельно подберёт для Вас ближайшее отделение и сообщит Вам, его номер и адрес.
                                        Чтобы избежать начисления дополнительных средств за хранение товара, посылку следует забирать в течении пяти дней с момента ее прибытия. С момента передачи товара экспресс - перевозчику « Новая Почта» и до момента, когда клиент получит свою обувь, ответственность за Ваш заказ несет перевозчик.
                                        Средняя стоимость доставки составляет от пятидесяти гривен.
                                        Расходы связанные с  доставкой, обменом или возвратом товара несет покупатель.</p>
                                </div>
                                <div class="tab-pane product-tab" id="deliv-kh">
                                    <h5>Доставка по Харькову</h5>
                                    <p>Мы осуществляем доставку по Украине самым распространённым на сегодняшний день экспресс - перевозчиком «Новая Почта». Оплата возможна как наложенным платежом, так и по полной оплате на карту.
                                        Отправки заказов осуществляются в течении 1-3 суток с момента заказа, получить более подробную информацию можно позвонив по одному из трех наших телефонов.
                                        Получить свою пару обуви Вы можете в любом понравившемся Вам отделении « Новой Почты», которое Вы можете подобрать на официальном сайте «Новой Почты». Или же сообщите нашему менеджеру Ваш адрес, и он самостоятельно подберёт для Вас ближайшее отделение и сообщит Вам, его номер и адрес.
                                        Чтобы избежать начисления дополнительных средств за хранение товара, посылку следует забирать в течении пяти дней с момента ее прибытия. С момента передачи товара экспресс - перевозчику « Новая Почта» и до момента, когда клиент получит свою обувь, ответственность за Ваш заказ несет перевозчик.
                                        Средняя стоимость доставки составляет от пятидесяти гривен.
                                        Расходы связанные с  доставкой, обменом или возвратом товара несет покупатель.</p>
                                </div>
                                <div class="tab-pane product-tab" id="deliv-abroad">
                                    <h5>Доставка за пределы Украины</h5>
                                    <p>Мы осуществляем доставку по Украине самым распространённым на сегодняшний день экспресс - перевозчиком «Новая Почта». Оплата возможна как наложенным платежом, так и по полной оплате на карту.
                                        Отправки заказов осуществляются в течении 1-3 суток с момента заказа, получить более подробную информацию можно позвонив по одному из трех наших телефонов.
                                        Получить свою пару обуви Вы можете в любом понравившемся Вам отделении « Новой Почты», которое Вы можете подобрать на официальном сайте «Новой Почты». Или же сообщите нашему менеджеру Ваш адрес, и он самостоятельно подберёт для Вас ближайшее отделение и сообщит Вам, его номер и адрес.
                                        Чтобы избежать начисления дополнительных средств за хранение товара, посылку следует забирать в течении пяти дней с момента ее прибытия. С момента передачи товара экспресс - перевозчику « Новая Почта» и до момента, когда клиент получит свою обувь, ответственность за Ваш заказ несет перевозчик.
                                        Средняя стоимость доставки составляет от пятидесяти гривен.
                                        Расходы связанные с  доставкой, обменом или возвратом товара несет покупатель.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-accordion-wrp">
                        <div class="product-accordion-item">
                            <div class="aside-filter-menu-item-title">
                                <p>Уход за обувью</p>
                            </div>
                            <div class="aside-filter-menu-item-btn-toggle filters-open">
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                        <div class="product-accordion-text unactive">
                            <p>Для такого типа обуви подходят следующие товары <a href="" class="default-link-hover">Средство 1</a>  <a href="" class="default-link-hover">Средство 2</a>, а также <a href="" class="default-link-hover">Средство 3</a></p>
                        </div>
                    </div>
                    <div class="product-accordion-wrp">
                        <div class="product-accordion-item">
                            <div class="aside-filter-menu-item-title">
                                <p>Отзывы</p>
                            </div>
                            <div class="aside-filter-menu-item-btn-toggle filters-open">
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                        <div class="product-accordion-text unactive">
                            @if(!empty($user))
                            <form action="" class="write-review-container review-form">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="name" value="{{ $user->first_name  }}">
                                <input type="hidden" name="email" value="{{ $user->email }}">
                                <input type="hidden" name="grade" value="5">
                                <input type="text" name="review" placeholder="Расскажите другим об этой модели">
                                <button type="submit" class="write-review-btn buy-btn">Написать отзыв</button>
                            </form>
                            @else
                            <div class="write-review-container review-form">
                                <input type="text" name="review" placeholder="Расскажите другим об этой модели" disabled>
                                <a href="{{env('APP_URL')}}/login" class="write-review-btn buy-btn">Написать отзыв</a>
                            </div>
                            @endif
                            @forelse($product->reviews as $review)
                                <div class="review-container">
                                    <div class="review stars">
                                        @for($i=0;$i<5;$i++)
                                            @if($i < $review->grade)
                                                <i class="stars">&#xE802</i>
                                            @else
                                                <i class="stars">&#xE80B</i>
                                            @endif
                                        @endfor
                                    </div>
                                    <p class="review-text">
                                        {!! $review->review !!}
                                    </p>
                                    <span class="review-info">
                                        @if(!empty($review->user))
                                            {{ $review->user->first_name }}
                                        @else
                                            {{ $review->author }}
                                        @endif
                                        - {!! $review->created_at !!}
                                    </span>
                                </div>
                                @if(!empty($review->answer))
                                <div class="answer-container">
                                    <p class="review-text">
                                        {!! $review->answer !!}
                                    </p>
                                    <span class="review-info">Tyfli.com - {!! $review->updated_at !!}</span>
                                </div>
                                @endif
                            @empty
                                <div class="review-container">
                                    <p class="review-text">У этого товара пока нет отзывов! Будьте первым!</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="product-social-links">
                        <div class="product-social-links-icons">
                            <a href="https://www.instagram.com/tyflicom/">
                                <i>&#xE804;</i>
                            </a>
                            <a href="https://www.facebook.com/tyfli.commarina/">
                                <i>&#xE803;</i>
                            </a>
                            {{--<a href="https://www.vkontakte.com">--}}
                                {{--<i>&#xE800</i>--}}
                            {{--</a>--}}
                        </div>
                        <a href="" class="inform-sale-btn js-toggle-click-btn"  data-toggle=".inform-sale-form"><p>Сообщить о снижении цены</p></a>
                        <form class="inform-sale-form unactive ajax_form"
                              data-error-title="Ошибка отправки!"
                              data-error-message="Попробуйте отправить заявку через некоторое время."
                              data-success-title="Спасибо за заявку!"
                              data-success-message="Наш менеджер свяжется с вами в ближайшее время.">
                            <input type="hidden" name="form" value="Сообщить о снижении цены" data-title="Форма">
                            <input type="hidden" name="product_name" value="{{ $product->name }}" data-title="Название товара">
                            <input type="hidden" name="product_id" value="{{ $product->id }}" data-title="ID товара">
                            <input type="hidden" name="product_articul" value="{{ $product->articul }}" data-title="Артикул товара">
                            <input type="email" name="email" class="email-input" placeholder="Ваша почта" data-title="Почта" data-validate-required="Обязательное поле" data-validate-email="Неправильный email">
                            <input type="submit" value="Отправить" class="send-btn inform-sale-form-btn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="insta-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">
                        Поделись своим образом в Instagram
                    </h3>
                    <p>Ставь хештег <a href="https://www.instagram.com/tyflicom/">#tyflicom</a> в Instagram дай возможность другим увидеть твой образ</p>
                </div>
                <div class="col-md-12">
                    <div class="js-slider slick-slider slider-margins" data-slick='{"slidesToShow": 6,"autoplay":true, "autoplaySpeed": 1000, "arrows": false, "lazyLoad": "ondemand", "responsive":[{"breakpoint":768,"settings":{"slidesToShow": 4, "arrows": false, "autoplay":true, "autoplaySpeed": 1000, "arrows": false, "lazyLoad": "ondemand"}}, {"breakpoint":480,"settings":{"slidesToShow":1, "autoplay":true, "autoplaySpeed": 1000, "arrows": false, "lazyLoad": "ondemand"}}]}'>
                        <div class="insta-img"><img src="../../images/images-instagram/7.jpg" alt=""></div>
                        <div class="insta-img"><img src="../../images/images-instagram/8.jpg" alt=""></div>
                        <div class="insta-img"><img src="../../images/images-instagram/9.jpg" alt=""></div>
                        <div class="insta-img"><img src="../../images/images-instagram/10.jpg" alt=""></div>
                        <div class="insta-img"><img src="../../images/images-instagram/11.jpg" alt=""></div>
                        <div class="insta-img"><img src="../../images/images-instagram/6.jpg" alt=""></div>
                        <div class="insta-img"><img src="../../images/images-instagram/1.jpg" alt=""></div>
                        <div class="insta-img"><img src="../../images/images-instagram/5.jpg" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">
                        Популярные товары
                    </h3>
                </div>
                <div class="slick-prod-wrap">
                    <div class="slick-slider slick-prod popular-slider" data-slick='{"slidesToShow":4, "slidesToScroll":4, "arrows": false, "lazyLoad": "ondemand", "responsive":[ {"breakpoint":768,"settings":{"slidesToShow":2, "slidesToScroll":1, "arrows": false, "lazyLoad": "ondemand"}}]}'>
                        @foreach($popular as $prod)
                            <div>
                                <div class="grid-product-card card-margin">
                                    @include('public.layouts.product', ['product' => $prod, 'slide' => true])
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection