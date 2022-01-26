<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = new News();
        $category_id = $request->get('category') ?? null;
        $news = $category_id ? $news->getNewsCategory($category_id) : $news->getNews();

        return view('news.index', [
            'newsList' => $news
        ]);
    }

    public function show(int $id)
    {
        $news = new News();
        $news = $news->getNewsById($id);

        return view('news.show', [
            'news' => $news
        ]);
    }
}
