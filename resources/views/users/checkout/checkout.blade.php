@extends('layouts.admin')
@section('content')
    <div id="main-content-wp" class="checkout-page">
        <div class="section" id="breadcrumb-wp">
            <div class="wp-inner">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="?page=home" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title="">Thanh toán</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="wrapper" class="wp-inner clearfix">
            <form action="{{ url('checkout/store') }}" method="POST" name="form-checkout">
                @csrf
            
                <div class="section" id="customer-info-wp">
                    <div class="section-head">
                        <h1 class="section-title">Thông tin khách hàng</h1>
                    </div>
                    <div class="section-detail">
                        <div class="form-row clearfix">
                            <div class="form-col fl-left">
                                <label for="name">Họ tên</label>
                                <input type="text" name="name" id="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>

                        <div class="form-col fl-right">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" id="address">
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-col fl-right">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" name="phone" id="phone">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
            <div class="section" id="order-review-wp">
                <div class="section-head">
                    <h1 class="section-title">Thông tin đơn hàng</h1>
                </div>
                <div class="section-detail">
                    <table class="shop-table">
                        <thead>
                            <tr>
                                <td>Sản phẩm</td>
                                <td>Tổng</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $item)
                            {{-- @php
                            echo "<pre>";
                            print_r($item);
                            echo "<pre>";

                            @endphp --}}
                                {{-- {{dd($item)}} --}}
                                <tr class="cart-item">
                                    <td class="product-name">{{ $item->name }}<strong
                                            class="product-quantity">x{{ $item->qty }}</strong>
                                    </td>
                                    <td class="product-total">{{ number_format($item->total) }}VNĐ</td>
                                </tr>
                            @endforeach


                        </tbody>
                        <tfoot>
                            <tr class="order-total">
                                <td>Tổng đơn hàng:</td>
                                <td><strong class="total-price">{{ Cart::total() }}VNĐ</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div id="payment-checkout-wp">
                        <ul id="payment_methods" name="pay">
                            <li>
                                <input type="radio" id="Thanh toán online" name="payment-method" value="Thanh toán online" checked="checked">
                                <label for="Thanh toán online">Thanh toán online</label>
                            </li>
                            <li>
                                <input type="radio" id="Thanh toán trực tiếp" name="payment-method" value="Thanh toán trực tiếp">
                                <label for="Thanh toán trực tiếp">Thanh toán trực tiếp</label>
                            </li>
                        </ul>
                    </div>
                    <div class="place-order-wp clearfix">
                        <input type="submit" id="order-now" onclick="Redirect();" value="Đặt hàng">
                    </div>
        </form>

    </div>
</div>
</div>
</div>
@endsection
