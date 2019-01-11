@extends('public.layouts.main')
@section('meta')
    <title>{!! $content->meta_title !!}</title>
    <meta name="description" content="{!! $content->meta_description !!}">
    <meta name="keywords" content="{!! $content->meta_keywords !!}">
    @if(!empty($content->robots))
        <meta name="robots" content="{!! $content->robots !!}">
    @endif
    <!-- Код тега ремаркетинга Google -->
    <script type="text/javascript">
        var google_tag_params = {
            dynx_itemid: '',
            dynx_pagetype: 'other',
            dynx_totalvalue: '',
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
    {!! Breadcrumbs::render('html', $content) !!}
@endsection

@section('content')
    <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/789556637/?guid=ON&amp;script=0"/>
        </div>
    </noscript>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 hidden-xs">
                    <div class="row">
                        @if($content->name == 'Контакты')
                            <div class="col-md-12">
                                <div class="aside-filter-menu-item">
                                    <div class="aside-filter-menu-item-title aside-block">
                                        <a class="active-aside-link" href="javascript:void(0);"><p>Контакты</p></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="aside-filter-menu-item">
                                    <div class="aside-filter-menu-item-title aside-block">
                                        <p><a href="{{env('APP_URL')}}/reviews">Отзывы</a></p>
                                    </div>
                                </div>
                            </div>
                        @elseif($content->parent_id == 17)
                            <div class="information-accordion-wrp path-underline">
                                <div class="information-accordion">
                                    <div class="aside-filter-menu-item-title">
                                        <p>Новости и акции</p>
                                    </div>
                                    <div class="aside-filter-menu-item-btn-toggle filters-open">
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="information-accordion-links unactive">
                                    {{--<h5>Повседневная обувь</h5>--}}
                                    @foreach($news as $item)
                                        <a href="{{env('APP_URL')}}/news/{!!$item->url_alias !!}"><p>{{ $item->title }}</p> </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="information-accordion-wrp path-underline">
                                <div class="information-accordion">
                                    <div class="aside-filter-menu-item-title">
                                        <p>Статьи</p>
                                    </div>
                                    <div class="aside-filter-menu-item-btn-toggle filters-open">
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="information-accordion-links unactive">
                                    {{--<h5>Повседневная обувь</h5>--}}
                                    @foreach($articles as $item)
                                        <a href="{{env('APP_URL')}}/article/{!!$item->url_alias !!}"><p>{{ $item->title }}</p> </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="information-accordion-wrp path-underline">
                                <div class="information-accordion">
                                    <div class="aside-filter-menu-item-title">
                                        <p>Уход за обувью</p>
                                    </div>
                                    <div class="aside-filter-menu-item-btn-toggle filters-open">
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="information-accordion-links unactive">
                                    {{--<h5>Повседневная обувь</h5>--}}
                                    @foreach($handling as $item)
                                        <a href="{{env('APP_URL')}}/handling/{!!$item->url_alias !!}"><p>{{ $item->title }}</p> </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="aside-filter-menu-item path-underline">
                                <div class="aside-filter-menu-item-title">
                                    <a href="{{env('APP_URL')}}/page/voprosy--otvety"><p>Вопросы и ответы</p></a>
                                </div>
                            </div>
                            <div class="aside-filter-menu-item path-underline">
                                <div class="aside-filter-menu-item-title">
                                    <a href="{{env('APP_URL')}}/page/bonusnyya-programma"><p>Бонусная программа</p></a>
                                </div>
                            </div>
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title">
                                    <a href="{{env('APP_URL')}}/page/otkrytye-vakansii"><p>Открытые вакансии</p></a>
                                </div>
                            </div>
                            <div class="aside-filter-menu-item">
                                <div class="aside-filter-menu-item-title">
                                    <a href="{{env('APP_URL')}}/page/drop-shipping"><p>Drop shipping</p></a>
                                </div>
                            </div>
                        @elseif($content->parent_id == 16)
                            <div class="col-md-12">
                                <div class="aside-filter-menu-item">
                                    <div class="aside-filter-menu-item-title aside-block">
                                        @if($content->name == 'Оплата и доставка')
                                            <a class="active-aside-link" href="javascript:void(0);"><p>Оплата и доставка</p></a>
                                        @else
                                            <a href="{{env('APP_URL')}}/page/delivery"><p>Оплата и доставка</p></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="aside-filter-menu-item">
                                    <div class="aside-filter-menu-item-title aside-block">
                                        @if($content->name == 'Гарантия и Возврат')
                                            <a class="active-aside-link" href="javascript:void(0);"><p>Гарантия и возврат</p></a>
                                        @else
                                            <a href="{{env('APP_URL')}}/page/garantiya-i-vozvrat"><p>Гарантия и возврат</p></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="aside-filter-menu-item">
                                    <div class="aside-filter-menu-item-title aside-block">
                                        @if($content->name == 'Таблица размеров')
                                            <a class="active-aside-link" href="javascript:void(0);"><p>Таблица размеров</p></a>
                                        @else
                                            <a href="{{env('APP_URL')}}/page/sizes"><p>Таблица размеров</p></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="visible-xs-inline-block col-xs-12">
                    <div>
                        <select name="" id="redirect_select"  class="chosen-select site-section-select">
                            @if($content->name == 'Контакты')
                                <option selected="selected" value="{{env('APP_URL')}}/page/contact">Контакты</option>
                                <option value="{{env('APP_URL')}}/reviews">Отзывы</option>
                            @elseif($content->parent_id == 17)
                                <option value="{{env('APP_URL')}}/news">Новости и Акции</option>
                                <option value="{{env('APP_URL')}}/articles">Статьи</option>
                                <option value="{{env('APP_URL')}}/page/voprosy--otvety">Вопросы и ответы</option>
                                <option value="{{env('APP_URL')}}/handling">Уход за обувью</option>
                                <option value="{{env('APP_URL')}}/page/bonusnyya-programma">Бонусная программа</option>
                                <option value="{{env('APP_URL')}}/page/otkrytye-vakansii">Открытые вакансии</option>
                                <option value="{{env('APP_URL')}}/page/drop-shipping">Drop Shipping</option>
                            @elseif($content->parent_id == 16)
                                <option value="{{env('APP_URL')}}/page/delivery">Оплата и доставка</option>
                                <option value="{{env('APP_URL')}}/page/garantiya-i-vozvrat">Гарантия и возврат</option>
                                <option value="{{env('APP_URL')}}/page/sizes">Таблица размеров</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-md-9 col-sm-8 col-xs-12">
                    <div class="row static_page">
                        <div class="col-sm-12 col-xs-12 margin">
                            <h5 class="title">{{ $content->name }}</h5>
                        </div>
                        {!! html_entity_decode($content->content) !!}
                        @if($content->name == 'Контакты')
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC96SDGLoCVZnudpRXVacFABY750-UHhSc"></script>
                            @foreach($shops as $i => $shop)
                                <div class="col-md-12">
                                    <div class="store-address">
                                        {!! $shop->slide_title !!}
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="schedule">
                                        <p>График работы магазина</p>
                                        <div class="schedule-time">
                                            <span>{!! $shop->wt or '' !!}</span>
                                            <span>{!! $shop->ht or '' !!}</span>
                                        </div>
                                    </div>
                                    <script type="text/javascript">
                                        google.maps.event.addDomListener(window, 'load', init);
                                        function init() {
                                            var mapOptions = {
                                                zoom: 17,
                                                scrollwheel: false,
                                                center: new google.maps.LatLng({!! $shop->lat or '' !!}, {!! $shop->lng or '' !!}),
                                                styles: [
                                                    {
                                                        "featureType": "administrative",
                                                        "elementType": "all",
                                                        "stylers": [
                                                            {
                                                                "visibility": "on"
                                                            },
                                                            {
                                                                "lightness": 33
                                                            }
                                                        ]
                                                    },
                                                    {
                                                        "featureType": "landscape",
                                                        "elementType": "all",
                                                        "stylers": [
                                                            {
                                                                "color": "#f2e5d4"
                                                            }
                                                        ]
                                                    },
                                                    {
                                                        "featureType": "poi.park",
                                                        "elementType": "geometry",
                                                        "stylers": [
                                                            {
                                                                "color": "#c5dac6"
                                                            }
                                                        ]
                                                    },
                                                    {
                                                        "featureType": "poi.park",
                                                        "elementType": "labels",
                                                        "stylers": [
                                                            {
                                                                "visibility": "on"
                                                            },
                                                            {
                                                                "lightness": 20
                                                            }
                                                        ]
                                                    },
                                                    {
                                                        "featureType": "road",
                                                        "elementType": "all",
                                                        "stylers": [
                                                            {
                                                                "lightness": 20
                                                            }
                                                        ]
                                                    },
                                                    {
                                                        "featureType": "road.highway",
                                                        "elementType": "geometry",
                                                        "stylers": [
                                                            {
                                                                "color": "#c5c6c6"
                                                            }
                                                        ]
                                                    },
                                                    {
                                                        "featureType": "road.arterial",
                                                        "elementType": "geometry",
                                                        "stylers": [
                                                            {
                                                                "color": "#e4d7c6"
                                                            }
                                                        ]
                                                    },
                                                    {
                                                        "featureType": "road.local",
                                                        "elementType": "geometry",
                                                        "stylers": [
                                                            {
                                                                "color": "#fbfaf7"
                                                            }
                                                        ]
                                                    },
                                                    {
                                                        "featureType": "water",
                                                        "elementType": "all",
                                                        "stylers": [
                                                            {
                                                                "visibility": "on"
                                                            },
                                                            {
                                                                "color": "#acbcc9"
                                                            }
                                                        ]
                                                    }
                                                ]
                                            };

                                            var mapElement = document.getElementById('map_{{$i}}');
                                            var map = new google.maps.Map(mapElement, mapOptions);
                                            var image = new google.maps.MarkerImage('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAoCAMAAADaOGodAAABblBMVEUAAAAA//+AgIBVqqpAgL9mmcxVqqptkrZgn79VjsZmmbNVlb9bkrZhnrZdl7lel71hlbldm7lfmbZclbhemrxilrdgmbldlbthmLZfmrhdl7lel7tflrlgmrddmblhmrlglrhfmLldmrphl7lemrhgmLhemLhel7pgmLdfl7hgl7lfl7lfmLhembpgl7hgmLlfmblgmblfl7pemLhgmblfmLlfl7lgmbpemblfmLpfmLlgmLpfmbhemLlfl7pfl7lfmLhgmLlfmLlfl7hemblfmLpfmLlfmLlfmLlfmLlfmblemLpfmLlgmLlfmLlfmLlfmLhfmLlfmLlfmLhgmLlfmLlfmLlfmblfmLlfmLlemLlfmblfmLlfmLlfmLpfmblfmLlemLlfmLlembpfmLlfmLlfmLlfmLlfmLlfmLlfmLlfmLlfmLlfmLlfmLlfmLlfmLlfmLlfmLlfmLlfmLlfmLlfmLlfmLlfmLn///98Tb0KAAAAeHRSTlMAAQIDBAUGBwgJCgwOFRYbHSEjJCYnKCkqKywxMzU3Oj0+P0JESE9RUlNYW2FkZW1udXZ3eHl7fX+BhoiJioyRlJWZm52eo6Sqq6ytrrCys7y+wcPIycvMzc/Q0dPU1dbX2N/g4uPk6O7v8PLz9PX29/j5+vv8/f67kv4BAAAAAWJLR0R5odzU0AAAAWZJREFUGBl1wQlDEkEABeCHUChqoICaeYR5o6aWHWahppL3feEV4rFlVirB+/ntzLDs7LJ+Hyxt79fODMM43/zS8wRO/Ue0XY8HYatdodNpHJbwMd1+JKBUH1K5WpxNZ6j8ikNKUcp0+2CKLVE6eApTe5HCWgglbymNw5SmsFeDshSFiwDw7J6mQhtsoUsKA0CSwhZ0HyjMAzMUPkKXoJAFdimMQNdAoViHHIVR6FooRXFDYRq6PkoduKNwGYAmTeklzikNwxbLU2rEMqWfzbCE9ikZVXhN5boLSmSHyioQLlApfnvlB1o//2ZJEsAGywrGPctuagH00lsKpkCOXgrNEIboZQGSP8tK+SiUJCvNocSfpdtDFJZuun2CbZlOuRBskVs6DEL3jrpNOFR/p+3uOZxePLBsDG6TtGxXwS14QuVPHJU6/lF6Ay9TFHb98BI8Jfm3Cd468+QEHjPGdR8e4/taD91/Ht8FzKrPMw8AAAAASUVORK5CYII=',
                                                new google.maps.Size(56, 75),
                                                new google.maps.Point(0,0),
                                                new google.maps.Point(26, 66));
                                            var marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(50.033428, 36.220437),
                                                map: map,
                                                icon: image
                                            });
                                        }
                                    </script>
                                    <div class="map" id="map_{{$i}}"></div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection