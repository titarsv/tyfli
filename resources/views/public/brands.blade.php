@extends('public.layouts.main')
@section('meta')
    <title>Новости</title>
    <meta name="description" content="{!! $settings->meta_description !!}">
    <meta name="keywords" content="{!! $settings->meta_keywords !!}">
@endsection

@section('breadcrumbs')
    {!! Breadcrumbs::render('brand') !!}
@endsection

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3 no-padding hidden-xs">
                    <div class="path-underline"></div>
                    <div class="brand-link-wrp">
                        <a href="javascript:void(0);" class="brand-link">Drop Shipping</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12 margin">
                            <h5 class="title">Бренды</h5>
                        </div>
                        @foreach($brands as $brand)
                            <a href="javascript:void(0);">
                                <div class="col-md-4 col-xs-6 brand-item">{{ $brand->name }}</div>
                            </a>
                        @endforeach
                        <div class="col-md-12 sales-banner-text-wrp margin">
                            <div class="sales-banner-text">
                                <h5>Sale 50%</h5>
                                <p>Межсезонная распродажа</p>
                            </div>
                            <div class="col-md-4">
                                <a href="javascript:void(0);" class="sales-banner-btn grid-products-banner">
                                    <p>Смотреть</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection