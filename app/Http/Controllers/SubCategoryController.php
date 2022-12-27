<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    function SubCategoryAdd(){
        $categories = Category::orderBy('category_name', 'asc')->get();
        return view('backend.category.add_subcategory',[
            'categories' => $categories
        ]);
    }

    function SubCategoryPost(Request $request){
        $request->validate([
            'subcategory_name' => ['required','unique:sub_categories','min:3']
        ]);

        $subcategory = new SubCategory;
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->slug = Str::slug($request->subcategory_name);
        $subcategory->save();


        return back()->with('SubCategoryAdd', 'SubCategory Added Successfully');
    }


    function SubCategoryList(){
        $subcategory_view = SubCategory::with('category')->paginate(5);
        $ts_category = SubCategory::onlyTrashed()->get();
        return view('backend.category.subcategory_list',[
            'subcategory_view' => $subcategory_view,
            'ts_category' => $ts_category
        ]);
    }

    function SubCategoryDelete($id){
        SubCategory::findOrFail($id)->delete();
        return back()->with('SubCategoryDelete', 'Subcategory Delete Successfully');
    }

    function SubCategoryRestore($id){
        SubCategory::withTrashed()->findOrFail($id)->restore();
        return back()->with('SubCategoryRestore', "SubCategory Restore Successfully");
    }

    function SubCategoryParmanentDelete($id){
        SubCategory::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('SubCategoryParmanentDelete', "SubCategory Parmanent Delete Successfully");
    }

    function SubCategoryEdit($id){
        $sub_cat = SubCategory::Where('id', $id)->first();
        $categories = Category::orderBy('category_name', 'asc')->get();
        return view('backend.category.subcategory_edit',[
            'sub_cat' => $sub_cat,
            'categories' => $categories
        ]);
    }

    function SubCategoryUpdate(Request $req){
        $update = SubCategory::findOrFail($req->id);
        $update->category_id = $req->category_id;
        $update->subcategory_name = $req->subcategory_name;
        $update->slug = Str::slug($req->subcategory_name);
        $update->save();
        return back()->with('SubCategoryUpdate', "SubCategory Parmanent Delete Successfully");
    }

}
