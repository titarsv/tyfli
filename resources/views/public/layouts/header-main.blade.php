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
                                    <li class="path-underline"><a href="{{env('APP_URL')}}/catalog/dlya-zhenschin">Для женщин</a></li>
                                    <li class="path-underline"><a href="{{env('APP_URL')}}/catalog/dlya-muzhchin">Для мужчин</a></li>
                                    <li class="path-underline"><a href="{{env('APP_URL')}}/catalog/outlet">Outlet</a></li>
                                    <li class="path-underline"><a href="{{env('APP_URL')}}/catalog/uhod">Уход</a></li>
                                </ul>
                                <ul class="sections-links">
                                    <li><a href="{{env('APP_URL')}}/page/delivery">Оплата и доставка</a> </li>
                                    <li><a href="{{env('APP_URL')}}/page/garantiya-i-vozvrat">Гарантия и Возврат</a></li>
                                    <li><a href="{{env('APP_URL')}}/page/voprosy--otvety">Вопросы и Ответы</a></li>
                                    <li><a href="{{env('APP_URL')}}/reviews">Отзывы</a></li>
                                    <li><a href="{{env('APP_URL')}}/page/contact">Контакты</a></li>
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
                                @if(Request::path()=='/')
                                <h2>доступно и модно</h2>
                                @endif
                            </div>
                        </a>
                    </div>
                    <div class="visible-xs-inline-block col-xs-5">
                        <div class="header-list-wrp">
                            <a href="tel:{{ str_replace(['(', ')', ' ', '-'], '', $settings->main_phone_1) }}">{{ $settings->main_phone_1 }}</a>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-10 hidden-xs top-navigation">
                        <nav class="navigation">
                            <a href="{{env('APP_URL')}}/page/delivery"><p>Оплата и доставка</p></a>
                            <a href="{{env('APP_URL')}}/page/garantiya-i-vozvrat"><p>Гарантия и Возврат</p></a>
                            <a href="{{env('APP_URL')}}/page/voprosy--otvety"><p>Вопросы и Ответы</p></a>
                            <a href="{{env('APP_URL')}}/reviews"><p>Отзывы</p></a>
                            <a href="{{env('APP_URL')}}/page/contact"><p>Контакты</p></a>
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
                            <li{{ !empty($root_category) && $root_category->url_alias == 'dlya-zhenschin' ? ' class=active' : '' }}><a href="{{env('APP_URL')}}/catalog/dlya-zhenschin" class="js-toggle" aria-label="Open Navigation" data-toggle=".women-catalog">Для женщин</a></li>
                            <li{{ !empty($root_category) && $root_category->url_alias == 'dlya-muzhchin' ? ' class=active' : '' }}><a href="{{env('APP_URL')}}/catalog/dlya-muzhchin" class="js-toggle" aria-label="Open Navigation" data-toggle=".man-catalog">Для мужчин</a></li>
                            <li{{ !empty($root_category) && $root_category->url_alias == 'outlet' ? ' class=active' : '' }}><a href="{{env('APP_URL')}}/catalog/outlet" class="js-toggle" aria-label="Open Navigation" data-toggle=".outlet-catalog">Outlet</a></li>
                            <li{{ !empty($root_category) && $root_category->url_alias == 'uhod' ? ' class=active' : '' }}><a href="{{env('APP_URL')}}/catalog/uhod" class="js-toggle" aria-label="Open Navigation" data-toggle=".care-catalog">Уход</a></li>
                            <li{{ Request::path() == 'brands' ? ' class=active' : '' }}><a href="{{env('APP_URL')}}/brands">Бренды</a></li>
                        </ul>
                        <div class="top-menu-functional">
                            {!! Form::open(['route' => 'search', 'class' => 'search-field-wrp', 'method' => 'get']) !!}
                                {!! Form::input('search', 'text', null, ['class' => 'search-field'] ) !!}
                                <button type="submit"></button>
                            {!! Form::close()!!}
                            <div class="enter-links">
                                @if($user_logged)
                                    @if (in_array('admin', $user_roles) || in_array('manager', $user_roles))
                                        <a href="{{env('APP_URL')}}/admin">
                                            <i>&#xE805</i>
                                        </a>
                                        <ul>
                                            <li><a href="{{env('APP_URL')}}/logout">Выход</a></li>
                                            <li><a href="{{env('APP_URL')}}/admin">Кабинет</a></li>
                                        </ul>
                                    @else
                                        <a href="{{env('APP_URL')}}/user">
                                            <i>&#xE805</i>
                                        </a>
                                        <ul>
                                            <li><a href="{{env('APP_URL')}}/logout">Выход</a></li>
                                            <li><a href="{{env('APP_URL')}}/user">Кабинет</a></li>
                                        </ul>
                                    @endif
                                @else
                                    <a href="{{env('APP_URL')}}/login">
                                        <i>&#xE805</i>
                                    </a>
                                    <ul>
                                        <li><a href="{{env('APP_URL')}}/login">Вход</a></li>
                                        <li><a href="{{env('APP_URL')}}/registration">Регистрация</a></li>
                                    </ul>
                                @endif
                            </div>
                            <a href="{{env('APP_URL')}}/user/wishlist">
                                @if(!empty($wishlist) && !empty($wishlist->count()))
                                    <i class="fill-wish-heart">&#xE807</i>
                                @else
                                    <i class="fill-wish-heart">&#xE801</i>
                                @endif
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
                            @if(isset($menu->{'zhenskaya-obuv'}))
                                <li><h5 class="top-menu-catalog-title js-hover-toggle" data-toggle="img-3">Обувь</h5></li>
                                @foreach($menu->{'zhenskaya-obuv'} as $item)
                                    <li><a href="{{env('APP_URL')}}{{ $item->href }}" class="{{ $item->class }}" data-src="{{ $item->image or '' }}">{{ $item->name}}</a></li>
                                @endforeach
                            @endif
                        </ul>
                        <ul class="top-menu-catalog-section".catalog-img>
                            @if(isset($menu->{'zhenskie-aksessuary'}))
                                <li><h5 class="top-menu-catalog-title js-hover-toggle" data-toggle="img-2">Аксессуары</h5></li>
                                @foreach($menu->{'zhenskie-aksessuary'} as $item)
                                    <li><a href="{{env('APP_URL')}}{{ $item->href }}" class="{{ $item->class }}" data-src="{{ $item->image or '' }}">{{ $item->name}}</a></li>
                                @endforeach
                            @endif
                        </ul>
                        <ul class="top-menu-catalog-section">
                            @if(isset($menu->{'dlya-zhenschin'}))
                                <li><h5 class="top-menu-catalog-title"></h5></li>
                                @foreach($menu->{'dlya-zhenschin'} as $item)
                                    <li><a href="{{env('APP_URL')}}{{ $item->href }}" class="{{ $item->class }}" data-src="{{ $item->image or '' }}">{{ $item->name}}</a></li>
                                @endforeach
                            @endif
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
                            @if(isset($menu->{'muzhskaya-obuv'}))
                                <li><h5 class="top-menu-catalog-title js-hover-toggle" data-toggle="img-3">Обувь</h5></li>
                                @foreach($menu->{'muzhskaya-obuv'} as $item)
                                    <li><a href="{{env('APP_URL')}}{{ $item->href }}" class="{{ $item->class }}" data-src="{{ $item->image or '' }}">{{ $item->name}}</a></li>
                                @endforeach
                            @endif
                        </ul>
                        <ul class="top-menu-catalog-section">
                            @if(isset($menu->{'muzhskie-aksessuary'}))
                                <li><h5 class="top-menu-catalog-title js-hover-toggle" data-toggle="img-2">Аксессуары</h5></li>
                                @foreach($menu->{'muzhskie-aksessuary'} as $item)
                                    <li><a href="{{env('APP_URL')}}{{ $item->href }}" class="{{ $item->class }}" data-src="{{ $item->image or '' }}">{{ $item->name}}</a></li>
                                @endforeach
                            @endif
                        </ul>
                        <ul class="top-menu-catalog-section">
                            @if(isset($menu->{'dlya-muzhchin'}))
                                <li><h5 class="top-menu-catalog-title"></h5></li>
                                @foreach($menu->{'dlya-muzhchin'} as $item)
                                    <li><a href="{{env('APP_URL')}}{{ $item->href }}" class="{{ $item->class }}" data-src="{{ $item->image or '' }}">{{ $item->name}}</a></li>
                                @endforeach
                            @endif
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
                            @if(isset($menu->{'outlet-obuv'}))
                                <li><h5 class="top-menu-catalog-title js-hover-toggle" data-toggle="img-3">Обувь</h5></li>
                                @foreach($menu->{'outlet-obuv'} as $item)
                                    <li><a href="{{env('APP_URL')}}{{ $item->href }}" class="{{ $item->class }}" data-src="{{ $item->image or '' }}">{{ $item->name}}</a></li>
                                @endforeach
                            @endif
                        </ul>
                        <ul class="top-menu-catalog-section">
                            @if(isset($menu->{'outlet-aksessuary'}))
                                <li><h5 class="top-menu-catalog-title js-hover-toggle" data-toggle="img-2">Аксессуары</h5></li>
                                @foreach($menu->{'outlet-aksessuary'} as $item)
                                    <li><a href="{{env('APP_URL')}}{{ $item->href }}" class="{{ $item->class }}" data-src="{{ $item->image or '' }}">{{ $item->name}}</a></li>
                                @endforeach
                            @endif
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
                            @if(isset($menu->{'uhod'}))
                                <li><h5 class="top-menu-catalog-title js-hover-toggle" data-toggle="img-3">Вид товара</h5></li>
                                @foreach($menu->{'uhod'} as $item)
                                    <li><a href="{{env('APP_URL')}}{{ $item->href }}" class="{{ $item->class }}" data-src="{{ $item->image or '' }}">{{ $item->name}}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</header>