<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private Category $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new Category();
    }

    public function index()
    {
        $categories = $this->categoryModel->getCategories();

        return view('category.index', [
            'categories' => $categories
        ]);
    }

    public function show(int $id)
    {
        $category = $this->categoryModel->getCategory($id);

        return view('category.show', [
            'category' => $category
        ]);
    }
}
