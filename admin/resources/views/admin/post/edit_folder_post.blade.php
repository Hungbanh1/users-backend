@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="col-4" style="flex:none;max-width:none">
                <div class="card">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-header font-weight-bold">
                        CHỈNH SỬA DANH MỤC BÀI VIẾT
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update_folder_post', $folder->id) }}">
                            <div class="form-group">
                                <label for="folder_name">Tên danh mục</label>
                                <input class="form-control" type="text" name="folder_name" id="folder_name">
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input class="form-control" type="text" name="slug" id="slug">
                            </div>
                            <div class="form-group">
                                <label for="folder_parent">Danh mục cha</label>
                                <select class="form-control" id="folder_parent" name="folder_parent">
                                    <option>Chọn danh mục</option>
                                    @foreach ($list_folder as $v => $k)
                                        <option value="{{ $v }}">{{ $k }}</option>

                                    @endforeach
                                </select>
                            </div>
                          


                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
@endsection
