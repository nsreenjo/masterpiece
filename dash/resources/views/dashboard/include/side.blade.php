<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="" class="app-brand-link">
            <span class="app-brand-logo demo me-1">
                <span style="color: var(--bs-primary)">
                    <!-- Add your logo here if needed -->
                </span>
            </span>
            <span class="app-brand-text demo menu-text fw-semibold ms-2">Dalilak</span>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard Link -->
        <li class="menu-item">
            <a href="" class="menu-link">
                <i class="menu-icon tf-icons ri-bank-card-2-line"></i>
                <div data-i18n="Basic">Dashboard</div>
            </a>
        </li>

        <!-- Show 'All Users' and 'Mall' only for superAdmin -->
        @if(Auth::user() && Auth::user()->type === 'superAdmin')
            <li class="menu-item">
                <a href="{{route('users.index')}}" class="menu-link">
                    <i class="ri-user-fill" style="padding-right: 8px;"></i>
                    <div data-i18n="Basic">All Users</div>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{route('malls.index')}}" class="menu-link">
                    <i class="ri-store-2-fill" style="padding-right: 8px;"></i>
                    <div data-i18n="Basic">Mall</div>
                </a>
            </li>
        @endif

        <!-- Categories and Products accessible to all users -->
        <li class="menu-item">
            <a href="{{route('categories.index')}}" class="menu-link">
                <i class="ri-store-fill" style="padding-right: 8px;"></i>
                <div data-i18n="Basic">Category</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{route('products.index')}}" class="menu-link">
                <i class="ri-product-hunt-line" style="padding-right: 8px;"></i>
                <div data-i18n="Basic">Products</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{route('comments.index')}}" class="menu-link">
                <i class="ri-chat-3-fill" style="padding-right: 8px;"></i>
                <div data-i18n="Basic">Comments</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('comments.index')}}" class="menu-link">
                <i class="ri-chat-3-fill" style="padding-right: 8px;"></i>
                <div data-i18n="Basic">Contant</div>
            </a>
        </li> 

        <li class="menu-item">
            <a href="{{route('orders.index')}}" class="menu-link">
                <i class="ri-list-unordered"  style="padding-right: 8px;"></i>
                <div data-i18n="Basic">order</div>
            </a>
        </li>

    </ul>
</aside>
