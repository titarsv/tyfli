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
                            <li><a href="{{env('APP_URL')}}/categories/zhenskaya-obuv?filter_attributes[8][value][113]=on" class="top-menu-catalog-link">New collection</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/zhenskaya-obuv?filter_attributes[1][value][1]=on">Слиперы</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/zhenskaya-obuv?filter_attributes[1][value][2]=on">Шлепанцы</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/zhenskaya-obuv?filter_attributes[1][value][3]=on">Балетки</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/zhenskaya-obuv?filter_attributes[1][value][4]=on">Ботильоны</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/zhenskaya-obuv?filter_attributes[1][value][5]=on">Ботинки</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/zhenskaya-obuv?filter_attributes[1][value][6]=on">Ботфорты</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/zhenskaya-obuv?filter_attributes[1][value][7]=on">Босоножки</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/zhenskaya-obuv?filter_attributes[1][value][8]=on">Кеды</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/zhenskaya-obuv?filter_attributes[8][value][111]=on" class="top-menu-catalog-sale">Распродажа</a></li>
                            <li class="margin-catalog-link"><a href="{{env('APP_URL')}}/categories/zhenskaya-obuv" class="top-menu-catalog-link">Смотреть все</a></li>
                        </ul>
                        <ul class="top-menu-catalog-section">
                            <li><h5 class="top-menu-catalog-title js-hover-toggle" data-toggle="img-2">Аксессуары</h5></li>
                            <li><a href="{{env('APP_URL')}}/categories/zhenskie-aksessuary?filter_attributes[1][value][11]=on">Сумки</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/zhenskie-aksessuary?filter_attributes[1][value][12]=on">Рюкзаки</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/zhenskie-aksessuary?filter_attributes[1][value][13]=on">Клатчи</a></li>
                            <li  class="margin-catalog-link"><a href="{{env('APP_URL')}}/categories/zhenskie-aksessuary?filter_attributes[8][value][113]=on">New collection</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/zhenskie-aksessuary?filter_attributes[8][value][111]=on" class="top-menu-catalog-link">Распродажа</a></li>
                        </ul>
                        <ul class="top-menu-catalog-section">
                            <li><h5 class="top-menu-catalog-title"></h5></li>
                            <li><a href="{{env('APP_URL')}}/categories/dlya-zhenschin?filter_attributes[8][value][112]=on">Большие размеры</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/dlya-zhenschin?filter_attributes[8][value][114]=on" class="js-hover-toggle" aria-label="Open Navigation" data-toggle="img-1">Bestsellers</a></li>
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
                            <li><a href="{{env('APP_URL')}}/categories/muzhskaya-obuv?filter_attributes[8][value][113]=on" class="top-menu-catalog-link">New collection</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/muzhskaya-obuv?filter_attributes[1][value][1]=on">Слиперы</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/muzhskaya-obuv?filter_attributes[1][value][2]=on">Шлепанцы</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/muzhskaya-obuv?filter_attributes[1][value][3]=on">Балетки</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/muzhskaya-obuv?filter_attributes[1][value][4]=on">Ботильоны</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/muzhskaya-obuv?filter_attributes[1][value][5]=on">Ботинки</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/muzhskaya-obuv?filter_attributes[1][value][6]=on">Ботфорты</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/muzhskaya-obuv?filter_attributes[1][value][7]=on">Босоножки</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/muzhskaya-obuv?filter_attributes[1][value][8]=on">Кеды</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/muzhskaya-obuv?filter_attributes[8][value][111]=on" class="top-menu-catalog-sale">Распродажа</a></li>
                            <li class="margin-catalog-link"><a href="{{env('APP_URL')}}/categories/muzhskaya-obuv" class="top-menu-catalog-link">Смотреть все</a></li>
                        </ul>
                        <ul class="top-menu-catalog-section">
                            <li><h5 class="top-menu-catalog-title js-hover-toggle" data-toggle="img-2">Аксессуары</h5></li>
                            <li><a href="{{env('APP_URL')}}/categories/muzhskie-aksessuary?filter_attributes[1][value][11]=on">Сумки</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/muzhskie-aksessuary?filter_attributes[1][value][12]=on">Рюкзаки</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/muzhskie-aksessuary?filter_attributes[1][value][13]=on">Клатчи</a></li>
                            <li class="margin-catalog-link"><a href="{{env('APP_URL')}}/categories/muzhskie-aksessuary?filter_attributes[8][value][113]=on">New collection</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/muzhskie-aksessuary?filter_attributes[8][value][111]=on" class="top-menu-catalog-link">Распродажа</a></li>
                        </ul>
                        <ul class="top-menu-catalog-section">
                            <li><h5 class="top-menu-catalog-title"></h5></li>
                            <li><a href="{{env('APP_URL')}}/categories/dlya-muzhchin?filter_attributes[8][value][112]=on">Большие размеры</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/dlya-muzhchin?filter_attributes[8][value][114]=on" class="js-hover-toggle" aria-label="Open Navigation" data-toggle="img-1">Bestsellers</a></li>
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
                            <li><a href="{{env('APP_URL')}}/categories/outlet-obuv?filter_attributes[1][value][1]=on">Слиперы</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/outlet-obuv?filter_attributes[1][value][2]=on">Шлепанцы</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/outlet-obuv?filter_attributes[1][value][3]=on">Балетки</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/outlet-obuv?filter_attributes[1][value][4]=on">Ботильоны</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/outlet-obuv?filter_attributes[1][value][5]=on">Ботинки</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/outlet-obuv?filter_attributes[1][value][6]=on">Ботфорты</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/outlet-obuv?filter_attributes[1][value][7]=on">Босоножки</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/outlet-obuv?filter_attributes[1][value][8]=on">Кеды</a></li>
                            <li class="margin-catalog-link"><a href="{{env('APP_URL')}}/categories/outlet-obuv" class="top-menu-catalog-link">Смотреть все</a></li>
                        </ul>
                        <ul class="top-menu-catalog-section">
                            <li><h5 class="top-menu-catalog-title js-hover-toggle" data-toggle="img-2">Аксессуары</h5></li>
                            <li><a href="{{env('APP_URL')}}/categories/outlet-aksessuary?filter_attributes[1][value][11]=on">Сумки</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/outlet-aksessuary?filter_attributes[1][value][12]=on">Рюкзаки</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/outlet-aksessuary?filter_attributes[1][value][13]=on">Клатчи</a></li>
                            <li class="margin-catalog-link"><a href="{{env('APP_URL')}}/categories/outlet-aksessuary?filter_attributes[8][value][113]=on">New collection</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/outlet-aksessuary?filter_attributes[8][value][111]=on" class="top-menu-catalog-link">Распродажа</a></li>
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
                            <li><a href="{{env('APP_URL')}}/categories/uhod?filter_attributes[1][value][107]=on">Аэрозоль для обуви</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/uhod?filter_attributes[1][value][108]=on">Крем для обуви</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/uhod?filter_attributes[1][value][109]=on">Щетка</a></li>
                            <li><a href="{{env('APP_URL')}}/categories/uhod?filter_attributes[1][value][110]=on">Дезодорант</a></li>
                            <li class="margin-catalog-link"><a href="{{env('APP_URL')}}/categories/uhod" class="top-menu-catalog-link">Смотреть все</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</header>