@extends('layouts.master')
@section('content')
<div class="col-sm-8 blog-main">
    <div class="blog-post">
        <div style="display:inline-flex">
            <h2 class="blog-post-title">{{$posts->title}}</h2>
            @can('update', $posts)
            <a style="margin: auto" href="/posts/{{$posts->post_id}}/edit">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>
            @endcan
            @can('delete', $posts)
            <a style="margin: auto" href="/posts/{{$posts->post_id}}/delete">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </a>
            @endcan
        </div>
        <p class="blog-post-meta">{{$posts->created_at->toFormattedDateString()}} <a href="#">{{$posts->user->name ?? ''}}</a></p>
            {!! $posts->content !!}
        <div>
            @if($posts->assists(\Auth::id())->exists())
            <a href="/posts/{{$posts->post_id}}/unassists" type="button" class="btn btn-default btn-lg">取消赞</a>
            @else
            <a href="/posts/{{$posts->post_id}}/assist" type="button" class="btn btn-primary btn-lg">赞</a>
            @endif
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">评论</div>
        <ul class="list-group">
            @foreach($posts->comments as $comment)
            <li class="list-group-item">
                <h5>{{$comment->created_at}} by {{$comment->user->name}}</h5>
                <div>
                    {{$comment->content}}
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">发表评论</div>
        <ul class="list-group">
            <form action="/posts/{{$posts->post_id}}/comment" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="post_id" value="{{$posts->post_id}}" />
                <li class="list-group-item">
                    <textarea name="content" class="form-control" rows="10"></textarea>
                    @include('layouts.error')
                    <button class="btn btn-default" type="submit">提交</button>
                </li>
            </form>
        </ul>
    </div>
</div>
@endsection
