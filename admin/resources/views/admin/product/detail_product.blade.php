@extends('layouts.admin')
@section('content')
<script src="https://cdn.tiny.cloud/1/fuiw6jelqedlzqq6waofxxe77a7tfm7tlacqggrc1p9tsrxi/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
   });
  </script>
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                THÔNG TIN SẢN PHẨM
            </div>
            <div class="card-body">
                <form action="{{route('update_product' , $products->id)}}" method="POST" enctype="multipart/form-data">
                   @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="product_name">Tên sản phẩm</label>
                                <input class="form-control" type="text" value="{{$products->product_name}}" name="product_name" id="product_name">
                                @error('product_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Giá</label>
                                <input class="form-control" type="text" value="{{$products->price}}" name="price" id="price">
                                @error('price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">Giá cũ</label>
                                <input class="form-control" type="text" value="{{$products->old_price}}" name="price" id="price">
                                @error('price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="product_thumb">Ảnh sản phẩm</label>
                                {!! Form::file('file', ['class' => 'product_thumb form-control-file']) !!}
                            </div>
                            
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="intro">Mô tả sản phẩm</label>
                                <textarea name="product_desc" class="form-control" id="product_desc" cols="30" rows="8">{{$products->product_desc}}</textarea>
                                @error('product_desc')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="intro">Chi tiết sản phẩm</label>
                        <textarea name="product_content" id="product_content" class="form-control" id="intro" cols="30"
                            rows="5">{{$products->product_content}}</textarea>
                        @error('product_content')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    {{-- <div class="form-group">
                        <label for="cat_title">Danh mục</label>
                        <select class="form-control"  name="cat_title" id="cat_title">
                            <option>Chọn danh mục</option>
                            @foreach ($list_title as $v => $k)
                                <option value="{{ $v }}">{{ $k }}</option>
                            @endforeach

                            @error('cat_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </select>
                    </div> --}}
                    {{-- <div class="form-group">
                        <label for="">Trạng thái</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Chờ duyệt
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                                value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Công khai
                            </label>
                        </div>
                    </div> --}}
                    {{-- <button type="submit" class="btn btn-primary">Cập nhật</button> --}}
                </form>
            </div>
        </div>
    </div>
@endsection
