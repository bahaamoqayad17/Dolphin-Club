<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Setting;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['is_admin', 'auth'])->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->has('keyword')) {
            $articles = Article::where('title_' . App::getLocale(), 'like', '%' . request()->keyword . '%')->paginate(5);
        } else {
            $articles = Article::paginate(15);
        }

        return view('dashboard.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('dashboard.articles.update');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticlesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        $article = Article::updateOrCreate(
            ['id' => $request->id],
            $request->validated()
        );
        if ($request->file('image')) {
            $image = time();
            $request->file('image')->move(public_path('uploads'), $image);
            $article->update([
                'image' => $image,
            ]);
        }

        return redirect()->route('dashboard.articles.index')->with('msg', 'Article Added Successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $data = [];
        $settings = Setting::all();
        foreach ($settings as $setting) {
            $value = json_decode($setting->value, true);
            $data += [$setting->key => $value];
        }
        $articles = Article::orderBy('created_at', 'desc')->take(10)->get();

        return view('site.news-details', compact('article', 'articles', 'data'));
    }

    public function edit(Article $article)
    {
        return view('dashboard.articles.update', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticlesRequest  $request
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        dd($article);
        $article->update([
            'flag' => !($article->flag),
        ]);

        return redirect()->route('dashboard.articles.index')->with('msg', 'Article Selected Successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if (file_exists(public_path('uploads/' . $article->image))) {
            File::delete(public_path('uploads/' . $article->image));
        }
        $article->delete();

        return redirect()->route('dashboard.articles.index')->with('msg', 'Article Deleted Successfully')->with('type', 'error');
    }
}
