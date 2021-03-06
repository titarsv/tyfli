@if ($breadcrumbs)
    @include('public.layouts.microdata.breadcrumbs', ['breadcrumbs' => $breadcrumbs])
    <div class="container hidden-xs">
        <div class="row">
            <div class="col-md-12">
                <div class="site-path">
                    @foreach ($breadcrumbs as $breadcrumb)
                        @if (!$breadcrumb->last)
                            <a href="{{ $breadcrumb->url }}" class="site-path-link">{{ $breadcrumb->title }}</a>
                        @else
                            <a href="javascript:void(0);" class="site-path-link-active">{{ $breadcrumb->title }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
