@extends('public.layouts.main')
@section('meta')
    <title>
        @if(empty($category->meta_title) && empty($category['meta_title']))
            {!! $category->name !!}} купить по выгодной цене
        @else
            {!! $category->meta_title or $category['meta_title'] !!}
        @endif
        @if($paginator->currentPage() > 1) Страница № {!! $paginator->currentPage() !!}@endif
    </title>

    @if(empty($category->meta_description))
        <meta name="description" content="Купить {!! $category->name !!}} в Харькове">
    @else
        <meta name="description" content="{!! $category->meta_description or '' !!}">
    @endif

    <meta name="keywords" content="{!! $category->meta_keywords or '' !!}">
    @if(!empty($category->canonical) && empty($_GET['page']))
        <meta name="canonical" content="{!! $category->canonical !!}">
    @endif
    @if(!empty($category->robots))
        <meta name="robots" content="{!! $category->robots !!}">
    @endif
    @if($paginator->currentPage() > 1)
        <link rel="prev" href="{!! $paginator->previousPageUrl() !!}">
    @endif
    @if($paginator->currentPage() < $paginator->lastPage())
        <link rel="next" href="{!! $paginator->nextPageUrl() !!}">
    @endif
@endsection

@section('breadcrumbs')
    {!! Breadcrumbs::render('categories', $category) !!}
@endsection

