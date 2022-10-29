


@include('layouts.header')
{{-- {{dd($code)}} --}}
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                  <div class="item">
                        {{-- {{dd(asset('banner-1.png'))}} --}}
                        {{-- {{dd()}} --}}
                        <img src="{{asset('banner-1.png')}}" alt="">
                    </div> 
                   <div class="item">
                        <img src="{{asset('banner-2.png')}}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{asset('banner-3.png')}}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{asset('banner-4.png')}}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{asset('banner-5.png')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        
                        <li>
                            <div class="thumb">
                                <img src="{{asset('icon-1.png')}}">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{{asset('icon-2.png')}}">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{{asset('icon-3.png')}}">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{{asset('icon-4.png')}}">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{{asset('icon-5.png')}}">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        @foreach ($mix_products as $item)
                            {{-- {{dd($item)}} --}}
                        <li>
                            <a href="{{route('detail_product', ["$item->cat_title","$item->slug"])}}" title="" class="thumb ">
                                <img src="{{asset($item->product_thumb)}}">
                            </a>
                            <a href="{{route('detail_product', ["$item->cat_title","$item->slug"])}}" title="" class="product-name ">{{$item->product_name}}</a>
                            <div class="price">
                                <span class="new">{{number_format($item->price)}}Đ</span>
                                <span class="old">{{number_format($item->old_price)}}Đ</span>
                            </div>
                            <div class="action clearfix">
                                <a href="{{route('cart_add' , $item->id)}}" title="" class="add-cart fl-left ml-left">Thêm giỏ hàng</a>
                                <a href="{{route('detail_product', ["$item->cat_title","$item->slug"])}}" title="" class="buy-now fl-right mr-right">Mua ngay</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Iphone</h3>
                </div>
                {{-- {{dd($products)}} --}}
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        @foreach ($products as $item)
                        @if ($item->cat_title == 'Iphone')
                        {{-- {{dd($item->product_name)}} --}}
                                
                            <li>
                                <a href="{{route('detail_product', ["$item->cat_title","$item->slug"])}}" title="" class="thumb">
                                    <img src="{{asset($item->product_thumb)}}">
                                </a>
                                <a href="{{route('detail_product', ["$item->cat_title","$item->slug"])}}" title="" class="product-name">{{$item->product_name}}</a>
                                <div class="price">
                                    <span class="new">{{number_format($item->price)}}Đ</span>
                                    <span class="old">{{number_format($item->old_price)}}Đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="{{route('cart_add' , $item->id)}}" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="{{route('detail_product', ["$item->cat_title","$item->slug"])}}" title="" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                        @endif

                        @endforeach

                      {{-- {{dd($products)}} --}}
                    
                        
                        
                    </ul>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">SamSung</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        @foreach ($products as $item)
                        {{-- {{dd($item->product_name)}} --}}

                            @if ($item->cat_title == 'SamSung')
                                
                            <li>
                                
                                <a href="{{route('detail_product',["$item->cat_title","$item->slug"])}}" title="" class="thumb">
                                    <img src="{{asset($item->product_thumb)}}">
                                </a>
                                <a href="{{route('detail_product', ["$item->cat_title","$item->slug"])}}" title="" class="product-name">{{$item->product_name}}</a>
                                <div class="price">
                                    <span class="new">{{number_format($item->price)}}Đ</span>
                                    <span class="old">{{number_format($item->old_price)}}Đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="{{route('cart_add' , $item->id)}}" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="{{route('detail_product', ["$item->cat_title","$item->slug"])}}" title="" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                        @endif

                        @endforeach

                      
                    
                        
                        
                    </ul>
                </div>
            </div> 
            @yield('content')
        </div>
        @include('layouts.sidebar')
    </div>
</div>

@include('layouts.footer')


