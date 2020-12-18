<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function viewCategory()
    {
        $categories = Category::all();
        return view('dashboard.category.view', compact('categories'));
    }

    public function createCategory()
    {
        return view('dashboard.category.create');
    }

    public function createCategoryPost(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return back();
    }

    public function updateCategory($id, Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->update();
        return back();
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        return back();
    }
}
