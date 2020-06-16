<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'laravel for blog')</title>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ URL::asset('css/blog.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/wangEditor.min.css') }}">
</head>

<body>
    @include('layouts.header')
    <div class="container">
        <div class="blog-header">
        </div>
        <div class="row">
            @yield('content')
            @section('sidebar')
            <div id="sidebar" class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <aside id="widget-welcome" class="widget panel panel-default">
                    <div class="panel-heading">
                        欢迎！
                    </div>
                    <div class="panel-body">
                        <p>
                            欢迎来到该网站
                        </p>
                        <p>
                            <strong><a href="/"该网站</a></strong> 基于 Laravel5.4 构建
                        </p>
                    </div>
                </aside>
                <aside id="widget-categories" class="widget panel panel-default">
                    <div class="panel-heading">
                        专题
                    </div>
                    <ul class="category-root list-group">
                        @foreach($topics as $topic)
                        <li class="list-group-item">
                            <a href="/topic/{{$topic->top_id}}">{{$topic->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </aside>
            </div>
            @show
        </div>
    </div>
    @include('layouts.footer')
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/wangEditor.min.js') }}"></script>
    <script src="{{ URL::asset('js/ylaravel.js') }}"></script>
</body>

</html>
