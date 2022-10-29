@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                CHỈNH SỦA THÔNG TIN NGƯỜI DÙNG
            </div>
            <div class="card-body">
                <form action="{{route('account_have_update' , $users->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Họ và tên</label>
                        <input class="form-control" type="text" name="name" value="{{$users->name}}" id="name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" name="email" value="{{$users->email}}" id="email">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>

                        @enderror
                    </div>
                   
                  
                   
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
@endsection
