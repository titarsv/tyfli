<head>
    <meta charset="utf-8">

    @yield('meta')

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Template Basic Images Start -->
    <meta property="og:image" content="/images/logo.jpg">
    <link rel="shortcut icon" href="/images/favicon.png" type="image/png">
    <!-- Template Basic Images End -->

    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Load CSS, CSS Localstorage & WebFonts Main Function -->
    <script>!function(e){"use strict";function t(e,t,n){e.addEventListener?e.addEventListener(t,n,!1):e.attachEvent&&e.attachEvent("on"+t,n)};function n(t,n){return e.localStorage&&localStorage[t+"_content"]&&localStorage[t+"_file"]===n};function a(t,a){if(e.localStorage&&e.XMLHttpRequest)n(t,a)?o(localStorage[t+"_content"]):l(t,a);else{var s=r.createElement("link");s.href=a,s.id=t,s.rel="stylesheet",s.type="text/css",r.getElementsByTagName("head")[0].appendChild(s),r.cookie=t}}function l(e,t){var n=new XMLHttpRequest;n.open("GET",t,!0),n.onreadystatechange=function(){4===n.readyState&&200===n.status&&(o(n.responseText),localStorage[e+"_content"]=n.responseText,localStorage[e+"_file"]=t)},n.send()}function o(e){var t=r.createElement("style");t.setAttribute("type","text/css"),r.getElementsByTagName("head")[0].appendChild(t),t.styleSheet?t.styleSheet.cssText=e:t.innerHTML=e}var r=e.document;e.loadCSS=function(e,t,n){var a,l=r.createElement("link");if(t)a=t;else{var o;o=r.querySelectorAll?r.querySelectorAll("style,link[rel=stylesheet],script"):(r.body||r.getElementsByTagName("head")[0]).childNodes,a=o[o.length-1]}var s=r.styleSheets;l.rel="stylesheet",l.href=e,l.media="only x",a.parentNode.insertBefore(l,t?a:a.nextSibling);var c=function(e){for(var t=l.href,n=s.length;n--;)if(s[n].href===t)return e();setTimeout(function(){c(e)})};return l.onloadcssdefined=c,c(function(){l.media=n||"all"}),l},e.loadLocalStorageCSS=function(l,o){n(l,o)||r.cookie.indexOf(l)>-1?a(l,o):t(e,"load",function(){a(l,o)})}}(this);</script>

    <!-- Load Custom CSS Start -->
    <script>loadCSS( "{{ mix("css/app.css") }}", false, "all" );</script>
    <!-- Load Custom CSS End -->

    <!-- Load Custom CSS Compiled without JS Start -->
    <noscript>
        <link rel="stylesheet" href="{{ mix("css/app.css") }}">
    </noscript>
    <!-- Load Custom CSS Compiled without JS End -->

    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "HardwareStore",
        "name": "GlobalProm",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Украина, ул. Сумская, 37",
            "addressLocality": "Харьков",
            "addressRegion": "Харьковская",
            "postalCode": "61023"
        },
        "image": "http://globalprom.com.ua/images/logo.jpg",
        "telePhone": "050-697-21-61",
        "faxNumber": "057-751-70-59",
        "url": "globalprom.com.ua",
        "paymentAccepted": [ "cash", "credit card", "invoice" ],
        "openingHours": "Mo,Tu,We,Th,Fr 09:00-18:00",
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": "50.003199",
            "longitude": "36.233781"
        },
        "priceRange":"$$$"
    }
    </script>
</head>