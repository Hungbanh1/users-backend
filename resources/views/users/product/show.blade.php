 @extends('layouts.admin')

@section('content')
<div class="wp-inner">
    <div class="secion" id="breadcrumb-wp">
        <div class="secion-detail">
            <ul class="list-item clearfix pt-4">
                <li>
                    <a href="" title="">Trang chủ</a>
                </li>
                <li>
                    <a href="" title="">Điện thoại</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content fl-right">
        {{-- {{dd($products)}} --}}
     
        {{-- {{dd($cat_title)}} --}}
        <div class="section" id="list-product-wp">
             <div class="section-head clearfix">
                <h3 class="section-title fl-left">Điện thoại</h3>
                <div class="filter-wp fl-right">
                    <p class="desc"></p>
                    <div class="form-filter">
                        {{-- <p class="desc">Hiển có {{$products->count()}} trên {{$products->count()}} sản phẩm</p> --}}
                      {{-- <form method="GET" action="">
                           @csrf
                            <select name="select">
                                <option name="0"  value="{{request()->input('select')}}}}">Sắp xếp</option>
                                <option name="A-Z" value="A-Z">Từ A-Z</option>
                                <option name="Z-A" value="Z-A">Từ Z-A</option>
                                <option name="high-low" value="high-low">Giá cao xuống thấp</option>
                                <option name="low-high" value="low-high">Giá thấp lên cao</option>
                            </select>
                  </form>   --}}
                    </div>
                </div>
            </div> 
             <div class="section-detail">
                <ul class="list-item clearfix">
                    @php
                        $t = 0;
                    @endphp
                    @foreach ($products as $item)
                    
                    @php
                        $t ++;
                    @endphp
                        
                    <li>
                        <a href="{{route('detail_product',["$item->cat_title","$item->slug"])}}" title="" class="thumb">
                            <img src="{{asset($item->product_thumb)}}">
                        </a>
                      
                        <a href="{{route('detail_product',["$item->cat_title","$item->slug"])}}" title="" class="product-name">{{$item->product_name}}</a>
                        <div class="price">
                          
                            <span class="new">{{number_format($item->price)}}Đ</span>
                            <span class="old">{{number_format($item->old_price)}}Đ</span>
                        </div>
                        <div class="action clearfix">
                            <a href="{{route('cart_add' , $item->id)}}" title="" class="add-cart fl-left" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                            <a href="{{route('detail_product', ["$item->cat_title","$item->slug"])}}" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                        </div>
                    </li>
                    @endforeach      
                </ul>
            </div>
      </div>
    </div>
    
   @include('layouts.sidebar_not')
</div>
</div>
@endsection 



