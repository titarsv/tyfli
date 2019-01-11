@extends('public.layouts.main')
@section('meta')
    <title>{!! $article->meta_title !!}</title>
    <meta name="description" content="{!! $article->meta_description !!}">
    <meta name="keywords" content="{!! $article->meta_keywords !!}">
    @if(!empty($article->robots))
        <meta name="robots" content="{!! $article->robots !!}">
    @endif
    <!-- Код тега ремаркетинга Google -->
    <script type="text/javascript">
        var google_tag_params = {
            dynx_itemid: '',
            dynx_pagetype: 'other',
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
    @include('public.layouts.microdata.open_graph', [
     'title' => $article->meta_title,
     'description' => $article->meta_description,
     'image' => '/images/logo.png'
     ])
@endsection

@section('breadcrumbs')
    {!! Breadcrumbs::render('news_item', $article) !!}
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
                <div class="col-md-3 col-sm-4 hidden-xs">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="information-accordion-wrp path-underline">
                                <div class="information-accordion">
                                    <div class="aside-filter-menu-item-title">
                                        <p>Новости и акции</p>
                                    </div>
                                    <div class="aside-filter-menu-item-btn-toggle filters-open">
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="information-accordion-links unactive">
                                    {{--<h5>Повседневная обувь</h5>--}}
                                    @foreach($news as $item)
                                        <a href="{{env('APP_URL')}}/news_item/{!!$item->url_alias !!}"><p>{{ $item->title }}</p> </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="information-accordion-wrp path-underline">
                                <div class="information-accordion">
                                    <div class="aside-filter-menu-item-title">
                                        <p>Статьи</p>
                                    </div>
                                    <div class="aside-filter-menu-item-btn-toggle filters-open">
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="information-accordion-links unactive">
                                    {{--<h5>Повседневная обувь</h5>--}}
                                    @foreach($articles as $item)
                                        <a href="{{env('APP_URL')}}/article/{!!$item->url_alias !!}"><p>{{ $item->title }}</p> </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="information-accordion-wrp path-underline">
                                <div class="information-accordion">
                                    <div class="aside-filter-menu-item-title">
                                        <p>Уход за обувью</p>
                                    </div>
                                    <div class="aside-filter-menu-item-btn-toggle filters-open">
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="information-accordion-links unactive">
                                    {{--<h5>Повседневная обувь</h5>--}}
                                    @foreach($handling as $item)
                                        <a href="{{env('APP_URL')}}/handling_item/{!!$item->url_alias !!}"><p>{{ $item->title }}</p> </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="aside-filter-menu-item path-underline">
                                <div class="aside-filter-menu-item-title">
                                    <a href="{{env('APP_URL')}}/page/voprosy--otvety"><p>Вопросы и ответы</p></a>
                                </div>
                            </div>
                            <div class="aside-filter-menu-item path-underline">
                                <div class="aside-filter-menu-item-title">
                                    <a href="{{env('APP_URL')}}/page/bonusnyya-programma"><p>Бонусная программа</p></a>
                                </div>
                            </div>
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title">
                                    <a href="{{env('APP_URL')}}/page/otkrytye-vakansii"><p>Открытые вакансии</p></a>
                                </div>
                            </div>
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title">
                                    <a href="{{env('APP_URL')}}/page/drop-shipping"><p>Drop shipping</p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 hidden-xs margin">
                            <h1 class="title">{{ $article->title }}</h1>
                        </div>
                        <div class="visible-xs-inline-block col-xs-12">
                            <div>
                                <select name="" id=""  class="chosen-select site-section-select">
                                    <option value="{{env('APP_URL')}}/news">Новости и Акции</option>
                                    <option value="{{env('APP_URL')}}/articles">Статьи</option>
                                    <option value="{{env('APP_URL')}}/page/voprosy--otvety">Вопросы и ответы</option>
                                    <option value="{{env('APP_URL')}}/handling">Уход за обувью</option>
                                    <option value="{{env('APP_URL')}}/page/bonusnyya-programma">Бонусная программа</option>
                                    <option value="{{env('APP_URL')}}/page/otkrytye-vakansii">Открытые вакансии</option>
                                    <option value="{{env('APP_URL')}}/page/drop-shipping">Drop Shipping</option>
                                </select>
                            </div>
                        </div>
                        <div class="visible-xs-inline-block col-xs-12">
                            <a href="{{env('APP_URL')}}/news">
                                <p class="back-to-articles-link">Назад к списку статей</p>
                            </a>
                        </div>
                        <div class="col-sm-12 col-xs-12">
                            <div class="article-slider-item-img">
                                <img src="{{ $article->image->url() }}" alt="{{ $article->title }}">
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-12 col-xs-12">
                            <div class="article-slider-item">
                                {{--<h5 class="article-slider-item-title">--}}
                                    {{--<a href="javascript:void(0);">{{ $article->title }}</a>--}}
                                {{--</h5>--}}
                                <span class="article-slider-item-data">
                                    {!! $article->created_at !!}
                                </span>
                            </div>
                        </div>
                        <div style="clear: both;">
                            {!! preg_replace('/<([spanuli]+)(?:([\'"]).*?\2|.)*?>/', "<$1>", strip_tags(html_entity_decode($article->text), '<p><img><b><ul><ol><li><table><tr><td>')); !!}
                        </div>
                        @if($next || $prev)
                        <div class="col-sm-12 hidden-xs">
                            <h5 class="next-article-title">
                                <p>Читать следующую статью</p>
                            </h5>
                        </div>
                        @if($prev)
                        <div class="col-md-6 hidden-xs">
                            <div class="article-slider-item">
                                <div class="article-slider-item-img">
                                    <a href="{{env('APP_URL')}}/{{ $prev->category == 'Статьи' ? 'article' : ($prev->category == 'Новости и акции' ? 'news_item' : ($prev->category == 'Уход за обувью' ? 'handling_item' : '')) }}/{!!$prev->url_alias !!}">
                                        <img src="{!! $prev->image->url('blog_list') !!}" alt="">
                                    </a>
                                </div>
                                <h5 class="article-slider-item-title">
                                    <a href="{{env('APP_URL')}}/{{ $prev->category == 'Статьи' ? 'article' : ($prev->category == 'Новости и акции' ? 'news_item' : ($prev->category == 'Уход за обувью' ? 'handling_item' : '')) }}/{!!$prev->url_alias !!}">{{ $prev->title }}</a>
                                </h5>
                                <span class="article-slider-item-data">
                                    {!! $prev->created_at !!}
                                </span>
                            </div>
                        </div>
                        @endif
                        @if($next)
                        <div class="col-md-6 hidden-xs">
                            <div class="article-slider-item">
                                <div class="article-slider-item-img">
                                    <a href="{{env('APP_URL')}}/{{ $next->category == 'Статьи' ? 'article' : ($next->category == 'Новости и акции' ? 'news_item' : ($next->category == 'Уход за обувью' ? 'handling_item' : '')) }}/{!!$next->url_alias !!}">
                                        <img src="{!! $next->image->url('blog_list') !!}" alt="">
                                    </a>
                                </div>
                                <h5 class="article-slider-item-title">
                                    <a href="{{env('APP_URL')}}/{{ $next->category == 'Статьи' ? 'article' : ($next->category == 'Новости и акции' ? 'news_item' : ($next->category == 'Уход за обувью' ? 'handling_item' : '')) }}/{!!$next->url_alias !!}">{{ $next->title }}</a>
                                </h5>
                                <span class="article-slider-item-data">
                                    {!! $next->created_at !!}
                                </span>
                            </div>
                        </div>
                        @endif
                        @endif
                        <div class="visible-xs-inline-block col-xs-12">
                            <p class="sections-links-title">Разделы</p>
                            <ul class="sections-links">
                                <li><a href="{{env('APP_URL')}}/news">Новости и Акции</a> </li>
                                <li><a href="{{env('APP_URL')}}/articles">Статьи</a> </li>
                                <li><a href="{{env('APP_URL')}}/page/voprosy--otvety">Вопросы и ответы</a> </li>
                                <li><a href="{{env('APP_URL')}}/handling">Уход за обувью</a> </li>
                                <li><a href="{{env('APP_URL')}}/page/bonusnyya-programma">Бонусная программа</a> </li>
                                <li><a href="{{env('APP_URL')}}/page/otkrytye-vakansii">Открытые вакансии</a> </li>
                                <li><a href="{{env('APP_URL')}}/page/drop-shipping">Drop Shipping</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection