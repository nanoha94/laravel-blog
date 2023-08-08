<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{
    /**
     * ブログ一覧を表示する
     * 
     * @return view
     */
    public function showList()
    {
        $blogs = Blog::all();
        return view('blog.list', ['blogs' => $blogs]);
    }

    /**
     * ブログ詳細を表示する
     * @param int $id
     * @return view
     */
    public function showDetail($id)
    {
        $blog = Blog::find($id);

        // ブログがなかったら一覧に戻す
        if(is_null($blog)){
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('blogs'));
        }
        return view('blog.detail', ['blog' => $blog]);
    }

    /**
     * ブログ投稿フォームを表示する
     * 
     * @return view
     */
    public function showCreate()
    {
        return view('blog.form');
    }

    /**
     * ブログを登録する
     * 
     * @return view
     */
    public function exeStore(BlogRequest $request)
    {
        // ブログデータを受け取る
        $inputs = $request->all();

        \DB::beginTransaction();

        try{
            // ブログを登録
        Blog::create($inputs);
        \DB::commit();
        }
        catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', 'ブログを登録しました。');
        return redirect(route('blogs'));
    }
}
