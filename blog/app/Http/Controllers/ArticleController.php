<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    public function __construct() {
        $this->middleware("auth")->except(['index', 'detail']);
    }

    public function index()
    {
         
        $data = Article::latest()->paginate(5);

        return view('articles.index', [
            'articles' => $data
        ]);
    }

    public function detail($id)
    {
        $data = Article::find($id);

        return view('articles.detail', [
            'article' => $data
        ]);
    }
    public function add() {
        

        return view("articles.add", [
            'categories' => Category::all(),
        ]);
    }
    public function edit($id) {
        $article = Article::find($id);

        return view('articles.edit', [
            "categories" => Category::all(),
            "article" => $article,
        ]);
    }

    public function create() 
    {
        $validator = validator(request()->all(), [
            "title" => "required",
            "body" => "required",
            "category_id" => "required",
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $article = new Article();
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->user_id = Auth::id();
        $article->save();

        return redirect("/articles");
    }
    public function update($id) 
    {
        $validator = validator(request()->all(), [
            "title" => "required",
            "body" => "required",
            "category_id" => "required",
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $article = Article::find($id);
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->save();

        return redirect("/articles/")->with("edit", "An Article Edited");
    }

    public function delete($id) {
        $article = Article::find($id);
        if(Gate::allows('delete-article', $article)) {
            return back()->with('info', 'Unauthorized action');
        }
        $article->delete();
        return redirect("/articles")->with("info", "An article deleted");
    }
}
