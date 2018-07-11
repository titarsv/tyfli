<!-- Optimized loading JS Start -->
<script>var scr = {"scripts":[
            {"src" : "{{ mix("js/app.js") }}", "async" : false}
        ]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
</script>
<!-- Optimized loading JS End -->

{{--<script src="/assets/js/vendors.js"></script>--}}
{{--<script src="/app.js"></script>--}}

<!-- ADDED IN CART -->
<div class="mfp-hide">
    <div id="add-prod-popup" class="add-prod-popup">
        <div class="container">
            <div class="row popup-centered">
                <div class="col-md-8 col-xs-12">
                    <div class="row container-popup">
                        <div class="col-md-12">
                            <h5 class="popup-title">Товар добавлен в корзину</h5>
                        </div>
                        <div class="col-md-12 no-padding">
                            <div class="popup-product-item path-underline">
                                <div class="popup-img-wrp">
                                    <img src="../../images/product-card/product1.jpg" alt="">
                                </div>
                                <div class="popup-prod-description">
                                    <h5>Ботинки на шнуровке Santi</h5>
                                    <p>Код товара:<span>105-195 oliv deri</span> </p>
                                </div>
                                <div class="popup-list">
                                    <ul>
                                        <li>Размер</li>
                                        <li>36</li>
                                    </ul>
                                    <ul>
                                        <li>Количество</li>
                                        <li>1</li>
                                    </ul>
                                    <div class="popup-price">
                                        <p><span>2475</span> грн</p>
                                    </div>
                                </div>
                                <div class="close-prod-item">
                                    <a href="">
                                        <img src="../../images/homepage-icons/delete (cart) icon.svg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="popup-total-price popup-price">
                                <p>Сумма заказа <span>2475</span> грн</p>
                            </div>
                        </div>
                        <div class="col-md-6 no-padding">
                            <a href="" class="popup-btn process">
                                <p>Оформить заказ</p>
                            </a>
                        </div>
                        <div class="col-md-6 no-padding">
                            <a href="" class="popup-btn continue">
                                <p>Продолжить покупки</p>
                            </a>
                        </div>
                        <button title="Close (Esc)" type="button" class="mfp-close">
                            <!-- × -->
                            <img src="../../images/homepage-icons/close popup icon.svg" alt="">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>