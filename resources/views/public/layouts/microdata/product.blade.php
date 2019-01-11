<script type='application/ld+json'>
{
  "@context": "http://www.schema.org",
  "@type": "product",
  "logo": "{{env('APP_URL')}}/images/logo.png",
  "name": "{{ $product->name }}",
  "sku": "{{ $product->articul }}",
  @if(!empty($category = $product->main_category()))
  "category": "{{ $category->name }}",
  @endif
  @if(!empty($gallery))
    "image": [
    @foreach($gallery as $i => $image)
      @if(is_object($image))
        {{ $i>0?',':'' }}"{{env('APP_URL')}}{{ $image->url('product') }}"
      @endif
    @endforeach
    ],
    @else
  @if(empty($product->image))
    "image": "{{env('APP_URL')}}{{ $product->image->url() }}",
  @endif
  @endif
  @if(!empty($brand))
  "brand": {
     "@type": "Thing",
     "name": "{{ $brand->name }}"
  },
  @endif
  "description": "{{ !empty($product->description) ? strip_tags($product->description) : $product->name }}",
  "offers": {
    "@type": "Offer",
    "priceCurrency": "UAH",
    "price": "{{ $product->price }}",
    "priceValidUntil": "{{ date('Y-m-d', time() + 86400 * 30) }}",
    "itemCondition": "http://schema.org/NewCondition",
    "availability": "http://schema.org/InStock",
    "url": "{{ env('APP_URL')}}/product/{{ $product->url_alias }}",
    "seller": {
      "@type": "Organization",
      "name": "Tyfli.com"
    }
  }
  @if(isset($product->reviews))
  @php
        $bestRating = 0;
        $sumRating = 0;
        $reviewCount = 0;
        foreach($product->reviews as $review){
            if($review->grade > $bestRating){
                $bestRating = $review->grade;
            }
            $sumRating += $review->grade;
            $reviewCount++;
        }
  @endphp
  @if($reviewCount > 0)
  ,"aggregateRating": {
    "@type": "aggregateRating",
    "ratingValue": "{{ round($sumRating/$reviewCount, 2) }}",
      "bestRating": "{{ $bestRating }}",
      "reviewCount": "{{ $reviewCount }}"
  }
  ,"review": [
  @foreach($product->reviews as $review)
    {
      "@type": "Review",
      "author": "{{ !empty($review->user) ? $review->user->first_name : $review->author }}",
      "datePublished": "{!! $review->created_at !!}",
      "description": "{!! $review->review !!}",
      "reviewRating": {
        "@type": "Rating",
        "bestRating": "5",
        "ratingValue": "{{ $review->grade }}",
        "worstRating": "1"
      }
    }
  @endforeach
  ]
  @endif
@endif
}
</script>