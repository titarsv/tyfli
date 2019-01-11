<meta property="og:locale" content="ru_RU" />
@if(!empty($title))
<meta property="og:title" content="{{ $title }}" />
@endif
@if(!empty($description))
    <meta property="og:description" content="{{ $description }}" />
@endif
<meta property="og:url" content="{{env('APP_URL')}}/{{ Request::path() }}" />
@if(!empty($image))
    <meta property="og:image" content="{{env('APP_URL')}}{{ $image }}" />
@endif