<div class="col-lg-4 col-md-12 mb-4 rounded">

    <!-- Section: Categories -->
    <section class="section">

        <ul class="list-group z-depth-1">
            @foreach ($categories as $key => $value)
                <li class="list-group-item d-flex justify-content-between align-items-center">

                    <a class="dark-grey-text font-small" href="{{ route('category.product',['slug' => $value->slug, 'id' => $value->id]) }}"><i class="{{ iconFontAwsomeware($key) }}"
                            aria-hidden="true"></i>
                        {{ $value->name }}</a>
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($value->categoryChil as $key)
                        @php
                            $productCount = $products->where('category_id', $key->id)->count();
                            $count += $productCount;
                        @endphp
                    @endforeach
                    @if ($count > 0)
                        <a href=""></a>
                        <span class="badge badge-danger badge-pill">{{ $count }}</span>
                    @else
                        <a href=""></a>
                        <span class="badge badge-danger badge-pill">{{ 0 }}</span>
                    @endif



                </li>
            @endforeach

        </ul>

    </section>
    <!-- Section: Categories -->

</div>
