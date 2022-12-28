<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    public function index()
    {
        return ArticleResource::collection(Article::all());
    }

    public function show($id)
    {
        $article = Article::where('id', $id)->first();
        if ($article) {
            return new ArticleResource(Article::findOrFail($id));
        } else {
            return response()->error('Article not found', 400);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required|string|max:12',
            'image' => 'required|string',
            'title' => 'required|string',
            'content' => 'required|string'
        ]);

        $article = Article::create([
            'author' => $request->input('author'),
            'image' => $request->input('image'),
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);
        return response()->success($article, 'Successful Added Article', 201);
    }

    public function update(Request $request, $id)
    {
        $article = Article::where('id', $id)->first();
        if ($article) {
            $article->update([
                'author' => $request->input('author'),
                'image' => $request->input('image'),
                'title' => $request->input('title'),
                'content' => $request->input('content')
            ]);
            return response()->success($article, 'Successful Updated Article', 200);
        } else {
            return response()->error('Article not found!', 400);
        }
    }

    public function destroy($id)
    {
        $article = Article::where('id', $id)->first();
        if ($article) {
            $article->delete();
            return response()->success($article, 'Article Successful Deleted', 200);
        } else {
            return response()->error('Article not found!', 400);
        }
    }
}
