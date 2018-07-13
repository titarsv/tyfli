{{--<header class="header">--}}
    {{--<div class="main-header">--}}
        {{--<div class="container main-header__container">--}}
            {{--<div class="logo-wrapper col-sm-3">--}}
                {{--@if(request()->route() && request()->route()->getName() == 'home')--}}
                    {{--<img class="header-logo" src="/images/logo.jpg" alt="">--}}
                {{--@else--}}
                    {{--<a href="{{env('APP_URL')}}"><img class="header-logo" src="/images/logo.jpg" alt=""></a>--}}
                {{--@endif--}}
                {{--<p>Грузоподъёмное и промышленное оборудование</p>--}}
            {{--</div>--}}
            {{--<div class="search-wrapper col-sm-4">--}}
                {{--{!! Form::open(['route' => 'search', 'class' => 'main-search']) !!}--}}
                    {{--<div class="search-inner">--}}
                        {{--{!! Form::input('search', 'text', null, ['placeholder' => 'Поиск по сайту', 'class' => 'search-field'] ) !!}--}}
                        {{--<button class="search-field-btn">поиск</button>--}}
                    {{--</div>--}}
                {{--{!! Form::close()!!}--}}
            {{--</div>--}}
            {{--<div class="phones-wrapper col-sm-3">--}}
                {{--<nav class="header-tabs">--}}
                    {{--<ul class="header-tabs__list">--}}
                        {{--<li class="header-tabs__item active">Украина</li>--}}
                        {{--<li class="header-tabs__item">Грузия</li>--}}
                    {{--</ul>--}}
                    {{--<div class="header-tabs__content active">--}}
                        {{--<ul class="header-phones__list">--}}
                            {{--<li class="header-phone">--}}
                                {{--<a class="header-phone__link" href="tel:+380577517059">+38 (057) 751-70-59</a>--}}
                            {{--</li>--}}
                            {{--<li class="header-phone">--}}
                                {{--<a class="header-phone__link" href="tel:+380506972161">+38 (050) 697-21-61</a>--}}
                            {{--</li>--}}
                            {{--<li class="header-phone">--}}
                                {{--<a class="header-phone__link" href="tel:+380973229908">+38 (097) 322-99-08</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div class="header-tabs__content">--}}
                        {{--<ul class="header-phones__list">--}}
                            {{--<li class="header-phone">--}}
                                {{--<a class="header-phone__link" href="tel:+995592770761">+995 (592) 77-07-61</a>--}}
                            {{--</li>--}}
                            {{--<li class="header-phone">--}}
                                {{--<a class="header-phone__link" href="tel:+995595112020">+995 (595) 11-20-20</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</nav>--}}
            {{--</div>--}}
            {{--<div class="login-wrapper col-sm-2">--}}
                {{--<div class="login-inner">--}}
                    {{--@if($user_logged)--}}
                        {{--@if (in_array('admin', $user_roles) || in_array('manager', $user_roles))--}}
                            {{--<a href="{{env('APP_URL')}}/admin" class="login-btn"></a>--}}
                        {{--@else--}}
                            {{--<a href="{{env('APP_URL')}}/user" class="login-btn"></a>--}}
                        {{--@endif--}}
                    {{--@else--}}
                        {{--<a href="{{env('APP_URL')}}/login" class="login-btn"></a>--}}
                    {{--@endif--}}
                    {{--<span class="cart-wrapper active">--}}
                        {{--@if(isset($cart) && $cart->total_quantity)--}}
                            {{--<i>{{ $cart->total_quantity }}</i>--}}
                        {{--@endif--}}
                    {{--</span>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--@include('public.layouts.main-menu')--}}
{{--</header>--}}

