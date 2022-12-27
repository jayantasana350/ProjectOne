<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    function BrandAdd(){
        return view('backend.attributes.brand_add');
    }

    function BrandPost(Request $request){
        $brand = new Brand;
        $brand->brand_name = $request->brand_name;
        $brand->slug = Str::slug($request->brand_name);
        $brand->save();
        return back()->with('BrandAdd', 'Brand Added Successfully');
    }

    function BrandList(){
        $brands = Brand::paginate(3);
        $brandcount = Brand::count();
        $trashbrand = Brand::onlyTrashed()->get();
        return view('backend.attributes.brand_list',[
            'brands' => $brands,
            'trashbrand' => $trashbrand,
            'brandcount' => $brandcount
        ]);
    }

    function BrandDelete($id){
        Brand::findOrFail($id)->delete();
        return back()->with('BrandDelete', 'Brand Delete Successfully');
    }

    function BrandRestore($id){
        Brand::withTrashed()->findOrFail($id)->restore();
        return back()->with('BrandRestore', 'Brand Restore Successfully');
    }

    function BrandParmanentDelete($id){
        Brand::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('BrandParmanentDelete', 'Brand Parmanent Delete Successfully');
    }

    function BrandEdit($id){
        $brandedit = Brand::findOrFail($id);
        return view('backend.attributes.brand_edit',[
            'brandedit' => $brandedit
        ]);
    }

    function BrandUpdate(Request $req){
        $brandupdate = new Brand;
        $brandupdate->brand_name = $req->brand_name;
        $brandupdate->slug = Str::slug($req->brand_name);
        $brandupdate->save();

        return back()->with('BrandUpdate', 'Brand Update Successfully');
    }

}
