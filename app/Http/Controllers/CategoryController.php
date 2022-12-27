<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;
use App\softDeletes;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
   function AddCategory(){
       return view('backend.category.add_category');
   }

   function CategoryPost(Request $request){

    $request->validate([
        'category_name' => ['required', 'unique:categories', 'min:3'],
    ]);

    $category = new Category;
    $category->category_name = $request->category_name;
    $category->slug = Str::slug($request->category_name);
    $category->save();

    return back()->with('CategoryAdd', "Category Added Successfully");

   }

    function CategoryList(){
        $categories = Category::paginate(10);
        $trush_category = Category::onlyTrashed()->get();
        return view('backend.category.category_list',[
            'categories' => $categories,
            'trush_category' => $trush_category
        ]);
    }

    function CategoryDelete($id){
            Category::findOrFail($id)->delete();
            return back()->with('CategoryDelete', "Category Delete Successfully");
    }

    function CategoryRestore($id){
        Category::withTrashed()->findOrFail($id)->restore();
        return back()->with('CategoryRestore', "Category Restore Successfully");

    }

    function CategoryParmanentDelete($id){
        Category::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('CategoryParmanentDelete', "Category Parmanent Delete Successfully");
    }

    function CategoryEdit($id){
        $category_edit = Category::findOrFail($id);
        return view('backend.category.category_edit',[
            'category_edit' => $category_edit
        ]);
    }

    function CategoryUpdate(Request $req){
        // Form Validation
        $req->validate([
            'category_name' => ['required', 'unique:categories', 'min:3'],
        ]);

        $update = Category::findOrFail($req->id);
        $update->category_name = $req->category_name;
        $update->slug = Str::slug($req->category_name);
        $update->save();
        return redirect()->route('CategoryList');
    }

}
