
@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Danh sách đơn hàng</h5>
            {{-- <div class="form-search form-inline">
                <form action="#">
                    <input type="" class="form-control form-search" placeholder="Tìm kiếm">
                    <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary">
                </form>
            </div> --}}
        </div>
        <div class="card-body">
            <div class="analytic">
                <a href="{{ request()->fullurlWithQuery(['status' => 'processing']) }}" class="text-primary">Đang xử lý<span class="text-muted"> ({{$count[0]}})</span></a>
                <a href="{{ request()->fullurlWithQuery(['status' => 'being_transported']) }}" class="text-primary">Đang vận chuyển<span class="text-muted"> ({{$count[1]}})</span></a>
                <a href="{{ request()->fullurlWithQuery(['status' => 'successful']) }}" class="text-primary">Đơn hàng thành công<span class="text-muted"> ({{$count[2]}})</span></a>
                <a href="{{ request()->fullurlWithQuery(['status' => 'cancel']) }}" class="text-primary">Đơn đã hủy<span class="text-muted"> ({{$count[3]}})</span></a>

            </div>
            <form action="{{url('admin/order/update')}}" method="GET">
                @csrf
                <div class="form-action form-inline py-3">
                    <select class="form-control mr-1" name="act" id="">
                        <option>Chọn</option>
                       @foreach ($list_act as $k=>$v)
                       <option value="{{$k}}">{{$v}}</option>
                           
                       @endforeach
                    </select>
                    <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                </div>
               
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <input name="checkall" type="checkbox">
                                </th>
                                <th scope="col">#</th>
                                <th scope="col">Mã</th>
                                <th scope="col">Khách hàng</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Thời gian</th>
                                <th scope="col">Chi tiết</th>
                                {{-- <th scope="col">Tác vụ</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @if ($order->total() > 0)

                           
                            @php
                                $t = 0;
                            @endphp
                            @foreach ($order as $item)
                                @php
                                    $t++;
                                @endphp
                                <tr>
                                    <td>
                                        <input type="checkbox" value="{{ $item->id }}" name="list_check[]">
                                    </td>
                                    <th scope="row">{{ $t }}</th>
                                    <td>{{ $item->code }}</td>
                                    <td>
                                        {{ $item->name }} <br>
                                    </td>
                                    {{-- <td><a href="#">Samsung Galaxy A51 (8GB/128GB)</a></td> --}}
                                    <td>0{{ $item->phone }} </td>
                                    <td>{{ $item->total }}VNĐ </td>
                                    <td>
                                        @if ($item->format == 'Đang xử lý')
                                            <span class="badge badge-warning">Đang xử lý</span>
                                        @elseif($item->format == 'Đang vận chuyển')
                                            <span class="badge badge-info">Đang vận chuyển</span>
                                        @elseif($item->format == 'Đã giao hàng')
                                            <span class="badge badge-success">Đã giao hàng</span>
                                        @else
                                            <span class="badge badge-dark">Hủy đơn hàng</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('detail_order', $item->id) }}">Chi tiết</a>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="7" class="bg-white">
                                    <p>Không có đơn hàng nào đang được xử lý !!! </p>
                                </td>
                            </tr>

                        @endif
                        </tbody>
                    </table>
                    {{-- {{$order->links() }} --}}
                   
              
            </form>
         {{$order->links()}}
        </div>
    </div>
</div>
@endsection