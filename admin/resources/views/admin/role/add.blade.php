@extends('layouts.admin')
@section('content')


    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                Thêm Role
            </div>
            <div class="card-body">
                <form action="{{ url('admin/role/action') }}" method="POST">
                    @csrf
                    {{-- <div class="row"> --}}
                    <div class="form-group">
                        <label for="name">Thêm Role</label>
                        <input class="form-control" type="text" name="name" id="name">
                        @error('page_title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="desc_role">Mô tả</label>
                        <input class="form-control" type="text" name="desc" id="desc">
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
                        @foreach ($list_role as $item)
                        <div id="check-box">
                            <div class="card-header bg-success">
                                <label>
                                    <input type="checkbox" name="check-box" class="wp_checkbox">
                                    {{$item->name}}
                                </label>
                            </div>
                            <div class="card-body text-primary">
                                    {{-- {{dd($role)}} --}}
                                <div class="row">
                                @foreach ($item->list_roles as $role)
                                    <div class="col-md-3">
                                        <label>
                                            <input type="checkbox" value="{{$role->id}}" class="checkbox_child" name="list_check[]"
                                            
                                            >
                                            {{$role->name}}
                                        </label>
                                    </div>
                                @endforeach
                                   
                                  
                                </div>

                            </div>
                        </div>
                      
                        @endforeach                                            
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </form>

            </div>
        </div>
    </div>

@endsection
