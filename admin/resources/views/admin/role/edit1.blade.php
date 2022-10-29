@extends('layouts.admin')
@section('content')


    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
              Chỉnh sửa role
            </div>
            {{-- {{dd($roles)}} --}}
            <div class="card-body">
                <form action="{{route('update_role' , $role->id)}}" method="post">
                    @csrf
                    {{-- {{dd($roles)}} --}}
                    {{-- <div class="row"> --}}
                    <div class="form-group">
                        <label for="name">Thêm Role</label>
                        <input class="form-control" type="text"  value="{{$role->name}}" name="name" id="name">
                        @error('page_title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="desc_role">Mô tả</label>
                        <input class="form-control" type="text" value="{{$role->desc}}" name="desc" id="desc">
                        @error('page_title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>



                    <div class="card text-white mb-2 mt-2">
                        <div class="card-header text-primary">
                            <label>
                                <input type="checkbox" class="transform" name="checkall" id="checkall">
                                Chọn toàn bộ quyền
                            </label>
                        </div>
                    </div>
                    <div id="select-box" class="card text-white mb-3 ">
                        @foreach ($roles as $item)
                            
                        <div id="check-box-products">
                            <div class="card-header bg-success">
                                <label>
                                    <input type="checkbox" name="check-box-products" class="wp_checkbox"
                                    {{$roles}}
                                    >
                                    Danh mục 
                                </label>
                            </div>
                            <div class="card-body text-primary">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="1" name="list_check[]"
                                                {{$roles->contains('id' ,1) ? 'checked' :''}}
                                            >
                                            Danh sách danh mục
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="2" name="list_check[]"  >
                                            Thêm danh mục
                                        
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="3" name="list_check[]"
                                              
                                                >
                                            Xóa danh mục

                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="4" name="list_check[]"
                                                >
                                                Edit danh mục
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="check-box-page">
                            <div class="card-header bg-success">
                                <label>
                                    <input type="checkbox" name="check-box-page" >
                                   Trang
                                </label>
                            </div>
                            <div class="card-body text-primary">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="5" name="list_check[]"
                                             >
                                            Danh sách trang
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="6" name="list_check[]"
                                                >
                                           Thêm trang
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="7" name="list_check[]"
                                                >
                                           Xóa trang
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="8" name="list_check[]"
                                               >
                                               Edit trang
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="check-box-post">
                            <div class="card-header bg-success">
                                <label>
                                    <input type="checkbox" name="check-box-post" >
                                    Bài viết
                                </label>
                            </div>
                            <div class="card-body text-primary">
                                <div class="row">
                                        <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="9" name="list_check[]"
                                                >
                                            Danh sách bài viết
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="10" name="list_check[]"
                                               >
                                           Thêm bài viết
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="11" name="list_check[]"
                                             >
                                            Xóa bài viết
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="12" name="list_check[]"
                                               >
                                           Edit bài viết
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="check-box-product">
                            <div class="card-header bg-success">
                                <label>
                                    <input type="checkbox" name="check-box-product" >
                                    Sản phẩm
                                </label>
                            </div>
                            <div class="card-body text-primary">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="13" name="list_check[]"
                                               >
                                            Danh sách sản phẩm
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="14"name="list_check[]"
                                                >
                                            Thêm sản phẩm
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="15" name="list_check[]"
                                              >
                                            Xóa sản phẩm
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="16" name="list_check[]"
                                              >
                                              Edit sản phẩm
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="check-box-member">
                            <div class="card-header bg-success">
                                <label>
                                    <input type="checkbox" name="check-box-member" >
                                    Member
                                </label>
                            </div>
                            <div class="card-body text-primary">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="17" name="list_check[]"
                                                >
                                            Danh sách thành viên
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="18" name="list_check[]"
                                               >
                                            Thêm thành viên
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="19" name="list_check[]"
                                            >
                                            Xóa thành viên
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="20" name="list_check[]"
                                               >
                                               Edit thành viên
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="check-box-role">
                            <div class="card-header bg-success">
                                <label>
                                    <input type="checkbox" name="check-box-role" >
                                    Cấp Role
                                </label>
                            </div>
                            <div class="card-body text-primary">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="21" name="list_check[]"
                                             >
                                           Quản lý role
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="22" name="list_check[]"
                                                >
                                            Cấp role
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="23" name="list_check[]"
                                               >
                                            Xóa role
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="24" name="list_check[]"
                                               >
                                               Edit role
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="check-box-order">
                            <div class="card-header bg-success">
                                <label>
                                    <input type="checkbox" name="check-box-order" >
                                    Bán hàng
                                </label>
                            </div>
                            <div class="card-body text-primary">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="25" name="list_check[]"
                                             >
                                            Quản lý danh sách đơn hàng
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="26" name="list_check[]"
                                              >
                                           Cập nhật đơn hàng
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="27" name="list_check[]"
                                             >
                                            Xóa đơn hàng
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="28" name="list_check[]"
                                                >
                                                Edit đơn hàng
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                       
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>

            </div>
        </div>
    </div>

@endsection
