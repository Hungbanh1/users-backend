@extends('layouts.admin')
@section('content')

    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm sản phẩm
            </div>
            <div class="card-body">
                <form action="{{ url('admin/product/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="product_name">Tên sản phẩm</label>
                                <input class="form-control" type="text" name="product_name" id="product_name">
                                @error('product_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cat_id">Tên đại diện sản phẩm</label>
                                <select class="form-control" name="cat_id" id="cat_id">
                                    <option>---Chọn---</option>
                                    @foreach ($list_cat_id as $v => $k)
                                        {{-- {{dd($v)}}; --}}
                                        <option value="{{ $k }}">{{ $k }}</option>
                                    @endforeach

                                    @error('cat_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input class="form-control" type="text" name="slug" id="slug">
                                @error('slug')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">Giá Mới</label>
                                <input class="form-control" type="text" name="price" id="price">
                                @error('price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="old_price">Giá Cũ</label>
                                <input class="form-control" type="text" name="old_price" id="old_price">
                                @error('old_price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="product_thumb">Ảnh sản phẩm</label>
                                {!! Form::file('file', ['class' => 'product_thumb form-control-file' , 'id' => 'product_thumb' , 'name' => 'product_thumb']) !!}
                            </div> --}}
                            <div class="form-group">
                                <label for="product_thumb">Ảnh sản phẩm</label>
                                {!! Form::file('file',['class' => 'product_thumb form-control-file']) !!}
                            </div>

                        </div>


                        <div class="col-6">
                            <div class="form-group">
                                <label for="intro">Mô tả sản phẩm</label>
                                <textarea name="product_desc" class="form-control" id="product_desc" cols="30"
                                    rows="8"></textarea>
                                @error('product_desc')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="intro">Chi tiết sản phẩm</label>
                        <textarea name="product_content" id="product_content" class="form-control" id="intro" cols="30"
                            rows="5"></textarea>
                        @error('product_content')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="cat_title">Danh mục</label>
                        <select class="form-control" name="cat_title" id="cat_title">
                            <option>Chọn danh mục</option>
                            @foreach ($list_title as $v => $k)
                                <option value="{{ $k }}">{{ $k }}</option>
                            @endforeach

                            @error('cat_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </form>
                {{-- {!! Form::close() !!} --}}

            </div>
        </div>
    </div>
@endsection
