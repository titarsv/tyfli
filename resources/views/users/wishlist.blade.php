@extends('public.layouts.main')

@section('breadcrumbs')
    {!! Breadcrumbs::render('history') !!}
@endsection

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 hidden-xs aside-filter-menu-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title aside-block">
                                    <a href="/user/history"><p>История покупок</p></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title aside-block">
                                    <a href="javascript:void(0);" class="active-aside-link"><p>Список желаний</p></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title aside-block">
                                    <a href="/user"><p>Личный кабинет</p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-8 col-xs-12 products-grid-container">
                    <div class="row">
                        <div class="col-md-12 hidden-xs margin">
                            <h5 class="title">Список желаний</h5>
                        </div>
                        <div class="visible-xs-inline-block col-xs-12">
                            <div>
                                <select name="site-section-select" id="" class="site-section-select">
                                    <option value="">История покупок</option>
                                    <option selected="selected" value="">Список желаний</option>
                                    <option value="">Личный кабинет</option>
                                </select>
                            </div>
                        </div>
                        @forelse($products as $key => $product)
                            <div class="col-lg-4 col-xs-6">
                                @include('public.layouts.product', ['product' => $product->product, 'slide' => false])
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
                                <span>Нет избранных товаров...</span>
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
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection