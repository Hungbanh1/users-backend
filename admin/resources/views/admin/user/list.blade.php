@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                <h5 class="m-0 ">Danh sách thành viên</h5>
                @php
                    // dd($users);
                    // dd($users->keyword())
                @endphp
                <div class="form-search form-inline">
                    <form action="{{ url('admin/user/list') }}">
                        <input type="text" name="keyword" class="form-control" value="{{ request()->input('keyword') }}"
                            placeholder="Tìm kiếm">
                        <input type="submit" name="btn-search" value="Tìm Kiếm" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="card-body">
                @php
                    // dd($count[0]);
                @endphp
                <div class="analytic">
                    <a href="{{ request()->fullurlWithQuery(['status' => 'active']) }}" class="text-primary">Kích
                        hoạt<span class="text-muted">({{ $count[0] }})</span></a>
                    <a href="{{ request()->fullurlWithQuery(['status' => 'trash']) }}" class="text-primary">Thùng rác<span
                            class="text-muted">({{ $count[1] }})</span></a>
                </div>
                <form action="{{url('admin/user/action')}}" method="">
                    <div class="form-action form-inline py-3">
                        <select class="form-control mr-1" name="act" id="">
                            <option>Chọn</option>
                            @foreach ($list_act as $v=>$k)
                            <option value="{{$v}}">{{$k}}</option>
                            @endforeach
                        </select>
                        <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
                    </div>
                    <table class="table table-striped table-checkall">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="checkall">
                                </th>
                                <th scope="col">#</th>
                                <th scope="col">Họ tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Quyền</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->total() > 0)
                                @php
                                    // dd($users->total()>0);
                                    $temp = 0;
                                    
                                @endphp
                                @foreach ($users as $item)
    
                                    @php
                                        $temp++;
                                        
                                    @endphp
                                    <tr>
                                        <td>
                                            <input type="checkbox" value="{{$item->id}}" name="list_check[]">
                                        </td>
                                        <th scope="row">{{ $temp }}</th>
                                        <td>{{ $item->name }}</td>
    
                                        <td>{{ $item->email }}</td>
                                        @foreach ($item->roles as $on)

                                        <td><strong>   
                                                {{$on->name}}
                                        </strong></td>
                                        @endforeach
                             
                                       
                                        <td>26:06:2020 14:00</td>
                                        <td>
                                            @if ($status == 'active' || $status == "")
                                            <a href="{{ route('edit_user', $item->id) }}"
                                                class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit"></i></a>
                                            @if (Auth::id() != $item->id)
                                                <a href="{{ route('delete_user', $item->id) }}"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xóa thành viên này ???')"
                                                    class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></a>
                                            @endif
                                            @else
                                                <a href="{{route('detail_user' , $item->id)}}">Chi tiết</a>
                                            @endif
                                           
    
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="bg-white">
                                        <p>Không có bản ghi nào cả !!! </p>
                                    </td>
                                </tr>
    
                            @endif
                        </tbody>
                    </table>
                </form>
                
                {{ $users->links() }}
                </nav>
            </div>
        </div>
    </div>
@endsection
