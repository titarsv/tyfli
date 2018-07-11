@php
    $labels = $product->labels();
    $brand = $product->brand();
    $colors = $product->colors;
    $sizes = $product->sizes;
    $in_wish = $product->in_wish();
@endphp
<div class="grid-product-card card-margin">
    <div class="homepage-product-card-img-wrp">
        <a href="{{env('APP_URL')}}/product/{{ $product->url_alias }}"><img src="{{ $product->image == null ? '/uploads/no_image.jpg' : $product->image->url('product_list') }}" alt="{{ $product->name }}" class="homepage-product-card-img"></a>
        @if(!empty($product->label) && $product->label != 'z' && isset($labels[$product->label]))
            <p class="homepage-product-card-new">{{ $labels[$product->label] }}</p>
        @elseif(!empty($product->old_price))
            <p class="homepage-product-card-new product-discount">-{{ ceil(($product->old_price / $product->price - 1) * 100) }}%</p>
        @else
            <p class="homepage-product-card-new" style="visibility: hidden;"></p>
        @endif
        <div class="prod-card-wish{{ $in_wish ? ' active' : '' }}" data-prod-id="{{ $product->id}}" data-user-id="{{ $user ? $user->id : 0 }}">
            <i class="homepage-product-card-like product-card-like">&#xE801</i>
            <i class="inactive-wishlist-icon fill-wish-heart product-card-like-inactive">&#xE807</i>
        </div>
    </div>

    @if(!$slide)
    <div class="hover-prod-card hidden-sm hidden-xs">
        <div>
            <div class="homepage-product-card-img-wrp">
                <div class="homepage-product-card-img-hover">
                    <a href="{{env('APP_URL')}}/product/{{ $product->url_alias }}"><img src="{{ $product->image == null ? '/uploads/no_image.jpg' : $product->image->url('product_list') }}" alt="{{ $product->name }}" class="hover-img"></a>
                    <div class="one-click-btn-wrp">
                        <a class="hover-pro-card-btn js-toggle-one-click-btn">
                            <div>
                                <p>Купить в 1 клик</p>
                                <p><img src="/images/homepage-icons/cart icon.svg" alt=""></p>
                            </div>
                        </a>
                        <form action="" class="one-click-form unactive ajax_form"
                              data-error-title="Ошибка отправки!"
                              data-error-message="Попробуйте отправить заявку через некоторое время."
                              data-success-title="Спасибо за заявку!"
                              data-success-message="Наш менеджер свяжется с вами в ближайшее время.">
                            <input type="hidden" name="form" value="Быстрый заказ" data-title="Форма">
                            <input type="hidden" name="product_name" value="{{ $product->name }}" data-title="Название товара">
                            <input type="hidden" name="product_id" value="{{ $product->id }}" data-title="ID товара">
                            <input type="hidden" name="product_articul" value="{{ $product->articul }}" data-title="Артикул товара">
                            <input type="text" name="name" id="" class="one-click-form-input hover-one-click-form-input" placeholder="имя" data-title="Имя">
                            <input type="text" name="phone" id="" class="one-click-form-input hover-one-click-form-input" placeholder="тел." data-validate-required="Обязательное поле" data-validate-uaphone="Неправильный номер" data-title="Телефон">
                            <input type="button" value="Отправить" class="send-btn one-click-form-btn hover-one-click-form-btn">
                        </form>
                    </div>
                </div>
                @if(!empty($product->label) && $product->label != 'z' && isset($labels[$product->label]))
                    <p class="homepage-product-card-new">{{ $labels[$product->label] }}</p>
                @elseif(!empty($product->old_price))
                    <p class="homepage-product-card-new product-discount">-{{ ceil(($product->old_price / $product->price - 1) * 100) }}%</p>
                @else
                    <p class="homepage-product-card-new" style="visibility: hidden;"></p>
                @endif
                <div class="prod-card-wish{{ $in_wish ? ' active' : '' }}" data-prod-id="{{ $product->id}}" data-user-id="{{ $user ? $user->id : 0}}">
                    <i class="homepage-product-card-like product-card-like">&#xE801</i>
                    <i class="inactive-wishlist-icon fill-wish-heart product-card-like-inactive">&#xE807</i>
                </div>
            </div>
            <div class="homepage-product-card-text-wrp">
                <div class="homepage-product-card-text">
                    <a href="{{env('APP_URL')}}/product/{{ $product->url_alias }}"><h2>{{ $product->name }}</h2></a>
                    <p>Код товара: <span>{{ $product->articul }}</span></p>
                    @if($brand)
                        <p>Бренд: <span>{{ $brand }}</span></p>
                    @else
                        <p>&nbsp;</p>
                    @endif
                </div>
                <div class="color-and-price-wrp">
                    <div class="homepage-product-card-color">
                        @foreach($colors as $color)
                            <a href="javascript:void(0);" class="color-sample" style="background-color: {{ $color->value->value }}"></a>
                        @endforeach
                    </div>
                    <div class="homepage-product-card-price">
                        <p>{{ round($product->price, 2) }}<span> грн</span></p>
                        @if(!empty($product->old_price))
                            <span class="old-price">{{ round($product->old_price, 2) }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="hover-prod-size">
                @foreach($sizes as $size)
                    <div class="hover-prod-size-item"><p>{{ $size->value->name }}</p></div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <div class="homepage-product-card-text-wrp">
        <div class="homepage-product-card-text">
            <a href="{{env('APP_URL')}}/product/{{ $product->url_alias }}"><h2>{{ $product->name }}</h2></a>
            <p>Код товара: <span>{{ $product->articul }}</span></p>
            @if($brand)
                <p>Бренд: <span>{{ $brand }}</span></p>
            @else
                <p>&nbsp;</p>
            @endif
        </div>
        <div class="color-and-price-wrp">
            <div class="homepage-product-card-color">
                @foreach($colors as $color)
                    <a href="javascript:void(0);" class="color-sample" style="background-color: {{ $color->value->value }}"></a>
                @endforeach
            </div>
            <div class="homepage-product-card-price">
                <p>{{ round($product->price, 2) }}<span> грн</span></p>
                @if(!empty($product->old_price))
                    <span class="old-price">{{ round($product->old_price, 2) }}</span>
                @endif
            </div>
        </div>
    </div>
</div>