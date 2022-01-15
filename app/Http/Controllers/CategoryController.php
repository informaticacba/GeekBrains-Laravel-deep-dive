<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = $this->getCategories();

        return view('category.index', [
            'categories' => $categories
        ]);
    }

    public function show(int $id)
    {
        $category = $this->getCategories($id);

        return view('category.show', [
            'category' => $category
        ]);
    }
}
