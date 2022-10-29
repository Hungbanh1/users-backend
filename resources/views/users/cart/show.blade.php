@extends('layouts.admin')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
        
    <div id="main-content-wp" class="cart-page">
        <div class="section" id="breadcrumb-wp">
            <div class="wp-inner">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="?page=home" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title="">Giỏ hàng</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <form action="{{route('cart_update')}}" method="POST">
            @csrf
          

            <div id="wrapper" class="wp-inner clearfix">
                <div class="section" id="info-cart-wp">
                    <div class="section-detail table-responsive">
                        @if (Cart::count() > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Mã sản phẩm</td>
                                    <td>Ảnh sản phẩm</td>
                                    <td>Tên sản phẩm</td>
                                    <td>Giá sản phẩm</td>
                                    <td>Số lượng</td>
                                    <td colspan="2">Thành tiền</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $item)
                              {{-- {{dd($item)}} --}}
                                    <tr>
                                        <td>{{$item->options->code}}</td>
                                      
                                        </td> 
                                        <td>
                                            <a href="" title="" class="thumb">
                                                <img src="{{asset($item->options->thumb)}}" alt="">
                                            </a>
                                        </td>
                                        @php
                                            $cat_title = $item->options->cat_title;
                                            // dd($cat_title);
                                        @endphp
                                        <td>
                                           
                                            <a href="{{route('chitiet', [$cat_title,Str::slug($item->name), ])}}" title="" class="name-product">{{$item->name}}</a>
                                                
                                        
                                        </td>
                                       
                                        <td>{{number_format($item->price)}}VNĐ </td>
                                        <td>
                                            <input class="num-order"  type="number" data-id="{{$item->rowId}}" name="num-order[{{$item->rowId}}]" value="{{$item->qty}}"  min="1" max="10" >
                                        </td>
                                        <td id="sub_total-{{$item->rowId}}">{{number_format($item->total)}}VNĐ</td>
                                        <td>
                                            <a href="{{route('remove_cart' , $item->rowId)}}" title="" class="del-product"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            
    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <p id="total-price" class="fl-right">Tổng giá: <span>{{cart::total()}}VNĐ</span></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <div class="fl-right">
                                                {{-- <a href="" title="" type="submit" name="update-cart" id="update-cart">Cập nhật giỏ hàng</a> --}}
                                                <input type="submit" name="update-cart" id="update-cart" value="Cập nhật giỏ hàng">
                                                <a href="{{route('checkout')}}" title="" id="checkout-cart">Thanh toán</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
    
                            
                        @else
                            <p class="alert alert-light" role="alert">Hiện tại không có sản phẩm nào trong giỏ hàng !!!</p>
                        @endif
                        
                    </div>
                </div>
        </form>

                <div class="section" id="action-cart-wp">
                    <div class="section-detail">
                        <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng
                            <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                        <a href="{{url('/')}}" title="" id="buy-more">Mua tiếp</a><br />
                        <a href="{{route('cart_destroy')}}" title="" id="delete-cart">Xóa giỏ hàng</a>
                    </div>
                </div>
            </div>
        
    </div>
@endsection
