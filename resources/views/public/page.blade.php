@extends('public.layouts.main')
@section('meta')
    <title>{!! $content->meta_title !!}</title>
    <meta name="description" content="{!! $content->meta_description !!}">
    <meta name="keywords" content="{!! $content->meta_keywords !!}">
    @if(!empty($content->robots))
        <meta name="robots" content="{!! $content->robots !!}">
    @endif
@endsection

@section('breadcrumbs')
    {!! Breadcrumbs::render('html', $content) !!}
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 hidden-xs">
                    <div class="row">
                        @if($content->name == 'Контакты')
                            <div class="col-md-12">
                                <div class="aside-filter-menu-item">
                                    <div class="aside-filter-menu-item-title aside-block">
                                        <a class="active-aside-link" href="javascript:void(0);"><p>Контакты</p></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="aside-filter-menu-item">
                                    <div class="aside-filter-menu-item-title aside-block">
                                        <p><a href="{{env('APP_URL')}}/reviews">Отзывы</a></p>
                                    </div>
                                </div>
                            </div>
                        @elseif($content->parent_id == 17)
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
                                        <a href="{{env('APP_URL')}}/news/{!!$item->url_alias !!}"><p>{{ $item->title }}</p> </a>
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
                                        <a href="{{env('APP_URL')}}/handling/{!!$item->url_alias !!}"><p>{{ $item->title }}</p> </a>
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
                        @elseif($content->parent_id == 16)
                            <div class="col-md-12">
                                <div class="aside-filter-menu-item">
                                    <div class="aside-filter-menu-item-title aside-block">
                                        @if($content->name == 'Оплата и доставка')
                                            <a class="active-aside-link" href="javascript:void(0);"><p>Оплата и доставка</p></a>
                                        @else
                                            <a href="{{env('APP_URL')}}/page/delivery"><p>Оплата и доставка</p></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="aside-filter-menu-item">
                                    <div class="aside-filter-menu-item-title aside-block">
                                        @if($content->name == 'Гарантия и Возврат')
                                            <a class="active-aside-link" href="javascript:void(0);"><p>Гарантия и возврат</p></a>
                                        @else
                                            <a href="{{env('APP_URL')}}/page/garantiya-i-vozvrat"><p>Гарантия и возврат</p></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="aside-filter-menu-item">
                                    <div class="aside-filter-menu-item-title aside-block">
                                        @if($content->name == 'Таблица размеров')
                                            <a class="active-aside-link" href="javascript:void(0);"><p>Таблица размеров</p></a>
                                        @else
                                            <a href="{{env('APP_URL')}}/page/sizes"><p>Таблица размеров</p></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="visible-xs-inline-block col-xs-12">
                    <div>
                        <select name="" id="redirect_select"  class="chosen-select site-section-select">
                            @if($content->name == 'Контакты')
                                <option selected="selected" value="{{env('APP_URL')}}/page/contact">Контакты</option>
                                <option value="{{env('APP_URL')}}/reviews">Отзывы</option>
                            @elseif($content->parent_id == 17)
                                <option value="{{env('APP_URL')}}/news">Новости и Акции</option>
                                <option value="{{env('APP_URL')}}/articles">Статьи</option>
                                <option value="{{env('APP_URL')}}/page/voprosy--otvety">Вопросы и ответы</option>
                                <option value="{{env('APP_URL')}}/handling">Уход за обувью</option>
                                <option value="{{env('APP_URL')}}/page/bonusnyya-programma">Бонусная программа</option>
                                <option value="{{env('APP_URL')}}/page/otkrytye-vakansii">Открытые вакансии</option>
                                <option value="{{env('APP_URL')}}/page/drop-shipping">Drop Shipping</option>
                            @elseif($content->parent_id == 16)
                                <option value="{{env('APP_URL')}}/page/delivery">Оплата и доставка</option>
                                <option value="{{env('APP_URL')}}/page/garantiya-i-vozvrat">Гарантия и возврат</option>
                                <option value="{{env('APP_URL')}}/page/sizes">Таблица размеров</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-md-9 col-sm-8 col-xs-12">
                    <div class="row static_page">
                        <div class="col-sm-12 col-xs-12 margin">
                            <h5 class="title">{{ $content->name }}</h5>
                        </div>
                        {!! html_entity_decode($content->content) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection