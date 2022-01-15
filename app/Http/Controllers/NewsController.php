<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $id_category = $request->get('category') ?? null;
        $news = $this->getNews($id_category);

        return view('news.index', [
            'newsList' => $news
        ]);
    }

    public function show(int $id)
    {
        $news = $this->getNewsOne($id);

        return view('news.show', [
            'news' => $news
        ]);
    }
}
