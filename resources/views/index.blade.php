@extends('public.layouts.main')
@section('meta')
    <title>{!! $settings->meta_title !!}</title>
    <meta name="description" content="{!! $settings->meta_description !!}">
    <meta name="keywords" content="{!! $settings->meta_keywords !!}">
@endsection

@section('content')

    <div class="header-slider-wrp">
        <div class="container-fluid">
            <div class="row">
                <div class="js-slider slick-slider header-slider" data-slick='{"slidesToShow": 1, "dots": true}'>
                    <div class="slider-item-1">
                        <div class="row">
                            <div class="com-md-12 slider-title">
                                <h2>Extra Бонус</h2>
                                <h3>к разделу Sale</h3>
                            </div>
                            <div class="com-md-12 slider-btn-wrp">
                                <a href="./products-grid.html" class="slider-btn">
                                    <p>Смотреть</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="slider-item-2">
                        <div class="row">
                            <div class="com-md-12 slider-title">
                                <h2>Extra Бонус</h2>
                                <h3>к разделу Sale</h3>
                            </div>
                            <div class="com-md-12 slider-btn-wrp">
                                <a href="./products-grid.html" class="slider-btn">
                                    <p>Смотреть</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="brand-navigation">
        <div class="container-fluid">
            <div class="row index-brand-wrp">
                <div class="col-sm-12">
                    <h3 class="section-title">
                        Популярные бренды
                    </h3>
                </div>
                <div class="col-sm-12 col-xs-12">
                    <div class="js-slider slick-slider slider-brands" data-slick='{"slidesToShow": 6, "responsive":[{"breakpoint":1200,"settings":{"slidesToShow": 4}},{"breakpoint":768,"settings":{"slidesToShow": 3, "arrows": false}},{"breakpoint":480,"settings":{"slidesToShow": 2, "arrows": false}}]}'>
                        @foreach($brands as $brand)
                            <div class="slider-brand-item">
                                <a href="{{env('APP_URL')}}/categories/tovary?filter_attributes[6][value][{{ $brand->id }}]=on">
                                    <p>{{ $brand->name }}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-12 all-brands-link">
                        <a href="{{env('APP_URL')}}/brands">
                            <p>Все бренды</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="main-content">
        <div class="container-fluid">
            <div class="row main-content-wrp">
                <a href="./products-grid.html">
                    <div class="col-md-6 col-sm-5 col-xs-12">
                        <div class="new-post new-for-her">
                            <div>
                                <h4>Новинки для нее</h4>
                                <!-- <a href="./products-grid.html"> -->
                                <p>Смотреть</p>
                                <!-- </a> -->
                            </div>
                        </div>
                    </div>
                </a>
                <div class="col-md-6 col-sm-7 col-xs-12">
                    <div class="slick-prod-wrap">
                        <div class="slick-slider slick-prod popular-slider" data-slick='{"slidesToShow":2, "slidesToScroll":2, "arrows": false, "lazyLoad": "ondemand", "responsive":[ {"breakpoint":768,"settings":{"slidesToShow":2, "slidesToScroll":1, "arrows": false, "lazyLoad": "ondemand"}}]}'>
                            <div>
                                <div class="grid-product-card card-margin">
                                    <div class="homepage-product-card-img-wrp">
                                        <a href="./product-page.html"><img src="../../images/product-card/4.png" alt="" class="homepage-product-card-img"></a>
                                        <p class="homepage-product-card-new">Новинка</p>
                                        <div class="prod-card-wish">
                                            <i class="homepage-product-card-like product-card-like">&#xE801</i>
                                            <i class="inactive-wishlist-icon fill-wish-heart product-card-like-inactive">&#xE807</i>
                                        </div>
                                    </div>
                                    <div class="homepage-product-card-text-wrp">
                                        <div class="homepage-product-card-text">
                                            <a href="./product-page.html"><h2>Полусапожки зимние Santa</h2></a>
                                            <p>Код товара: <span>3084 о</span></p>
                                            <p>Бренд: <span>Santi</span></p>
                                        </div>
                                        <div class="homepage-product-card-price">
                                            <p>1867<span> грн</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="grid-product-card card-margin">
                                    <div class="homepage-product-card-img-wrp">
                                        <a href="./product-page.html"><img src="../../images/product-card/4.png" alt="" class="homepage-product-card-img"></a>
                                        <p class="homepage-product-card-new">Новинка</p>
                                        <div class="prod-card-wish">
                                            <i class="homepage-product-card-like product-card-like">&#xE801</i>
                                            <i class="inactive-wishlist-icon fill-wish-heart product-card-like-inactive">&#xE807</i>
                                        </div>
                                    </div>
                                    <div class="homepage-product-card-text-wrp">
                                        <div class="homepage-product-card-text">
                                            <a href="./product-page.html"><h2>Полусапожки зимние Santa</h2></a>
                                            <p>Код товара: <span>3084 о</span></p>
                                            <p>Бренд: <span>Santi</span></p>
                                        </div>
                                        <div class="homepage-product-card-price">
                                            <p>1867<span> грн</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="grid-product-card card-margin">
                                    <div class="homepage-product-card-img-wrp">
                                        <a href="./product-page.html"><img src="../../images/product-card/1.png" alt="" class="homepage-product-card-img"></a>
                                        <p class="homepage-product-card-new">Новинка</p>
                                        <div class="prod-card-wish">
                                            <i class="homepage-product-card-like product-card-like">&#xE801</i>
                                            <i class="inactive-wishlist-icon fill-wish-heart product-card-like-inactive">&#xE807</i>
                                        </div>
                                    </div>
                                    <div class="homepage-product-card-text-wrp">
                                        <div class="homepage-product-card-text">
                                            <a href="./product-page.html"><h2>Полусапожки зимние Santa</h2></a>
                                            <p>Код товара: <span>3084 о</span></p>
                                            <p>Бренд: <span>Santi</span></p>
                                        </div>
                                        <div class="homepage-product-card-price">
                                            <p>1867<span> грн</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row main-content-wrp">
                <div class="col-md-6 col-md-push-6 col-sm-5 col-sm-push-7 col-xs-12">
                    <a href="">
                        <div class="new-post new-for-him">
                            <div>
                                <h4>Новинки для него</h4>
                                <!-- <a href=""> -->
                                <p>Смотреть</p>
                                <!-- </a> -->
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-md-pull-6 col-sm-7 col-sm-pull-5 col-xs-12">
                    <div class="slick-prod-wrap">
                        <div class="slick-slider slick-prod popular-slider" data-slick='{"slidesToShow":2, "slidesToScroll":2, "arrows": false, "lazyLoad": "ondemand", "responsive":[ {"breakpoint":768,"settings":{"slidesToShow":2, "slidesToScroll":1, "arrows": false, "lazyLoad": "ondemand"}}]}'>
                            <div>
                                <div class="grid-product-card card-margin">
                                    <div class="homepage-product-card-img-wrp">
                                        <a href="./product-page.html"><img src="../../images/product-card/4.png" alt="" class="homepage-product-card-img"></a>
                                        <p class="homepage-product-card-new">Новинка</p>
                                        <div class="prod-card-wish">
                                            <i class="homepage-product-card-like product-card-like">&#xE801</i>
                                            <i class="inactive-wishlist-icon fill-wish-heart product-card-like-inactive">&#xE807</i>
                                        </div>
                                    </div>
                                    <div class="homepage-product-card-text-wrp">
                                        <div class="homepage-product-card-text">
                                            <a href="./product-page.html"><h2>Полусапожки зимние Santa</h2></a>
                                            <p>Код товара: <span>3084 о</span></p>
                                            <p>Бренд: <span>Santi</span></p>
                                        </div>
                                        <div class="homepage-product-card-price">
                                            <p>1867<span> грн</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="grid-product-card card-margin">
                                    <div class="homepage-product-card-img-wrp">
                                        <a href="./product-page.html"><img src="../../images/product-card/4.png" alt="" class="homepage-product-card-img"></a>
                                        <p class="homepage-product-card-new">Новинка</p>
                                        <div class="prod-card-wish">
                                            <i class="homepage-product-card-like product-card-like">&#xE801</i>
                                            <i class="inactive-wishlist-icon fill-wish-heart product-card-like-inactive">&#xE807</i>
                                        </div>
                                    </div>
                                    <div class="homepage-product-card-text-wrp">
                                        <div class="homepage-product-card-text">
                                            <a href="./product-page.html"><h2>Полусапожки зимние Santa</h2></a>
                                            <p>Код товара: <span>3084 о</span></p>
                                            <p>Бренд: <span>Santi</span></p>
                                        </div>
                                        <div class="homepage-product-card-price">
                                            <p>1867<span> грн</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="grid-product-card card-margin">
                                    <div class="homepage-product-card-img-wrp">
                                        <a href="./product-page.html"><img src="../../images/product-card/1.png" alt="" class="homepage-product-card-img"></a>
                                        <p class="homepage-product-card-new">Новинка</p>
                                        <div class="prod-card-wish">
                                            <i class="homepage-product-card-like product-card-like">&#xE801</i>
                                            <i class="inactive-wishlist-icon fill-wish-heart product-card-like-inactive">&#xE807</i>
                                        </div>
                                    </div>
                                    <div class="homepage-product-card-text-wrp">
                                        <div class="homepage-product-card-text">
                                            <a href="./product-page.html"><h2>Полусапожки зимние Santa</h2></a>
                                            <p>Код товара: <span>3084 о</span></p>
                                            <p>Бренд: <span>Santi</span></p>
                                        </div>
                                        <div class="homepage-product-card-price">
                                            <p>1867<span> грн</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="sales-banner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 sales-banner-text-wrp">
                    <div class="col-sm-4 sales-banner-text">
                        <h5>Sale 50%</h5>
                        <p>Межсезонная распродажа</p>
                    </div>
                    <div class="col-sm-5 hidden-xs">
                        <a href="" class="sales-banner-btn">
                            <p>Смотреть</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row bag-category-section">
                <div class="col-md-8 col-sm-12 col-xs-12 bag-category-section-img">
                    <a href="">
                        <div class="bag-category-img">
                            <div>
                                <h4>Новинки сумки</h4>
                                <!-- <a href=""> -->
                                <p>Смотреть</p>
                                <!-- </a> -->
                            </div>
                        </div>
                    </a>
                    <div class="bag-category-banner">
                        <div class="bag-category-banner-img">
                            <img src="../../images/homepage-images/sale-banner-man.png" alt="">
                        </div>
                        <div class="bag-category-banner-title">
                            <p>Обувь</p>
                            <span>БОЛЬШИХ размеров</span>
                        </div>
                        <a href="" class="sales-banner-btn bag-category-banner-btn">
                            <p>Смотреть</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 hidden-xs">
                    <div class="col-md-3 col-sm-6 homepage-product-card">
                        <div class="homepage-product-card-img-wrp">
                            <img src="../../images/product-card/5.png" alt="" class="homepage-product-card-img">
                            <!-- <p class="homepage-product-card-new product-discount">-30%</p> -->
                            <div class="prod-card-wish">
                                <i class="homepage-product-card-like product-card-like">&#xE801</i>
                                <i class="inactive-wishlist-icon fill-wish-heart product-card-like-inactive">&#xE807</i>
                            </div>
                        </div>
                        <div class="homepage-product-card-text-wrp">
                            <div class="homepage-product-card-text">
                                <h2>Сумка</h2>
                                <p>Код товара: <span>3084 о</span></p>
                                <p>Бренд: <span>Santi</span></p>
                            </div>
                            <div class="homepage-product-card-price">
                                <p>1590<span> грн</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 homepage-product-card">
                        <div class="homepage-product-card-img-wrp">
                            <img src="../../images/product-card/6.png" alt="" class="homepage-product-card-img">
                            <!-- <p class="homepage-product-card-new product-discount">-30%</p> -->
                            <div class="prod-card-wish">
                                <i class="homepage-product-card-like product-card-like">&#xE801</i>
                                <i class="inactive-wishlist-icon fill-wish-heart product-card-like-inactive">&#xE807</i>
                            </div>
                        </div>
                        <div class="homepage-product-card-text-wrp">
                            <div class="homepage-product-card-text">
                                <h2>Клатч</h2>
                                <p>Код товара: <span>3084 о</span></p>
                                <p>Бренд: <span>Santi</span></p>
                            </div>
                            <div class="color-and-price-wrp">
                                <div class="homepage-product-card-color">
                                    <a href="" class="vinous-color color-sample"></a>
                                    <a href="" class="mustard-color color-sample"></a>
                                    <a href="" class="dark-grey-color color-sample"></a>
                                </div>
                                <div class="homepage-product-card-price">
                                    <p>1300<span> грн</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="inform-card-wrp">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12 inform-card">
                    <a href="./delivery.html">
                        <h5>Доставка</h5>
                        <p>Харьков самовывоз из магазинов. В остальные города доставка осуществляется курьерской компанией "Новая почта" по тарифам перевозчика. </p>
                        <img src="../../images/homepage-icons/delivery icon.svg" alt="">
                    </a>
                </div>
                <div class="col-sm-4 col-xs-12 inform-card">
                    <a href="">
                        <h5>Бонусная программа</h5>
                        <p>При  покупке от 1000 грн консультант по номеру телефона сделает Вам скидку. Узнать больше о системе начислений Бонусной программы</p>
                        <img src="../../images/homepage-icons/bonus icon.svg" alt="">
                    </a>
                </div>
                <div class="col-sm-4 col-xs-12 inform-card">
                    <a href="">
                        <h5>Оплата и возврат</h5>
                        <p>Вы можете оплатить покупки наличными при получении.
                            На все модели действует гарантия, и в случае необходимости вы можете ее вернуть.</p>
                        <img src="../../images/homepage-icons/payment icon.svg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="article-slider-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="section-title">
                        Новости и Акции
                    </h3>
                </div>
                <div class="col-sm-12">
                    <div class="social-links">
                        <a href=""><img src="../../images/homepage-icons/instagram icon.svg" alt=""></a>
                        <a href=""><img src="../../images/homepage-icons/facebook icon.svg" alt=""></a>
                        <a href=""><img src="../../images/homepage-icons/vkontakte icon.svg" alt=""></a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="js-slider slick-slider article-slider" data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint":768,"settings":{"slidesToShow":1}}]}'>
                        <div class="article-slider-item">
                            <div class="article-slider-item-img">
                                <a href="./information.html">
                                    <img src="../../images/homepage-images/homepage-article-1.jpg" alt="">
                                </a>
                            </div>
                            <h5 class="article-slider-item-title">
                                <a href="./information.html">Повседневная обувь</a>
                            </h5>
                            <span class="article-slider-item-data">
                            12 февраля 2018
                        </span>
                        </div>
                        <div class="article-slider-item">

                            <div class="article-slider-item-img">
                                <a href="./information.html">
                                    <img src="../../images/homepage-images/homepage-article-2.jpg" alt="">
                                </a>
                            </div>
                            <h5 class="article-slider-item-title">
                                <a href="./information.html">Осень – это не повод для грусти</a>
                            </h5>
                            <span class="article-slider-item-data">
                            12 февраля 2018
                        </span>
                        </div>
                        <div class="article-slider-item">
                            <div class="article-slider-item-img">
                                <a href="./information.html">
                                    <img src="../../images/homepage-images/homepage-article-1.jpg" alt="">
                                </a>
                            </div>
                            <h5 class="article-slider-item-title">
                                <a href="./information.html">Повседневная обувь</a>
                            </h5>
                            <span class="article-slider-item-data">
                            12 февраля 2018
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="#" class="fixed-up-btn fixed-up-btn-center">
            <i>&#xE809</i>
        </a>

    </section>
    <section class="insta-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="section-title">
                        Поделись своим образом в Instagram
                    </h3>
                    <p>Ставь хештег <a href="#">#tyflicom</a> в Instagram дай возможность другим увидеть твой образ</p>
                </div>
                <div class="col-sm-12">
                    <div class="js-slider slick-slider slider-margins" data-slick='{"slidesToShow": 6,"autoplay":true, "autoplaySpeed": 1000, "arrows": false, "lazyLoad": "ondemand", "responsive":[{"breakpoint":768,"settings":{"slidesToShow": 4, "arrows": false, "autoplay":true, "autoplaySpeed": 1000, "arrows": false, "lazyLoad": "ondemand"}}, {"breakpoint":480,"settings":{"slidesToShow":1, "autoplay":true, "autoplaySpeed": 1000, "arrows": false, "lazyLoad": "ondemand"}}]}'>
                        <div class="insta-img"><img src="../../images/images-instagram/1.jpg" alt=""></div>
                        <div class="insta-img"><img src="../../images/images-instagram/2.jpg" alt=""></div>
                        <div class="insta-img"><img src="../../images/images-instagram/3.jpg" alt=""></div>
                        <div class="insta-img"><img src="../../images/images-instagram/4.jpg" alt=""></div>
                        <div class="insta-img"><img src="../../images/images-instagram/5.jpg" alt=""></div>
                        <div class="insta-img"><img src="../../images/images-instagram/6.jpg" alt=""></div>
                        <div class="insta-img"><img src="../../images/images-instagram/3.jpg" alt=""></div>
                        <div class="insta-img"><img src="../../images/images-instagram/4.jpg" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 hidden-xs home-page-about-us-text">
                    <span>О нас</span>
                    <p> TYFLI. COM - это онлайн магазин модной женской и мужской обуви от ведущих мировых производителей.
                        В нашем ассортименте представлены более 500 наименований обуви, аксессуаров и сопутствующих товаров от 50 отечественных и зарубежных брендов.</p>
                    <p>Наш интернет-магазин сотрудничает только с проверенными и зарекомендовавшими себя компаниями, имеющими многолетний опыт производства качественной обуви. Мы уверены в надежности продаваемой продукции и тщательно контролируем поставки. Модельный ряд товаров постоянно обновляется в соответствии с тенденциями моды и запросами наших клиентов</p>
                    <p>Гибкая система накопительных скидок и индивидуальные предложения для оптовых покупателей позволили нам завоевать украинский рынок. Сегодня услугами нашего интернет-магазина активно пользуются жители Киева, Львова, Днепропетровска, Одессы, Харькова и других городов Украины.</p>
                </div>
                <div class="col-md-6 col-sm-12 hidden-xs home-page-about-us-text">
                    <p>Почему покупатели выбирают TYFLI.COM</p>
                    <p>Больше не нужно тратить время на посещение обувных магазинов - мы собрали большую коллекцию товаров от популярных производителей.</p>
                    <p>TYFLI.COM предлагает большой выбор модной и качественной продукции по разумным ценам, регулярно проводятся акции и выгодные предложения.</p>
                    <p>В нашем магазине представлены туфли классика для мужчин, которые пользуются популярностью среди покупателей. Линейка наших размеров: 35-40 или 36-41 для женщин и 40-45 для мужчин. Отдельные бренды предлагают мужскую обувь меньших размеров - от 38. </p>
                </div>
            </div>
        </div>
    </section>

    {{--<section class="section-1">--}}
        {{--<div class="container">--}}
            {{--<div class="main-slider">--}}
                {{--@foreach($slideshow as $slide)--}}
                    {{--<div class="main-slide">--}}
                        {{--<div class="col-sm-6 main-slider__pic-wrapper">--}}
                            {{--<img class="main-slider__pic" src="/assets/images/{!! $slide->image->href !!}" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-6 main-slider__info">--}}
                            {{--<div class="main-slider__info-inner">--}}
                                {{--<div class="main-slider__title">{!! json_decode($slide->slide_data)->slide_title !!}</div>--}}
                                {{--<span class="main-slider__subtitle">{!! json_decode($slide->slide_data)->slide_description !!}</span>--}}
                                {{--@if($slide->enable_link)--}}
                                    {{--<a class="main-slider__btn" href="{!! $slide->link !!}">{!! json_decode($slide->slide_data)->button_text !!}</a>--}}
                                {{--@else--}}
                                    {{--<button class="main-slider__btn popup_btn" data-mfp-src="{!! $slide->link !!}">{!! json_decode($slide->slide_data)->button_text !!}</button>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    {{--@if($actions && $actions->count() > 0)--}}
        {{--<section class="section-2">--}}
            {{--<div class="section-title"><span>Акции</span></div>--}}
            {{--<div class="container">--}}
                {{--<div class="actions-slider">--}}
                    {{--@forelse($actions as $product)--}}
                        {{--<div class="item col-sm-4">--}}
                            {{--<div class="item-inner action">--}}
                                {{--<span class="item-label">Акция <i>%</i></span>--}}
                                {{--<div class="item-pic__wrapper">--}}
                                    {{--<a href="{{env('APP_URL')}}/product/{{ $product->url_alias }}"><img class="item-pic" src="{{ $product->image == null ? '/assets/images/no_image.jpg' : $product->image->url('product_list') }}" alt=""></a>--}}
                                {{--</div>--}}
                                {{--<div class="item-info__wrapper">--}}
                                    {{--<a class="item-link" href="{{env('APP_URL')}}/product/{{ $product->url_alias }}">{{ $product->name }}</a>--}}
                                    {{--@if(!empty($product->old_price))--}}
                                        {{--<div class="item-price-old">{{ round($product->old_price, 2) }} грн</div>--}}
                                    {{--@else--}}
                                        {{--<div class="item-price-old" style="text-decoration: none;">&nbsp;</div>--}}
                                    {{--@endif--}}
                                    {{--<div class="item-price">{{ round($product->price, 2) }} грн</div>--}}
                                    {{--<a class="item-btn" href="/product/{{ $product->url_alias }}">Подробнее</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@empty--}}

                    {{--@endforelse--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}
    {{--@endif--}}
@endsection