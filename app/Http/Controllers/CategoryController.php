<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class CategoryController extends Controller
{
    public function index(): Application|Factory|View
    {
        $categories = Category::select(Category::$availableFields)->get();

        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    public function show(Category $category): Application|Factory|View
    {
        return view('categories.show', [
            'category' => $category
        ]);
    }
}
