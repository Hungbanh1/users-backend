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
                <h5 class="m-0 ">Danh sách trang</h5>
                <div class="form-search form-inline">
                    <form action="{{ url('admin/post/list') }}">
                        <input type="text" name="keyword" class="form-control" value="{{ request()->input('keyword') }}"
                            placeholder="Tìm kiếm">
                        <input type="submit" name="btn-search" value="Tìm Kiếm" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="analytic">
                    <a href="{{ request()->fullurlWithQuery(['status' => 'active']) }}" class="text-primary">Kích
                        hoạt<span class="text-muted">({{ $count[0] }})</span></a>
                    <a href="{{ request()->fullurlWithQuery(['status' => 'trash']) }}" class="text-primary">Thùng rác<span
                            class="text-muted">({{ $count[1] }})</span></a>
                </div>
                <form action="{{url('admin/post/action')}}">
                    <div class="form-action form-inline py-3">
                        <select class="form-control mr-1"  name="act" id="">
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
                                <th scope="col">
                                    <input name="checkall" type="checkbox">
                                </th>
                                <th scope="col">#</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($posts->total() > 0)
    
                            @php
                                $temp = 0;
                            @endphp
                            @foreach ($posts as $item)
              
                                @php
                                // dd($item);
                                    $temp++;
                                @endphp
    
                                <tr>
                                    <td>
                                        <input type="checkbox" value="{{$item->id}}" name="list_check[]">
                                    </td>
                                    <td scope="row">{{$temp}}</td>
                                    <td><img src="{{url($item->page_thumb1)}}" width="60px" alt=""></td>
                                    <td><a href="">{{$item->cat_title}}</a>
                                    </td>
                                    <td>{{$item->page_title}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td class="edit-fa-post">
                                        @if ($status == 'active' || $status == "")
                                        <a href="{{ route('edit_post', $item->id) }}"
                                            class=" mr-2 btn btn-success btn-sm rounded-0 text-white" type="button"
                                            data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                class=" fa fa-edit"></i></a>
                                        <a href="{{ route('delete_post', $item->id) }}"
                                            class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                                            data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                class="fa fa-trash"></i></a>
                                            
                                        @else
                                        <a href="">Chi tiết</a>
                                            
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
                {{$posts->links()}}
                
               
            </div>
        </div>
    </div>
@endsection
