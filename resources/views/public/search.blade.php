@extends('public.layouts.main')
@section('meta')
    <title>Поиск: {{ $search_text }}</title>
    <meta name="description" content="Поиск по запросу: {{ $search_text }}">
    <meta name="keywords" content="{{ $search_text }}">
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
    {!! Breadcrumbs::render('search') !!}
@endsection

@section('content')
    <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/789556637/?guid=ON&amp;script=0"/>
        </div>
    </noscript>

    <main class="main-wrapper">
        <section class="siteSection">
            <div class="container">
                <h1>Поиск: {{ $search_text }}</h1>
                <div class="row">
                    <div class="col-sm-12 products-grid-container">
						@forelse($products as $product)
							<div class="col-lg-4 col-xs-6">
								<div class="grid-product-card card-margin">
									@include('public.layouts.product', ['product' => $product, 'slide' => false])
								</div>
							</div>
						@empty
							<article class="order">
								<h5 class="order__title">В этой категории пока нет товаров!</h5>
							</article>
						@endforelse
                    </div>

                    <div class="col-sm-12">
                        {{--{!! $products->appends(['text' => $search_text])->render() !!}--}}
                        @include('public.layouts.pagination', ['paginator' => $paginator])
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection