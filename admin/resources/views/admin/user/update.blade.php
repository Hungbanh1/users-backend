@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                CHỈNH SỦA mật khẩu
            </div>
            <div class="card-body">
                <form action="{{route('pass_have_update' , $users->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input class="form-control" type="password" name="password" id="password">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="confirm-password">Xác nhận mật khẩu</label>
                        <input class="form-control" type="password" name="confirm-password" id="confirm-password">
                     
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
@endsection
