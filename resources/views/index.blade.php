@extends('public.layouts.main')
@section('meta')
    <title>{!! $settings->meta_title !!}</title>
    <meta name="description" content="{!! $settings->meta_description !!}">
    <meta name="keywords" content="{!! $settings->meta_keywords !!}">

    <!-- Код тега ремаркетинга Google -->
    <script type="text/javascript">
        var google_tag_params = {
            dynx_itemid: '',
            dynx_pagetype: 'home',
            dynx_totalvalue: '',
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
@endsection

@section('content')
    <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/789556637/?guid=ON&amp;script=0"/>
        </div>
    </noscript>

    @if($slideshow->count())
        <div class="header-slider-wrp">
            <div class="container-fluid">
                <div class="row">
                    <div class="js-slider slick-slider header-slider" data-slick='{"slidesToShow": 1, "dots": true, "responsive": [{"breakpoint":768,"settings":{"slidesToShow": 1, "dots": false}}]}'>
                        @foreach($slideshow as $slide)
                            @if($slide->status)
                                <div>
                                    <div class="slider-item-1" style="background-image: url('{{ $slide->image->url() }}')">
                                        <div class="row">
                                            <div class="com-md-12 slider-title">
                                                <h2>{{ $slide->data()->slide_title }}</h2>
                                                <h3>{{ $slide->data()->slide_description }}</h3>
                                            </div>
                                            <div class="com-md-12 slider-btn-wrp">
                                                <a href="{{ $slide->link }}" class="slider-btn">
                                                    <p>{{ $slide->data()->button_text }}</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

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
                                <a href="{{env('APP_URL')}}/catalog/tovary/brend-{{ $brand->value }}">
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
                <a href="{{ $banners[0]->link }}">
                    <div class="col-md-6 col-sm-5 col-xs-12">
                        <div class="new-post new-for-her"
                            @if(!empty($banners[0]->image))
                                style="background-image: url('{{ $banners[0]->image->url() }}');"
                            @endif
                        >
                            <div>
                                <h4>{{ json_decode($banners[0]->slide_data)->slide_title }}</h4>
                                <p>{{ json_decode($banners[0]->slide_data)->button_text }}</p>
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
                    <a href="{{ $banners[1]->link }}">
                        <div class="new-post new-for-him"
                             @if(!empty($banners[1]->image))
                             style="background-image: url('{{ $banners[1]->image->url() }}');"
                                @endif
                        >
                            <div>
                                <h4>{{ json_decode($banners[1]->slide_data)->slide_title }}</h4>
                                <p>{{ json_decode($banners[1]->slide_data)->button_text }}</p>
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
                @include('public.layouts.banner')
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row bag-category-section">
                <div class="col-md-8 col-sm-12 col-xs-12 bag-category-section-img">
                    <a href="{{ $banners[2]->link }}">
                        <div class="bag-category-img"
                             @if(!empty($banners[2]->image))
                             style="background-image: url('{{ $banners[2]->image->url() }}');"
                                @endif
                        >
                            <div>
                                <h4>{{ json_decode($banners[2]->slide_data)->slide_title }}</h4>
                                <p>{{ json_decode($banners[2]->slide_data)->button_text }}</p>
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
                        <a href="{{env('APP_URL')}}/catalog/tovary/specpredlozhenija-bolshierazmery"
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
                    <a href="{{env('APP_URL')}}/page/delivery">
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
                        <a href="https://www.instagram.com/tyflicom/"><img src="/images/homepage-icons/instagram icon.svg" alt=""></a>
                        <a href="https://www.facebook.com/tyfli.commarina/"><img src="/images/homepage-icons/facebook icon.svg" alt=""></a>
                        {{--<a href=""><img src="/images/homepage-icons/vkontakte icon.svg" alt=""></a>--}}
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
                    <p>Ставь хештег <a href="https://www.instagram.com/tyflicom/">#tyflicom</a> в Instagram дай возможность другим увидеть твой образ</p>
                </div>
                <div class="col-sm-12">
                    <div class="js-slider slick-slider slider-margins"
                         data-slick='{"slidesToShow": 6,"autoplay":true, "autoplaySpeed": 1000, "arrows": false, "lazyLoad": "ondemand", "responsive":[{"breakpoint":768,"settings":{"slidesToShow": 4, "arrows": false, "autoplay":true, "autoplaySpeed": 1000, "arrows": false, "lazyLoad": "ondemand"}}, {"breakpoint":480,"settings":{"slidesToShow":1, "autoplay":true, "autoplaySpeed": 1000, "arrows": false, "lazyLoad": "ondemand"}}]}'>
                        <div class="insta-img"><img src="/images/images-instagram/1.jpg" alt=""></div>
                        <div class="insta-img"><img src="/images/images-instagram/2.jpg" alt=""></div>
                        <div class="insta-img"><img src="/images/images-instagram/3.jpg" alt=""></div>
                        <div class="insta-img"><img src="/images/images-instagram/4.jpg" alt=""></div>
                        <div class="insta-img"><img src="/images/images-instagram/5.jpg" alt=""></div>
                        <div class="insta-img"><img src="/images/images-instagram/6.jpg" alt=""></div>
                        <div class="insta-img"><img src="/images/images-instagram/3.jpg" alt=""></div>
                        <div class="insta-img"><img src="/images/images-instagram/4.jpg" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 hidden-xs home-page-about-us-text">
                    {!! $settings->about !!}
                </div>
            </div>
        </div>
    </section>
@endsection