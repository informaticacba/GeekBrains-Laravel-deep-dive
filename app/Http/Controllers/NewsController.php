<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Application;

class NewsController extends Controller
{
    public function index(): Application|Factory|View
    {
        $news = News::with('categories')
            ->whereHas('categories', function (Builder $query) {
                $category_id = request()->get('categories') ?? null;
                if ($category_id)
                    $query->where('id', '=', $category_id);
            })
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
