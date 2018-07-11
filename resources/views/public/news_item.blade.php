@extends('public.layouts.main')
@section('meta')
    <title>{!! $article->meta_title !!}</title>
    <meta name="description" content="{!! $article->meta_description !!}">
    <meta name="keywords" content="{!! $article->meta_keywords !!}">
    @if(!empty($article->robots))
        <meta name="robots" content="{!! $article->robots !!}">
    @endif
@endsection

@section('breadcrumbs')
    {!! Breadcrumbs::render('news_item', $article) !!}
@endsection

@section('content')

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
                                    <h5>Повседневная обувь</h5>
                                    <a href="javascript:void(0);"><p>Осень - не повод для грусти</p> </a>
                                    <a href="javascript:void(0);"><p>Модная мужская обувь 2018</p> </a>
                                    <a href="javascript:void(0);"><p>Модные женские туфли в сезоне 2018</p></a>
                                    <a href="javascript:void(0);"><p>Туфли - справочник по женской моде.</p></a>
                                    <a href="javascript:void(0);"><p>Какая женская обувь в моде летом 2017 года?</p></a>
                                    <a href="javascript:void(0);"><p>Какая обувь будет модной весной и летом в 2017 году</p></a>
                                    <a href="javascript:void(0);"><p>Осень - не повод для грусти</p></a>
                                    <a href="javascript:void(0);"><p>Модная мужская обувь 2018</p></a>
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
                                    <h5>Повседневная обувь</h5>
                                    <a href="javascript:void(0);"><p>Осень - не повод для грусти</p> </a>
                                    <a href="javascript:void(0);"><p>Модная мужская обувь 2018</p> </a>
                                    <a href="javascript:void(0);"><p>Модные женские туфли в сезоне 2018</p></a>
                                    <a href="javascript:void(0);"><p>Туфли - справочник по женской моде.</p></a>
                                    <a href="javascript:void(0);"><p>Какая женская обувь в моде летом 2017 года?</p></a>
                                    <a href="javascript:void(0);"><p>Какая обувь будет модной весной и летом в 2017 году</p></a>
                                    <a href="javascript:void(0);"><p>Осень - не повод для грусти</p></a>
                                    <a href="javascript:void(0);"><p>Модная мужская обувь 2018</p></a>
                                </div>
                            </div>
                            <div class="information-accordion-wrp path-underline">
                                <div class="information-accordion">
                                    <div class="aside-filter-menu-item-title">
                                        <p>Вопросы и ответы</p>
                                    </div>
                                    <div class="aside-filter-menu-item-btn-toggle filters-open">
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="information-accordion-links unactive">
                                    <h5>Повседневная обувь</h5>
                                    <a href="javascript:void(0);"><p>Осень - не повод для грусти</p> </a>
                                    <a href="javascript:void(0);"><p>Модная мужская обувь 2018</p> </a>
                                    <a href="javascript:void(0);"><p>Модные женские туфли в сезоне 2018</p></a>
                                    <a href="javascript:void(0);"><p>Туфли - справочник по женской моде.</p></a>
                                    <a href="javascript:void(0);"><p>Какая женская обувь в моде летом 2017 года?</p></a>
                                    <a href="javascript:void(0);"><p>Какая обувь будет модной весной и летом в 2017 году</p></a>
                                    <a href="javascript:void(0);"><p>Осень - не повод для грусти</p></a>
                                    <a href="javascript:void(0);"><p>Модная мужская обувь 2018</p></a>
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
                                    <h5>Повседневная обувь</h5>
                                    <a href="javascript:void(0);"><p>Осень - не повод для грусти</p> </a>
                                    <a href="javascript:void(0);"><p>Модная мужская обувь 2018</p> </a>
                                    <a href="javascript:void(0);"><p>Модные женские туфли в сезоне 2018</p></a>
                                    <a href="javascript:void(0);"><p>Туфли - справочник по женской моде.</p></a>
                                    <a href="javascript:void(0);"><p>Какая женская обувь в моде летом 2017 года?</p></a>
                                    <a href="javascript:void(0);"><p>Какая обувь будет модной весной и летом в 2017 году</p></a>
                                    <a href="javascript:void(0);"><p>Осень - не повод для грусти</p></a>
                                    <a href="javascript:void(0);"><p>Модная мужская обувь 2018</p></a>
                                </div>
                            </div>
                            <div class="aside-filter-menu-item path-underline">
                                <div class="aside-filter-menu-item-title">
                                    <a href="javascript:void(0);"><p>Бонусная программа</p></a>
                                </div>
                            </div>
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title">
                                    <a href="javascript:void(0);"><p>Открытые вакансии</p></a>
                                </div>
                            </div>
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title">
                                    <a href="javascript:void(0);"><p>Drop shipping</p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 hidden-xs margin">
                            <h5 class="title">Статьи</h5>
                        </div>
                        <div class="visible-xs-inline-block col-xs-12">
                            <div>
                                <select name="" id=""  class="chosen-select site-section-select">
                                    <option value=""><a href="">Новости и Акции</a></option>
                                    <option selected="selected" value=""><a href="">Статьи</a></option>
                                    <option value=""><a href="">Вопросы и ответы</a></option>
                                    <option value=""><a href="">Уход за обувью</a></option>
                                    <option value=""><a href="">Бонусная программа</a></option>
                                    <option value=""><a href="">Открытые вакансии</a></option>
                                    <option value=""><a href="">Drop Shipping</a></option>
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
                                <h5 class="article-slider-item-title">
                                    <a href="javascript:void(0);">{{ $article->title }}</a>
                                </h5>
                                <span class="article-slider-item-data">
                                    {!! $article->created_at !!}
                                </span>
                            </div>
                        </div>
                        {!! html_entity_decode($article->text) !!}
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
                                    <a href="{{env('APP_URL')}}/news/{!!$prev->url_alias !!}">
                                        <img src="{!! $prev->image->url('blog_list') !!}" alt="">
                                    </a>
                                </div>
                                <h5 class="article-slider-item-title">
                                    <a href="{{env('APP_URL')}}/news/{!!$prev->url_alias !!}">Повседневная обувь</a>
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
                                    <a href="{{env('APP_URL')}}/news/{!!$next->url_alias !!}">
                                        <img src="{!! $next->image->url('blog_list') !!}" alt="">
                                    </a>
                                </div>
                                <h5 class="article-slider-item-title">
                                    <a href="{{env('APP_URL')}}/news/{!!$next->url_alias !!}">Повседневная обувь</a>
                                </h5>
                                <span class="article-slider-item-data">
                                    {!! $next->created_at !!}
                                </span>
                            </div>
                        </div>
                        @endif
                        @endif
                        <div class="visible-xs-inline-block col-xs-12">
                            <p class=" sections-links-title">Разделы</p>
                            <ul class="sections-links">
                                <li><a href="javascript:void(0);">Новости и Акции</a> </li>
                                <li><a href="{{env('APP_URL')}}/news">Статьи</a></li>
                                <li><a href="javascript:void(0);">Вопросы и ответы</a></li>
                                <li><a href="javascript:void(0);">Уход за обувью</a></li>
                                <li><a href="javascript:void(0);">Бонусная программа</a></li>
                                <li><a href="javascript:void(0);">Открытые вакансии</a></li>
                                <li><a href="javascript:void(0);">Drop Shipping</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection