<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Session;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index')->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        Session::flash('success', 'New Category has been created');
        return redirect()->route('adminCategories');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('adminCategories');
    } 
}