@section('content')

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 hidden-xs aside-filter-menu-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title">
                                    <p>Цена</p>
                                </div>
                                <div class="aside-filter-menu-item-filters unactive">
                                    <form action="">
                                        <div>
                                            <input type="radio" name="price" value="" id="price1" class="radio">
                                            <span class="radio-custom"></span>
                                            <label for="price1">До 1000 грн</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="price" value="" id="price2" class="radio">
                                            <span class="radio-custom"></span>
                                            <label for="price2">До 1500 грн</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="price" value="" id="price3" class="radio">
                                            <span class="radio-custom"></span>
                                            <label for="price3">Дороже 1500 грн</label>
                                        </div>
                                    </form>
                                </div>
                                <div class="aside-filter-menu-item-btn-toggle filters-open">
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title">
                                    <p>Тип</p>
                                </div>
                                <div class="aside-filter-menu-item-filters unactive">
                                    <form action="" class="overflow-scroll">
                                        <div>
                                            <input type="checkbox" name="type" value="" id="type1" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="type1">Слиперы</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="type" value="" id="type2" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="type2">Шлепанцы</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="type" value="" id="type3" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="type3">Балетки</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="type" value="" id="type4" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="type4">Ботильоны</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="type" value="" id="type5" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="type5">Ботанки</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="type" value="" id="type6" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="type6">Ботфорты</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="type" value="" id="type7" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="type7">Босоножки</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="type" value="" id="type8" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="type8">Кеды</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="type" value="" id="type9" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="type9">Кроссовки</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="type" value="" id="type10" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="type10">На высоком каблуке</label>
                                        </div>
                                    </form>
                                    <a href="" class="show-more-filters">Показать Больше</a>
                                </div>
                                <div class="aside-filter-menu-item-btn-toggle filters-open">
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title">
                                    <p>Сезон</p>
                                </div>
                                <div class="aside-filter-menu-item-filters unactive">
                                    <form action="">
                                        <div>
                                            <input type="checkbox" name="season" value="" id="season1" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="season1">Лето</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="season" value="" id="season2" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="season2">Осень</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="season" value="" id="season3" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="season3">Зима</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="season" value="" id="season4" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="season4">Весна</label>
                                        </div>
                                    </form>
                                </div>
                                <div class="aside-filter-menu-item-btn-toggle filters-open">
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title">
                                    <p>Стиль</p>
                                </div>
                                <div class="aside-filter-menu-item-filters unactive">
                                    <form action="">
                                        <div>
                                            <input type="checkbox" name="style" value="" id="style1" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="style1">Рок</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="style" value="" id="style2" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="style2">Поп</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="style" value="" id="style3" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="style3">Рэп</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="style" value="" id="style4" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="style4">Классика</label>
                                        </div>
                                    </form>
                                </div>
                                <div class="aside-filter-menu-item-btn-toggle filters-open">
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title">
                                    <p>Цвет</p>
                                </div>
                                <div class="aside-filter-menu-item-filters-color color-filters">
                                    <form action="">
                                        <div>
                                            <input type="checkbox" name="color" value="" id="color1" class="checkbox">
                                            <label for="color1" class="color-sample vinous"></label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="color" value="" id="color2" class="checkbox">
                                            <label for="color2" class="color-sample mustard"></label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="color" value="" id="color3" class="checkbox">
                                            <label for="color3" class="color-sample dark-grey"></label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="color" value="" id="color4" class="checkbox">
                                            <label for="color4" class="color-sample blue"></label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title">
                                    <p>Материал</p>
                                </div>
                                <div class="aside-filter-menu-item-filters unactive">
                                    <form action="">
                                        <div>
                                            <input type="checkbox" name="material" value="" id="material1" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="material1">Кожа</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="style" value="" id="material2" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="material2">Экокожа</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="style" value="" id="material3" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="material3">Ткань</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="style" value="" id="material4" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="material4">Резина</label>
                                        </div>
                                    </form>
                                </div>
                                <div class="aside-filter-menu-item-btn-toggle filters-open">
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title">
                                    <p>Тип подошвы</p>
                                </div>
                                <div class="aside-filter-menu-item-filters unactive">
                                    <form action="">
                                        <div>
                                            <input type="checkbox" name="sole" value="" id="sole1" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="sole1">Солома</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="style" value="" id="sole2" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="sole2">Экокожа</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="style" value="" id="sole3" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="sole3">Ткань</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="style" value="" id="sole4" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="sole4">Резина</label>
                                        </div>
                                    </form>
                                </div>
                                <div class="aside-filter-menu-item-btn-toggle filters-open">
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title">
                                    <p>Бренд</p>
                                </div>
                                <div class="aside-filter-menu-item-filters unactive">
                                    <form action="" class="overflow-scroll">
                                        <div>
                                            <input type="checkbox" name="brand" value="" id="brand1" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="brand1">Aquamarine</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="brand" value="" id="brand2" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="brand2">2u fashion</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="brand" value="" id="brand3" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="brand3">Dival & Dino</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="brand" value="" id="brand4" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="brand4">Franco Lucci</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="price" value="" id="brand5" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="brand5">Keddo</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="brand" value="" id="brand6" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="brand6">La Pinta</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="brand" value="" id="brand7" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="brand7">Aquamarine</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="brand" value="" id="brand8" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="brand8">Dival & Dino</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="brand" value="" id="brand9" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="type9">2u fashion</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="brand" value="" id="brand10" class="checkbox">
                                            <span class="checkbox-custom"></span>
                                            <label for="brand10">Keddo</label>
                                        </div>
                                    </form>
                                    <a href="" class="show-more-filters">Показать Больше</a>
                                </div>
                                <div class="aside-filter-menu-item-btn-toggle filters-open">
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title">
                                    <a href=""><p>Большие размеры</p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-8 col-xs-12 products-grid-container">
                    <div class="row">
                        <div class="col-md-12 margin">
                            <h5 class="title">{!! $category->name or $category['name'] !!}</h5>
                        </div>
                        <div class="visible-xs-inline-block col-xs-12 no-padding">
                            <div class="product-filters-wrp">
                                <div class="row">
                                    <fieldset class="col-xs-8 sorting-dropdown chosen-select-prod-grid">
                                        <select name="sorting-select" class="chosen-select" id="sorting-select" data-chosen-settings='{"disable_search_threshold":10, "width":"100%"}'>
                                            <option selected="selected">От дешевых к дорогим</option>
                                            <option>От дорогих к дешевым</option>
                                        </select>
                                    </fieldset>
                                    <div class="col-xs-4 filter-menu">
                                        <i>&#xE80D</i><span> Фильтр</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @forelse($products as $key => $product)
                            <div class="col-lg-4 col-xs-6">
                                @include('public.layouts.product', ['product' => $product, 'slide' => false])
                            </div>
                            @if(($key+1)%3 == 0 && ceil(count($products)/6) == ($key+1)/3)
                                <div class="col-sm-12 col-xs-12 sales-banner-text-wrp">
                                    <div class="col-sm-4 col-xs-9 sales-banner-text">
                                        <h5>Sale 50%</h5>
                                        <p>Межсезонная распродажа</p>
                                    </div>
                                    <div class="col-sm-5 hidden-xs">
                                        <a href="javascript:void(0);" class="sales-banner-btn grid-products-banner">
                                            <p>Смотреть</p>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <div class="col-md-12 margin">
                                <span>Нет таких товаров...</span>
                            </div>
                        @endforelse

                        @if($products->count() < 3)
                            <div class="col-sm-12 col-xs-12 sales-banner-text-wrp">
                                <div class="col-sm-4 col-xs-9 sales-banner-text">
                                    <h5>Sale 50%</h5>
                                    <p>Межсезонная распродажа</p>
                                </div>
                                <div class="col-sm-5 hidden-xs">
                                    <a href="javascript:void(0);" class="sales-banner-btn grid-products-banner">
                                        <p>Смотреть</p>
                                    </a>
                                </div>
                            </div>
                        @endif

                        @include('public.layouts.pagination', ['paginator' => $paginator])

                        <div class="col-sm-12 hidden-xs home-page-about-us-text">
                            <span>О нас</span>
                            {!! $settings->about !!}
                        </div>

                        <div class="visible-xs-inline-block col-xs-12">
                            <p class="sections-links-title">Разделы</p>
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
            </div>
        </div>
    </main>

    {{--<main class="main-wrapper">--}}
        {{--<div class="container">--}}
            {{--<div class="catalog-wrapper">--}}
                {{--@if($category->parent_id != 0 && !$attributes->isEmpty())--}}
                    {{--<aside class="sidebar col-md-3">--}}
                    {{--<form action="#" method="get" id="filters">--}}
                        {{--<div class="sidebar-inner">--}}
                            {{--<span class="sidebar-title">Фильтр по товарам</span>--}}
                            {{--<div class="sidebar-hiiden">--}}
                                {{--<button class="clear-filters">--}}
                                    {{--<span>+</span>--}}
                                    {{--<strong>Сбросить фильтры</strong>--}}
                                {{--</button>--}}
                                {{--@if(!$attributes->isEmpty())--}}
                                    {{--@foreach($attributes as $key => $attribute)--}}
                                        {{--<div class="filter-block{{ isset($filter[$attribute->id]) ? ' active' : '' }}">--}}
                                            {{--<div class="filter-title__wrapper">--}}
                                                {{--<span class="filter-title">{{ $attribute->name }}:</span>--}}
                                            {{--</div>--}}
                                            {{--<ul class="filters-list">--}}
                                                {{--@foreach($attribute->values as $i => $attribute_value)--}}
                                                    {{--@if(!empty($attribute_value->name))--}}
                                                        {{--<li class="filter">--}}
                                                            {{--<input type="checkbox"--}}
                                                                   {{--name="filter_attributes[{!! $attribute->id !!}][value][{!! $attribute_value->id !!}]"--}}
                                                                   {{--data-attribute="{{ $attribute->id }}"--}}
                                                                   {{--data-value="{{ $attribute_value->id }}"--}}
                                                                   {{--id="product-filter-{!! $key !!}__check-{!! $i !!}"--}}
                                                                   {{--class="filter-checkbox"--}}
                                                            {{--@if(isset($filter[$attribute->id]) && in_array($attribute_value->id, $filter[$attribute->id]))--}}
                                                                   {{--checked--}}
                                                                    {{--@endif>--}}
                                                            {{--<label for="product-filter-{!! $key !!}__check-{!! $i !!}">{!! $attribute_value->name !!}</label>--}}
                                                        {{--</li>--}}
                                                    {{--@endif--}}
                                                {{--@endforeach--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--@endforeach--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</aside>--}}
                    {{--<div class="catalog col-md-9">--}}
                {{--@else--}}
                    {{--<div class="catalog col-md-12">--}}
                {{--@endif--}}
                    {{--<div class="row">--}}
                        {{--<span class="catalog-title">{!! $category->name or $category['name'] !!}</span>--}}
                        {{--@if($category->hasChildren() && empty($filter))--}}
                            {{--<div class="subcategories">--}}
                                {{--@foreach($category->children()->where('status', 1)->get() as $subcat)--}}
                                    {{--<div class="item cat-item col-sm-4 col-xs-6">--}}
                                        {{--<div class="item-inner">--}}
                                            {{--<div class="item-pic__wrapper">--}}
                                                {{--@if(!empty($subcat->image))--}}
                                                {{--<a href="{{env('APP_URL')}}/category/{{ $subcat->url_alias }}">--}}
                                                    {{--<img class="item-pic" src="{{ $subcat->image->url('product_list') }}" alt="">--}}
                                                {{--</a>--}}
                                                {{--@endif--}}
                                            {{--</div>--}}
                                            {{--<div class="item-info__wrapper">--}}
                                                {{--<a class="item-link" href="{{env('APP_URL')}}/category/{{ $subcat->url_alias }}">{{ $subcat->name }}</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--@endforeach--}}
                            {{--</div>--}}
                            {{--<div class="clearfix"></div>--}}
                        {{--@endif--}}

                        {{--<div class="cat-filters">--}}
                            {{--<form method="get" @if(!empty($category['url_alias']) && $category['url_alias'] == 'new') style="display:none" @endif>--}}
                            {{--<ul class="cat-view">--}}

                            {{--</ul>--}}
                            {{--<div class="cat-filter__dropdown-wrapper">--}}
                                {{--<select name="sorting" class="cat-filter__dropdown" onchange="sortBy(jQuery(this).val())">--}}
                                    {{--@foreach($sort_array as $sort)--}}
                                        {{--<option value="{!! $sort['value'] !!}" @if($sort['value'] == $current_sort) selected @endif>{!! $sort['name'] !!}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                        {{--<div class="catalog-main">--}}
                            {{--@forelse($products as $product)--}}
                                {{--@include('public.layouts.product', ['product' => $product])--}}
                            {{--@empty--}}
                                {{--<article>--}}
                                    {{--<span>В этой категории пока нет товаров!</span>--}}
                                {{--</article>--}}
                            {{--@endforelse--}}
                        {{--</div>--}}
                        {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}
                    {{--@include('public.layouts.pagination', ['paginator' => $paginator])--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--@if(!empty($category->description) && $paginator->currentPage() == 1)--}}
        {{--<div class="catalog-description">--}}
            {{--<div class="container">--}}
                {{--{!! $category->description !!}--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--@endif--}}
    {{--</main>--}}

@endsection