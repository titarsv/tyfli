<!DOCTYPE html>
<html lang="ru">
@include('public.layouts.header')

<body class="{{ Request::path()=='/' ? ' home' : '' }}">
    @include('public.layouts.header-main')

    @yield('breadcrumbs')
    @yield('content')
    @include('public.layouts.footer')
	@include('public.layouts.footer-scripts')
</body>
</html>