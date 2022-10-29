@extends('layouts.admin')
@section('content')
    <div id="main-content-wp" class="clearfix detail-product-page">
        <div class="wp-inner">
            <div class="secion" id="breadcrumb-wp">
                <div class="secion-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title="">Điện thoại</a>
                        </li>
                        <li>
                            <a href="" title="">{{ $item->product_name }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            @php
                // dd($product_name->id)
            @endphp
            <div class="main-content fl-right">
                <div class="section" id="detail-product-wp">
                    <div class="section-detail clearfix">
                        <div class="thumb-wp fl-left">
                            <a href="" title="" id="main-thumb">
                                <img id="zoom" src="{{ asset($zoom_products->t3501) }}"
                                    data-zoom-image="{{ asset($zoom_products->thumb1) }}" />
                            </a>
                            <div id="list-thumb">
                                <a href="" data-image="{{ asset($zoom_products->t3501) }}"
                                    data-zoom-image="{{ asset($zoom_products->thumb1) }}">
                                    <img id="zoom" src="{{ asset($zoom_products->t501) }}" />
                                </a>
                                <a href="" data-image="{{ asset($zoom_products->t3502) }}"
                                    data-zoom-image="{{ asset($zoom_products->thumb2) }}">
                                    <img id="zoom" src="{{ asset($zoom_products->t502) }}" />
                                </a>
                                <a href="" data-image="{{ asset($zoom_products->t3503) }}"
                                    data-zoom-image="{{ asset($zoom_products->thumb3) }}">
                                    <img id="zoom" src="{{ asset($zoom_products->t503) }}" />
                                </a>
                                <a href="" data-image="{{ asset($zoom_products->t3504) }}"
                                    data-zoom-image="{{ asset($zoom_products->thumb4) }}">
                                    <img id="zoom" src="{{ asset($zoom_products->t504) }}" />
                                </a>
                                <a href="" data-image="{{ asset($zoom_products->t3505) }}"
                                    data-zoom-image="{{ asset($zoom_products->thumb5) }}">
                                    <img id="zoom" src="{{ asset($zoom_products->t505) }}" />
                                </a>
                                <a href="" data-image="{{ asset($zoom_products->t3501) }}"
                                    data-zoom-image="{{ asset($zoom_products->thumb1) }}">
                                    <img id="zoom" src="{{ asset($zoom_products->t501) }}" />
                                </a>
                            </div>
                        </div>
                        <div class="thumb-respon-wp fl-left">
                            <img src="public/images/img-pro-01.png" alt="">
                        </div>
                        <div class="info fl-right">
                            {{-- {{dd($inf_products)}} --}}
                            {{-- {{dd($products)}} --}}
                            <h3 class="product-name">{{ $item->product_name }}</h3>
                            @if ($inf_products->cat_title == 'Iphone' || $inf_products->cat_title == 'SamSung' )                               <div class="desc">
                                    <li>
                                        <p class="lileft">Màn hình:</p>
                                        <div class="liright">
                                            <span>{{ $inf_products->screen }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="lileft">Hệ điều hành:</p>
                                        <div class="liright">
                                            <span>{{ $inf_products->operating_system }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="lileft">Camera trước:</p>
                                        <div class="liright">
                                            <span>{{ $inf_products->rear_camera }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="lileft">Camera sau:</p>
                                        <div class="liright">
                                            <span>{{ $inf_products->front_camera }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="lileft">Chip:</p>
                                        <div class="liright">
                                            <span>{{ $inf_products->Chip }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="lileft">Ram</p>
                                        <div class="liright">
                                            <span>{{ $inf_products->RAM }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="lileft">Bộ nhớ:</p>
                                        <div class="liright">
                                            <span>{{ $inf_products->Memory }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="lileft">Sim</p>
                                        <div class="liright">
                                            <span>{{ $inf_products->Sim }}</span>
                                        </div>
                                    </li>
                                    <li class="charger">
                                        <p class="lileft">Pin:</p>
                                        <div class="liright">
                                            <span>{{ $inf_products->Pin_charger }}</span>
                                        </div>
                                    </li>


                                </div>
                            @else
                                <div class="desc">
                                    <li>
                                        <p class="lileft">Màn hình:</p>
                                        <div class="liright">
                                            <span>{{ $inf_products->screen }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="lileft">Hệ điều hành:</p>
                                        <div class="liright">
                                            <span>{{ $inf_products->operating_system }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="lileft">Chip:</p>
                                        <div class="liright">
                                            <span>{{ $inf_products->Chip }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="lileft">Ram</p>
                                        <div class="liright">
                                            <span>{{ $inf_products->RAM }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="lileft">CPU:</p>
                                        <div class="liright">
                                            <span>{{ $inf_products->CPU }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="lileft">Ổ cứng:</p>
                                        <div class="liright">
                                            <span>{{ $inf_products->hard_drive }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="lileft">Card màn hình:</p>
                                        <div class="liright">
                                            <span>{{ $inf_products->card }}</span>
                                        </div>
                                    </li>

                                    <li>
                                        <p class="lileft">Cổng kết nối:</p>
                                        <div class="liright">
                                            <span>{{ $inf_products->connector }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="lileft">Đặc biệt:</p>
                                        <div class="liright">
                                            <span>{{ $inf_products->special }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="lileft">Kích thước, trọng lượng:</p>
                                        <div class="liright">
                                            <span>{{ $inf_products->size_weight }}</span>
                                        </div>
                                    </li>
                                    <li class="charger">
                                        <p class="lileft">Thời điểm ra mắt:</p>
                                        <div class="liright">
                                            <span>{{ $inf_products->release_time }}</span>
                                        </div>
                                    </li>

                                </div>
                            @endif

                            <div class="num-product">
                                <span class="title">Sản phẩm: </span>
                                <span class="status">Còn hàng</span>
                            </div>
                            <p class="price" style="padding-bottom: 10px">
                                {{ number_format($item->price) }}VNĐ
                            </p>
                            {{-- <div id="num-order-wp">
                                <a title="" id="minus"><i class="fa fa-minus"></i></a>
                                <input type="text" name="num-order" value="1" id="num-order">
                                <a title="" id="plus"><i class="fa fa-plus"></i></a>
                            </div> --}}
                            {{-- <a href="{{route('cart_add' , $products->id)}}" title="Thêm giỏ hàng" class="add-cart">Thêm giỏ hàng</a> --}}

                            <a onclick="AddCart({{ $item->id }})" href="javascript:" title="Thêm giỏ hàng"
                                class="add-cart">Thêm giỏ hàng</a>
                            {{-- @endforeach --}}

                        </div>
                    </div>
                </div>
              
                

                <div class="section" id="post-product-wp">
                    <div class="section-head">
                        <h2 class="section-title">Mô tả sản phẩm</h2>
                    </div>
                    <div class="view-more">
                      {{-- {{dd($product_content)}} --}}
                      <div class="bold">
                        <p>{{$product_content->content_1}}</p>
                        <p><img src="{{asset($product_content->thumb_1)}}" alt=""></p>
                        <h5>{{$product_content->h31}}</h5>
                        <p>{{$product_content->content_2}}</p>
                        <p><img src="{{asset($product_content->thumb_2)}}" alt=""></p>
                        <h5>{{$product_content->h32}}</h5>
                        <p>{{$product_content->content_3}}</p>
                        <p><img src="{{asset($product_content->thumb_3)}}" alt=""></p>
                        <h5>{{$product_content->h33}}</h5>
                        <p>{{$product_content->content_4}}</p>
                        <p><img src="{{asset($product_content->thumb_4)}}" alt=""></p>
                        <h5>{{$product_content->h34}}</h5>
                        <p>{{$product_content->content_5}}</p>
                        <p><img src="{{asset($product_content->thumb_5)}}" alt=""></p>
                        <h5>{{$product_content->h35}}</h5>
                        <p>{{$product_content->content_6}}</p>
                        <p><img src="{{asset($product_content->thumb_6)}}" alt=""></p>
                        <h5>{{$product_content->h36}}</h5>
                        <p>{{$product_content->content_7}}</p>
                        <p><img src="{{asset($product_content->thumb_7)}}" alt=""></p>
                        <h5>{{$product_content->h37}}</h5>
                        <p>{{$product_content->content_8}}</p>
                        <p><img src="{{asset($product_content->thumb_8)}}" alt=""></p>
                        <h5>{{$product_content->h38}}</h5>
                        <p>{{$product_content->content_9}}</p>
                        <p><img src="{{asset($product_content->thumb_9)}}" alt=""></p>
                        <h5>{{$product_content->h39}}</h5>
                        <p>{{$product_content->content_10}}</p>
                        <p><img src="{{asset($product_content->thumb_10)}}" alt=""></p>
                        <h5>{{$product_content->h310}}</h5>
                        <p>{{$product_content->content_11}}</p>
                        <p><img src="{{asset($product_content->thumb_11)}}" alt=""></p>
                        <h5>{{$product_content->h311}}</h5>
                        <p>{{$product_content->content_12}}</p>
                        <p><img src="{{asset($product_content->thumb_12)}}" alt=""></p>
  
                      </div>
                     
                     
                    
                    </div>
                    <div class="btn-show btn-view-more"><i class="fas fa-hand-point-down"></i> Xem thêm</div>
                    <div class="btn-show btn-hidden hidden"><i class="fas fa-hand-point-up"></i> Ẩn bớt</div>
                </div>

            </div>

            @include('layouts.sidebar_not')
        </div>
    </div>
@endsection


