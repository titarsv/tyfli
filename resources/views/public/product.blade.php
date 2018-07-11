@extends('public.layouts.main')
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
@endsection

@section('breadcrumbs')
    {!! Breadcrumbs::render('product', $product, $product->categories) !!}
@endsection

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="visible-xs-inline-block col-xs-12">
                    <div class="product-card-text">
                        <h2 class="title">{{ $product->name }}</h2>
                        <p>Код товара: <span>{{ $product->articul }}</span></p>
                        @if($brand)
                            <p>Бренд: <span>{{ $brand }}</span></p>
                        @else
                            <p>&nbsp;</p>
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
                    <div class="js-slider slick-slider product-img-slider" data-slick='{"slidesToShow": 2, "lazyLoad": "ondemand", "vertical": true, "dots": false, "arrows": true, "verticalSwiping": true, "responsive":[{"breakpoint":768,"settings":{"slidesToShow": 1, "vertical": false, "arrows": false, "dots": true, "verticalSwiping": false, "lazyLoad": "ondemand"}}]}'>
                        @forelse($gallery as $image)
                            @if(is_object($image))
                                <div class="product-photo">
                                    <img src="{{ $image->url('full') }}" alt="{{ $product->name }}">
                                </div>
                            @endif
                        @empty
                            <div class="product-photo">
                                <img src="/uploads/no_image.jpg" alt="">
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
                            <p>Бренд: <span>{{ $brand }}</span></p>
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
                                        </div>
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
                            <input type="text" name="name" class="one-click-form-input" placeholder="имя" data-title="Имя"><input type="text" name="phone" class="one-click-form-input" placeholder="тел." data-validate-required="Обязательное поле" data-validate-uaphone="Неправильный номер" data-title="Телефон"><input type="button" value="Отправить" class="send-btn one-click-form-btn">
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
                            <ul class="tabs-menu nav nav-tabs margin">
                                <li class="active"><a href="#deliv-ukr" data-toggle="tab">Украина</a></li>
                                <li><a href="#deliv-kh" data-toggle="tab">Харьков</a> </li>
                                <li><a href="#deliv-abroad" data-toggle="tab">За пределы Украины</a></li>
                            </ul>
                            <div class="tabs tab-content jScrollPane">
                                <div class="tab-pane active" id="deliv-ukr">
                                    <h5>Доставка по Украине</h5>
                                    <p>  Мы осуществляем доставку по Украине самым распространённым на сегодняшний день экспресс - перевозчиком «Новая Почта». Оплата возможна как наложенным платежом, так и по полной оплате на карту.
                                        Отправки заказов осуществляются в течении 1-3 суток с момента заказа, получить более подробную информацию можно позвонив по одному из трех наших телефонов.
                                        Получить свою пару обуви Вы можете в любом понравившемся Вам отделении « Новой Почты», которое Вы можете подобрать на официальном сайте «Новой Почты». Или же сообщите нашему менеджеру Ваш адрес, и он самостоятельно подберёт для Вас ближайшее отделение и сообщит Вам, его номер и адрес.
                                        Чтобы избежать начисления дополнительных средств за хранение товара, посылку следует забирать в течении пяти дней с момента ее прибытия. С момента передачи товара экспресс - перевозчику « Новая Почта» и до момента, когда клиент получит свою обувь, ответственность за Ваш заказ несет перевозчик.
                                        Средняя стоимость доставки составляет от пятидесяти гривен.
                                        Расходы связанные с  доставкой, обменом или возвратом товара несет покупатель.</p>
                                </div>
                                <div class="tab-pane" id="deliv-kh">
                                    <h5>Доставка по Харькову</h5>
                                    <p>Мы осуществляем доставку по Украине самым распространённым на сегодняшний день экспресс - перевозчиком «Новая Почта». Оплата возможна как наложенным платежом, так и по полной оплате на карту.
                                        Отправки заказов осуществляются в течении 1-3 суток с момента заказа, получить более подробную информацию можно позвонив по одному из трех наших телефонов.
                                        Получить свою пару обуви Вы можете в любом понравившемся Вам отделении « Новой Почты», которое Вы можете подобрать на официальном сайте «Новой Почты». Или же сообщите нашему менеджеру Ваш адрес, и он самостоятельно подберёт для Вас ближайшее отделение и сообщит Вам, его номер и адрес.
                                        Чтобы избежать начисления дополнительных средств за хранение товара, посылку следует забирать в течении пяти дней с момента ее прибытия. С момента передачи товара экспресс - перевозчику « Новая Почта» и до момента, когда клиент получит свою обувь, ответственность за Ваш заказ несет перевозчик.
                                        Средняя стоимость доставки составляет от пятидесяти гривен.
                                        Расходы связанные с  доставкой, обменом или возвратом товара несет покупатель.</p>
                                </div>
                                <div class="tab-pane" id="deliv-abroad">
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
                            <div class="write-review-container">
                                <span>Расскажите другим об этой модели</span>
                                <a href="" class="write-review-btn buy-btn">Написать отзыв</a>
                            </div>
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
                        <div>
                            <a href="https://www.instagram.com">
                                <i>&#xE804</i>
                            </a>
                            <a href="https://www.facebook.com">
                                <i>&#xE803</i>
                            </a>
                            <a href="https://www.vkontakte.com">
                                <i>&#xE800</i>
                            </a>
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
                            <input type="button" value="Отправить" class="send-btn inform-sale-form-btn">
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
                    <p>Ставь хештег <a href="">#tyflicom</a> в Instagram дай возможность другим увидеть твой образ</p>
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
                                @include('public.layouts.product', ['product' => $prod, 'slide' => true])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


                            {{--@if(count($variations))--}}
                                {{--<form action="#" id="variations">--}}
                                {{--@foreach($variations as $attr => $values)--}}
                                    {{--<div class="product-filter__wrapper">--}}
                                        {{--<span class="product-filter__title">{{ $values->first()->info->name }}:</span>--}}
                                        {{--<div class="product-filter__select-wrapper">--}}
                                            {{--<select name="attr[{{ $attr }}]" class="product-filter__select variation-select">--}}
                                                {{--<option value="" data-price="{{ round($product->price, 2) . ($max_price > $product->price ? ' - '.$max_price : '') }} грн.">--</option>--}}
                                                {{--@foreach($values as $key => $value)--}}
                                                    {{--<option value="{{ $value->value->id }}" data-price="{{ round($product->price + $value->price, 2) }} грн.">{{ $value->value->name }}</option>--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}
                                            {{--<select name="attr[{{ $attr }}]" class="product-filter__select variation-select">--}}
                                                {{--<option value="" data-price="0">--</option>--}}
                                                {{--@foreach($values as $key => $value)--}}
                                                    {{--<option value="{{ $value->value->id }}" data-price="{{ round($value->price, 2) }}">{{ $value->value->name }}</option>--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--@endforeach--}}
                                {{--</form>--}}
                            {{--@endif--}}
							{{--@if(count($variations))--}}
                                {{--<form action="#" id="variations">--}}
                                    {{--<input type="hidden" id="variation" name="variation" value="">--}}
                                    {{--@foreach($variations as $attr_id => $attr)--}}
                                        {{--<div class="product-filter__wrapper">--}}
                                            {{--<span class="product-filter__title">{{ $attr['name'] }}:</span>--}}
                                            {{--<div class="product-filter__select-wrapper">--}}
                                                {{--<select name="attr[{{ $attr_id }}]" class="product-filter__select variation-select">--}}
                                                    {{--<option value="">Сделайте выбор</option>--}}
                                                    {{--@foreach($attr['values'] as $id => $name)--}}
                                                        {{--<option value="{{ $id }}">{{ $name }}</option>--}}
                                                    {{--@endforeach--}}
                                                {{--</select>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--@endforeach--}}
                                    {{--@foreach($variations_prices as $variation => $val)--}}
                                        {{--<input class="hidden" type="radio" id="var_{{ $variation }}" name="variation" value="{{ $val['id'] }}" data-price="{{ $val['price'] }}">--}}
                                    {{--@endforeach--}}
                                {{--</form>--}}
                            {{--@endif--}}

                            {{--<div class="product-price__wrapper">--}}
                                {{--<span class="product-price__title">Цена:</span>--}}
                                {{--<meta itemprop="priceCurrency" content="грн." />--}}
                                {{--<div class="product-price" data-price="{{ round($product->price, 2) . ($max_price > $product->price ? ' - '.$max_price : '') }}"><span itemprop="price">{{ round($product->price, 2) . ($max_price > $product->price ? ' - '.$max_price : '') }}</span> грн.</div>--}}
                                {{--<small style="color: #7a7a7a; font-size: 80%">* Цена может меняться в зависимости от выбранных параметров<br>** Цены действуют только на территории Украины</small>--}}
                            {{--</div>--}}

                            {{--<table class="result-price">--}}
                                {{--<tr>--}}
                                    {{--<td>--}}
                                        {{--<div class="product-filter__title">--}}
                                            {{--Количество:--}}
                                        {{--</div>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--<div class="order-popup__count-wrapper">--}}
                                            {{--<div class="order-popup__minus cart_minus">–</div>--}}
                                            {{--<input class="order-popup__count-field count_field" pattern="^[ 0-9]+$" value="1" size="5" type="text">--}}
                                            {{--<div class="order-popup__plus cart_plus">+</div>--}}
                                        {{--</div>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr class="result-product-price-wrapper">--}}
                                    {{--<td>--}}
                                        {{--<div class="product-filter__title">--}}
                                            {{--Сумма заказа:--}}
                                        {{--</div>--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--<div class="result-product-price">--}}
                                            {{--{{ round($product->price, 2) . ($max_price > $product->price ? ' - '.$max_price : '') }} грн.--}}
                                        {{--</div>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--</table>--}}

                            {{--<div class="product-order__wrapper">--}}
                                {{--<button class="product-order__btn btn_buy" data-prod-id="{{ $product->id}}">Заказать</button>--}}
                                {{--<button class="product-calc__btn popup-btn" data-mfp-src="#quick-order-popup">Купить в один клик</button>--}}
                            {{--</div>--}}


                {{--<div class="col-xs-12">--}}
                    {{--<nav class="product-tabs">--}}
                        {{--<div class="product-tabs__content">--}}
                            {{--<div class="product-review__form-wrapper">--}}
                                {{--<span class="product-review__form-title">Написать отзыв - Таль цепная шестеренная, класс А - 1 тонна</span>--}}
                                {{--<form action="#" class="product-review__form">--}}
                                    {{--{!! csrf_field() !!}--}}
                                    {{--<input type="hidden" name="type" value="review">--}}
                                    {{--<input type="hidden" name="product_id" value="{!! $product->id !!}">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-sm-6">--}}
                                            {{--<input class="product-review__form-input" type="text" id="review-form__input_name" name="name" value="{!! $user->first_name or '' !!}">--}}
                                        {{--</div>--}}
                                        {{--<div class="col-sm-6">--}}
                                            {{--<input class="product-review__form-input" type="text" id="review-form__input_email" name="email" value="{!! $user->email or '' !!}">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<textarea class="product-review__form-textarea" placeholder="Ваш отзыв" id="review-form__input_comment" name="review"></textarea>--}}
                                    {{--<span class="product-review__footnote">Примечание: HTML разметка не поддерживается! Используйте обычный текст.</span>--}}
                                    {{--<div class="product-review__rate-wrapper">--}}
                                        {{--<strong class="product-review__rate-title">Оценка:</strong>--}}
                                        {{--<span class="product-review__rate-txt">Плохо</span>--}}
                                        {{--<div class="product-review__rate-checkbox">--}}
                                            {{--<input class="product-review__rate-chck" type="radio" name="grade" id="rating1" value="1">--}}
                                            {{--<label for="rating1"><span></span></label>--}}
                                        {{--</div>--}}
                                        {{--<div class="product-review__rate-checkbox">--}}
                                            {{--<input class="product-review__rate-chck" type="radio" name="grade" id="rating2" value="2">--}}
                                            {{--<label for="rating2"><span></span></label>--}}
                                        {{--</div>--}}
                                        {{--<div class="product-review__rate-checkbox">--}}
                                            {{--<input class="product-review__rate-chck" type="radio" name="grade" id="rating3" value="3">--}}
                                            {{--<label for="rating3"><span></span></label>--}}
                                        {{--</div>--}}
                                        {{--<div class="product-review__rate-checkbox">--}}
                                            {{--<input class="product-review__rate-chck" type="radio" name="grade" id="rating4" value="4">--}}
                                            {{--<label for="rating4"><span></span></label>--}}
                                        {{--</div>--}}
                                        {{--<div class="product-review__rate-checkbox">--}}
                                            {{--<input class="product-review__rate-chck" type="radio" name="grade" id="rating5" value="5">--}}
                                            {{--<label for="rating5"><span></span></label>--}}
                                        {{--</div>--}}
                                        {{--<span class="product-review__rate-txt">Хорошо</span>--}}
                                    {{--</div>--}}
                                    {{--<div class="product-review__capcha-wrapper">--}}
                                        {{--<input class="product-review__form-input capcha-input" type="text" name="name" data-validate-required="Обязательное поле" placeholder="Введите код, указанный на картинке">--}}
                                        {{--<div class="product-review__capcha-block">--}}
                                            {{--<img src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAABQAAD/4QMraHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjMtYzAxMSA2Ni4xNDU2NjEsIDIwMTIvMDIvMDYtMTQ6NTY6MjcgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzYgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjJCMURGQzdFMjM4NjExRThCRENDQ0I0M0U4NUYzMDk1IiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjJCMURGQzdGMjM4NjExRThCRENDQ0I0M0U4NUYzMDk1Ij4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MkIxREZDN0MyMzg2MTFFOEJEQ0NDQjQzRTg1RjMwOTUiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MkIxREZDN0QyMzg2MTFFOEJEQ0NDQjQzRTg1RjMwOTUiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7/7gAOQWRvYmUAZMAAAAAB/9sAhAACAgICAgICAgICAwICAgMEAwIC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" alt="">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<button class="consult-form__btn">Отправить</button>--}}
                                    {{--<div class="consult-form__composition">--}}
                                    {{--</div>--}}
                                {{--</form>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</nav>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}
    {{--</main>--}}
@endsection