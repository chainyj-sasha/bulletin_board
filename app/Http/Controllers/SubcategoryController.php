<?php

namespace App\Http\Controllers;


use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function show($id)
    {
        $subcategories = Subcategory::where('category_id', $id)->get();

        return view('subcategory.show', [
            'title' => 'Список подкатегорий',
            'subcategories' => $subcategories,
        ]);
    }
}
