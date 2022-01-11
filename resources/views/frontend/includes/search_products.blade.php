<span id="search-item">
    @foreach ($product_search_result as $product)
        <li><a href="{{ route('frontend.single.product',$product->slug) }}">{{ $product->title }}</a></li>
    @endforeach
    <li></li>
</span>
