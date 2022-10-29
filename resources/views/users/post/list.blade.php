@extends('layouts.admin')
@section('content')
    <div id="main-content-wp" class="clearfix blog-page">

        {{-- {{dd($posts)}} --}}
        <div class="wp-inner">
            <div class="secion" id="breadcrumb-wp">
                <div class="secion-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title="">Bài viết</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-content fl-right">
                <div class="section" id="list-blog-wp">
                    <div class="section-head clearfix">
                        <h3 class="section-title">Bài viết</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item">
                            @foreach ($posts as $item)
                                <li class="clearfix">
                                    <a href="{{route('detail_post' ,[Str::slug($item->slug)])}}" title="" class="thumb fl-left">
                                        <img src="{{ asset($item->page_thumb1) }}" alt="">
                                    </a>
                                    <div class="info fl-right">
                                        <a href="{{route('detail_post' ,[Str::slug($item->slug)])}}" title=""
                                            class="title">{{ $item->page_title }}</a>
                                        <span class="create-date">{{ $item->created_at }}</span>
                                        <p class="desc">{{ $item->page_content }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                {{$posts->links()}}
            </div>
            @include('layouts.sidebar_not')
        </div>
    </div>
@endsection
