<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showAll()
    {
        $categories = Category::all();

        return view('category.showAll', [
            'title' => 'Список категорий',
            'categories' => $categories,
        ]);
    }
}
