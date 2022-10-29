@extends('layouts.app')

@include('layouts.header_login')
<style>
    body {
        background: url('public/images_assets/chris.jpg');
        background-size: cover;
        background-position-y: 50%;
    }

</style>

<body>
    <div id="wrapper">
        <form method="POST" action="{{ route('login') }}" id="form-login">
            @csrf

            <h1 class="form-heading">Form đăng nhập</h1>
            <div class="form-group">
                <i class="far fa-user"></i>
                <input id="email" type="email" name="email" class="form-input @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Tên đăng nhập">

                @error('email')
                    <span class="form invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" id="password" class="form-input @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password" placeholder="Mật khẩu">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <input type="submit" value="Đăng nhập" class="form-submit">
        </form>
    </div>
</body>




<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#eye').click(function() {
            // alert("ok");
            $(this).toggleClass('open');
            $(this).children('i').toggleClass('fas fa-eye-slash  fa-eye');
            if ($(this).hasClass('open')) {
                $(this).prev().attr('type', 'text');
            } else {
                $(this).prev().attr('type', 'password');

            }
        });
    });
</script>
