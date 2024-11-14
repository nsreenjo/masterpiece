<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Your Cart
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="header-cart-content flex-w js-pscroll">
            @if(session('cart') && count(session('cart')) > 0)
                <ul class="header-cart-wrapitem w-full">
                    @foreach(session('cart') as $productId => $item)
                        <li class="header-cart-item flex-w flex-t m-b-12">
                            <div class="header-cart-item-img">
                                <img src="{{ asset('assets/images/' . $item['product_image']) }}" alt="IMG">
                            </div>

                            <div class="header-cart-item-txt p-t-8">
                                <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                    {{ $item['product_name'] }}
                                </a>

                                <span class="header-cart-item-info">
                                    {{ $item['quantity'] }} x ${{ $item['product_price'] }}
                                </span>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <div class="w-full">
                    <div class="header-cart-total w-full p-tb-40">
                        Total: ${{ array_sum(array_map(function ($item) {
                            return $item['quantity'] * $item['product_price'];
                        }, session('cart'))) }}
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a href="{{ route('cart.index') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            View Cart
                        </a>

                        <a href="{{ route('cart.checkout') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Check Out
                        </a>
                    </div>
                </div>
            @else
                <p>Your cart is empty.</p>
            @endif
        </div>
    </div>
</div>
