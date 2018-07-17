@php
    $labels = $product->labels();
    $brand = $product->brand();
    //$colors = $product->colors;
    $sizes = $product->sizes;
    $in_wish = $product->in_wish();

    $colors = [];
    if(is_object($product->colors()->first())) {
        //$colors[$product->id] = ['color' => $product->colors()->first()->value, 'slug' => $product->url_alias, 'image' => $product->image->url()];
        foreach ($product->related as $prod) {
            if (is_object($prod->colors()->first()))
                $colors[$prod->id] = ['color' => $prod->colors()->first()->value, 'slug' => $prod->url_alias, 'image' => $prod->image->url()];
        }
        sort($colors);
        $colors = array_merge([$product->id => ['color' => $product->colors()->first()->value, 'slug' => $product->url_alias, 'image' => $product->image->url()]], $colors);
    }
@endphp
<div class="homepage-product-card-img-wrp">
    <a href="{{env('APP_URL')}}/product/{{ $product->url_alias }}">
        @if(!empty($colors))
        <div class="slick-slider product-cart-slider-{{ $product->id }}" data-slick='{"arrows":false, "fade":true, "cssEase":"linear"}'>
            @foreach($colors as $color)
                <img src="{{ $color['image'] }}" alt="{{ $product->name }}" class="homepage-product-card-img">
            @endforeach
        </div>
        @else
            <img src="{{ $product->image == null ? '/uploads/no_image.jpg' : $product->image->url('product_list') }}" alt="{{ $product->name }}" class="homepage-product-card-img">
        @endif
    </a>
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
                <a href="{{env('APP_URL')}}/product/{{ $product->url_alias }}">
                    @if(!empty($colors))
                        <div class="slick-slider product-cart-slider-{{ $product->id }}" data-slick='{"arrows":false, "fade":true, "cssEase":"linear"}'>
                            @foreach($colors as $color)
                                <img src="{{ $color['image'] }}" alt="{{ $product->name }}" class="homepage-product-card-img">
                            @endforeach
                        </div>
                    @else
                        <img src="{{ $product->image == null ? '/uploads/no_image.jpg' : $product->image->url('product_list') }}" alt="{{ $product->name }}" class="homepage-product-card-img">
                    @endif
                </a>
                <div class="one-click-btn-wrp">
                    {{--<a class="hover-pro-card-btn js-toggle-one-click-btn">--}}
                        {{--<div>--}}
                            {{--<p>Купить в 1 клик</p>--}}
                            {{--<p><img src="/images/homepage-icons/cart icon.svg" alt=""></p>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                    <div class="hover-pro-card-btn-container">
                        <a class="js-toggle-one-click-btn" data-toggle=".one-click-form"><p class="hover-pro-card-btn">Купить в 1 клик</p></a>
                        <a href="#"><p class="hover-pro-card-cart-btn"><img src="../../images/homepage-icons/cart icon.svg" alt=""></p></a>
                    </div>
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
                    @foreach($colors as $key => $item)
                        <a href="{{env('APP_URL')}}/product/{{ $item['slug'] }}" data-id="{{ $key }}" class="color-sample" style="background-color: {{ $item['color']->value }}"></a>
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
                <a href="{{env('APP_URL')}}/product/{{ $product->url_alias }}">
                    <div class="hover-prod-size-item"><p>{{ $size->value->name }}</p></div>
                </a>
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
            @foreach($colors as $key => $item)
                <a href="{{env('APP_URL')}}/product/{{ $item['slug'] }}" data-id="{{ $key }}" class="color-sample" style="background-color: {{ $item['color']->value }}"></a>
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