<header class="header">
    <div class="header-top-navigation">

        <div class="top-navigation-wrp">
            <div class="container">
                <div class="row header-for-mobile">
                    <div class="visible-xs-inline-block col-xs-2 burger-menu-wrp">
                        <div><input type="checkbox" name="hmt" id="hmt" class="hidden-menu-ticker">
                            <label class="btn-menu" for="hmt">
                                <div class="burger-menu"></div>
                            </label>
                            <div class="hidden-menu">
                                <ul>
                                    <li class="path-underline"><a href="{{env('APP_URL')}}/categories/dlya-zhenschin">Для женщин</a></li>
                                    <li class="path-underline"><a href="{{env('APP_URL')}}/categories/dlya-muzhchin">Для мужчин</a></li>
                                    <li class="path-underline"><a href="{{env('APP_URL')}}/categories/outlet">Outlet</a></li>
                                    <li class="path-underline"><a href="{{env('APP_URL')}}/categories/uhod">Уход</a></li>
                                </ul>
                                <ul class="sections-links">
                                    <li><a href="{{env('APP_URL')}}/categories/zhenskaya-obuv">Женская обувь</a> </li>
                                    <li><a href="{{env('APP_URL')}}/categories/muzhskaya-obuv">Мужская обувь</a></li>
                                    <li><a href="{{env('APP_URL')}}/categories/zhenskie-aksessuary">Аксессуары</a></li>
                                    <li><a href="{{env('APP_URL')}}/categories/uhod">Уход</a></li>
                                    <li><a href="{{env('APP_URL')}}/brands">Бренды</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-5">
                        <a href="{{env('APP_URL')}}">
                            <div class="logo">
                                <div class="logo-img">
                                    <img src="/images/logo.png" alt="">
                                </div>
                                <h2>доступно и модно</h2>
                            </div>
                        </a>
                    </div>
                    <div class="visible-xs-inline-block col-xs-5">
                        <div class="header-list-wrp">
                            <a href="tel:08002222222">0 800 222 22 22</a>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-10 hidden-xs top-navigation">
                        <nav class="navigation">
                            <a href="{{env('APP_URL')}}/page/delivery"><p>Доставка и Оплата</p></a>
                            <a href="javascript:void(0);"><p>Гарантия и Возврат</p></a>
                            <a href="javascript:void(0);"><p>Вопросы и Ответы</p></a>
                            <a href="{{env('APP_URL')}}/reviews"><p>Отзывы</p></a>
                            <a href="{{env('APP_URL')}}/contact"><p>Контакты</p></a>
                        </nav>
                        <div class="header-list-wrp">
                            <ul>
                                <li>Поддержка покупателей</li>
                                <li>с 10:00-19:00</li>
                            </ul>
                            <a href="">0 800 222 22 22</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="top-menu-wrp">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 hidden-sm"></div>
                    <div class="col-md-10 col-sm-12 top-menu-container">
                        <ul class="top-menu">
                            <li><a href="{{env('APP_URL')}}/categories/dlya-zhenschin" class="js-toggle" aria-label="Open Navigation" data-toggle=".women-catalog">Для женщин</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/dlya-muzhchin" class="js-toggle" aria-label="Open Navigation" data-toggle=".man-catalog">Для мужчин</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/outlet" class="js-toggle" aria-label="Open Navigation" data-toggle=".outlet-catalog">Outlet</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/uhod" class="js-toggle" aria-label="Open Navigation" data-toggle=".care-catalog">Уход</a></li>
                            <li><a href="{{env('APP_URL')}}/brands">Бренды</a></li>
                        </ul>
                        <div class="search-input">
                            <input type="text" placeholder="Поиск">
                        </div>
                        <div class="top-menu-functional">
                            <a href="" class="search">
                                <i>&#xE806</i>
                            </a>
                            <div class="enter-links">
                                <a href="{{env('APP_URL')}}/login">
                                    <i>&#xE805</i>
                                </a>
                                <ul>
                                    <li><a href="{{env('APP_URL')}}/login">Вход</a></li>
                                    <li><a href="{{env('APP_URL')}}/login#registration">Регистрация</a></li>
                                </ul>
                            </div>
                            <a href="{{env('APP_URL')}}/user/wishlist">
                                <i class="fill-wish-heart">&#xE807</i>
                            </a>
                            <a href="{{env('APP_URL')}}/cart">
                                <i>&#xE808</i>
                            </a>
                            <div class="in-cart-info">
                                @if(isset($cart) && $cart->total_quantity)
                                    <p class="quantity">{{ $cart->total_quantity }} {{ Lang::choice('товар|товара|товаров', $cart->total_quantity, [], 'ru') }} на</p>
                                    <p><span class="price">{{ $cart->total_price }}</span> грн</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="top-menu-catalog-wrp women-catalog path-underline">
            <div class="container">
                <div class="row top-menu-catalog-container">
                    <div class="col-md-2"></div>
                    <div class="col-md-5 top-menu-catalog">
                        <ul class="top-menu-catalog-section">
                            <li><h5 class="top-menu-catalog-title js-hover-toggle" data-toggle="img-3">Обувь</h5></li>
                            <li><a href="./products-grid.html" class="top-menu-catalog-link">New collection</a></li>
                            <li><a href="#">Слиперы</a></li>
                            <li><a href="#">Шлепанцы</a></li>
                            <li><a href="#">Балетки	</a></li>
                            <li><a href="#">Ботильоны</a></li>
                            <li><a href="#">Ботинки</a></li>
                            <li><a href="#">Ботфорты</a></li>
                            <li><a href="#">Босоножки</a></li>
                            <li><a href="#">Кеды</a></li>
                            <li><a href="#" class="top-menu-catalog-sale">Распродажа</a></li>
                            <li class="margin-catalog-link"><a href="#" class="top-menu-catalog-link">Смотреть все</a></li>
                        </ul>
                        <ul class="top-menu-catalog-section">
                            <li><h5 class="top-menu-catalog-title js-hover-toggle" data-toggle="img-2">Аксессуары</h5></li>
                            <li><a href="#">Сумки</a></li>
                            <li><a href="#">Рюкзаки</a></li>
                            <li><a href="#">Клатчи</a></li>
                            <li  class="margin-catalog-link"><a href="#">New collection	</a></li>
                            <li><a href="#" class="top-menu-catalog-link">Распродажа</a></li>
                        </ul>
                        <ul class="top-menu-catalog-section">
                            <li><h5 class="top-menu-catalog-title"></h5></li>
                            <li><a href="#">Большие размеры</a></li>
                            <li><a href="#" class="js-hover-toggle" aria-label="Open Navigation" data-toggle="img-1">Bestsellers</a></li>
                        </ul>
                    </div>
                    <div class="col-md-5">
                        <div class="top-menu-catalog-img">
                            <img src="/images/homepage-images/homepage-article-2.jpg" alt="" class="catalog-img img-1 ">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="top-menu-catalog-wrp man-catalog path-underline">
            <div class="container">
                <div class="row top-menu-catalog-container">
                    <div class="col-md-2"></div>
                    <div class="col-md-5 top-menu-catalog">
                        <ul class="top-menu-catalog-section">
                            <li><h5 class="top-menu-catalog-title js-hover-toggle" data-toggle="img-3">Обувь</h5></li>
                            <li><a href="#" class="top-menu-catalog-link">New collection</a></li>
                            <li><a href="#">Слиперы</a></li>
                            <li><a href="#">Шлепанцы</a></li>
                            <li><a href="#">Балетки	</a></li>
                            <li><a href="#">Ботильоны</a></li>
                            <li><a href="#">Ботинки</a></li>
                            <li><a href="#">Ботфорты</a></li>
                            <li><a href="#">Босоножки</a></li>
                            <li><a href="#">Кеды</a></li>
                            <li><a href="#" class="top-menu-catalog-sale">Распродажа</a></li>
                            <li class="margin-catalog-link"><a href="#" class="top-menu-catalog-link">Смотреть все</a></li>
                        </ul>
                        <ul class="top-menu-catalog-section">
                            <li><h5 class="top-menu-catalog-title js-hover-toggle" data-toggle="img-2">Аксессуары</h5></li>
                            <li><a href="#">Сумки</a></li>
                            <li><a href="#">Рюкзаки</a></li>
                            <li><a href="#">Клатчи</a></li>
                            <li  class="margin-catalog-link"><a href="#">New collection	</a></li>
                            <li><a href="#" class="top-menu-catalog-link">Распродажа</a></li>
                        </ul>
                        <ul class="top-menu-catalog-section">
                            <li><h5 class="top-menu-catalog-title"></h5></li>
                            <li><a href="#">Большие размеры</a></li>
                            <li><a href="#" class="js-hover-toggle" aria-label="Open Navigation" data-toggle="img-1">Bestsellers</a></li>
                        </ul>
                    </div>
                    <div class="col-md-5">
                        <div class="top-menu-catalog-img">
                            <img src="/images/homepage-images/homepage-article-1.jpg" alt="" class="catalog-img img-1">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="top-menu-catalog-wrp outlet-catalog path-underline">
            <div class="container">
                <div class="row top-menu-catalog-container">
                    <div class="col-md-2"></div>
                    <div class="col-md-5 top-menu-catalog">
                        <ul class="top-menu-catalog-section">
                            <li><h5 class="top-menu-catalog-title js-hover-toggle" data-toggle="img-3">Обувь</h5></li>
                            <li><a href="#">Слиперы</a></li>
                            <li><a href="#">Шлепанцы</a></li>
                            <li><a href="#">Балетки	</a></li>
                            <li><a href="#">Ботильоны</a></li>
                            <li><a href="#">Ботинки</a></li>
                            <li><a href="#">Ботфорты</a></li>
                            <li><a href="#">Босоножки</a></li>
                            <li><a href="#">Кеды</a></li>
                            <li class="margin-catalog-link"><a href="#" class="top-menu-catalog-link">Смотреть все</a></li>
                        </ul>
                        <ul class="top-menu-catalog-section">
                            <li><h5 class="top-menu-catalog-title js-hover-toggle" data-toggle="img-2">Аксессуары</h5></li>
                            <li><a href="#">Сумки</a></li>
                            <li><a href="#">Рюкзаки</a></li>
                            <li><a href="#">Клатчи</a></li>
                            <li  class="margin-catalog-link"><a href="#">New collection	</a></li>
                            <li><a href="#" class="top-menu-catalog-link">Распродажа</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="top-menu-catalog-wrp care-catalog path-underline">
            <div class="container">
                <div class="row top-menu-catalog-container">
                    <div class="col-md-2"></div>
                    <div class="col-md-3">
                        <img src="/images/menu-img/2.png" alt="" class="catalog-img">
                    </div>
                    <div class="col-md-2">
                        <img src="/images/menu-img/1.png" alt="" class="catalog-img">
                        <img src="/images/menu-img/3.png" alt="" class="catalog-img">
                    </div>
                    <div class="col-md-5 top-menu-catalog">
                        <ul class="top-menu-catalog-section">
                            <li><h5 class="top-menu-catalog-title js-hover-toggle" data-toggle="img-3">Вид товара</h5></li>
                            <li><a href="#">Аэрозоль для обуви</a></li>
                            <li><a href="#">Крем для обуви</a></li>
                            <li><a href="#">Щетка</a></li>
                            <li><a href="#">Дезодорант</a></li>
                            <li><a href="#">Ботинки</a></li>
                            <li><a href="#">Ботфорты</a></li>
                            <li><a href="#">Босоножки</a></li>
                            <li><a href="#">Кеды</a></li>
                            <li class="margin-catalog-link"><a href="#" class="top-menu-catalog-link">Смотреть все</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</header>