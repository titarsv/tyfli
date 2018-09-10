@extends('public.layouts.main')
@section('meta')
    <title>Оформление заказа</title>
    <!-- Код тега ремаркетинга Google -->
    @php
        $dynx_itemid = [];
        $dynx_totalvalue = [];
        foreach ($cart->get_products() as $code => $product){
            $dynx_itemid[] = $product['product']->id;
            //$dynx_itemid[] = "'$code'";
            $dynx_totalvalue[] = $product['price'];
        }
    @endphp
    <script type="text/javascript">
        var google_tag_params = {
            dynx_itemid: [{{ implode(',', $dynx_itemid) }}],
            dynx_pagetype: 'conversionintent',
            dynx_totalvalue: [{{ implode(',', $dynx_totalvalue) }}],
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
@section('content')
    <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/789556637/?guid=ON&amp;script=0"/>
        </div>
    </noscript>

    @section('breadcrumbs')
        {!! Breadcrumbs::render('cart') !!}
    @endsection

    <section id="order_cart_content">
        <div class="container">
            <div class="row cart-main-content">
                <div class="visible-xs-block col-xs-12">
                    <h1 class="title">Корзина</h1>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="cart-list-title path-underline hidden-xs">
                        <p>Скидка</p>
                        <p>Размер</p>
                        <p>Количество</p>
                        <p>Сумма</p>
                    </div>

                    @foreach ($cart->get_products() as $code => $product)
                        @if(is_object($product['product']))
                            <div class="cart-product-item path-underline">
                                <div class="cart-img-wrp col-xs-2">
                                    <img src="{{ is_null($product['product']->image) ? '/uploads/no_image.jpg' : $product['product']->image->url('cart') }}" alt="{{ $product['product']->name }}">
                                </div>
                                <div class="cart-prod-description hidden-xs">
                                    <a href="{{env('APP_URL')}}/product/{{ $product['product']->url_alias }}">
                                        <h5 class="default-link-hover">
                                            {{ $product['product']->name }}
                                            @if(!empty($product['variations']))
                                                (
                                                @foreach($product['variations'] as $name => $val)
                                                    {{ $name }}: {{ $val }};
                                                @endforeach
                                                )
                                            @endif
                                        </h5>
                                    </a>
                                    <p class="hidden-xs">Код товара:<span>{{ $product['product']->articul }}</span> </p>
                                </div>
                                <div class="cart-list cart-list-margins hidden-xs">
                                    <ul>
                                        <li>{{ $product['sale_percent'] }}%</li>
                                    </ul>
                                    <ul>
                                        <li>{{ isset($product['variations']['Размер']) ? $product['variations']['Размер'] : '' }}</li>
                                    </ul>
                                    <ul>
                                        <li class="prod-quantity">
                                            <span class="minus cart_minus">-</span>
                                            <input type="text" class="count_field" value="{{ $product['quantity'] }}" size="5" data-prod-id="{{ $code }}"/>
                                            <span class="plus cart_plus">+</span>
                                        </li>
                                    </ul>
                                    <div class="popup-price">
                                        <p><span data-one-price="{{ round($product['price'] * $product['quantity'], 2) }}">{{ number_format( round($product['price'] * $product['quantity'], 2), 0, ',', ' ' ) }}</span> грн</p>
                                    </div>
                                </div>

                                <div class="visible-xs-inline-block col-xs-8">
                                    <div class="cart-list-margins">
                                        <a href="{{env('APP_URL')}}/product/{{ $product['product']->url_alias }}">
                                            <h5 class="mobile-prod-cart-title default-link-hover">
                                                {{ $product['product']->name }}
                                                @if(!empty($product['variations']))
                                                    (
                                                    @foreach($product['variations'] as $name => $val)
                                                        {{ $name }}: {{ $val }};
                                                    @endforeach
                                                    )
                                                @endif
                                            </h5>
                                        </a>
                                    </div>
                                    <ul class="mobile-prod-cart">
                                        <li>
                                            <p>Цена</p>
                                            <div class="popup-price">
                                                <p><span data-one-price="{{ round($product['price'] * $product['quantity'], 2) }}">{{ number_format( round($product['price'] * $product['quantity'], 2), 0, ',', ' ' ) }}</span> грн</p>
                                            </div>
                                        </li>
                                        <li>
                                            <p>Размер</p><span>{{ isset($product['variations']['Размер']) ? $product['variations']['Размер'] : '' }}</span>
                                        </li>
                                        <li>
                                            <p>Цвет</p><span>{{ isset($product['variations']['Цвет']) ? $product['variations']['Цвет'] : '' }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="close-prod-item">
                                    <a href="#" class="mc_item_delete" data-prod-id="{{ $code }}">
                                        <img src="/images/homepage-icons/delete (cart) icon.svg" alt="remove">
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    <ul class="cart-links hidden-xs">
                        @include('public.layouts.links')
                    </ul>
                </div>

                <div class="col-md-3 col-md-offset-1 col-sm-12 col-xs-12 cart-receipt-wrp">
                    <div class="row">
                        <div class="col-md-12 no-padding">
                            <div class="cart-receipt">
                                <div class="cart-receipt-item-wrp path-underline">
                                    @foreach ($cart->get_products() as $code => $product)
                                        @if(is_object($product['product']))
                                            <div class="cart-receipt-item">
                                                <h5>
                                                    {{ $product['product']->name }}
                                                    @if(!empty($product['variations']))
                                                        (
                                                        @foreach($product['variations'] as $name => $val)
                                                            {{ $name }}: {{ $val }};
                                                        @endforeach
                                                        )
                                                    @endif
                                                </h5>
                                                <p><span>{{ number_format( round($product['price'] * $product['quantity'], 2), 0, ',', ' ' ) }}</span> грн</p>
                                            </div>
                                        @endif
                                    @endforeach
                                    @if(!empty($cart->total_sale))
                                        <div class="cart-receipt-item">
                                            <h5>Скидка</h5>
                                            <p><span>{{ $cart->total_sale ? number_format( round($cart->total_sale, 2), 0, ',', ' ' ) : '0' }}</span> грн</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="cart-receipt-item cart-receipt-price">
                                    <h5>Итого</h5>
                                    <p><span>{{ $cart->total_price ? number_format( round($cart->total_price, 2), 0, ',', ' ' ) : '0' }}</span> грн</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 no-padding">
                            <div class="cart-receipt-btn">
                                <a href="{{env('APP_URL')}}/checkout">
                                    <p class="checkout-btn process">Перейти к оформлению</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="visible-xs-block col-xs-12">
                    <ul class="cart-links">
                        @include('public.layouts.links')
                    </ul>
                </div>

            </div>
        </div>
    </section>

@endsection