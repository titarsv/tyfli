@extends('public.layouts.main')

@section('meta')
    <title>Личные данные</title>
    <meta name="description" content="{!! $settings->meta_description !!}">
    <meta name="keywords" content="{!! $settings->meta_keywords !!}">
@endsection

@section('breadcrumbs')
    {!! Breadcrumbs::render('user') !!}
@endsection

@section('content')

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 hidden-xs aside-filter-menu-container">
                    <div class="row">
                        <div class="col-md-12 site-path-wrp">
                            <div class="site-path path-underline">
                                <a href="./index.html" class="site-path-link">Главная</a>
                                <a href="./profile.html" class="site-path-link-active">Личный кабинет</a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title aside-block">
                                    <a href="./history.html"><p>История покупок</p></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title aside-block">
                                    <a href="./wish-list.html"><p>Список желаний</p></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title aside-block">
                                    <a href="./profile.html" class="active-aside-link"><p>Личный кабинет</p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-8 col-xs-12 profile-grid-container">
                    <div class="row">
                        <div class="visible-xs-block col-xs-12">
                            <div>
                                <select name="site-section-select" id="" class="chosen-select site-section-select">
                                    <option value="">История покупок</option>
                                    <option value="">Список желаний</option>
                                    <option selected="selected" value="">Личный кабинет</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xs-12 margin">
                            <h5 class="title">Мои данные
                                <a href="" class="edit-profile">
                                    <img src="../../images/homepage-icons/edit icon.svg" alt="">
                                </a>
                            </h5>
                            <div class="profile-data-wrp">
                                <div class="profile-data-item">
                                    <h5 class="data-name">Имя Фамилия</h5>
                                    <span class="user-name">Василий Поддубный</span>
                                </div>
                                <div class="profile-data-item">
                                    <h5 class="data-name">Телефон</h5>
                                    <span>380 999 99 99 99</span>
                                </div>
                                <div class="profile-data-item">
                                    <h5 class="data-name">Почта</h5>
                                    <span>vasia@gmail.com</span>
                                </div>
                                <div class="profile-data-item">
                                    <h5 class="data-name">Дата Рождения</h5>
                                    <input type="text" name="user-birth" class="birthday-input" disabled placeholder="__/__/____"
                                    <p>Мы дарим подарки к Вашему празднику</p>
                                </div>
                            </div>

                            <!--<form>-->
                            <!--<div class="profile-data-item">-->
                            <!--<h5 class="data-name">Пароль</h5>-->
                            <!--<a href="" class="user-password">-->
                            <!--<p>Сменить пароль</p>-->
                            <!--</a>-->
                            <!--<div class="password-edit unactive">-->
                            <!--<input type="password" name="" class="profile-edit-data-input unactive" placeholder="Введите пароль">-->
                            <!--<input type="password" name="" class="profile-edit-data-input unactive" placeholder="Повторите пароль">-->
                            <!--</div>-->
                            <!--</div>-->
                            <!--</form>-->

                            <form  class="profile-edit-data-wrp unactive">
                                <div class="profile-data-item">
                                    <h5 class="data-name">Имя Фамилия</h5>
                                    <input type="text" name="" class="profile-edit-data-input">
                                </div>
                                <div class="profile-data-item">
                                    <h5 class="data-name">Телефон</h5>
                                    <input type="text" class="profile-edit-data-input">
                                </div>
                                <div class="profile-data-item">
                                    <h5 class="data-name">Почта</h5>
                                    <input type="text" name="" class="profile-edit-data-input">
                                </div>
                                <div class="profile-data-item">
                                    <h5 class="data-name">Дата Рождения</h5>
                                    <input type="text" name="user-birth" class="birthday-input" placeholder="__/__/____"
                                    <p>Мы дарим подарки к Вашему празднику</p>
                                </div>
                            </form>

                            <form>
                                <div class="profile-data-item">
                                    <h5 class="data-name">Пароль</h5>
                                    <a href="" class="user-password">
                                        <p>Сменить пароль</p>
                                    </a>
                                    <div class="password-edit unactive">
                                        <input type="password" name="" class="profile-edit-data-input" placeholder="Введите пароль">
                                        <input type="password" name="" class="profile-edit-data-input" placeholder="Повторите пароль">
                                        <input type="button" value="Изменить" class="password-btn">
                                    </div>
                                </div>
                            </form>

                            <h5 class="title">Управление моими подписками</h5>
                            <div class="profile-subscr-wrp profile-margin">
                                <div class="profile-subscr-item">
                                    <input type="radio" name="subscr-type" value="" id="subscr-email" class="radio">
                                    <span class="radio-custom"></span>
                                    <label for="subscr-email">по email</label>
                                </div>
                                <div class="profile-subscr-item">
                                    <input type="radio" name="subscr-type" value="" id="subscr-sms" class="radio">
                                    <span class="radio-custom"></span>
                                    <label for="subscr-sms">по sms</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xs-12 margin">
                            <h5 class="title">Дисконтная программа</h5>
                            <div class="profile-discount-wrp profile-margin">
                                <p>Ваша скидка 5%</p>
                                <span>Общая сумма Ваших покупок больше 2500 грн.<br/>
                                При покупке на общую сумму свыше 5000 грн сумма скидки станет 7%<br/>
                                Узнать больше о <a href=""  class="default-link-hover">Бонусной программе</a>
                            </span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-xs-12 margin">
                            <h5 class="title">Адрес доставки</h5>
                            <form class="profile-address-wrp">
                                <div class="profile-data-item">
                                    <h5 class="data-name">Город</h5>
                                    <fieldset class="city-dropdown">
                                        <!-- <label for="city">Select city</label> -->
                                        <select name="city" id="city">
                                            <option>Киев</option>
                                            <option selected="selected">Харьков</option>
                                            <option>Львов</option>
                                            <option>Донецк</option>
                                            <option>Луцк</option>
                                            <option>Одесса</option>
                                            <option>Черкассы</option>
                                            <option>Днепропетровск</option>
                                            <option>Днепр</option>
                                            <option>Винница</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="profile-data-item">
                                    <h5 class="data-name">Индекс</h5>
                                    <input type="text" name="" class="profile-data-input">
                                </div>
                                <div class="profile-data-item">
                                    <h5 class="data-name">Улица</h5>
                                    <fieldset class="city-dropdown">
                                        <!-- <label for="city">Select city</label> -->
                                        <select name="city" id="city">
                                            <option>Гагарина</option>
                                            <option selected="selected">Одесская</option>
                                            <option>Львовкая</option>
                                            <option>Солнечная</option>
                                            <option>Горница</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="profile-data-item">
                                    <h5 class="data-name">Дом</h5>
                                    <input type="text" name=""  class="profile-data-input">
                                </div>
                                <div class="profile-data-item">
                                    <h5 class="data-name">Квартира</h5>
                                    <input type="text" name="" class="profile-data-input">
                                </div>
                                <div class="profile-data-item">
                                    <button class="profile-address-btn">Изменить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{--<section class="siteSection">--}}
        {{--<div class="container">--}}
            {{--<h1>Личные данные</h1>--}}
        {{--</div>--}}
        {{--<nav class="user-room__tabs">--}}
            {{--<ul class="user-room__tabs-list container">--}}
                {{--<li class="user-room__tabs-item active"><a href="/user">Личные данные</a></li>--}}
                {{--<li class="user-room__tabs-item"><a href="/user/history">История заказов</a></li>--}}
            {{--</ul>--}}
        {{--</nav>--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-lg-6 col-lg-push-3 col-md-8 col-md-push-2 col-sm-10 col-sm-push-1">--}}
                    {{--<div class="row">--}}
                        {{--<div class="row user-room__form-row">--}}
                            {{--<div class="col-sm-6">--}}
                                {{--<label class="user-room__label" for="name">Ваше имя</label>--}}
                                {{--<input class="user-room__input" type="text" name="name" value="{{ $user->first_name ? $user->first_name : '' }}" disabled="">--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-6">--}}
                                {{--<label class="user-room__label" for="last-name">Фамилия</label>--}}
                                {{--<input class="user-room__input" type="text" name="last-name" value="{{ $user->last_name ? $user->last_name : '' }}" disabled="">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="row user-room__form-row">--}}
                            {{--<div class="col-sm-6">--}}
                                {{--<label class="user-room__label" for="phone">Телефон</label>--}}
                                {{--<input class="user-room__input" type="text" name="phone" value="{!! $user_data->phone ? $user_data->phone : '' !!}" disabled="">--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-6">--}}
                                {{--<label class="user-room__label" for="email">E-mail</label>--}}
                                {{--<input class="user-room__input" type="text" name="email" value="{{ $user->email ? $user->email : '' }}" disabled="">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="row user-room__form-row">--}}
                            {{--<div class="col-sm-6">--}}
                                {{--<a href="/logout" class="change-data__btn">Выйти</a>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-6">--}}
                                {{--<a href="/user/change-data" class="change-data__btn">Изменить личные данные</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
@endsection