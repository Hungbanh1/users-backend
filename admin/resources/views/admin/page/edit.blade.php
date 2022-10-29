@extends('layouts.admin')
@section('content')
<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            CHỈNH SỬA THÔNG TIN TRANG
        </div>
        <div class="card-body">
            <form action="{{route('update_page' , $pages->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="cat_title">Tiêu đề trang</label>
                    <input class="form-control" type="text" value="{{$pages->cat_title}}" name="cat_title" id="cat_title">
                    @error('cat_title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input class="form-control" type="text" value="{{$pages->slug}}" name="slug" id="slug">
                    @error('slug')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="page_content">Nội dung bài viết</label>
                    <textarea name="page_content" class="form-control" value="{{$pages->page_content}}" id="page_content" cols="30" rows="5"></textarea>
                    @error('page_content')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

                <div class="form-group">
                    <label for="page_thumb">Ảnh trang</label>
                    {!! Form::file('file', ['class' => 'page_thumb form-control-file']) !!}
                </div>

               
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
@endsection