<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;




class BlogController extends Controller
{

    public function __construct()
    {
        //ログイン機能が必要な処理はここに記載
        $this->middleware('auth')->only(['create', 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //インフィニティスクロール
    public function apiIndex()
    {
        $query = Blog::query();

        if ($tagId = request('tag')) {
            $query->whereHas('tags', function ($query) use ($tagId) {
                $query->where('tags.id', $tagId);
            });
        }

        $blogs = $query->with('author', 'tags')->latest()->paginate(10);
        return response()->json($blogs);
    }

    //pagenationとtagでフィルター
    public function index()
    {
        $query = Blog::query();

        if ($tagId = request('tag')) {
            $query->whereHas('tags', function ($query) use ($tagId) {
                $query->where('tags.id', $tagId);
            });
        }

        $blogs = $query->with('author', 'tags')->latest()->paginate(9);
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'tags' => 'sometimes|array',//manytomanyだから複数入ることもある。だからこれがいる
            'tags.*' => 'exists:tags,id'//複数ある要素のうち１つずつ検証
        ]);

        // データの保存処理
        $blog = new Blog();
        $blog->title = $validatedData['title'];
        $blog->body = $validatedData['body'];
        $blog->author_id = auth()->id(); // 認証ユーザーのIDをセット
        // その他のフィールドも同様にセット
        $blog->save();

        // タグの関連付け
        if (isset($validatedData['tags'])) {
            $blog->tags()->sync($validatedData['tags']);
        }

        // リダイレクト等の処理
        return redirect()->route('blogs.index')->with('success', '記事が投稿されました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
