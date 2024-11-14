<!-- Banner -->





<div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="container">
        <div class="row">
            @foreach($frontmalls as $mall)
            <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w text-center">
                    <!-- Mall Image with Overlay -->
                    <div class="block1-img pos-relative">
                        <img src="{{ asset('uploads/malls/' . $mall->mall_image) }}" alt="IMG-BANNER">

                        <!-- Overlay with View Mall Button -->
                        <a href="{{ route('mall.show', ['mall_id' => $mall->mall_id]) }}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child2 trans-05 block1-overlay text-center">
                                <span class="block1-link stext-101 cl0 trans-09 p-t-10">
                                    View Mall
                                </span>
                            </div>
                        </a>
                    </div>

                    <!-- Name and Description under the image -->
                    <div class="block1-txt-child1 p-t-15">
                        <span class="block1-name ltext-102 trans-04 p-b-8">
                            {{ $mall->mall_name }}
                        </span>

                        <span class="block1-info stext-102 trans-04">
                            {{ $mall->mall_descrbtion }}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
.block1-img {
    position: relative;
}

.block1-overlay {
    opacity: 0;
    transition: opacity 0.3s ease;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.block1-img:hover .block1-overlay {
    opacity: 1;
}

.block1-txt-child1 {
    margin-top: 10px;
}

.block1-name, .block1-info {
    display: block;
    font-weight: bold;
    color: #333;
}

.block1-link {
    font-size: 16px;
    color: white;
    background-color: transparent;
    border: 1px solid white;
    padding: 10px 20px;
    text-transform: uppercase;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.block1-link:hover {
    background-color: white;
    color: black;
}
</style>
