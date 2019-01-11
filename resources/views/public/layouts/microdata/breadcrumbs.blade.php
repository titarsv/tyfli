<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
  @foreach ($breadcrumbs as $i => $breadcrumb)
      {{ $i>0?',':'' }}
    @if(!$breadcrumb->last)
      {
        "@type": "ListItem",
        "position": {{ $i+1 }},
        "item":
        {
          "@id": "{{ $breadcrumb->url }}",
          "name": "{{ $breadcrumb->title }}"
        }
      }
    @else
      {
        "@type": "ListItem",
        "position": {{ $i+1 }},
        "item":
        {
          "@id": "{{env('APP_URL')}}/{{ Request::path() }}",
          "name": "{{ $breadcrumb->title }}"
        }
      }
    @endif
  @endforeach
  ]
}
</script>