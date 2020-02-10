@extends('layouts.master')
@section('content')
<div class="col-sm-8">
    <blockquote>
        <p><img src="/storage/9f0b0809fd136c389c20f949baae3957/iBkvipBCiX6cHitZSdTaXydpen5PBiul7yYCc88O.jpeg" alt="" class="img-rounded" style="border-radius:500px; height: 40px"> {{$userInfo->name}}
        </p>
        <footer>关注：{{$userInfo->fan_posts_count}}｜粉丝：{{$userInfo->star_posts_count}}｜文章：{{$userInfo->user_posts_count}}</footer>
        @include('user.badges.like', ['target_user' => $userInfo])
    </blockquote>
</div>
<div class="col-sm-8 blog-main">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">文章</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">关注</a></li>
            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">粉丝</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                @foreach($postInfo as $post)
                <div class="blog-post" style="margin-top: 30px">
                    <p class=""><a href="/user/{{$post->user->user_id}}">{{$post->user->name}}</a> {{$post->created_at->diffForHumans()}}</p>
                    <p class=""><a href="/posts/{{$post->post_id}}">{{$post->title}}</a></p>
                    <p>
                        <p>{!! str_limit($post->content, 100, '...') !!}</p>
                </div>
                @endforeach
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
                @foreach($starsInfo as $stars)
                <div class="blog-post" style="margin-top: 30px">
                    <p class="">{{$stars->name}}</p>
                    <p class="">关注：{{$stars->fan_posts_count}}｜粉丝：{{$stars->star_posts_count}}｜文章：{{$stars->user_posts_count}}</p>
                    @include('user.badges.like', ['target_user' => $stars])
                </div>
                @endforeach
            </div>
            <div class="tab-pane" id="tab_3">
                @foreach($fansInfo as $fans)
                <div class="blog-post" style="margin-top: 30px">
                    <p class="">{{$fans->name}}</p>
                    <p class="">关注：{{$fans->fan_posts_count}}｜粉丝：{{$fans->star_posts_count}}｜文章：{{$fans->user_posts_count}}</p>
                    @include('user.badges.like', ['target_user' => $fans])
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection