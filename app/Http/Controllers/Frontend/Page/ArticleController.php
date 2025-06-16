<?php

namespace App\Http\Controllers\Frontend\Page;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleContent;
use App\Models\Setting;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $contents = ArticleContent::find(1);

        $articles = Article::where('language', $request->middleware_language_name)->where('status', '1')->orderBy('id', 'desc')->paginate(8);
        if($articles->isEmpty() && $request->middleware_language_name != 'English') {
            $articles = Article::where('language', 'English')->where('status', '1')->orderBy('id', 'desc')->paginate(8);
        }

        $recommended_articles = Article::where('recommending', 'Yes')->where('language', $request->middleware_language_name)->where('status', '1')->orderBy('id', 'desc')->paginate(8);
        if($recommended_articles->isEmpty() && $request->middleware_language_name != 'English') {
            $recommended_articles = Article::where('recommending', 'Yes')->where('language', 'English')->where('status', '1')->orderBy('id', 'desc')->paginate(8);
        }

        $trending_articles = Article::where('language', $request->middleware_language_name)->where('status', '1')->orderBy('view_count', 'desc')->take(5)->get();

        if($trending_articles->isEmpty() && $request->middleware_language_name != 'English') {
            $trending_articles = Article::where('language', 'English')->where('status', '1')->orderBy('view_count', 'desc')->take(5)->get();
        }

        $settings = Setting::find(1);

        return view('frontend.pages.articles.index', [
            'contents' => $contents,
            'articles' => $articles,
            'recommended_articles' => $recommended_articles,
            'trending_articles' => $trending_articles,
            'settings' => $settings
        ]);
    }
    
    public function show(Request $request, Article $article)
    {
        $contents = ArticleContent::find(1);

        $latest_articles = Article::where('language', $request->middleware_language_name)->where('status', '1')->orderBy('id', 'desc')->take(5)->get();
        if($latest_articles->isEmpty() && $request->middleware_language_name != 'English') {
            $latest_articles = Article::where('language', 'English')->where('status', '1')->orderBy('id', 'desc')->take(5)->get();
        }

        $settings = Setting::find(1);

        $article->view_count += 1;
        $article->save();

        // Pagination
            $current_article_id = $article->id;
            $next_article = null;
            $previous_article = null;

            $all_articles = Article::where('language', $request->middleware_language_name)->where('status', '1')->orderBy('id', 'asc')->get();
            if($all_articles->isEmpty() && $request->middleware_language_name != 'English') {
                $all_articles = Article::where('language', 'English')->where('status', '1')->orderBy('id', 'asc')->get();
            }

            foreach($all_articles as $all_article) {
                if($all_article->id > $current_article_id && $all_article->status == '1') {
                    $next_article = $all_article;
                    break;
                }
            }
            if(!$next_article) {
                $next_article = $all_articles->first();
            }

            foreach($all_articles as $all_article) {
                if($all_article->id < $current_article_id && $all_article->status == '1') {
                    $previous_article = $all_article;
                }
            }
            if(!$previous_article) {
                $previous_article = $all_articles->last();
            }
        // Pagination

        $you_like_articles = Article::where('language', $request->middleware_language_name)->where('status', '1')->whereNot('id', $article->id)->take(4)->inRandomOrder()->get();
        if($you_like_articles->isEmpty() && $request->middleware_language_name != 'English') {
            $you_like_articles = Article::where('language', 'English')->where('status', '1')->whereNot('id', $article->id)->take(4)->inRandomOrder()->get();
        }

        return view('frontend.pages.articles.show', [
            'contents' => $contents,
            'article' => $article,
            'latest_articles' => $latest_articles,
            'settings' => $settings,
            'previous_article' => $previous_article,
            'next_article' => $next_article,
            'you_like_articles' => $you_like_articles
        ]);
    }
}