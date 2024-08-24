<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin_categories()
    {
        $categories = Category::all();
        return view('admin.category.category', compact('categories'));

    }

    public function create_category(Request $request)
    {
        $category = new Category;

        $category->category_name = $request->category_name;

        $category->save();
        
        toastr()->closeButton()->timeOut(1000)->success('Category Created Successfully!');

        return redirect()->back();
    }

    public function delete_category($id)
    {
        $category = Category::find($id);
        $category->delete();
        toastr()->closeButton()->timeOut(3000)->success('Category Deleted Successfully!');
        return redirect()->back();
    }
}
