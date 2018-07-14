@extends('public.layouts.main')
@section('meta')
    <title>Оформление заказа</title>
@endsection

@section('breadcrumbs')
    {!! Breadcrumbs::render('checkout') !!}
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row cart-main-content">
                <div class="col-md-10 col-sm-12">
                    <div class="cart-list-title checkout-list-title hidden-xs path-underline">
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
                                        <li>0%</li>
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
                                <div class="close-prod-item col-xs-2">
                                    <a href="#" class="mc_item_delete" data-prod-id="{{ $code }}">
                                        <img src="/images/homepage-icons/delete (cart) icon.svg" alt="remove">
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <form action="{{env('APP_URL')}}/order/create" method="post" class="order-form" id="order-checkout">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <h5 class="checkout-title">Оформление заказа</h5>
                            </div>
                            <div class="col-sm-7 col-xs-12">
                                <div class="form-conditions">
                                    <h5>Доставка</h5>
                                    <span>Доставка Новой почтой к дверям покупателя</span>
                                    <a href="" class="form-conditions-btn"><p>Изменить</p></a>
                                </div>
                                <div class="form-conditions">
                                    <h5>Оплата</h5>
                                    <span>На расчетный счет Приват Банка</span>
                                    <a href="" class="form-conditions-btn"><p>Изменить</p></a>
                                </div>
                                <div class="form-comment">
                                    <h5>Комментарий</h5>
                                    <textarea name="" id="" cols="30" rows="10" class="leave-comment"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-5 col-xs-12 no-padding cart-receipt-wrp">
                                <div class="cart-receipt">
                                    <div class="cart-receipt-item-wrp path-underline">
                                        <div class="cart-receipt-item">
                                            <h5>Общая сумма заказа</h5>
                                            <p><span>{{ $cart->total_price ? number_format( round($cart->total_price, 2), 0, ',', ' ' ) : '0' }}</span> грн</p>
                                        </div>
                                        <div class="cart-receipt-item">
                                            <h5>Сумма доставки</h5>
                                            <p><span>0</span> грн</p>
                                        </div>
                                    </div>
                                    <div class="cart-receipt-item cart-receipt-price">
                                        <h5>Итого</h5>
                                        <p><span>{{ $cart->total_price ? number_format( round($cart->total_price, 2), 0, ',', ' ' ) : '0' }}</span> грн</p>
                                    </div>
                                    <div class="agreement-container">
                                        <input type="checkbox" name="agreement" value="" id="safe-agreement" class="checkbox">
                                        <span class="checkbox-custom"></span>
                                        <label for="safe-agreement">Соглашаюсь с условиями безопасности</label>
                                    </div>
                                    <div class="agreement-container">
                                        <input type="checkbox" name="agreement" value="" id="public-agreement" class="checkbox">
                                        <span class="checkbox-custom"></span>
                                        <label for="public-agreement">Соглашаюсь с условиями Договора публичной оферты и возврата</label>
                                    </div>
                                </div>
                                <div class="cart-receipt-btn">
                                    @if($user_logged)
                                        <button type="submit" class="checkout-btn" id="checkout-btn">Оформить заказ</button>
                                    @else
                                        <a href="{{env('APP_URL')}}/login" class="checkout-btn">Оформить заказ</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{--<main class="main-wrapper">--}}
        {{--<section class="order-wrapper">--}}
            {{--<div class="inner-page__wrapper">--}}
                {{--<div class="container">--}}
                    {{--<div class="col-xs-12"><span class="inner-page__title">Оформление заказа</span></div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="container">--}}
                {{--<div class="col-lg-7">--}}
                    {{--<div class="order-page-inner" id="order_cart_content">--}}
                        {{--@include('public.layouts.order_cart', ['cart' => $cart, 'delivery_price' => $delivery_price])--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-5">--}}
                    {{--<div class="order-page__forms-wrapper cart-block_checkout">--}}
                        {{--<span class="order-page__forms-title">Заполните необходимые поля</span>--}}
                        {{--<div class="error-message__text"></div>--}}
                        {{--<form action="#" class="order-page__form order-page__form-check" id="order-checkout">--}}
                            {{--{!! csrf_field() !!}--}}
                            {{--<div class="order-page__form-input-wrapper">--}}
                                {{--<input type="text"--}}
                                       {{--placeholder="Ваше имя"--}}
                                       {{--name="first_name"--}}
                                       {{--id="name"--}}
                                       {{--class="@if($errors->has('first_name')) input_error @endif"--}}
                                       {{--value="{!! old('first_name') ? old('first_name') : ( isset($user) && $user ? $user->first_name : '' ) !!}">--}}
                            {{--</div>--}}
                            {{--<div class="order-page__form-input-wrapper">--}}
                                {{--<input type="text"--}}
                                       {{--placeholder="Ваша фамилия"--}}
                                       {{--name="last_name"--}}
                                       {{--id="surname"--}}
                                       {{--value="{!! old('last_name') ? old('last_name') : ( isset($user) && $user ? $user->last_name : '' ) !!}">--}}
                            {{--</div>--}}
                            {{--<div class="order-page__form-input-wrapper">--}}
                                {{--<input type="text"--}}
                                       {{--placeholder="Телефон"--}}
                                       {{--name="phone"--}}
                                       {{--id="phone"--}}
                                       {{--class="@if($errors->has('phone')) input_error @endif"--}}
                                       {{--value="{!! old('phone') ? old('phone') : ( isset($user) && $user ? $user->phone : '' ) !!}">--}}
                            {{--</div>--}}
                            {{--<div class="order-page__form-input-wrapper">--}}
                                {{--<input type="text"--}}
                                       {{--placeholder="E-mail"--}}
                                       {{--name="email"--}}
                                       {{--id="email"--}}
                                       {{--class="@if($errors->has('email')) input_error @endif"--}}
                                       {{--value="{!! old('email') ? old('email') : ( isset($user) && $user ? $user->email : '' ) !!}">--}}
                            {{--</div>--}}

                            {{--<div class="order-page__form-select-wrapper">--}}
                                {{--<select id="checkout-step__delivery" class="order-page__form-select" name="delivery">--}}
                                    {{--<option disabled="" selected="">Выберите метод доставки</option>--}}
                                    {{--<option value="newpost">Новая почта</option>--}}
                                    {{--<option value="pickup">Самовывоз</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}

                            {{--<div id="checkout-delivery-payment"></div>--}}
                            {{--<textarea class="order-page__form-textarea" placeholder="Примечания к вашему заказу, например, особые пожелания отделу доставки"></textarea>--}}
                            {{--<button id="submit_order" class="order-page__form-btn" type="submit">Подтвердить заказ</button>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}
    {{--</main>--}}
    {{--<div id="liqpay_checkout"></div>--}}
    {{--<script src="//static.liqpay.com/libjs/checkout.js" async></script>--}}
@endsection