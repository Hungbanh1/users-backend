@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                CHỈNH SỬA THÔNG TIN BÀI VIẾT
            </div>
            <div class="card-body">
                <form action="{{route('update_post' , $posts->id)}}" method="POST" enctype="multipart/form-data">
                   @csrf
                   <div class="form-group">
                    <label for="page_title">Tiêu đề bài viết</label>
                    <input class="form-control" type="text" name="page_title" value="{{$posts->page_title}}" id="post_title">
                    @error('page_title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
                <div class="form-group">
                    <label for="page_content">Nội dung bài viết</label>
                    <textarea name="page_content" class="form-control" id="page_content" cols="30" rows="5">{{$posts->page_content}}</textarea>
                    @error('page_content')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
                <div class="form-group">
                    <label for="page_thumb1">Ảnh bài viết 1</label><br>
                        <input type="file" name="page_thumb1"> 
                </div>
                
                <div class="form-group">
                    <label for="page_thumb2">Ảnh bài viết 2</label>
                    {!! Form::file('file', ['class' => 'page_thumb2 form-control-file' , 'name' =>'page_thumb2']) !!}
    
                </div>
                <div class="form-group">
                    <label for="cat_title">Danh mục</label>
                    <select class="form-control" id="cat_title" name="cat_title">
                      <option>Chọn danh mục</option>
                      @foreach ($list_cat_post as $v=>$k)
                        <option value="{{$k}}">{{$k}}</option>
                      @endforeach
                      @error('cat_title')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
                    </select>
                </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
@endsection
