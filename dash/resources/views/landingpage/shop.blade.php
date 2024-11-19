@include('landingpage.include.top')
@include('landingpage.include.side')
@include('landingpage.include.cart')
@include('landingpage.include.script')

<style>
    /* تصميم الحاوية */
    .product-grid-container {
        width: 100%;
        padding: 20px;
        box-sizing: border-box;
        margin: 0 auto;
    }

    /* تحسين الشبكة */
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        justify-content: center;
    }

    /* تصميم البطاقة */
    .product-card {
        background-color: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        overflow: hidden;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .product-card:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    /* تصميم الصورة */
    .product-image img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-bottom: 1px solid #ddd;
    }

    /* زر العرض السريع */
    .quick-view-btn {
        position: absolute;
        bottom: 15px;
        left: 50%;
        transform: translateX(-50%);
        background-color: rgba(0, 0, 0, 0.7);
        color: #fff;
        padding: 8px 15px;
        border-radius: 5px;
        font-size: 14px;
        text-decoration: none;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .product-image:hover .quick-view-btn {
        opacity: 1;
    }

    /* معلومات المنتج */
    .product-info {
        padding: 15px;
    }

    .product-name {
        color: #333;
        font-size: 16px;
        font-weight: 600;
        margin: 10px 0;
        text-decoration: none;
    }

    .product-name:hover {
        color: #007bff;
    }

    .product-price {
        font-size: 14px;
        color: #888;
        margin: 5px 0;
    }

    .wishlist-btn img {
        width: 25px;
        height: 25px;
        margin-top: 10px;
        transition: transform 0.3s ease;
    }

    .wishlist-btn:hover img {
        transform: scale(1.2);
    }

    /* زر الفئات */
    button.stext-106 {
        background-color: #f8f9fa;
        color: #333;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 8px 15px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    button.stext-106:hover {
        background-color: #007bff;
        color: #fff;
    }

</style>


<div class="bg0 m-t-23 p-b-140">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <form action="{{ route('shop.index') }}" method="GET">
                    <button type="submit" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                        All Products
                    </button>
                </form>

                <!-- Corrected foreach loop with @ symbol -->
                @foreach ($allcategory as $category)
                <form action="{{ route('shop.index') }}" method="GET">
                    <input type="hidden" name="cat_id" value="{{ $category->category_id }}">
                    <button type="submit" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
                        {{ $category->category_name }}
                    </button>
                </form>
                @endforeach
            </div>

            <!-- Remaining code unchanged -->
            <div class="flex-w flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter" onclick="toggleFilter()">
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

            <!-- Hidden filter names container -->
            <div id="filter-names" class="m-tb-10" style="display: none;">
                <ul>
                    <li>Aswaq Altawfeer</li>
                    <li>Mamon Center</li>
                    <li>Ahmad Almasry</li>
                </ul>
            </div>

            <script>
                function toggleFilter() {
                    const filterNames = document.getElementById("filter-names");
                    filterNames.style.display = filterNames.style.display === "none" ? "block" : "none";
                }

            </script>


            <!-- Search and Filter sections -->
            <!-- ... -->

            <!-- Product Grid -->
            <!-- Product Grid -->
            <div class="product-grid-container ">
                <div class="grid-header">
                    <!-- Filter buttons and other components here -->
                </div>

                <div class="product-grid {{ count($allproduct) === 1 ? 'single-card' : '' }}">
                    @foreach($allproduct as $product)
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('uploads/products/' . $product->product_image) }}" alt="IMG-PRODUCT">
                            <a href="{{ route('productDetails.show', ['id' => $product->product_id]) }}" class="quick-view-btn">
                                Quick View
                            </a>
                        </div>
                        <div class="product-info">
                            <a href="{{ route('productDetails.show', ['id' => $product->product_id]) }}" class="product-name">
                                {{ $product->product_name }}
                            </a>
                            <span class="product-price" style="direction: rtl; text-align: right;">
                                JOD {{ number_format($product->product_price, 2) }}
                            </span>
                            <a href="#" class="wishlist-btn">
                            </a>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>



        </div>
    </div>
</div>
