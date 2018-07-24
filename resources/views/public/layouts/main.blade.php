<!DOCTYPE html>
<html lang="ru">
@include('public.layouts.header')

<body class="{{ Request::path()=='/' ? ' home' : '' }}">
@include('public.layouts.header-main')
<main id="main-container">
    @yield('breadcrumbs')
    @yield('content')
</main>
@include('public.layouts.footer')
@include('public.layouts.footer-scripts')
</body>
</html>