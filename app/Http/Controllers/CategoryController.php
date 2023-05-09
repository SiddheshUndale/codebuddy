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
        $categories = Category::whereNull('category_id')->get();
        $categoriesAll = Category::get();
        return view('adminCategory', compact('categoriesAll', 'categories'));
    }
    public function store(Request $request)
    {
        $data = array(
            'name' => $request->name,
            'category_id' => $request->category_id,
        );
        $add = Category::create($data);
        return self::create();
    }
    public function delete($id)
    {
        $category = Category::where('id', $id)->firstorfail()->delete();
        return self::create();
    }
}
