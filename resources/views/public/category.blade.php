@extends('public.layouts.main', ['pagination' => $products, 'root_category' => $category->get_root_category()])
@section('meta')
    <title>
        @if(empty($category->meta_title)))
            {!! $category->name !!}
        @else
            {!! $category->meta_title !!}
        @endif
        @if(!empty($products) && $products->currentPage() > 1) - Страница {!! $products->currentPage() !!}@endif
    </title>

    @if(empty($products) || $products->currentPage() == 1)
        <meta name="description" content="{!! $category->meta_description or '' !!}">
        <meta name="keywords" content="{!! $category->meta_keywords or '' !!}">
    @endif

    @if(!empty($category->canonical) && empty($_GET['page']))
        <meta name="canonical" content="{!! $category->canonical !!}">
    @endif
    @if(!empty($category->robots))
        <meta name="robots" content="{!! $category->robots !!}">
    @endif
    @if(!empty($products) && $products->currentPage() > 1)
        <link rel="prev" href="{!! $cp->url($products->url($products->currentPage() - 1), $products->currentPage() - 1) !!}">
    @endif
    @if(!empty($products) && $products->currentPage() < $products->lastPage())
        <link rel="next" href="{!! $cp->url($products->url($products->currentPage() + 1), $products->currentPage() + 1) !!}">
    @endif
    <!-- Код тега ремаркетинга Google -->
    <script type="text/javascript">
        var google_tag_params = {
            dynx_itemid: [{{ implode(', ', $products->pluck('id')->toArray()) }}],
            dynx_pagetype: 'searchresults',
            dynx_totalvalue: [{{ implode(', ', $products->pluck('price')->toArray()) }}],
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

@section('breadcrumbs')
    {!! Breadcrumbs::render('categories', $category) !!}
@endsection

@section('content')
    <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/789556637/?guid=ON&amp;script=0"/>
        </div>
    </noscript>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 hidden-xs aside-filter-menu-container">
                    <div class="row">
                        <button type="button" id="close_filter"></button>
                        <form action="" method="get" id="filters">
                            <div class="col-md-12">
                                <div class="aside-filter-menu-item">
                                    <div class="aside-filter-menu-item-title">
                                        <p>Цена</p>
                                    </div>
                                    <div class="aside-filter-menu-item-filters">
                                        <div>
                                            @foreach($price as $i => $attribute_value)
                                                <div>
                                                    <input type="checkbox"
                                                           class="radio"
                                                           name="price"
                                                           value="{{ $i }}"
                                                           data-attribute="price"
                                                           data-value="{{ $i }}"
                                                           data-url="/catalog{{ $attribute_value['url'] }}"
                                                           id="product-filter-price__check-{!! str_replace(['<', '>', '-'], '', $i) !!}"
                                                           @if($attribute_value['checked'])
                                                           checked
                                                           @endif>
                                                    <span class="radio-custom"></span>
                                                    <label for="product-filter-price__check-{!! str_replace(['<', '>', '-'], '', $i) !!}">{{ $attribute_value['name'] }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="aside-filter-menu-item-btn-toggle">
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>

                            @if($category->parent_id != 0 && !empty($attributes))
                                @foreach($attributes as $key => $attribute)
                                    <div class="col-md-12">
                                        <div class="aside-filter-menu-item">
                                            <div class="aside-filter-menu-item-title">
                                                <p>{{ $attribute['name'] }}</p>
                                            </div>
                                            @if($attribute['name'] == 'Цвет')
                                                <div class="aside-filter-menu-item-filters-color color-filters">
                                                    <div class="form">
                                                        @foreach($attribute['values'] as $i => $attribute_value)
                                                            @if(!empty($attribute_value['value']))
                                                                <div>
                                                                    <input type="checkbox"
                                                                           name="filter_attributes[{!! $key !!}][value][{!! $i !!}]"
                                                                           data-attribute="{{ $key }}"
                                                                           data-value="{{ $i }}"
                                                                           data-url="/catalog{{ $attribute_value['url'] }}"
                                                                           id="product-filter-{!! $key !!}__check-{!! $i !!}"
                                                                           class="checkbox"
                                                                           value=""
                                                                           @if($attribute_value['checked'])
                                                                           checked
                                                                           @endif>
                                                                    <label title="{{ $attribute_value['name'] }}" for="product-filter-{!! $key !!}__check-{!! $i !!}" class="color-sample" style="background-color: {!! $attribute_value['value'] !!}"></label>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @else
                                                <div class="aside-filter-menu-item-filters{{ $attribute['name'] == 'Тип' ? '' : ' unactive' }}">
                                                    @php
                                                        $attr_values = $attribute['values'];
                                                    @endphp
                                                    <div{{ count($attr_values) >= 9 ? ' class=overflow-scroll' : '' }}>
                                                        @foreach($attr_values as $i => $attribute_value)
                                                            @if(!empty($attribute_value['name']))
                                                                <div>
                                                                    <input type="checkbox"
                                                                           name="filter_attributes[{!! $key !!}][value][{!! $i !!}]"
                                                                           data-attribute="{{ $key }}"
                                                                           data-value="{{ $i }}"
                                                                           data-url="/catalog{{ $attribute_value['url'] }}"
                                                                           id="product-filter-{!! $key !!}__check-{!! $i !!}"
                                                                           class="checkbox"
                                                                           @if($attribute_value['checked'])
                                                                           checked
                                                                           @endif>
                                                                    <span class="checkbox-custom"></span>
                                                                    <label for="product-filter-{!! $key !!}__check-{!! $i !!}">{!! $attribute_value['name'] !!}</label>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    @if(count($attr_values) >= 9)
                                                        <a href="#" class="show-more-filters">Показать Больше</a>
                                                    @endif
                                                </div>
                                                <div class="aside-filter-menu-item-btn-toggle{{ $attribute['name'] == 'Тип' ? '' : ' filters-open' }}">
                                                    <div></div>
                                                    <div></div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </form>
                    </div>
                </div>
                <div class="col-md-9 col-sm-8 col-xs-12 products-grid-container">
                    <div class="row">
                        <div class="col-md-12 margin" style="display: flex; justify-content: space-between; flex-wrap: wrap;">
                            <h1 class="title">
                                @if(!empty($seo))
                                    {!! $seo->name !!}
                                @else
                                    {!! $category->name or $category['name'] !!}
                                @endif
                            </h1>
                            <fieldset class="col-xs-8 sorting-dropdown chosen-select-prod-grid hidden-xs" style="max-width: 254px;">
                                <select name="sorting-select" class="chosen-select" id="sorting-select" data-chosen-settings='{"disable_search_threshold":10, "width":"100%"}'>
                                    <option value="date-desc"{{ isset($_GET['order']) && $_GET['order'] == 'date-desc' ? ' selected="selected"' : '' }}>От новых к старым</option>
                                    <option value="price-asc"{{ isset($_GET['order']) && $_GET['order'] == 'price-asc' ? ' selected="selected"' : '' }}>От дешевых к дорогим</option>
                                    <option value="price-desc"{{ isset($_GET['order']) && $_GET['order'] == 'price-desc' ? ' selected="selected"' : '' }}>От дорогих к дешевым</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="visible-xs-inline-block col-xs-12 no-padding">
                            <div class="product-filters-wrp">
                                <div class="row">
                                    <fieldset class="col-xs-8 sorting-dropdown chosen-select-prod-grid">
                                        <select name="sorting-select" class="chosen-select" id="sorting-select-min" data-chosen-settings='{"disable_search_threshold":10, "width":"100%"}'>
                                            <option value="date-desc"{{ isset($_GET['order']) && $_GET['order'] == 'date-desc' ? ' selected="selected"' : '' }}>От новых к старым</option>
                                            <option value="price-asc"{{ isset($_GET['order']) && $_GET['order'] == 'price-asc' ? ' selected="selected"' : '' }}>От дешевых к дорогим</option>
                                            <option value="price-desc"{{ isset($_GET['order']) && $_GET['order'] == 'price-desc' ? ' selected="selected"' : '' }}>От дорогих к дешевым</option>
                                        </select>
                                    </fieldset>
                                    <div class="col-xs-4 filter-menu">
                                        <i>&#xE80D</i><span> Фильтр</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if(empty($products))
                            <div class="col-md-12 margin">
                                <span>Нет таких товаров...</span>
                            </div>
                        @else
                            @forelse($products as $key => $product)
                                <div class="col-lg-4 col-xs-6">
                                    <div class="grid-product-card card-margin">
                                        @include('public.layouts.product', ['product' => $product, 'slide' => false])
                                    </div>
                                </div>
                                @if(($key+1)%3 == 0 && ceil(count($products)/6) == ($key+1)/3)
                                    @include('public.layouts.banner')
                                @endif
                            @empty
                                <div class="col-md-12 margin">
                                    <span>Нет таких товаров...</span>
                                </div>
                            @endforelse

                            @if($products->count() < 3)
                                @include('public.layouts.banner')
                            @endif

                            @include('public.layouts.pagination', ['paginator' => $products])
                        @endif

                        <div class="col-sm-12 hidden-xs home-page-about-us-text">
                            @if($products->currentPage() == 1)
                                @if(!empty($seo))
                                    {!! $seo->description !!}
                                {{--@else--}}
                                    {{--<span>О нас</span>--}}
                                    {{--{!! $settings->about !!}--}}
                                @endif
                            @endif
                        </div>

                        <div class="visible-xs-inline-block col-xs-12">
                            <p class="sections-links-title">Разделы</p>
                            <ul class="sections-links">
                                <li><a href="{{env('APP_URL')}}/catalog/zhenskaya-obuv">Женская обувь</a> </li>
                                <li><a href="{{env('APP_URL')}}/catalog/muzhskaya-obuv">Мужская обувь</a></li>
                                <li><a href="{{env('APP_URL')}}/catalog/zhenskie-aksessuary">Аксессуары</a></li>
                                <li><a href="{{env('APP_URL')}}/catalog/uhod">Уход</a></li>
                                <li><a href="{{env('APP_URL')}}/brands">Бренды</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection