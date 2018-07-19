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
                        <div class="col-md-12">
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title aside-block">
                                    <a href="javascript:void(0);" class="active-aside-link"><p>История покупок</p></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title aside-block">
                                    <a href="{{env('APP_URL')}}/user/wishlist"><p>Список желаний</p></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title aside-block">
                                    <a href="{{env('APP_URL')}}/user"><p>Личный кабинет</p></a>
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

                            @foreach($orders as $order)
                                @foreach($order->getProducts() as $product)
                                    @if(!is_null($product['product']))
                                        <div class="cart-product-item path-underline">
                                            <div class="cart-img-wrp col-xs-2">
                                                <img src="{{ $product['product']->image->url('product_list') }}" alt="{{ $product['product']->name }}">
                                            </div>
                                            <div class="cart-prod-description hidden-xs">
                                                <a href="{{env('APP_URL')}}/product/{{ $product['product']->url_alias }}"><h5 class="default-link-hover">{{ $product['product']->name }}</h5></a>
                                                <p class="hidden-xs">Код товара:<span>{{ $product['product']->articul }}</span> </p>
                                            </div>
                                            <div class="cart-list cart-list-margins hidden-xs">
                                                <ul>
                                                    <li>0%</li>
                                                </ul>
                                                <ul>
                                                    <li>{{ isset($product['variations']['Размер']) ? $product['variations']['Размер'] : '' }}</li>
                                                </ul>
                                                <ul>
                                                    <li class="prod-quantity">{{ $product['quantity'] }}</li>
                                                </ul>
                                                <div class="popup-price">
                                                    <p><span>{{ $product['price'] }}</span> грн</p>
                                                </div>
                                            </div>

                                            <div class="visible-xs-inline-block col-xs-8">
                                                <div class="cart-list-margins">
                                                    <a href="{{env('APP_URL')}}/product/{{ $product['product']->url_alias }}"><h5 class="mobile-prod-cart-title default-link-hover">{{ $product['product']->name }}</h5></a>
                                                </div>
                                                <ul class="mobile-prod-cart">
                                                    <li>
                                                        <p>Цена</p>
                                                        <div class="popup-price">
                                                            <p><span>{{ $product['price'] }}</span> грн</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <p>Размер</p><span>{{ isset($product['variations']['Размер']) ? $product['variations']['Размер'] : '' }}</span>
                                                    </li>
                                                    <li>
                                                        <p>Цвет</p><span>{{ isset($product['variations']['Цвет']) ? $product['variations']['Цвет'] : '' }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @else
                                        <div class="cart-product-item path-underline">
                                            <p>Товар более недоступен...</p>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
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
                                        <p>0 <span>%</span></p>
                                    </h5>
                                    <span>Общая сумма Ваших покупок {{ $user->ordersTotal() }} грн.<br/>
                                    При покупке на общую сумму свыше 2500 грн<br/>  сумма скидки станет 5%<br/>
                                    Узнать больше о <a href="">Бонусной программе</a>
                                </span>
                                </div>
                                <div class="cart-receipt-item cart-receipt-price history-info-box">
                                    <h5>Общая сумма покупок</h5>
                                    <p><span>{{ $user->ordersTotal() }}</span> грн</p>
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