@include('landingpage.include.top')
@include('landingpage.include.cart')
@include('landingpage.include.script')


<!-- Cart -->



<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Shoping Cart
        </span>
    </div>
</div>


<!-- Shoping Cart -->
<form class="bg0 p-t-75 p-b-85">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">

                            <tr class="table_head">
                                <th class="column-1">Product</th>
                                <th class="column-2">Name</th>
                                <th class="column-3">Price</th>
                                <th class="column-4">Quantity</th>
                                <th class="column-5">Total</th>
                            </tr>
                            @foreach ( $cart as $cartItem)

                            @php
                            $product = \App\Models\product::find($cartItem['product_id']);
                            @endphp


                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="{{ asset('uploads/products/' . $product->product_image) }}" alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2">{{ $product->product_name }}</td>
                                <td class="column-3">{{ $product->product_price }}</td>
                                <td class="column-4">
                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity" value="{{ $cartItem['quantity'] }}" min="1" max="{{ $product->quantity }}" required>

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="column-5">{{ $cartItem['price'] * $cartItem['quantity'] }}  JOD</td>
                                <td class="column-6">
                                    <!-- Remove Button -->
                                    <a href="{{ route('cart.remove', $cartItem['product_id']) }}"   style="margin-right: 10px" class="btn btn-danger btn-sm">
                                        Remove
                                    </a>
                                </td>
                            </tr>

                            @endforeach


                        </table>
                    </div>

               
                </div>
            </div>

          <!-- Cart Totals -->
<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
        <h4 class="mtext-109 cl2 p-b-30">
            Cart Totals
        </h4>

        <!-- Subtotal -->
        <div class="flex-w flex-t bor12 p-b-13">
            <div class="size-208">
                <span class="stext-110 cl2">
                    Subtotal:
                </span>
            </div>
            <div class="size-209">
                <span class="mtext-110 cl2">
                     {{ $subtotal }} JOD
                </span>
            </div>
        </div>

        <!-- Shipping Information -->
       <div class="flex-w flex-t bor12 p-t-15 p-b-30">
    <div class="size-208 w-full-ssm">
        <span class="stext-110 cl2">
            Shipping:
        </span>
    </div>

    <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
        <p class="stext-111 cl6 p-t-2">
    Your order will be delivered to the provided address. Please double check your address, or contact us if you need any assistance with the delivery.
        </p>

        <div class="p-t-15">
            <span class="stext-112 cl8">
                Calculate Shipping
            </span>

            <!-- Country Input -->
            <div class="bor8 bg0 m-b-12 m-t-9">
                <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="country" placeholder="Enter your country">
            </div>

            <!-- Address Input -->
            <div class="bor8 bg0 m-b-12">
                <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" placeholder="Enter your address">
            </div>

            <!-- Phone Number Input -->
            <div class="bor8 bg0 m-b-22">
                <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone" placeholder="Enter your phone number">
            </div>

            <!-- Update Totals Button -->
            <div class="flex-w">
                <div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
                    Update Totals
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Total -->
<div class="flex-w flex-t p-t-27 p-b-33">
    <div class="size-208">
        <span class="mtext-101 cl2">
            Total:
        </span>
    </div>
    <div class="size-209 p-t-1">
        <span class="mtext-110 cl2">
            {{ $subtotal }} JOD
        </span>
    </div>
</div>

<!-- Proceed to Checkout Button -->
<a href="{{ route('cart.checkout') }}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
     Checkout
</a>


    </div>
</div>

        </div>
    </div>
</form>






<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <i class="zmdi zmdi-chevron-up"></i>
    </span>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // تحديد كل أزرار الزيادة والنقصان
    const decreaseBtns = document.querySelectorAll('.btn-num-product-down');
    const increaseBtns = document.querySelectorAll('.btn-num-product-up');

    // التفاعل مع زر الزيادة
    increaseBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            const input = btn.closest('div').querySelector('input');
            let quantity = parseInt(input.value);
            const maxQuantity = parseInt(input.getAttribute('max'));

            if (quantity < maxQuantity) {
                input.value = quantity + 1;
                updateCart(input); // تحديث السلة
            }
        });
    });

    // التفاعل مع زر النقصان
    decreaseBtns.forEach(btn => {
        btn.addEventListener('click', function () {
            const input = btn.closest('div').querySelector('input');
            let quantity = parseInt(input.value);

            if (quantity > 1) {
                input.value = quantity - 1;
                updateCart(input); // تحديث السلة
            }
        });
    });

    // دالة لتحديث السلة بعد تعديل الكمية
    function updateCart(input) {
        const productId = input.closest('tr').querySelector('.column-1 img').getAttribute('src').split('/').pop().split('.')[0];
        const quantity = input.value;

        // إرسال البيانات إلى السيرفر باستخدام AJAX
        fetch('/cart/update', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ product_id: productId, quantity: quantity })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload(); // إعادة تحميل الصفحة لتحديث السلة
            } else {
                alert('Error updating cart');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
});

</script>