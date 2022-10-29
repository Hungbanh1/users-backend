@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-header font-weight-bold">
                        Danh mục sản phẩm
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/product/add_folder')}}">
                            <div class="form-group">
                                <label for="folder_name">Tiêu đề</label>
                                <input class="form-control" type="text" name="folder_name" id="folder_name">
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input class="form-control" type="text" name="slug" id="slug">
                            </div>
                            <div class="form-group">
                                <label for="folder_parent">Danh mục</label>
                                <select class="form-control" id="folder_parent" name="folder_parent">
                                    <option for="">Chọn danh mục</option>
                                    @foreach ($list_folder as $v => $k)
                                        <option value="{{$k}}">{{ $k }}</option>

                                    @endforeach
                                </select>
                            </div>
                           



                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        Danh mục
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th style="width:13%" scope="col">Danh mục</th>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Ngày tạo</th>

                                    <th style="width:10%" scope="col">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $t = 0;

                                @endphp
                                @foreach ($folder as $item)
                                    @php
                                        $t ++;
                                    @endphp
                            
                                <tr>
                                    <th scope="row">{{$t}}</th>
                                    <td>{{$item->folder_parent}}</td>
                                    <td>{{$item->folder_name}}</td>
                                    <td>{{$item->slug}}</td>
                                    <td>{{$item->created_at}}</td>

                                 
                                        <td><a href="{{route('detail_page_product' , $item->id)}}">Chi tiết</a></td>

                               
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
