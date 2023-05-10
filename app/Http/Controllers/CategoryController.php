<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function create()
    {
        $categoriesAll = Category::get();
        $categories = Category::whereNull('category_id')
            ->with('categories')
            ->get();
        return view('adminCategory', compact('categoriesAll', 'categories'));
    }
    public function store(Request $request)
    {
        $data = array(
            'name' => $request->name,
            'category_id' => $request->category_id,
        );
        $add = Category::create($data);
        return back()->with('success', 'New Category added successfully!');
    }
    public function delete($id)
    {
        $category = Category::with('categories')->findOrFail($id);
        if (count($category->categories)) {
            $subcategories = $category->categories;
            foreach ($subcategories as $cat) {
                $cat = Category::findOrFail($cat->id);
                $cat->delete();
            }
        }
        $category->delete();
        return redirect()->back()->with('delete', 'Category has been deleted successfully.');
    }
    public function getcategoryDetails($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::whereNull('category_id')
            ->with('categories')
            ->get();
        return view('adminEditCategory', compact('category', 'categories'));
    }
    public function edit(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->name = $request->name;
        $category->category_id = $request->category_id;
        $category->save();
        return redirect()->route('category.add');
    }
}
