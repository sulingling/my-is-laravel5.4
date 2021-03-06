@extends('admin.layouts.main')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-lg-10 col-xs-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">专题列表</h3>
                </div>
                <a type="button" class="btn " href="/admin/topics/create">增加专题</a>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>专题名称</th>
                                <th>操作</th>
                            </tr>
                            @foreach($topics as $topic)
                            <tr>
                                <td>{{$topic->top_id}}</td>
                                <td>{{$topic->name}}</td>
                                <td>
                                    <!-- <a type="button" class="btn resource-delete" delete-url="/admin/topics/{{$topic->top_id}}" href="/admin/topics/{{$topic->top_id}}">删除</a> -->
                                    <a type="button" class="btn" href="/admin/topics/{{$topic->top_id}}/delete">删除</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

