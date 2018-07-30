@extends('public.layouts.main')
@section('meta')
    <title>Новости</title>
    <meta name="description" content="{!! $settings->meta_description !!}">
    <meta name="keywords" content="{!! $settings->meta_keywords !!}">
@endsection

@section('breadcrumbs')
    {!! Breadcrumbs::render('news') !!}
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="row">
                        <div class="col-md-12 hidden-xs">
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
                                    <a href=""><p>Бонусная программа</p></a>
                                </div>
                            </div>
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title">
                                    <a href=""><p>Открытые вакансии</p></a>
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

                <div class="col-md-9 col-sm-8">
                    <div class="row">
                        <div class="col-md-12 hidden-xs margin">
                            <h1 class="title">Статьи</h1>
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
                        @if($articles->count() > 1)
                            @foreach($articles as $i => $article)
                                <div class="col-sm-6 col-xs-12">
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
                                </div>
                            @endforeach
                        @endif
                        @include('public.layouts.pagination', ['paginator' => $articles])
                        <div class="visible-xs-inline-block col-xs-12">
                            <p class=" sections-links-title">Разделы</p>
                            <ul class="sections-links">
                                <li><a href="javascript:void(0);">Новости и Акции</a> </li>
                                <li><a href="javascript:void(0);">Статьи</a></li>
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