<!-- Navigation -->


@extends('layouts.main')

@section('title')
    <title>Fish - Home</title>
@endsection

@section('css')
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/mdb-ui-kit"></script>
    <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.2/dist/perfect-scrollbar.min.js"></script>

    <script type="text/javascript">
        // SideNav Initialization
        var sideNavScrollbar = document.querySelector('.custom-scrollbar');
        Ps.initialize(sideNavScrollbar);
        $(".button-collapse").sideNav();
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function addToCart(event) {
                event.preventDefault();
                let urlCart = $(this).data('url');
                $.ajax({
                    type: "GET",
                    url: urlCart,
                    dataType: 'json',
                    success: function(data) {
                        if (data.code === 200) {
                            alert('them sp vao do hang thanh cong')
                        }
                    },
                    error: function() {

                    }
                });
            }

            $(document).on('click', '.add_to_cart', addToCart);
        });
    </script>
@endsection

@section('body')

    <body class="product-v1 hidden-sn white-skin animated">
    @endsection

    @section('content')
        <!-- Main Container -->
        <!-- Main Container -->
        <div class="container mt-5 pt-3">

            <!-- Section: Product detail -->
            <section id="productDetails" class="pb-5">

                <!-- News card -->
                <div class="card mt-5 hoverable">

                    <div class="row mt-5">

                        <div class="col-lg-6">

                            <!-- Carousel Wrapper -->
                            <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails"
                                data-ride="carousel">

                                <!-- Slides -->
                                @php
                                    $baseUrl = config('app.baseUrl');
                                @endphp
                                <div class="carousel-inner text-center text-md-left" role="listbox">
                                    <div class="carousel-item active">

                                        <img src="{{ $baseUrl . $product->feature_image_path }}" class="img-card2">

                                    </div>
                                    @foreach ($product->images as $value => $item)
                                        <div class="carousel-item">

                                            <img src="{{ $baseUrl . $item->image_path }}" class="img-card2">

                                        </div>
                                    @endforeach


                                </div>
                                <!-- Slides -->

                                <!-- Thumbnails -->
                                <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">

                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>

                                    <span class="sr-only">Previous</span>

                                </a>

                                <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">

                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>

                                    <span class="sr-only">Next</span>

                                </a>
                                <!-- Thumbnails -->

                            </div>
                            <!-- Carousel Wrapper -->

                        </div>

                        <div class="col-lg-5 mr-3 text-center text-md-left">

                            <h2
                                class="h2-responsive text-center text-md-left product-name font-weight-bold blue-text mb-1 ml-xl-0 ml-4">

                                <strong>{{ $product->name }}</strong>

                            </h2>



                            <h3 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4 mt-3">
                                <span
                                    class="h4-responsive text-center text-md-left product-name font-weight-bold  mb-1 ml-xl-0 ml-4">
                                    Giá bán :
                                </span>
                                @if ($product->stock === 1)
                                    <span class="red-text font-weight-bold">

                                        <strong>{{ number_format($product->price_sale) }} VND</strong>

                                    </span>

                                    <span class="black-text">

                                        <small>

                                            <s>{{ number_format($product->price) }} VND</s>

                                        </small>

                                    </span>
                                @else
                                    <span class="black-text font-weight-bold">

                                        <strong>{{ number_format($product->price) }} VND</strong>

                                    </span>
                                @endif

                            </h3>
                            <h4>

                                <strong>Tổng đánh giá</strong>

                            </h4>

                            <ul class="rating">

                                @for ($i = 0; $i < $rating; $i++)
                                    <li>

                                        <i class="fas fa-star blue-text"></i>

                                    </li>
                                @endfor


                            </ul>

                            <!-- Accordion wrapper -->
                            <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

                                <!-- Accordion card -->
                                <div class="card">

                                    <!-- Card header -->
                                    <div class="card-header" role="tab" id="headingOne1">

                                        <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1"
                                            aria-expanded="true" aria-controls="collapseOne1">

                                            <h5 class="mb-0">

                                                Mô tả

                                                <i class="fas fa-angle-down rotate-icon"></i>

                                            </h5>

                                        </a>

                                    </div>

                                    <!-- Card body -->
                                    <div id="collapseOne1" class="collapse show" role="tabpanel"
                                        aria-labelledby="headingOne1" data-parent="#accordionEx">

                                        <div class="card-body">

                                            {!! $product->content !!}


                                        </div>

                                    </div>

                                </div>
                                <!-- Accordion card -->

                                {{-- <!-- Accordion card -->
                                <div class="card">

                                    <!-- Card header -->
                                    <div class="card-header" role="tab" id="headingTwo2">

                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx"
                                            href="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">

                                            <h5 class="mb-0">

                                                Details

                                                <i class="fas fa-angle-down rotate-icon"></i>

                                            </h5>

                                        </a>

                                    </div>

                                    <!-- Card body -->
                                    <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
                                        data-parent="#accordionEx">

                                        <div class="card-body">

                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3
                                            wolf moon officia aute,

                                            non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                            eiusmod.
                                            Brunch 3 wolf
                                            moon

                                            tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                            shoreditch et.

                                        </div>

                                    </div>

                                </div>
                                <!-- Accordion card -->

                                <!-- Accordion card -->
                                <div class="card">

                                    <!-- Card header -->
                                    <div class="card-header" role="tab" id="headingThree3">

                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx"
                                            href="#collapseThree3" aria-expanded="false" aria-controls="collapseThree3">

                                            <h5 class="mb-0">

                                                Shipping

                                                <i class="fas fa-angle-down rotate-icon"></i>

                                            </h5>

                                        </a>

                                    </div>

                                    <!-- Card body -->
                                    <div id="collapseThree3" class="collapse" role="tabpanel"
                                        aria-labelledby="headingThree3" data-parent="#accordionEx">

                                        <div class="card-body">

                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3
                                            wolf moon officia aute,

                                            non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                            eiusmod.
                                            Brunch 3 wolf
                                            moon

                                            tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                                            shoreditch et.

                                        </div>

                                    </div>

                                </div>
                                <!-- Accordion card --> --}}

                            </div>
                            <!-- Accordion wrapper -->

                            <!-- Add to Cart -->
                            <section class="color">

                                <div class="mt-5">

                                    <div class="row mt-3 mb-4">

                                        <div class="col-md-12 text-center text-md-left text-md-right">

                                            <a class="btn btn-primary btn-rounded add_to_cart"
                                                data-url="{{ route('product.addToCart', ['id' => $product->id]) }}">

                                                <i class="fas fa-cart-plus mr-2" aria-hidden="true"></i> Thêm vào giỏ
                                                hàng</a>

                                        </div>

                                    </div>

                                </div>

                            </section>
                            <!-- Add to Cart -->

                        </div>

                    </div>

                </div>

            </section>

            <!-- Section: Product detail -->
            <div class="divider-new">

                <h3 class="h3-responsive font-weight-bold blue-text mx-3">Product Reviews</h3>

            </div>

            <!-- Product Reviews -->
            <section id="reviews" class="pb-5">
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">

                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>

                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-danger alert-block">

                        <button type="button" class="close" data-dismiss="alert">×</button>

                        <strong>{{ $message }}</strong>

                    </div>
                @endif
                <!-- Main wrapper -->
                <div class="comments-list text-center text-md-left">
                    @if ($product->reviews->count() > 0)
                        @foreach ($product->reviews as $review)
                            <div class="row mb-5">

                                <!-- Image column -->
                                <div class="col-sm-2 col-12 mb-3">

                                    <img src="https://mdbootstrap.com/img/Photos/Avatars/img ({{ $review->customer->id }}).jpg"
                                        alt="sample image" class="avatar rounded-circle z-depth-1-half">
                                </div>
                                <!-- Image column -->

                                <!-- Content column -->
                                <div class="col-sm-10 col-12">

                                    <a>

                                        <h5 class="user-name font-weight-bold">{{ $review->customer->name }}</h5>

                                    </a>

                                    <!-- Rating -->
                                    <ul class="rating">

                                        @for ($i = 0; $i < $review->rating; $i++)
                                            <li>

                                                <i class="fas fa-star blue-text"></i>

                                            </li>
                                        @endfor


                                    </ul>

                                    <div class="card-data">

                                        <ul class="list-unstyled mb-1">

                                            <li class="comment-date font-small grey-text">

                                                <i class="far fa-clock-o"></i> {{ $review->created_at->format('Y-m-d') }}
                                            </li>

                                        </ul>

                                    </div>

                                    <p class="dark-grey-text article">{{ $review->comment }}</p>

                                </div>
                                <!-- Content column -->

                            </div>
                        @endforeach
                    @else
                        <p>Chưa có đánh giá nào cho sản phẩm này.</p>
                    @endif

                    <!-- First row -->

                    <!-- First row -->


                </div>
                <!-- Main wrapper -->
                <form action="{{ route('storeReview', $product->id) }}" method="POST" style="width: 100% ;">
                    @csrf
                    <!-- Message input -->
                    <div class="form-outline mb-4">
                        <textarea class="form-control" rows="4" placeholder="Message" name="comment"></textarea>
                    </div>

                    <!-- Checkbox -->
                    <label class="form-label d-flex justify-content-center mb-4">Đánh giá</label>
                    <div class="form-check d-flex justify-content-center mb-4">
                        <div class="range" data-mdb-range-init>
                            <input type="range" class="form-range" min="1" max="5" step="1"
                                name="rating" />
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Send</button>

                </form>

            </section>

            <!-- Product Reviews -->
            <div class="divider-new">

                <h3 class="h3-responsive font-weight-bold blue-text mx-3">Sản phẩm liên quan</h3>

            </div>

            <!-- Section: Products v.5 -->
            <section id="products" class="pb-5">
                <!-- Carousel Wrapper -->
                <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

                    <!-- Controls -->
                    <div class="controls-top">

                        <a class="btn-floating primary-color" href="#multi-item-example" data-slide="prev">

                            <i class="fas fa-chevron-left"></i>

                        </a>

                        <a class="btn-floating primary-color" href="#multi-item-example" data-slide="next">

                            <i class="fas fa-chevron-right"></i>

                        </a>

                    </div>
                    <!-- Controls -->

                    <!-- Indicators -->
                    <ol class="carousel-indicators">

                        <li class="primary-color" data-target="#multi-item-example" data-slide-to="0" class="active">
                        </li>

                        <li class="primary-color" data-target="#multi-item-example" data-slide-to="1"></li>

                        <li class="primary-color" data-target="#multi-item-example" data-slide-to="2"></li>

                    </ol>
                    <!-- Indicators -->

                    <!-- Slides -->
                    <div class="carousel-inner" role="listbox">
                        <!-- First slide -->
                        @for ($i = 0; $i < 3; $i++)
                            <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                @foreach ($productOfCategory as $key => $value)
                                    @if ($key < 3)
                                        <!-- Ngắt sau khi chạy đến key thứ 3 -->
                                        <div
                                            class="col-md-4 mb-4 {{ $key == 0 ? '' : 'clearfix d-none d-md-block mb-4' }}">

                                            <!-- Card -->
                                            <div class="card card-ecommerce ">

                                                <!-- Card image -->
                                                <div class="view overlay">

                                                    <img src="{{ $baseUrl . $value->feature_image_path }}"
                                                        class="img-card" alt="">

                                                    <a>

                                                        <div class="mask rgba-white-slight"></div>

                                                    </a>

                                                </div>
                                                <!-- Card image -->

                                                <!-- Card content -->
                                                <div class="card-body">

                                                    <!-- Category & Title -->
                                                    <h5 class="card-title mb-1">

                                                        <strong>

                                                            <a href="{{ route('detailProduct', ['slug' => $value->slug, 'id' => $value->id]) }}"
                                                                class="dark-grey-text">{{ $value->name }}</a>

                                                        </strong>

                                                    </h5>

                                                    <span class="badge badge-danger mb-2">bestseller</span>

                                                    <!-- Card footer -->
                                                    <div class="card-footer pb-0">

                                                        <div class="row mb-0">

                                                            @if ($value->stock === 1)
                                                                <span class="red-text font-weight-bold">

                                                                    <strong>{{ number_format($value->price_sale) }}
                                                                        VND</strong>

                                                                </span>

                                                                <span class="black-text">

                                                                    <small>

                                                                        <s>{{ number_format($value->price) }} VND</s>

                                                                    </small>

                                                                </span>
                                                            @else
                                                                <span class="black-text font-weight-bold">

                                                                    <strong>{{ number_format($value->price) }}
                                                                        VND</strong>

                                                                </span>
                                                            @endif

                                                            <span class="float-right">

                                                                <a class="add_to_cart" data-toggle="tooltip"
                                                                    data-placement="top" title="Thêm vào giỏ hàng" data-url="{{ route('product.addToCart', ['id' => $product->id]) }}">

                                                                    <i class="fas fa-shopping-cart ml-3"></i>

                                                                </a>

                                                            </span>

                                                        </div>

                                                    </div>

                                                </div>
                                                <!-- Card content -->

                                            </div>
                                            <!-- Card -->

                                        </div>
                                    @else
                                    @break

                                    <!-- Ngắt vòng lặp foreach -->
                                @endif
                            @endforeach
                        </div>
                        <!-- First slide -->
                    @endfor


                </div>
                <!-- Slides -->

            </div>
            <!-- Carousel Wrapper -->

        </section>
        <!-- Section: values v.5 -->

    </div>
    <!-- Main Container -->

    <!-- Cart Modal -->
    <div class="modal fade cart-modal" id="cart-modal-ex" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <!-- Content -->
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header">

                    <h4 class="modal-title font-weight-bold dark-grey-text" id="myModalLabel">Your cart</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <!-- Body -->
                <div class="modal-body">

                    <table class="table table-hover">

                        <thead>

                            <tr>

                                <th>#</th>

                                <th>Product name</th>

                                <th>Price</th>

                                <th>Remove</th>

                            </tr>

                        </thead>

                        <tbody>

                            <tr>

                                <th scope="row">1</th>

                                <td>Product 1</td>

                                <td>100$</td>

                                <td>

                                    <a>

                                        <i class="fas fa-eraser"></i>

                                    </a>

                                </td>

                            </tr>

                            <tr>

                                <th scope="row">2</th>

                                <td>Product 2</td>

                                <td>100$</td>

                                <td>

                                    <a>

                                        <i class="fas fa-eraser"></i>

                                    </a>

                                </td>

                            </tr>

                            <tr>

                                <th scope="row">3</th>

                                <td>Product 3</td>

                                <td>100$</td>

                                <td>

                                    <a>

                                        <i class="fas fa-eraser"></i>

                                    </a>

                                </td>

                            </tr>

                            <tr>

                                <th scope="row">4</th>

                                <td>Product 4</td>

                                <td>100$</td>

                                <td>

                                    <a>

                                        <i class="fas fa-eraser"></i>

                                    </a>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                    <button class="btn btn-primary btn-rounded btn-sm">Checkout</button>

                </div>

                <!-- Footer -->
                <div class="modal-footer">

                    <button type="button" class="btn blue darken-3 btn-rounded btn-sm"
                        data-dismiss="modal">Close</button>

                </div>

            </div>
            <!-- Content -->

        </div>

    </div>
    <!-- Cart Modal -->


    <!-- Main Container -->
@endsection
