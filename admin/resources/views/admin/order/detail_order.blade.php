@extends('layouts.admin')
@section('content')

    <div id="content" class="container-fluid">
        <div class="card">
           
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center" style="background-color: #fff">
                <h5 class="m-0 ">Chi tiết đơn hàng</h5>
               
            </div>
      
            <table class="table_order" style="margin: 15px 0 15px 5%">
                <tbody>
                    <tr>
                        <td>
                            <p class="">Mã đơn hàng:</p>

                        </td>
                        <td>
                            <p><strong>{{ $order->code }}</strong></p>
                        </td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td>
                            <p class="">Địa chỉ:</p>

                        </td>
                        <td>
                            <p> <strong>{{ $order->address }}</strong></p>

                        </td>
                    </tr>
                </tbody>

                <tbody>
                    <tr>
                        <td>
                            <p class="">Số điện thoại:</p>

                        </td>
                        <td>
                            <p>  <strong>0{{ $order->phone }}</strong></p>

                        </td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td>
                            <p class="">Email:</p>

                        </td>
                        <td>
                            <p> <strong>{{ $order->email }}</strong></p>

                        </td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td>
                            <p class="">Thông tin vận chuyển:</p>

                        </td>
                        <td>
                            <p><strong>{{ $order->pay }}</strong></p>

                        </td>
                    </tr>
                </tbody>
            </table>


         
            <div class="format_order card-header font-weight-bold d-flex justify-content-between align-items-center" >
                <h5 class="m-0 ">Trạng thái đơn hàng</h5>
               
            </div>
      
            <form action="{{ route('update_order', $order->id) }}">
                @csrf
                <div class="form_order form-action form-inline pb-5">
                    <select class="form-control mr-1" name="act" id="">
                        <option class="text-center">-----Chọn------</option>
                        @foreach ($list_act as $k => $v)
                            <option value="{{ $k }}">{{ $v }}</option>
                        @endforeach

                    </select>
                    <input type="submit" name="btn-search" value="Cập nhật" class="btn btn-primary">

                </div>
            </form>
            <div class="product_order card-header font-weight-bold d-flex justify-content-between align-items-center" >
                <h5 class="m-0 ">SẢN PHẨM</h5>
               
            </div>
            <table class="table table-striped table-checkall">
                <thead>
                    <tr>
                        <th scope="col">
                            <input name="checkall" type="checkbox">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col" class="price">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $t = 0;
                    @endphp
                    @foreach ($detail_order as $item)
                        @php
                            $t++;
                        @endphp
                        <tr class="">
                            <td>
                                <input type="checkbox">
                            </td>
                            <td>{{ $t }}</td>
                            <td><img src="{{ $item->product_thumb }}" width="80px" alt=""></td>
                            <td><a href="#">{{ $item->product_name }}</a></td>
                            <td>{{ $item->cat_title }}</td>
                            <td >{{ number_format($item->price) }}VNĐ</td>
                            <td class="qty" ><strong>x{{$item->qty}}</strong> </td>
                            <td>{{number_format($item->sub_total)}}VNĐ</td>                         
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class=" total_order card-header font-weight-bold d-flex justify-content-between align-items-center" >
                <h5 class="m-0 ">Tổng đơn hàng</h5>
               
            </div>
            <div class="footer_order">
                <div class="qty">
                    <p>Tổng số lượng:  <span>x{{$order->num_order}}</span> </p>
                </div>
                <div class="total">
                    <p class="">Tổng cộng: <span>{{$order->total}}VNĐ</span> </p>
                </div>
               
            </div>




        </div>
    </div>
    </div>
@endsection
