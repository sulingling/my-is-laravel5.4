<?php
namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Routing\Controller;

class PostsController extends Controller
{

    /**
     *  文章列表页面
     * @author sulingling
     * @DateTime 2019-10-31
     * @version  [version]
     * @return   [type]     [description]
     */
    public function index()
    {
        $posts = Posts::orderBy('created_at', 'desc')
            ->paginate(6);
        return view('posts.index', compact('posts'));
    }

    /**
     *  创建文章表单页面
     * @author sulingling
     * @DateTime 2019-10-31
     * @version  [version]
     * @return   [type]     [description]
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     *  创建文章表单提交页面
     * @author sulingling
     * @DateTime 2019-10-31
     * @version  [version]
     * @return   [type]     [description]
     */
    public function store()
    {
        return '创建文章表单提交页面';
    }

    /**
     *  文章详情页面
     * @author sulingling
     * @DateTime 2019-10-31
     * @version  [version]
     * @return   [type]     [description]
     */
    public function show()
    {
        return view('posts.show');
    }

    /**
     *  变价文章表单页面
     * @author sulingling
     * @DateTime 2019-10-31
     * @version  [version]
     * @return   [type]     [description]
     */
    public function edit()
    {
        return view('posts.edit');
    }

    /**
     *  编辑文章提交表单页面
     * @author sulingling
     * @DateTime 2019-10-31
     * @version  [version]
     * @return   [type]     [description]
     */
    public function update()
    {
        return '编辑文章提交表单页面';
    }

    /**
     *  文章删除页面
     * @author sulingling
     * @DateTime 2019-10-31
     * @version  [version]
     * @return   [type]     [description]
     */
    public function delete()
    {
        return '文章删除页面';
    }
}
