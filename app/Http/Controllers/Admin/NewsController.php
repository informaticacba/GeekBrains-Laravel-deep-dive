<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\DataSource;
use App\Models\News;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index():Application|Factory|View
    {
        $news = News::with('categories')->paginate(10);

        return view('admin.news.index', [
            'newsList' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create():Application|Factory|View
    {
        $categories = Category::all();
        $data_sources = DataSource::all();

        return view('admin.news.create', [
            'categories' => $categories,
            'data_sources' => $data_sources
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5']
        ]);

        $data = $request->only(['title', 'author', 'status', 'source_id', 'short_description', 'description']) + [
            'slug' => Str::slug($request->input('title'))
        ];

        $created = News::create($data);

        if ($created) {
            foreach ($request->input('categories') as $category) {
                DB::table('categories_has_news')
                    ->insert([
                        'category_id' => intval($category),
                        'news_id' => $created->id
                    ]);
            }

            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно добавлена');
        }

        return back()
            ->with('error', 'Не удалось добавить запись')
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return Application|Factory|View
     */
    public function edit(News $news):Application|Factory|View
    {
        $categories = Category::all();
        $data_sources = DataSource::all();
        $selectCategories = DB::table('categories_has_news')
            ->where('news_id', $news->id)
            ->get()
            ->map(fn($item) => $item->category_id)
            ->toArray();

        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories,
            'data_sources' => $data_sources,
            'selectCategories' => $selectCategories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(Request $request, News $news):RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5']
        ]);

        $data = $request->only(['title', 'author', 'status', 'source_id', 'short_description', 'description']) + [
                'slug' => Str::slug($request->input('title'))
            ];

        $updated = $news->fill($data)->save();

        if ($updated) {
            DB::table('categories_has_news')
                ->where('news_id', '=', $news->id)
                ->delete();

            foreach ($request->input('categories') as $category) {
                DB::table('categories_has_news')
                    ->insert([
                        'category_id' => intval($category),
                        'news_id' => $news->id
                    ]);
            }

            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()
            ->with('error', 'Не удалось обновить запись')
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}
