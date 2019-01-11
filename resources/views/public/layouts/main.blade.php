<!DOCTYPE html>
<html lang="ru" prefix="og: http://ogp.me/ns#">
@include('public.layouts.header')

<body class="{{ Request::path()=='/' ? ' home' : '' }}">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MLBD39H"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
@include('public.layouts.header-main', ['root_category' => isset($root_category) ? $root_category : false])
<main id="main-container">
    @yield('breadcrumbs')
    @yield('content')
</main>
@include('public.layouts.footer')
@include('public.layouts.footer-scripts')
</body>
</html>