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
                    <div class="col-md-12">
                        <div class="aside-filter-menu-item">
                            <div class="aside-filter-menu-item-title aside-block">
                                <a href="./wish-list.html" class="active-aside-link"><p>Оплата и доставка</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="aside-filter-menu-item">
                            <div class="aside-filter-menu-item-title aside-block">
                                <a href="./wish-list.html"><p>Гарантия и возврат</p></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="aside-filter-menu-item">
                            <div class="aside-filter-menu-item-title aside-block">
                                <a href="./size-guide.html"><p>Таблица размеров</p></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="visible-xs-inline-block col-xs-12">
                    <div>
                        <select name="" id=""  class="chosen-select site-section-select">
                            <option selected="selected" value=""><a href="">Оплата и доставка</a> </option>
                            <option value=""><a href="">Гарантия и возврат</a></option>
                            <option value=""><a href="./size-guide.html">Таблица размеров</a></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-9 col-sm-8 col-xs-12">
                    <div class="row">
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