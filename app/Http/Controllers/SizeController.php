<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Size;
use Illuminate\Support\Str;

class SizeController extends Controller
{
    function SizeAdd(){
        return view('backend.attributes.size_add');
    }

    function SizePost(Request $request){
        $sizeadd = new Size;
        $sizeadd->size_name = $request->size_name;
        $sizeadd->slug = Str::slug($request->size_name);
        $sizeadd->save();
        return back()->with('SizeAdd', 'Size Added Successfully');
    }

    function SizeList(){
        $sizecount = Size::count();
        $sizes = Size::paginate(2);
        $trush_size = Size::onlyTrashed()->get();
        return view('backend.attributes.size_list', [
            'sizes' => $sizes,
            'sizecount' => $sizecount,
            'trush_size' => $trush_size
        ]);
    }

    function SizeDelete($id){
        Size::findOrFail($id)->delete();
        return back()->with('SizeDelete', 'Size Added Successfully');
    }

    function SizeRestore($id){
        $sizerestore = Size::withTrashed()->findOrFail($id)->restore();
        return back()->with('SizeRestore', 'Size Added Successfully');
    }

    function SizeParmanentDelete($id){
        Size::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('SizeParmanentDelete', 'Size Parmanent Delete Successfully');
    }

    function SizeEdit($id){
        $size_edit = Size::findOrFail($id);
        return view('backend.attributes.size_edit',[
            'size_edit' => $size_edit
        ]);
    }

    function SizeUpdate(Request $req){
       $sizeupdate = Size::findOrFail($req->id);
       $sizeupdate->size_name = $req->size_name;
       $sizeupdate->slug = Str::slug($req->size_name);
       $sizeupdate->save();

       return back()->with('SizeUpdate', 'Size Update Successfully');
    }
}
