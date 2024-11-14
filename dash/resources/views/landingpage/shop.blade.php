@include('landingpage.include.top')
@include('landingpage.include.side')
@include('landingpage.include.cart')
@include('landingpage.include.script')

<style>
/* Container styling */
.product-grid-container {
    width: 100%;
    padding: 20px;
    box-sizing: border-box;
}

/* Header styling */
.grid-header {
    margin-bottom: 20px;
}

/* Grid layout */
.product-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: start;
}

.single-card {
    justify-content: start;
}

/* Card styling */
.product-card {
    background-color: #f8f9fa;
    border: 1px solid #ddd;
    border-radius: 8px;
    width: 100%;
    max-width: 250px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

/* Image and button styling */
.product-image {
    position: relative;
    width: 100%;
    height: auto;
    overflow: hidden;
}

.product-image img {
    width: 100%;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
}

.quick-view-btn {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: #fff;
    padding: 8px 12px;
    border-radius: 4px;
    text-decoration: none;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.product-image:hover .quick-view-btn {
    opacity: 1;
}

/* Product info styling */
.product-info {
    padding: 10px;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.product-name {
    color: #333;
    font-size: 16px;
    font-weight: bold;
    margin: 10px 0 5px;
    text-decoration: none;
    transition: color 0.3s ease;
}

.product-name:hover {
    color: #007bff;
}

.product-price {
    font-size: 14px;
    color: #888;
    margin-bottom: 10px;
}

.wishlist-btn {
    margin-top: 5px;
    cursor: pointer;
}

.wishlist-btn img {
    width: 20px;
    height: 20px;
    transition: transform 0.3s ease;
}

.wishlist-btn:hover img {
    transform: scale(1.1);
}


</style>

	<div class="bg0 m-t-23 p-b-140">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
			<form action="{{ route('shop.index') }}" method="GET" >
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
								<span class="product-price">{{ number_format($product->product_price, 2) }} JD</span>
								<a href="#" class="wishlist-btn">
									<img src="{{ asset('assets/images/icons/icon-heart-01.png') }}" alt="Add to Wishlist">
								</a>
							</div>
						</div>
					@endforeach
				</div>
			</div>



       	 </div>
    </div>
</div>

