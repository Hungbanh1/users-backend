@extends('layouts.admin')
@section('content')
<div class="product_order card-header font-weight-bold d-flex justify-content-between align-items-center" >
    <h5 class="m-0 ">CHỈNH SỬA DANH MỤC-SẢN PHẨM</h5>
   
</div>
    <div class="content_page">
        <div class="update">
            
            <p>Chỉnh sửa:
                <a href="{{route('edit_folder_product' , $id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button"
                    data-toggle="tooltip" data-placement="top" title="Edit"><i
                        class="fa fa-edit"></i></a>
               </p>                                                                    
            
        </div>
        <div class="delete">
            <p>Xóa:   <a href="{{route('delete_folder_product' , $id)}}"   onclick="return confirm('Bạn có chắc chắn muốn xóa mục này ???')" class="btn btn-danger btn-sm rounded-0 text-white" type="button"
                data-toggle="tooltip" data-placement="top" title="Delete"><i
                    class="fa fa-trash"></i></a></p>                                                                    
    
           
            
        </div>
        <div class="back">
            <button Wtype="button" class="btn btn-success"><a href="{{url('admin/product/list/cat')}}">Quay trở lại</a></button>
                
        </div>
    </div>
    

@endsection