<h5 class="section-title style-1 mb-30">Category</h5>
<ul>
    @foreach ($categories as $catItem)
        <li>
            <a href="{{ route('frontend.category.wise.product',$catItem->slug) }}"> <img src="{{ asset('photo/category') }}/{{ $catItem->image }}" alt="" />{{ $catItem->name }}</a><span class="count">{{ $catItem->product->count() }}</span>
        </li>
    @endforeach
</ul>
