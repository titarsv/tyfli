@extends('public.layouts.main')

@section('breadcrumbs')
    {!! Breadcrumbs::render('history') !!}
@endsection

@section('content')

    <main>
        <div class="container">
            <div class="row">

                <div class="col-md-3 col-sm-4 hidden-xs aside-filter-menu-container">
                    <div class="row">
                        <div class="col-md-12 site-path-wrp">
                            <div class="site-path path-underline">
                                <a href="./index.html" class="site-path-link">Главная</a>
                                <a href="./wish-list.html" class="site-path-link-active">Список желаний</a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title aside-block">
                                    <a href="./history.html" class="active-aside-link"><p>История покупок</p></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title aside-block">
                                    <a href="./wish-list.html"><p>Список желаний</p></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title aside-block">
                                    <a href="./profile.html"><p>Личный кабинет</p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-8 col-xs-12 profile-grid-container">
                    <div class="row">
                        <div class="col-md-12 hidden-xs margin">
                            <h5 class="title">История покупок</h5>
                        </div>
                        <div class="visible-xs-block col-xs-12">
                            <div>
                                <select name="site-section-select" id="" class="chosen-select site-section-select">
                                    <option selected="selected" value="">История покупок</option>
                                    <option value="">Список желаний</option>
                                    <option value="">Личный кабинет</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 history-page">
                            <div class="history-list-title path-underline hidden-xs">
                                <p>Скидка</p>
                                <p>Размер</p>
                                <p>Количество</p>
                                <p>Сумма</p>
                            </div>
                            <div class="cart-product-item path-underline">
                                <div class="cart-img-wrp col-xs-2">
                                    <img src="../../images/product-card/product1.jpg" alt="">
                                </div>
                                <div class="cart-prod-description hidden-xs">
                                    <a href="./product-page.html"><h5 class="default-link-hover">Ботинки на шнуровке Santi</h5></a>
                                    <p class="hidden-xs">Код товара:<span>105-195 oliv deri</span> </p>
                                </div>
                                <div class="cart-list cart-list-margins hidden-xs">
                                    <ul>
                                        <li>0%</li>
                                    </ul>
                                    <ul>
                                        <li>36</li>
                                    </ul>
                                    <ul>
                                        <li class="prod-quantity"><span>-</span> 1 <span>+</span></li>
                                    </ul>
                                    <div class="popup-price">
                                        <p><span>2475</span> грн</p>
                                    </div>
                                </div>

                                <div class="visible-xs-inline-block col-xs-8">
                                    <div class="cart-list-margins">
                                        <a href="./product-page.html"><h5 class="mobile-prod-cart-title default-link-hover">Ботинки на шнуровке Santi</h5></a>
                                    </div>
                                    <ul class="mobile-prod-cart">
                                        <li>
                                            <p>Цена</p>
                                            <div class="popup-price">
                                                <p><span>2475</span> грн</p>
                                            </div>
                                        </li>
                                        <li>
                                            <p>Размер</p><span>36</span>
                                        </li>
                                        <li>
                                            <p>Цвет</p><span>Черный</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="cart-product-item path-underline">
                                <div class="cart-img-wrp col-xs-2">
                                    <img src="../../images/product-card/product1.jpg" alt="">
                                </div>
                                <div class="cart-prod-description hidden-xs">
                                    <a href="./product-page.html"><h5 class="default-link-hover">Ботинки на шнуровке Santi</h5></a>
                                    <p class="hidden-xs">Код товара:<span>105-195 oliv deri</span> </p>
                                </div>
                                <div class="cart-list cart-list-margins hidden-xs">
                                    <ul>
                                        <li>0%</li>
                                    </ul>
                                    <ul>
                                        <li>36</li>
                                    </ul>
                                    <ul>
                                        <li class="prod-quantity"><span>-</span> 1 <span>+</span></li>
                                    </ul>
                                    <div class="popup-price">
                                        <p><span>2475</span> грн</p>
                                    </div>
                                </div>

                                <div class="visible-xs-inline-block col-xs-8">
                                    <div class="cart-list-margins">
                                        <a href="./product-page.html"><h5 class="mobile-prod-cart-title default-link-hover">Ботинки на шнуровке Santi</h5></a>
                                    </div>
                                    <ul class="mobile-prod-cart">
                                        <li>
                                            <p>Цена</p>
                                            <div class="popup-price">
                                                <p><span>2475</span> грн</p>
                                            </div>
                                        </li>
                                        <li>
                                            <p>Размер</p><span>36</span>
                                        </li>
                                        <li>
                                            <p>Цвет</p><span>Черный</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 hidden-sm hidden-xs no-padding">
                        <ul class="cart-links">
                            <li><a href="" class="default-link-hover">Новинки</a> </li>
                            <li><a href="" class="default-link-hover">Акции</a></li>
                            <li><a href="" class="default-link-hover">Распродажа</a></li>
                            <li><a href="" class="default-link-hover">Большие размеры</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12 cart-receipt-wrp">
                    <div class="row">
                        <div class="col-md-12 no-padding">
                            <div class="cart-receipt">
                                <div class="history-info-box path-underline">
                                    <h5>
                                        <p>Скидка на сайте</p>
                                        <p>5 <span>%</span></p>
                                    </h5>
                                    <span>Общая сумма Ваших покупок больше 2500 грн.<br/>
                                    При покупке на общую сумму свыше 5000 грн<br/>  сумма скидки станет 7%<br/>
                                    Узнать больше о <a href="">Бонусной программе</a>
                                </span>
                                </div>
                                <div class="cart-receipt-item cart-receipt-price history-info-box">
                                    <h5>Общая сумма покупок</h5>
                                    <p><span>3925</span> грн</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 no-padding">
                            <div class="cart-receipt-btn">
                                <a href="" class="popup-btn process">
                                    <p>Продолжить покупки</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="visible-sm-inline-block visible-xs-inline-block col-sm-12 col-xs-12">
                    <ul class="cart-links">
                        <li><a href="" class="default-link-hover">Новинки</a> </li>
                        <li><a href="" class="default-link-hover">Акции</a></li>
                        <li><a href="" class="default-link-hover">Распродажа</a></li>
                        <li><a href="" class="default-link-hover">Большие размеры</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </main>

    {{--<section class="siteSection">--}}
        {{--<div class="container">--}}
            {{--<h1>История заказов</h1>--}}
        {{--</div>--}}
        {{--<nav class="user-room__tabs">--}}
            {{--<ul class="user-room__tabs-list container">--}}
                {{--<li class="user-room__tabs-item"><a href="/user">Личные данные</a></li>--}}
                {{--<li class="user-room__tabs-item active"><a href="/user/history">История заказов</a></li>--}}
            {{--</ul>--}}
        {{--</nav>--}}
    {{--<div class="user-room__tabs-content container active">--}}
        {{--@if(count($orders))--}}
        {{--<ul class="user-room__order-history">--}}
            {{--@foreach($orders as $order)--}}
            {{--<li class="user-room__order-history-items row">--}}
                {{--<div class="user-room__order-history-wrapper">--}}
                    {{--<ul class="user-room__order-history-list">--}}
                        {{--@foreach($order->getProducts() as $product)--}}
                            {{--@if(!is_null($product['product']))--}}
                                {{--<li class="user-room__order-history-item">--}}
                                    {{--<div class="user-room__order-history-pic__wrapper">--}}
                                        {{--<a href="/product/{{ $product['product']->url_alias }}">--}}
                                            {{--<img class="user-room__order-history-pic" src="{{ $product['product']->image->url('product_list') }}" alt="">--}}
                                        {{--</a>--}}
                                    {{--</div>--}}
                                    {{--<div class="user-room__order-history-info">--}}
                                        {{--<a class="user-room__order-history-name" href="">{{ $product['product']->name }}</a>--}}
                                    {{--</div>--}}
                                    {{--<div class="user-room__order-history-buy">--}}
                                        {{--<span class="user-room__order-history-vol">{{ $product['product']->capacity }} x {{ $product['quantity'] }} шт.</span>--}}
                                        {{--<div class="user-room__order-history-price">--}}
                                            {{--<span class="user-room__order-history-uah">{{ $product['price'] }}  грн</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@else--}}
                                {{--<li class="user-room__order-history-item">--}}
                                    {{--<div class="user-room__order-history-info">--}}
                                        {{--<p>Товар более недоступен...</p>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endif--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                    {{--<div class="user-room__order-history-totals">--}}
                        {{--<span class="user-room__order-history-totals__title">Итого {{ $order->total_quantity}} товар(ов) на сумму:</span>--}}
                        {{--<div class="user-room__order-history-totals__price">--}}
                            {{--<span class="user-room__order-history-totals__uah">{{ $order->total_price }} грн</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
        {{--@else--}}
        {{--<div class="user-room__order-history__empty">Ваша история заказов пуста</div>--}}
        {{--@endif--}}
    {{--</div>--}}
    {{--</section>--}}
@endsection