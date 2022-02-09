<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request): Application|Factory|View
    {
        $category_id = $request->get('category');

        $news =
            ($category_id)
                ? Category::query()->find($category_id)->news()->with('categories')
                : News::query();

        $news = $news
//            ->where('status', '=', 'ACTIVE')
            ->select(News::$availableFields)
            ->get();

        return view('news.index', [
            'newsList' => $news
        ]);
    }

    public function show(News $news): Application|Factory|View
    {
        $categories =
            $news->categories
                ->map(fn($category) => $category->title)
                ->join(', ');

        return view('news.show', [
            'news' => $news,
            'categories' => $categories
        ]);
    }
}
