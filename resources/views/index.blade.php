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
                    <div class="js-slider slick-slider slider-brands"
                         data-slick='{"slidesToShow": 6, "responsive":[{"breakpoint":1200,"settings":{"slidesToShow": 4}},{"breakpoint":768,"settings":{"slidesToShow": 3, "arrows": false}},{"breakpoint":480,"settings":{"slidesToShow": 2, "arrows": false}}]}'>
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
                <a href="{{env('APP_URL')}}/categories/dlya-zhenschin?filter_attributes[8][value][113]=on">
                    <div class="col-md-6 col-sm-5 col-xs-12">
                        <div class="new-post new-for-her">
                            <div>
                                <h4>Новинки для нее</h4>
                                <p>Смотреть</p>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="col-md-6 col-sm-7 col-xs-12">
                    <div class="slick-prod-wrap">
                        <div class="slick-slider slick-prod popular-slider"
                             data-slick='{"slidesToShow":2, "slidesToScroll":2, "arrows": false, "lazyLoad": "ondemand", "responsive":[ {"breakpoint":768,"settings":{"slidesToShow":2, "slidesToScroll":1, "arrows": false, "lazyLoad": "ondemand"}}]}'>
                            @foreach($women_new_prod as $prod)
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

        <div class="container-fluid">
            <div class="row main-content-wrp">
                <div class="col-md-6 col-md-push-6 col-sm-5 col-sm-push-7 col-xs-12">
                    <a href="{{env('APP_URL')}}/categories/dlya-muzhchin?filter_attributes[8][value][113]=on">
                        <div class="new-post new-for-him">
                            <div>
                                <h4>Новинки для него</h4>
                                <p>Смотреть</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-md-pull-6 col-sm-7 col-sm-pull-5 col-xs-12">
                    <div class="slick-prod-wrap">
                        <div class="slick-slider slick-prod popular-slider"
                             data-slick='{"slidesToShow":2, "slidesToScroll":2, "arrows": false, "lazyLoad": "ondemand", "responsive":[ {"breakpoint":768,"settings":{"slidesToShow":2, "slidesToScroll":1, "arrows": false, "lazyLoad": "ondemand"}}]}'>
                            @foreach($men_new_prod as $prod)
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
                    <a href="{{env('APP_URL')}}/categories/tovary?filter_attributes[1][value][11]=on">
                        <div class="bag-category-img">
                            <div>
                                <h4>Новинки сумки</h4>
                                <p>Смотреть</p>
                            </div>
                        </div>
                    </a>
                    <div class="bag-category-banner">
                        <div class="bag-category-banner-img">
                            <img src="/images/homepage-images/sale-banner-man.png" alt="">
                        </div>
                        <div class="bag-category-banner-title">
                            <p>Обувь</p>
                            <span>БОЛЬШИХ размеров</span>
                        </div>
                        <a href="{{env('APP_URL')}}/categories/tovary?filter_attributes[8][value][112]=on"
                           class="sales-banner-btn bag-category-banner-btn">
                            <p>Смотреть</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 hidden-xs">
                    @foreach($big_sizes as $prod)
                        <div class="homepage-product-card">
                            @include('public.layouts.product', ['product' => $prod, 'slide' => true])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="inform-card-wrp">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12 inform-card">
                    <a href="{{env('APP_URL')}}/delivery">
                        <h5>Доставка</h5>
                        <p>Харьков самовывоз из магазинов. В остальные города доставка осуществляется курьерской
                            компанией "Новая почта" по тарифам перевозчика. </p>
                        <img src="/images/homepage-icons/delivery icon.svg" alt="">
                    </a>
                </div>
                <div class="col-sm-4 col-xs-12 inform-card">
                    <a href="">
                        <h5>Бонусная программа</h5>
                        <p>При покупке от 1000 грн консультант по номеру телефона сделает Вам скидку. Узнать больше о
                            системе начислений Бонусной программы</p>
                        <img src="/images/homepage-icons/bonus icon.svg" alt="">
                    </a>
                </div>
                <div class="col-sm-4 col-xs-12 inform-card">
                    <a href="">
                        <h5>Оплата и возврат</h5>
                        <p>Вы можете оплатить покупки наличными при получении.
                            На все модели действует гарантия, и в случае необходимости вы можете ее вернуть.</p>
                        <img src="/images/homepage-icons/payment icon.svg" alt="">
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
                        <a href=""><img src="/images/homepage-icons/instagram icon.svg" alt=""></a>
                        <a href=""><img src="/images/homepage-icons/facebook icon.svg" alt=""></a>
                        <a href=""><img src="/images/homepage-icons/vkontakte icon.svg" alt=""></a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="js-slider slick-slider article-slider"
                         data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint":768,"settings":{"slidesToShow":1}}]}'>
                        @foreach($articles as $article)
                            <div class="article-slider-item">
                                <div class="article-slider-item-img">
                                    <a href="{{env('APP_URL')}}/news/{!!$article->url_alias !!}">
                                        <img src="{!! $article->image->url('blog_list') !!}" alt="">
                                    </a>
                                </div>
                                <h5 class="article-slider-item-title">
                                    <a href="{{env('APP_URL')}}/news/{!!$article->url_alias !!}">{!! $article->title !!}</a>
                                </h5>
                                <span class="article-slider-item-data">
                                        {!! $article->created_at !!}
                                    </span>
                            </div>
                        @endforeach
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
                    <div class="js-slider slick-slider slider-margins"
                         data-slick='{"slidesToShow": 6,"autoplay":true, "autoplaySpeed": 1000, "arrows": false, "lazyLoad": "ondemand", "responsive":[{"breakpoint":768,"settings":{"slidesToShow": 4, "arrows": false, "autoplay":true, "autoplaySpeed": 1000, "arrows": false, "lazyLoad": "ondemand"}}, {"breakpoint":480,"settings":{"slidesToShow":1, "autoplay":true, "autoplaySpeed": 1000, "arrows": false, "lazyLoad": "ondemand"}}]}'>
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
                    <p> TYFLI. COM - это онлайн магазин модной женской и мужской обуви от ведущих мировых
                        производителей.
                        В нашем ассортименте представлены более 500 наименований обуви, аксессуаров и сопутствующих
                        товаров от 50 отечественных и зарубежных брендов.</p>
                    <p>Наш интернет-магазин сотрудничает только с проверенными и зарекомендовавшими себя компаниями,
                        имеющими многолетний опыт производства качественной обуви. Мы уверены в надежности продаваемой
                        продукции и тщательно контролируем поставки. Модельный ряд товаров постоянно обновляется в
                        соответствии с тенденциями моды и запросами наших клиентов</p>
                    <p>Гибкая система накопительных скидок и индивидуальные предложения для оптовых покупателей
                        позволили нам завоевать украинский рынок. Сегодня услугами нашего интернет-магазина активно
                        пользуются жители Киева, Львова, Днепропетровска, Одессы, Харькова и других городов Украины.</p>
                </div>
                <div class="col-md-6 col-sm-12 hidden-xs home-page-about-us-text">
                    <p>Почему покупатели выбирают TYFLI.COM</p>
                    <p>Больше не нужно тратить время на посещение обувных магазинов - мы собрали большую коллекцию
                        товаров от популярных производителей.</p>
                    <p>TYFLI.COM предлагает большой выбор модной и качественной продукции по разумным ценам, регулярно
                        проводятся акции и выгодные предложения.</p>
                    <p>В нашем магазине представлены туфли классика для мужчин, которые пользуются популярностью среди
                        покупателей. Линейка наших размеров: 35-40 или 36-41 для женщин и 40-45 для мужчин. Отдельные
                        бренды предлагают мужскую обувь меньших размеров - от 38. </p>
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