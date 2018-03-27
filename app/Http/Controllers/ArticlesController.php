<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    //
    public function index()
    {
        $articles = Article::latest()->published()->get();
        return view('article/index', compact('articles'));
    }

    //展现单个文章
    public function show($id)
    {
        $article = Article::findOrFail($id);
        dd($article->published_at->diffForHumans());
        return view('article/show', compact('article'));
    }

    //创建一篇文章
    public function create()
    {
        return view('article/create');
    }

    //表单提交
    public function store(\App\Http\Requests\CreateArticleRequest $request)
    {
        //接受传过来的数据
        //存入数据库
        //重定向
        Article::create($request->all());
        return redirect('/articles');
    }

    //修改文章
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article/edit', compact('article'));
    }

    public function update(\App\Http\Requests\CreateArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());

        return redirect('/articles');
    }
}
