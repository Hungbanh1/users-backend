
@extends('layouts.admin')
@section('content')
<style>
    #container{
        line-height: 20px;
    }
    #header p {
        font-size: 20px;
    }

    #container .content {
        margin: 15px 31% 20px 31%;
        border: 1px solid grey;

    }
    li strong {
        float: right;
    }
    #info {
        border-bottom: 1px solid grey;
        padding: 10px;
        font-size: 17px;
    }
    li .span {
        float: right;
    }
    .total{
        font-size: 20px;
        font-weight: bold;
        margin: 2px 3px 2px 4px;
        border-top: 1px solid black;
    }
    #product{
        border-top: 1px solid grey;
    }
    #info-product{
        display: grid;
    }
    #info-product li span strong {
        padding: 0px 5px 0px;
    } 
    /* .bg-white{
        background-color: #fff!important;
    } */
    .background{
        background-color: #fff!important;

    }

    
</style>  
    

<div id="container" class="text-center pt-3">
    <div class="d-inline-block">
        <img class="background"src="{{asset('images/dau-check123.jpg')}}" width="100px" alt="">
    </div>
    <div class="" id="header">
        <p>Cảm ơn quý khách đã mua hàng tại cửa hàng ISMART</p>
        <p>Chúng tôi sẽ liên hệ với bạn qua email để xác nhận đơn hàng trong vòng <strong>5 phút</strong></p>
        <p>Hy vọng bạn sẽ hài lòng với việc mua hàng của mình. Cảm ơn bạn đã là khách hàng thân thiết của công ty chúng tôi.</p>
    </div>

    {{-- <div class="content">
        <h3 class="content-title font-weight-bold" id="info">Thông tin đặt hàng</h3>
        <ul class="content-wp p-3 pb-3">
           
            <li class="clearfix">
                <span class="float-left">Mã đơn hàng:</span>
                <strong class="">IS-ZEZE7WYN</strong>
            </li>
            
            <li class="clearfix">
                <span class="float-left">Hình thức thanh toán:</span>
                <strong class=""> {{request()->session()->get('pay')}}</strong>
            </li>

            <li class="clearfix">
                <span class="float-left">Email:</span>
                <strong class="">{{request()->session()->get('email')}}</strong>
            </li>
            <li class="clearfix">
                <span class="float-left">Họ tên khách hàng:</span>
                <strong class="">{{request()->session()->get('name')}}</strong>
            </li>
            <li class="clearfix">
                <span class="float-left">Só điện thoại:</span>
                <strong class="">{{request()->session()->get('phone')}}</strong>
            </li>
         
        </ul>
    </div> --}}

    <div class="content">
        <h3 class="content-title font-weight-bold " id="info">Sản phẩm đã mua</h3>
        <ul class="content-product">
            @foreach (Cart::content() as $item)
                

            <li class="clearfix" id="product">
                <img src="{{$item->options->thumb}}" class="m-3 " alt="" width="130px">
                <ul class="float-left pl-4 pb-3" id="info-product">
                    <li><span class="float-left">Tên sản phẩm:<strong> {{$item->name}} </strong> </span> </li>
                    <li><span class="float-left">Giá:<strong> {{number_format($item->price)}} VNĐ </strong> </span> </li>
                    <li><span  class="float-left">Số lượng:<strong> x {{$item->qty}} </strong></span> </li>
                    <li><span class="float-left">Tổng tiền:<strong>  {{number_format($item->total)}} VNĐ </strong></span> </li>

                </ul>
            </li>
            @endforeach
    
            <li class="clearfix py-3 total px-4">
                <span class="float-left">Tổng cộng: </span> 
                <strong class=" float-right">{{Cart::total()}}VNĐ</strong>

            </li>

        </ul>

    </div>
</div>
<div class="wrapper text-center py-5">
    
        <a href="{{route('checkout_destroy')}}" class="btn btn-outline-success p-3">Mua thêm sản phẩm khác</a>
  
</div>

<!-- http://thanh.unitopcv.com/unimart/cart/don-hang-thanh-cong/IS-ZEZE7WYN -->
@endsection





