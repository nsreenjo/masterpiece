@include('landingpage.include.top')
@include('landingpage.include.side')
@include('landingpage.include.cart')
@include('landingpage.include.script')


<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('assets/images/2export-20241114095556Qso2.png') }}'); height: 300px;">
    <h2 class="ltext-105 cl0" style="text-align: left; padding-left: 30px;">
        Fill the cart with ease
    </h2>
</section>




<div class="bg0 m-t-23 p-b-140">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    All Products
                </button>



                @foreach($mall->categories as $category)
                <form action="{{ route('shop.index') }}" method="GET">
                <input type="hidden" name="cat_id" value="{{ $category->category_id }}">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{ $category->category_name }}">
                        {{ $category->category_name }}
                    </button>
                    </form>
                @endforeach
            </div>

            <div class="flex-w flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Filter
                </div>
                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Search
                </div>
            </div>

            <!-- Product Grid -->
            <div class="row isotope-grid">
                @foreach($mall->categories as $category)
                    @foreach($category->products as $product)
                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $category->category_name }}">
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="{{ asset('uploads/products/' . $product->product_image) }}" alt="IMG-PRODUCT">
                                    <a href="{{ route('productDetails.show', ['id' => $product->product_id]) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                         View
                                    </a>
                                </div>
                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l">
                                        <a href="{{ route('productDetails.show', ['id' => $product->product_id]) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            {{ $product->product_name }}
                                        </a>
                                        <span class="stext-105 cl3">
                                            {{ number_format($product->product_price, 2) }} JD
                                        </span>
                                    </div>

                                    
                                    <div class="block2-txt-child2 flex-r p-t-3">
                                        <a href="#" class="btn-addcart-b2 dis-block pos-relative js-addcart-b2" data-product-id="{{ $product->product_id }}">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
    $('.js-addcart-b2').on('click', function(e) {
        e.preventDefault();
        var productId = $(this).data('product-id');

        // تحقق مما إذا كان المستخدم مسجلاً دخول أم لا
        @if(auth()->check())
            var userId = {{ auth()->user()->user_id }};  // المستخدم مسجل دخول
        @else
            var userId = null;  // المستخدم غير مسجل دخول
        @endif

        // إذا لم يكن المستخدم مسجلاً دخول، يظهر تنبيه لتسجيل الدخول
        if (userId === null) {
            swal('Please log in', 'You need to log in to add items to the cart.', 'warning');
            return;
        }

        // AJAX request to add product to cart
        $.ajax({
            url: '/add-to-cart',  // استبدلها بالمسار الفعلي لإضافة إلى السلة
            method: 'POST',
            data: {
                user_id: userId,
                product_id: productId,
                _token: '{{ csrf_token() }}'  // CSRF token للحماية
            },
            success: function(response) {
                // إظهار رسالة النجاح أو تحديث رمز السلة
                swal('Product added to cart', '', 'success');
            },
            error: function() {
                swal('Something went wrong', 'Please try again later', 'error');
            }
        });
    });
</script>

@include('landingpage.include.footer')
