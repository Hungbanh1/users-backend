@extends('layouts.admin')
@section('content')
    <div id="content" class="container-fluid">
        <div class="card">
            <div class="card-header font-weight-bold">
                    CHI TIẾT
            </div>
            <div class="card-body">
                <form action="{{url()->previous()}}" method="get">
                    @csrf
                    @php
                        // dd($users);
                    @endphp
                 
                    <div class="form-group">
                        <label for="name">Họ và tên</label>
                        <input class="form-control" type="text" name="name"  disabled id="name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="text"  name="email" disabled  id="email" disabled>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>

                        @enderror
                    </div>
                    

                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>
@endsection --}}

{{-- <p>Ok</p>
