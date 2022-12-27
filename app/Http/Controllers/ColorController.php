<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;
use Illuminate\Support\Str;

class ColorController extends Controller
{
   function ColorAdd(){
       return view('backend.attributes.color_add');
   }

   function ColorPost(Request $request){
    $color = new Color;
    $color->color_name = $request->color_name;
    $color->slug = Str::slug($request->color_name);
    $color->save();
    return back()->with('ColorAdd', 'Color Added Successfully');
   }

   function ColorView(){
       $colors = Color::paginate(5);
       $trush_color = Color::onlyTrashed()->get();
       return view('backend.attributes.color_list',[
           'colors' => $colors,
           'trush_color' => $trush_color
       ]);
   }

   function ColorDelete($id){
        Color::findOrFail($id)->delete();
        return back()->with('ColorDelete', 'Color Delete Successfully');
   }

   function ColorRestore($id){
        Color::withTrashed()->findOrFail($id)->restore();
        return back()->with('ColorRestore', 'Color Restore Successfully');
   }

   function ColorParmanentDelete($id){
        Color::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('ColorParmanentDelete', 'Color Parmanent Delete Successfully');
   }

   function ColorEdit($id){
       $color_edit = Color::findOrFail($id);
       return view('backend.attributes.color_edit',[
           'color_edit' => $color_edit
       ]);
   }

   function ColorUpdate(Request $req){
        $colorupdate = Color::findOrFail($req->id);
        $colorupdate->color_name = $req->color_name;
        $colorupdate->slug = Str::slug($req->color_name);
        $colorupdate->save();
        return back()->with('ColorUpdate', 'Color Update Successfully');
   }

}
