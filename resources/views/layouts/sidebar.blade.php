

<div class="sidebar fl-left">
    <div class="section" id="category-product-wp">
        <div class="section-head">
            <h3 class="section-title">Danh mục sản phẩm</h3>
        </div>
        <div class="secion-detail">
            <ul class="list-item">
                <li>
                    <a href="{{ url('/dien-thoai') }}" title="">Điện thoại</a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ url('san-pham/Iphone')}}" title="">Iphone</a>
                        </li>
                        <li>
                            <a href="{{ url('san-pham/SamSung')}}" title="">Samsung</a>

                        </li>

                    </ul>
                </li>

                <li>
                    <a href="{{ url('san-pham/Laptop')}}" title="">Laptop</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="section" id="selling-wp">
        <div class="section-head">
            <h3 class="section-title">Sản phẩm bán chạy</h3>
        </div>
        <div class="section-detail">
            {{-- {{ dd($mix_products) }} --}}
            <ul class="list-item">
                @foreach ($mix_products as $item)
                <li class="clearfix">
                    <a href="{{route('detail_product', ["$item->cat_title","$item->slug"])}}" title="" class="thumb fl-left p-0">
                        <img src="{{asset($item->product_thumb)}}" alt="">
                    </a>
                    <div class="info fl-right">
                        <a href="{{route('detail_product', ["$item->cat_title","$item->slug"])}}" title="" class="product-name-sidebar">{{$item->product_name}}</a>
                        <div class="price" id="price_sidebar">
                            <span class="new">{{number_format($item->price)}}Đ</span>
                            <span class="old">{{number_format($item->old_price)}}Đ</span>
                        </div>
                        <a href="{{route('detail_product', ["$item->cat_title","$item->slug"])}}" title=""class="buy-now btn-buynow">Mua ngay</a>
                    </div>
                </li>  
                @endforeach


            </ul>
        </div>
    </div>
    <div class="section" id="banner-wp">
        <div class="section-detail">
            <a href="?" title="" class="thumb">
                <img src="{{asset('bannershoppe.png')}}" alt="">
            </a>
        </div>
    </div>
</div>
