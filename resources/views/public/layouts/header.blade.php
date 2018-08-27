<head>
    <meta charset="utf-8">
    @if(!empty($seo))
        <title>{!! $seo->meta_title !!} @if(!empty($pagination) && $pagination->currentPage() > 1) - Страница {!! $pagination->currentPage() !!}@endif</title>

        @if(empty($pagination) || $pagination->currentPage() == 1)
            <meta name="description" content="{!! $seo->meta_description !!}">
            <meta name="keywords" content="{!! $seo->meta_keywords or '' !!}">
        @endif

        @if(!empty($seo->canonical))
            <meta name="canonical" content="{!! $seo->canonical !!}">
        @endif
        @if(!empty($seo->robots))
            <meta name="robots" content="{!! $seo->robots !!}">
        @endif

        @if(!empty($pagination) && $pagination->currentPage() > 1)
            <link rel="prev" href="{!! $cp->url($pagination->url($pagination->currentPage() - 1), $pagination->currentPage() - 1) !!}">
        @endif
        @if(!empty($pagination) && $pagination->currentPage() < $pagination->lastPage())
            <link rel="next" href="{!! $cp->url($pagination->url($pagination->currentPage() + 1), $pagination->currentPage() + 1) !!}">
        @endif
    @else
        @yield('meta')
    @endif

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

    <style>
        @font-face {
            font-family: 'tyfli-font';
            src: url('/fonts/tyfli-font.eot');
            src: url('/fonts/tyfli-font.woff2') format('woff2'),
            url('/fonts/tyfli-font.eot') format('embedded-opentype');
            font-weight: normal;
            font-style: normal;
        }
        body{
            opacity: 0.9 !important;
            transition: opacity 0.1s ease-in 0s;
        }
        #main-container, footer{
            opacity: 0 !important;
            transition: opacity 0.5s ease-in 0s;
        }
        a, abbr, acronym, address, applet, article, aside, audio, b, big, blockquote, body, canvas, caption, center, cite, code, dd, del, details, dfn, div, dl, dt, em, embed, fieldset, figcaption, figure, footer, form, h1, h2, h3, h4, h5, h6, header, hgroup, html, i, iframe, img, ins, kbd, label, legend, li, mark, menu, nav, object, ol, output, p, pre, q, ruby, s, samp, section, small, span, strike, strong, sub, summary, sup, table, tbody, td, tfoot, th, thead, time, tr, tt, u, ul, var, video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }
        i {
            font-family: tyfli-font;
            font-size: 18px;
            color: #4a4a4a;
        }
        ol, ul {
            list-style: none;
        }
        html{font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav,section,summary{display:block}audio,canvas,progress,video{display:inline-block;vertical-align:baseline}audio:not([controls]){display:none;height:0}[hidden],template{display:none}a{background-color:transparent}a:active,a:hover{outline:0}abbr[title]{border-bottom:1px dotted}b,strong{font-weight:bold}dfn{font-style:italic}h1{font-size:2em;margin:0.67em 0}mark{background:#ff0;color:#000}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sup{top:-0.5em}sub{bottom:-0.25em}img{border:0}svg:not(:root){overflow:hidden}figure{margin:1em 40px}hr{-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;height:0}pre{overflow:auto}code,kbd,pre,samp{font-family:monospace, monospace;font-size:1em}button,input,optgroup,select,textarea{color:inherit;font:inherit;margin:0}button{overflow:visible}button,select{text-transform:none}button,html input[type="button"],input[type="reset"],input[type="submit"]{-webkit-appearance:button;cursor:pointer}button[disabled],html input[disabled]{cursor:default}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}input{line-height:normal}input[type="checkbox"],input[type="radio"]{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;padding:0}input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button{height:auto}input[type="search"]{-webkit-appearance:textfield;-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box}input[type="search"]::-webkit-search-cancel-button,input[type="search"]::-webkit-search-decoration{-webkit-appearance:none}fieldset{border:1px solid #c0c0c0;margin:0 2px;padding:0.35em 0.625em 0.75em}legend{border:0;padding:0}textarea{overflow:auto}optgroup{font-weight:bold}table{border-collapse:collapse;border-spacing:0}td,th{padding:0}*{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}*:before,*:after{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}html{font-size:10px;-webkit-tap-highlight-color:rgba(0,0,0,0)}body{font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;font-size:14px;line-height:1.42857143;color:#333;background-color:#fff}input,button,select,textarea{font-family:inherit;font-size:inherit;line-height:inherit}a{color:#337ab7;text-decoration:none}a:hover,a:focus{color:#23527c;text-decoration:underline}a:focus{outline:5px auto -webkit-focus-ring-color;outline-offset:-2px}figure{margin:0}img{vertical-align:middle}.img-responsive{display:block;max-width:100%;height:auto}.img-rounded{border-radius:6px}.img-thumbnail{padding:4px;line-height:1.42857143;background-color:#fff;border:1px solid #ddd;border-radius:4px;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;transition:all .2s ease-in-out;display:inline-block;max-width:100%;height:auto}.img-circle{border-radius:50%}hr{margin-top:20px;margin-bottom:20px;border:0;border-top:1px solid #eee}.sr-only{position:absolute;width:1px;height:1px;margin:-1px;padding:0;overflow:hidden;clip:rect(0, 0, 0, 0);border:0}.sr-only-focusable:active,.sr-only-focusable:focus{position:static;width:auto;height:auto;margin:0;overflow:visible;clip:auto}[role="button"]{cursor:pointer}.container{margin-right:auto;margin-left:auto;padding-left:15px;padding-right:15px}@media (min-width:768px){.container{width:750px}}@media (min-width:992px){.container{width:970px}}@media (min-width:1200px){.container{width:1170px}}.container-fluid{margin-right:auto;margin-left:auto;padding-left:15px;padding-right:15px}.row{margin-left:-15px;margin-right:-15px}.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12{position:relative;min-height:1px;padding-left:15px;padding-right:15px}.col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12{float:left}.col-xs-12{width:100%}.col-xs-11{width:91.66666667%}.col-xs-10{width:83.33333333%}.col-xs-9{width:75%}.col-xs-8{width:66.66666667%}.col-xs-7{width:58.33333333%}.col-xs-6{width:50%}.col-xs-5{width:41.66666667%}.col-xs-4{width:33.33333333%}.col-xs-3{width:25%}.col-xs-2{width:16.66666667%}.col-xs-1{width:8.33333333%}.col-xs-pull-12{right:100%}.col-xs-pull-11{right:91.66666667%}.col-xs-pull-10{right:83.33333333%}.col-xs-pull-9{right:75%}.col-xs-pull-8{right:66.66666667%}.col-xs-pull-7{right:58.33333333%}.col-xs-pull-6{right:50%}.col-xs-pull-5{right:41.66666667%}.col-xs-pull-4{right:33.33333333%}.col-xs-pull-3{right:25%}.col-xs-pull-2{right:16.66666667%}.col-xs-pull-1{right:8.33333333%}.col-xs-pull-0{right:auto}.col-xs-push-12{left:100%}.col-xs-push-11{left:91.66666667%}.col-xs-push-10{left:83.33333333%}.col-xs-push-9{left:75%}.col-xs-push-8{left:66.66666667%}.col-xs-push-7{left:58.33333333%}.col-xs-push-6{left:50%}.col-xs-push-5{left:41.66666667%}.col-xs-push-4{left:33.33333333%}.col-xs-push-3{left:25%}.col-xs-push-2{left:16.66666667%}.col-xs-push-1{left:8.33333333%}.col-xs-push-0{left:auto}.col-xs-offset-12{margin-left:100%}.col-xs-offset-11{margin-left:91.66666667%}.col-xs-offset-10{margin-left:83.33333333%}.col-xs-offset-9{margin-left:75%}.col-xs-offset-8{margin-left:66.66666667%}.col-xs-offset-7{margin-left:58.33333333%}.col-xs-offset-6{margin-left:50%}.col-xs-offset-5{margin-left:41.66666667%}.col-xs-offset-4{margin-left:33.33333333%}.col-xs-offset-3{margin-left:25%}.col-xs-offset-2{margin-left:16.66666667%}.col-xs-offset-1{margin-left:8.33333333%}.col-xs-offset-0{margin-left:0}@media (min-width:768px){.col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12{float:left}.col-sm-12{width:100%}.col-sm-11{width:91.66666667%}.col-sm-10{width:83.33333333%}.col-sm-9{width:75%}.col-sm-8{width:66.66666667%}.col-sm-7{width:58.33333333%}.col-sm-6{width:50%}.col-sm-5{width:41.66666667%}.col-sm-4{width:33.33333333%}.col-sm-3{width:25%}.col-sm-2{width:16.66666667%}.col-sm-1{width:8.33333333%}.col-sm-pull-12{right:100%}.col-sm-pull-11{right:91.66666667%}.col-sm-pull-10{right:83.33333333%}.col-sm-pull-9{right:75%}.col-sm-pull-8{right:66.66666667%}.col-sm-pull-7{right:58.33333333%}.col-sm-pull-6{right:50%}.col-sm-pull-5{right:41.66666667%}.col-sm-pull-4{right:33.33333333%}.col-sm-pull-3{right:25%}.col-sm-pull-2{right:16.66666667%}.col-sm-pull-1{right:8.33333333%}.col-sm-pull-0{right:auto}.col-sm-push-12{left:100%}.col-sm-push-11{left:91.66666667%}.col-sm-push-10{left:83.33333333%}.col-sm-push-9{left:75%}.col-sm-push-8{left:66.66666667%}.col-sm-push-7{left:58.33333333%}.col-sm-push-6{left:50%}.col-sm-push-5{left:41.66666667%}.col-sm-push-4{left:33.33333333%}.col-sm-push-3{left:25%}.col-sm-push-2{left:16.66666667%}.col-sm-push-1{left:8.33333333%}.col-sm-push-0{left:auto}.col-sm-offset-12{margin-left:100%}.col-sm-offset-11{margin-left:91.66666667%}.col-sm-offset-10{margin-left:83.33333333%}.col-sm-offset-9{margin-left:75%}.col-sm-offset-8{margin-left:66.66666667%}.col-sm-offset-7{margin-left:58.33333333%}.col-sm-offset-6{margin-left:50%}.col-sm-offset-5{margin-left:41.66666667%}.col-sm-offset-4{margin-left:33.33333333%}.col-sm-offset-3{margin-left:25%}.col-sm-offset-2{margin-left:16.66666667%}.col-sm-offset-1{margin-left:8.33333333%}.col-sm-offset-0{margin-left:0}}@media (min-width:992px){.col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12{float:left}.col-md-12{width:100%}.col-md-11{width:91.66666667%}.col-md-10{width:83.33333333%}.col-md-9{width:75%}.col-md-8{width:66.66666667%}.col-md-7{width:58.33333333%}.col-md-6{width:50%}.col-md-5{width:41.66666667%}.col-md-4{width:33.33333333%}.col-md-3{width:25%}.col-md-2{width:16.66666667%}.col-md-1{width:8.33333333%}.col-md-pull-12{right:100%}.col-md-pull-11{right:91.66666667%}.col-md-pull-10{right:83.33333333%}.col-md-pull-9{right:75%}.col-md-pull-8{right:66.66666667%}.col-md-pull-7{right:58.33333333%}.col-md-pull-6{right:50%}.col-md-pull-5{right:41.66666667%}.col-md-pull-4{right:33.33333333%}.col-md-pull-3{right:25%}.col-md-pull-2{right:16.66666667%}.col-md-pull-1{right:8.33333333%}.col-md-pull-0{right:auto}.col-md-push-12{left:100%}.col-md-push-11{left:91.66666667%}.col-md-push-10{left:83.33333333%}.col-md-push-9{left:75%}.col-md-push-8{left:66.66666667%}.col-md-push-7{left:58.33333333%}.col-md-push-6{left:50%}.col-md-push-5{left:41.66666667%}.col-md-push-4{left:33.33333333%}.col-md-push-3{left:25%}.col-md-push-2{left:16.66666667%}.col-md-push-1{left:8.33333333%}.col-md-push-0{left:auto}.col-md-offset-12{margin-left:100%}.col-md-offset-11{margin-left:91.66666667%}.col-md-offset-10{margin-left:83.33333333%}.col-md-offset-9{margin-left:75%}.col-md-offset-8{margin-left:66.66666667%}.col-md-offset-7{margin-left:58.33333333%}.col-md-offset-6{margin-left:50%}.col-md-offset-5{margin-left:41.66666667%}.col-md-offset-4{margin-left:33.33333333%}.col-md-offset-3{margin-left:25%}.col-md-offset-2{margin-left:16.66666667%}.col-md-offset-1{margin-left:8.33333333%}.col-md-offset-0{margin-left:0}}@media (min-width:1200px){.col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12{float:left}.col-lg-12{width:100%}.col-lg-11{width:91.66666667%}.col-lg-10{width:83.33333333%}.col-lg-9{width:75%}.col-lg-8{width:66.66666667%}.col-lg-7{width:58.33333333%}.col-lg-6{width:50%}.col-lg-5{width:41.66666667%}.col-lg-4{width:33.33333333%}.col-lg-3{width:25%}.col-lg-2{width:16.66666667%}.col-lg-1{width:8.33333333%}.col-lg-pull-12{right:100%}.col-lg-pull-11{right:91.66666667%}.col-lg-pull-10{right:83.33333333%}.col-lg-pull-9{right:75%}.col-lg-pull-8{right:66.66666667%}.col-lg-pull-7{right:58.33333333%}.col-lg-pull-6{right:50%}.col-lg-pull-5{right:41.66666667%}.col-lg-pull-4{right:33.33333333%}.col-lg-pull-3{right:25%}.col-lg-pull-2{right:16.66666667%}.col-lg-pull-1{right:8.33333333%}.col-lg-pull-0{right:auto}.col-lg-push-12{left:100%}.col-lg-push-11{left:91.66666667%}.col-lg-push-10{left:83.33333333%}.col-lg-push-9{left:75%}.col-lg-push-8{left:66.66666667%}.col-lg-push-7{left:58.33333333%}.col-lg-push-6{left:50%}.col-lg-push-5{left:41.66666667%}.col-lg-push-4{left:33.33333333%}.col-lg-push-3{left:25%}.col-lg-push-2{left:16.66666667%}.col-lg-push-1{left:8.33333333%}.col-lg-push-0{left:auto}.col-lg-offset-12{margin-left:100%}.col-lg-offset-11{margin-left:91.66666667%}.col-lg-offset-10{margin-left:83.33333333%}.col-lg-offset-9{margin-left:75%}.col-lg-offset-8{margin-left:66.66666667%}.col-lg-offset-7{margin-left:58.33333333%}.col-lg-offset-6{margin-left:50%}.col-lg-offset-5{margin-left:41.66666667%}.col-lg-offset-4{margin-left:33.33333333%}.col-lg-offset-3{margin-left:25%}.col-lg-offset-2{margin-left:16.66666667%}.col-lg-offset-1{margin-left:8.33333333%}.col-lg-offset-0{margin-left:0}}.clearfix:before,.clearfix:after,.container:before,.container:after,.container-fluid:before,.container-fluid:after,.row:before,.row:after{content:" ";display:table}.clearfix:after,.container:after,.container-fluid:after,.row:after{clear:both}.center-block{display:block;margin-left:auto;margin-right:auto}.pull-right{float:right !important}.pull-left{float:left !important}.hide{display:none !important}.show{display:block !important}.invisible{visibility:hidden}.text-hide{font:0/0 a;color:transparent;text-shadow:none;background-color:transparent;border:0}.hidden{display:none !important}.affix{position:fixed}@-ms-viewport{width:device-width}.visible-xs,.visible-sm,.visible-md,.visible-lg{display:none !important}.visible-xs-block,.visible-xs-inline,.visible-xs-inline-block,.visible-sm-block,.visible-sm-inline,.visible-sm-inline-block,.visible-md-block,.visible-md-inline,.visible-md-inline-block,.visible-lg-block,.visible-lg-inline,.visible-lg-inline-block{display:none !important}@media (max-width:767px){.visible-xs{display:block !important}table.visible-xs{display:table !important}tr.visible-xs{display:table-row !important}th.visible-xs,td.visible-xs{display:table-cell !important}}@media (max-width:767px){.visible-xs-block{display:block !important}}@media (max-width:767px){.visible-xs-inline{display:inline !important}}@media (max-width:767px){.visible-xs-inline-block{display:inline-block !important}}@media (min-width:768px) and (max-width:991px){.visible-sm{display:block !important}table.visible-sm{display:table !important}tr.visible-sm{display:table-row !important}th.visible-sm,td.visible-sm{display:table-cell !important}}@media (min-width:768px) and (max-width:991px){.visible-sm-block{display:block !important}}@media (min-width:768px) and (max-width:991px){.visible-sm-inline{display:inline !important}}@media (min-width:768px) and (max-width:991px){.visible-sm-inline-block{display:inline-block !important}}@media (min-width:992px) and (max-width:1199px){.visible-md{display:block !important}table.visible-md{display:table !important}tr.visible-md{display:table-row !important}th.visible-md,td.visible-md{display:table-cell !important}}@media (min-width:992px) and (max-width:1199px){.visible-md-block{display:block !important}}@media (min-width:992px) and (max-width:1199px){.visible-md-inline{display:inline !important}}@media (min-width:992px) and (max-width:1199px){.visible-md-inline-block{display:inline-block !important}}@media (min-width:1200px){.visible-lg{display:block !important}table.visible-lg{display:table !important}tr.visible-lg{display:table-row !important}th.visible-lg,td.visible-lg{display:table-cell !important}}@media (min-width:1200px){.visible-lg-block{display:block !important}}@media (min-width:1200px){.visible-lg-inline{display:inline !important}}@media (min-width:1200px){.visible-lg-inline-block{display:inline-block !important}}@media (max-width:767px){.hidden-xs{display:none !important}}@media (min-width:768px) and (max-width:991px){.hidden-sm{display:none !important}}@media (min-width:992px) and (max-width:1199px){.hidden-md{display:none !important}}@media (min-width:1200px){.hidden-lg{display:none !important}}.visible-print{display:none !important}@media print{.visible-print{display:block !important}table.visible-print{display:table !important}tr.visible-print{display:table-row !important}th.visible-print,td.visible-print{display:table-cell !important}}.visible-print-block{display:none !important}@media print{.visible-print-block{display:block !important}}.visible-print-inline{display:none !important}@media print{.visible-print-inline{display:inline !important}}.visible-print-inline-block{display:none !important}@media print{.visible-print-inline-block{display:inline-block !important}}@media print{.hidden-print{display:none !important}}
        .header-top-navigation{position:relative}.top-navigation-wrp{background-color:#4a4a4a}@media only screen and (max-width:767px){.top-navigation-wrp{background-color:#f1c153}}@media only screen and (max-width:767px){.header-for-mobile{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center}}.burger-menu-wrp{padding:15px 10px;background-color:transparent}.burger-menu-wrp:hover{cursor:pointer}.burger-menu{width:30px;height:2px;background-color:#000;position:relative;-webkit-transition:all .3s;transition:all .3s}.burger-menu:hover{cursor:pointer}.burger-menu:before{bottom:8px}.burger-menu:after,.burger-menu:before{content:"";position:absolute;width:30px;height:2px;background-color:#000;-webkit-transition:all .3s;transition:all .3s}.burger-menu:after{top:8px}.burger-menu.open-menu{width:0}.burger-menu.open-menu:before{bottom:0;-webkit-transform:rotate(50deg);transform:rotate(50deg)}.burger-menu.open-menu:after{top:0;-webkit-transform:rotate(-50deg);transform:rotate(-50deg)}.hidden-menu{display:block;position:absolute;list-style:none;padding:15px 10px 10px;margin:0;-webkit-box-sizing:border-box;box-sizing:border-box;width:100vw;background-color:#fff;top:77px;left:-100vw;-webkit-transition:left .2s;transition:left .2s;z-index:101;text-align:left}.hidden-menu ul:first-child li{padding:15px 0}.hidden-menu ul:first-child a{color:#4a4a4a;font-size:12px;line-height:20px;font-family:Oswald,sans-serif;text-transform:uppercase;font-weight:500}.hidden-menu a:hover{text-decoration:underline}.hidden-menu-ticker{display:none}.btn-menu{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;height:50px;width:50px}.btn-menu:hover{cursor:pointer}.hidden-menu-ticker:checked~.btn-menu{left:160px}.hidden-menu-ticker:checked~.hidden-menu{left:0}.logo{position:absolute;width:200px;z-index:100;right:0;top:0}@media only screen and (max-width:1199px){.logo{width:150px}}@media only screen and (max-width:991px){.logo{width:110px}}@media only screen and (max-width:767px){.logo{position:static;width:auto}}.logo h2{color:#f1c153;font-size:30px;font-family:Oswald,sans-serif}@media only screen and (max-width:1199px){.logo h2{font-size:22.5px}}@media only screen and (max-width:991px){.logo h2{font-size:16.5px}}@media only screen and (max-width:767px){.logo h2{display:none}}.logo-img{background-color:#f1c153;padding:25px 9px 13px}@media only screen and (max-width:991px){.logo-img{padding:15px 0 0}}@media only screen and (max-width:767px){.logo-img{padding:5px}}.logo-img img{width:100%}.top-navigation{-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;-webkit-box-align:center;-ms-flex-align:center;align-items:center;padding:0}.navigation,.top-navigation{display:-webkit-box;display:-ms-flexbox;display:flex}.navigation{margin-left:35px}@media only screen and (max-width:1199px){.navigation{margin-left:22px}}.navigation p{color:#e6e6e6;font-size:13px;line-height:16px;padding:15px}@media only screen and (max-width:1199px){.navigation p{font-size:12px;padding:15px 10px}}@media only screen and (max-width:991px){.navigation p{font-size:10px;padding:15px 3px}}.navigation a:hover{background-color:#3d3d3d}.header-list-wrp{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}.header-list-wrp a{color:#fbfbfb;font-size:14px;line-height:17px;margin-left:20px}@media only screen and (max-width:991px){.header-list-wrp a{font-size:10px}}@media only screen and (max-width:767px){.header-list-wrp a{font-size:16px;color:#000}}@media screen and (max-width:420px){.header-list-wrp a{font-size:14px}}@media screen and (max-width:362px){.header-list-wrp a{font-size:10px}}.header-list-wrp ul{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;-webkit-box-align:center;-ms-flex-align:center;align-items:center;color:#fbfbfb;font-size:12px;line-height:16px}@media only screen and (max-width:991px){.header-list-wrp ul{font-size:10px}}.header-list-wrp li:first-child{color:hsla(0,0%,98%,.521)}.top-menu-container{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;padding:15px 0 15px 50px}@media only screen and (max-width:1199px){.top-menu-container{padding:15px 0 15px 32px}}@media only screen and (max-width:991px){.top-menu-container{padding:0}}@media only screen and (max-width:767px){.top-menu-container{padding:5px 10px}}.search-field-wrp{position:relative;width:45px;margin-right:10px}.search-field-wrp button{position:absolute;right:0;top:-10px;height:35px;width:25px;border:none;background:transparent;display:none}.search-field{-webkit-appearance:textfield;-webkit-box-sizing:content-box;font-size:16px;background:url("/images/search icon.svg?571429645c1f9bf87d87f9a6892df557") no-repeat 100%;border-bottom:1px solid transparent;width:25px;line-height:25px;-webkit-transition:all .5s;transition:all .5s;margin-left:10px;border:none;position:absolute;padding:5px;right:0;top:-14px;outline:none;color:#000}.search-field:focus,.search-field:hover{background-color:#fff}.search-field:focus{line-height:25px;border-bottom:1px solid #ccc;width:150px;padding-right:20px;color:#000;cursor:auto}.search-field:focus~button{display:block}.search-field::-webkit-search-cancel-button,.search-field::-webkit-search-decoration{display:none}.search-input{display:none;width:50vw}@media only screen and (max-width:767px){.search-input{display:block}}.search-input input{color:#9b9b9b;font-size:12px;line-height:16px;outline:none;border:0;background-color:#fff;padding:5px;width:100%}.search-input input::-webkit-input-placeholder{color:#9b9b9b;font-size:12px;line-height:16px}.search-input input:-ms-input-placeholder,.search-input input::-ms-input-placeholder{color:#9b9b9b;font-size:12px;line-height:16px}.search-input input::placeholder{color:#9b9b9b;font-size:12px;line-height:16px}.top-menu{background-color:#fff;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center}@media only screen and (max-width:767px){.top-menu{display:none}}.top-menu li{margin-right:30px}@media only screen and (max-width:1199px){.top-menu li{margin-right:15px}}@media only screen and (max-width:991px){.top-menu li{margin-right:12px}}.top-menu a{color:#4a4a4a;font-size:16px;line-height:25px;font-family:Oswald,sans-serif;text-transform:uppercase;font-weight:700}@media only screen and (max-width:1199px){.top-menu a{font-size:13px}}@media only screen and (max-width:991px){.top-menu a{font-size:12px}}.top-menu a:hover{color:#5f98b9}.top-menu-functional{position:relative}.top-menu-functional,.top-menu-functional a{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center}.top-menu-functional a{margin-right:10px;padding:8px 11px}.top-menu-functional a:hover{background-color:#e5e8ea}.top-menu-functional a:last-child{margin-left:10px}@media only screen and (max-width:767px){.top-menu-functional ul{display:none}}.top-menu-functional img{margin:7px}@media only screen and (max-width:767px){.top-menu-functional img{margin:10px}}.search{-webkit-box-align:center;-ms-flex-align:center;align-items:center}.enter-links,.search{display:-webkit-box;display:-ms-flexbox;display:flex}.enter-links{margin-right:15px}@media only screen and (max-width:767px){.enter-links{margin:0}}.enter-links a{color:#9dacb4;font-family:Oswald;font-size:14px;font-weight:500;line-height:19px}@media only screen and (max-width:991px){.enter-links a{font-size:12px}}.enter-links a:hover{color:#8eb2c7}.in-cart-info{width:100px;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}@media only screen and (max-width:767px){.in-cart-info{display:none}}.in-cart-info p{color:#9dacb4;font-family:HelveticaNeue;font-size:12px;line-height:14px}.in-cart-info span{color:#3d3d3d;font-size:14px;font-weight:700}.top-menu-catalog-wrp{background-color:#fff;padding:0 30px;position:absolute;top:123px;width:100%;left:0;z-index:1000;-webkit-box-shadow:0 2px 4px 0 rgba(0,0,0,.5);box-shadow:0 2px 4px 0 rgba(0,0,0,.5);visibility:hidden;opacity:0}.top-menu-catalog-container{border-top:1px solid #d8d8d8;padding:30px 0}.top-menu-catalog{display:-webkit-box;display:-ms-flexbox;display:flex;padding-left:50px}@media only screen and (max-width:1199px){.top-menu-catalog{padding-left:32px}}.top-menu-catalog-section{width:200px}.top-menu-catalog-section a{color:#4a4a4a;font-family:Oswald;font-size:18px;font-weight:300;line-height:32px}.top-menu-catalog-section a:hover{color:#5f98b9}.top-menu-catalog-section .top-menu-catalog-sale{color:#d8232a}.top-menu-catalog-section .top-menu-catalog-link{color:#5f98b9}.top-menu-catalog-title{color:#4a4a4a;font-family:Oswald;font-size:18px;font-weight:700;line-height:25px;height:40px}.margin-catalog-link{margin-top:25px}.catalog-img{width:100%}.is-open{visibility:visible;opacity:1;display:block}
        .header-slider-wrp .container-fluid{padding:0}.header-slider-wrp .row{margin:0}.slider-item-1{background-position:50%;background-size:cover;height:650px}@media only screen and (max-width:1199px){.slider-item-1{height:560px}}@media only screen and (max-width:991px){.slider-item-1{height:511px}}@media only screen and (max-width:480px){.slider-item-1{height:311px}}.slider-item-2{background:url(/images/slider-img-2.jpg?35ec17c00d8d97f778d98d45220737bf) top no-repeat;background-size:cover;height:650px}@media only screen and (max-width:1199px){.slider-item-2{height:560px}}@media only screen and (max-width:991px){.slider-item-2{height:511px}}@media only screen and (max-width:480px){.slider-item-2{height:311px}}.slider-title{padding-left:100px}.slider-title,.slider-title h2{color:#fff;font-family:Helvetica Neue;font-weight:300}.slider-title h2{font-size:65px;line-height:76px;margin-top:70px}@media only screen and (max-width:991px){.slider-title h2{font-size:45px;line-height:36px}}@media only screen and (max-width:480px){.slider-title h2{font-size:25px;line-height:30px}}.slider-title h3{font-size:55px;line-height:60px;color:#e7e7e7;font-weight:300}@media only screen and (max-width:991px){.slider-title h3{font-size:35px}}@media only screen and (max-width:480px){.slider-title h3{font-size:25px;line-height:30px}}@media only screen and (max-width:480px){.slider-title{padding-left:70px}}.slider-btn-wrp{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}.slider-btn{margin-top:16%}@media only screen and (max-width:1399px){.slider-btn{margin-top:20%}}@media only screen and (max-width:1199px){.slider-btn{margin-top:17%}}@media only screen and (max-width:991px){.slider-btn{margin-top:22%}}@media only screen and (max-width:480px){.slider-btn{margin-top:30px}}.slider-btn p{background-color:#ffbe28;color:#fbfbfb;font-family:Helvetica Neue;font-size:24px;font-weight:500;line-height:44px;text-align:center;padding:10px 90px}@media only screen and (max-width:991px){.slider-btn p{font-size:28px;line-height:35px;padding:10px 70px}}@media only screen and (max-width:480px){.slider-btn p{font-size:25px;line-height:35px;padding:10px 50px}}.slider-btn:focus{outline:none}.slider-btn:hover{background-color:#ffbc20}
        .navigation p, .header-list-wrp ul {
            margin: 0;
        }
        .top-menu{
            margin: 0;
            padding: 0;
        }
        .logo h2 {
            color: #f1c153;
            font-size: 30px;
            font-family: Oswald,sans-serif;
            line-height: 30px;
        }
        .header-slider:not(.slick-initialized) {
            max-height: 650px;
            overflow: hidden;
        }
    </style>

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
        "@type": "Store",
        "name": "GlobalProm",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Украина, ул. Сумская, 37",
            "addressLocality": "Харьков",
            "addressRegion": "Харьковская",
            "postalCode": "61023"
        },
        "logo": "http://globalprom.com.ua/images/logo.jpg",
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

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-42124661-1', 'auto');
        ga('send', 'pageview');

    </script>
</head>