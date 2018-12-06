<footer class="footer">
    <a href="#" class="fixed-up-btn fixed-up-btn-footer">
        <i>&#xE809</i>
    </a>
    <div class="container">
        <div class="row">
            <div class="col-sm-2 col-xs-12">
                <h5 class="footer-links-title"><a href="{{env('APP_URL')}}/page/delivery"><p>Помощь</p></a> </h5>
                <ul class="footer-links">
                    <li><a href="{{env('APP_URL')}}/page/delivery"><p>Оплата и Доставка</p> </a></li>
                    <li><a href="{{env('APP_URL')}}/page/garantiya-i-vozvrat"><p>Гарантия и Возврат</p></a></li>
                    <li><a href="{{env('APP_URL')}}/page/sizes"><p>Таблица размеров</p></a></li>
                    <li><a href="{{env('APP_URL')}}/page/politika-konfidentsialnosti"><p>Политика конфиденциальности</p></a></li>
                </ul>
            </div>
            <div class="col-sm-2 col-xs-12">
                <h5 class="footer-links-title"><a href="{{env('APP_URL')}}/news"><p>Информация</p> </a></h5>
                <ul class="footer-links">
                    <li><a href="{{env('APP_URL')}}/news"><p>Новости и Акции</p> </a></li>
                    <li><a href="{{env('APP_URL')}}/articles"><p>Статьи</p></a></li>
                    <li><a href="{{env('APP_URL')}}/page/voprosy--otvety"><p>Вопросы и ответы</p></a></li>
                    <li><a href="{{env('APP_URL')}}/handling"><p>Уход за обувью</p></a></li>
                    <li><a href="{{env('APP_URL')}}/page/bonusnyya-programma"><p>Бонусная программа</p></a></li>
                    <li><a href="{{env('APP_URL')}}/page/otkrytye-vakansii"><p>Открытые вакансии</p></a></li>
                    <li><a href="{{env('APP_URL')}}/page/drop-shipping"><p>Drop Shipping</p></a></li>
                </ul>
            </div>
            <div class="col-sm-2 col-xs-12">
                <h5 class="footer-links-title"><a href="{{env('APP_URL')}}/page/contact"><p>Контакты</p></a></h5>
                <ul class="footer-links">
                    <li><a href="{{env('APP_URL')}}/page/contact"><p>Контакты</p></a></li>
                    <li><a href="{{env('APP_URL')}}/reviews"><p>Отзывы</p></a></li>
                </ul>
                <ul class="footer-address-list">
                    <li>г.Харьков,</li>
                    <li>пр-т Науки 41/43</li>
                    <li>ул. Полтавкий шлях 147</li>
                    <li>пл. Павловская, д.10 "А"</li>
                </ul>
            </div>
            <div class="col-sm-2 col-xs-12 footer-phones-list-wrp">
                <p>Бесплатно по Украине</p>
                <a href="tel:{{ str_replace(['(', ')', ' ', '-'], '', $settings->main_phone_1) }}">{{ $settings->main_phone_1 }}</a>
                <ul>
                    @if(!empty($settings->main_phone_2))
                    <li><a href="tel:{{ str_replace(['(', ')', ' ', '-'], '', $settings->main_phone_2) }}">{{ $settings->main_phone_2 }}</a></li>
                    @endif
                    @if(!empty($settings->other_phones))
                        @foreach($settings->other_phones as $phone)
                            <li><a href="tel:{{ str_replace(['(', ')', ' ', '-'], '', $phone) }}">{{ $phone }}</a></li>
                        @endforeach
                    @endif
                </ul>
                <p>Поддержка покупателей</p>
                <a>с 10:00 - 19:00</a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <form action="" class="footer-form subscribe-form" id="subscribe">
                    {!! csrf_field() !!}
                    <p>Подписка на расслыку новостей</p>
                    <div>
                        <input type="email" name="email" placeholder="Ваш email" class="footer-input-email">
                        <input type="submit" value="Отправить" class="footer-btn">
                    </div>
                </form>
                <div class="social-links social-links-footer">
                    <a href="https://www.instagram.com/tyflicom/" target="blank">
                        <i>&#xE804</i>
                    </a>
                    <a href="https://www.facebook.com/tyfli.commarina/" target="blank">
                        <i>&#xE803</i>
                    </a>
                    {{--<a href="https://www.vkontakte.com" target="blank">--}}
                        {{--<i>&#xE800</i>--}}
                    {{--</a>--}}
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <p class="footer-copyright">
                    © 2013- 2018 Tyfli.com Все права защищены
                    <!--noindex-->
                    <span>Разработано: <a href="http://23lab.net/" target="_blank" rel="nofollow"><img src="http://23lab.net/images/logo.png"></a></span>
                    <!--/noindex-->
                </p>
            </div>
        </div>
    </div>
</footer>

<div class="mfp-hide">
    <div id='order-popup' class="add-prod-popup">
        <div class="container">
            <div class="row popup-centered">
                <div class="col-md-8 col-xs-12">
                    <div class="row container-popup">
                        <div>
                            Здесь пусто...
                        </div>
                        <button title="Close (Esc)" type="button" class="mfp-close"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>