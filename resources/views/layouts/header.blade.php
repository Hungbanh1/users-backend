 <!DOCTYPE html>
 <html>

 <head>
     <title>ISMART STORE</title>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <base href="http://localhost/laravelpro/unimart/users/">
     <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />

     

     <link href="public/css/reset.css" rel="stylesheet" type="text/css" />
     {{-- <link href="public/css/reset1.css" rel="stylesheet" type="text/css" /> --}}
     <link href="public/css/success.css" rel="stylesheet" type="text/css" />
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
         integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
          integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
     </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
     </script>
     <link href="public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css" />
     <link href="public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css" />
     <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
     <link href="public/style.css" rel="stylesheet" type="text/css" />
     <link href="public/responsive.css" rel="stylesheet" type="text/css" />
     <link href="public/css/add_css/style.css" rel="stylesheet" type="text/css" />
     <link href="public/css/search/search.css" rel="stylesheet" type="text/css" />
     {{-- <link href="public/bootstrap-reboot.css.map" rel="stylesheet" type="text/css" > --}}


     <script src="public/js/jquery-3.6.0.min.js" type="text/javascript"></script>
     <script src="public/js/ajax.js" type="text/javascript"></script>
     <script src="public/js/search.js" type="text/javascript"></script>
     <script src="public/js/alertify.min.js" type="text/javascript"></script>
     <script src="public/js/alertify.js" type="text/javascript"></script>
     <script src="public/js/viewmore.js" type="text/javascript"></script>
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

     <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
         integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
         crossorigin="anonymous" />

     <!-- CSS -->
     <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
     <!-- Default theme -->
     <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
     <!-- Semantic UI theme -->
     <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
     <!-- Bootstrap theme -->
     <link rel="stylesheet"
         href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />




     <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>

     {{-- <script
     src="https://code.jquery.com/jquery-3.6.0.js"
     integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
     crossorigin="anonymous"></script> --}}

     <script src="public/js/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
     <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
     <script src="public/js/carousel/owl.carousel.js" type="text/javascript"></script>
     <script src="public/js/main.js" type="text/javascript"></script>
 </head>



 <body>
     <div id="site">
         <div id="container">
             <div id="header-wp" >
                 <div id="head-top" class="clearfix">
                     <div class="wp-inner">
                         <a href="{{ url('chinh-sach-bao-mat') }}" title="" id="payment-link"
                             class="fl-left">Chính sách bảo mật</a>
                         <div id="main-menu-wp" class="fl-right">
                             <ul id="main-menu" class="clearfix">
                                 <li>
                                     <a href="{{ url('/') }}" title="">Trang chủ</a>
                                 </li>
                                 <li>
                                     <a href="{{ url('san-pham') }}" title="">Sản phẩm</a>
                                 </li>
                                 <li>
                                     <a href="{{ url('bai-viet') }}" title="">Bài viết</a>
                                 </li>
                                 <li>
                                     <a href="{{ url('gioi-thieu') }}" title="">Giới thiệu</a>
                                 </li>
                                 <li>
                                     <a href="{{ url('lien-he') }}" title="">Liên hệ</a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div id="head-body" class="clearfix">
                     <div class="wp-inner">
                         <a href="{{ url('/') }}" title="" id="logo" class="fl-left"><img
                                 src="public/images/logo.png" /></a>
                         <div id="search-wp" class="fl-left">
                             <form method="GET" action="{{ route('search') }}">
                                 {{-- @csrf --}}
                                 <input type="text" class="keyword" name="keyword" id="s"
                                     placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                 <button type="submit" id="sm-s">Tìm kiếm</button>

                             </form>

                             <ul id="search-data">



                                 <li class="clearfix">
                                     <a href="">
                                         <div class="thumb-info fl-left">
                                             <img src="" alt="">
                                         </div>
                                         <div class="info-product fl-left">
                                             <p class="product_name"></p>
                                             <p class="price"></p>
                                         </div>
                                     </a>
                                 </li>

                             </ul>

                         </div>
                         <div id="action-wp" class="fl-right">
                             <div id="advisory-wp" class="fl-left">
                                 <span class="title">Tư vấn</span>
                                 <span class="phone">0979.468.095</span>
                             </div>
                             <div id="btn-respon" class="fl-right"><i class="fa fa-bars"
                                     aria-hidden="true"></i></div>
                             <a href="?page=cart" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                 <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                 <span id="num">2</span>
                             </a>
                             <div id="cart-wp" class="cart_show_again fl-right">
                                 <div id="btn-cart">
                                     <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                     <span id="num" class="order_num">{{ Cart::count() }}</span>
                                 </div>
                                 <div id="dropdown" class="list_cart_show">
                                     @if (Cart::count() > 0)
                                         <p class="desc">Có <span>{{ Cart::count() }} sản phẩm</span> trong
                                             giỏ hàng</p> --}}

                                         <ul class="list-cart">
                                             @foreach (Cart::content() as $item)
                                                 <li class="clearfix">
                                                     <a href="" title="" class="thumb fl-left">
                                                         <img src="{{ asset($item->options->thumb) }}" alt="">
                                                     </a>
                                                     <div class="info fl-right">
                                                         <a href="" title=""
                                                             class="product-name">{{ $item->name }}</a>
                                                         <p class="price">{{ number_format($item->price) }}
                                                             VNĐ </p>

                                                         <p class="qty">Số lượng:
                                                             <strong>{{ $item->qty }}</strong>
                                                             {{-- <span></span> --}}
                                                         </p>
                                                     </div>
                                                 </li>
                                             @endforeach
                                         </ul>
                                         <div class="total-price clearfix">
                                             <p class="title fl-left">Tổng:</p>
                                             <p class="price fl-right">{{ Cart::total() }}VNĐ</p>
                                         </div>
                                         <div class="action-cart clearfix">
                                             <a href="{{ url('gio-hang/gio-hang-cua-ban') }}" title="Giỏ hàng"
                                                 class="view-cart fl-left">Giỏ hàng</a>
                                             <a href="{{ url('thanh-toan/dien-thong-tin-cua-ban') }}"
                                                 title="Thanh toán" class="checkout fl-right">Thanh
                                                 toán</a>

                                         </div>
                                     @else
                                         <img src="public/images/cart_none.png" alt="">
                                         <p class="desc">Giỏ hàng của bạn đang rỗng!!! </p>
                                         <span class="desc">Hãy shopping !!!</span>
                                     @endif

                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
            
