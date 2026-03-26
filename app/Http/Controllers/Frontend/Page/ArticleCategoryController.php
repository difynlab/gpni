<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleContent;
use App\Models\Setting;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    public function index(Request $request, ArticleCategory $article_category)
    {
        $contents = ArticleContent::find(1);

        $articles = Article::where('article_category_id', $article_category->id)->where('language', $request->middleware_language_name)->where('status', '1')->orderBy('id', 'desc')->paginate(8);
        if($articles->isEmpty() && $request->middleware_language_name != 'English') {
            $articles = Article::where('article_category_id', $article_category->id)->where('language', 'English')->where('status', '1')->orderBy('id', 'desc')->paginate(8);
        }

        $article_categories = ArticleCategory::where('language', $request->middleware_language_name)->where('status', '1')->orderBy('id', 'desc')->get();
        if($article_categories->isEmpty() && $request->middleware_language_name != 'English') {
            $article_categories = ArticleCategory::where('language', 'English')->where('status', '1')->orderBy('id', 'desc')->get();
        }
        $article_categories = $article_categories->filter(function ($category) {
            return Article::where('article_category_id', $category->id)->exists();
        });

        $settings = Setting::find(1);

        return view('frontend.pages.article-categories.index', [
            'contents' => $contents,
            'article_category' => $article_category,
            'articles' => $articles,
            'article_categories' => $article_categories,
            'settings' => $settings
        ]);
    }
}