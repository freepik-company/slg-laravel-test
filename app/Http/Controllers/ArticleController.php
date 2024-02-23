<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index()
    {
        $validator = Validator::make(Request::all(), [
            'id' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            abort(500, 'Invalid id');
        }

        if (request()->has('id')) {
            $articles = Article::where('id', request('id'))->get();
        } else {
            $articles = Article::limit(10)->get();
        }

        return view('articles.index', compact('articles'));
    }

    public function get()
    {
        $articles = Article::all();

        $sortedArticles = $articles->sortByDesc(fn($article) => $article->downloads->count());

        $data = $sortedArticles->take(5);

        return view('articles.list', ['data' => $data]);
    }
}
