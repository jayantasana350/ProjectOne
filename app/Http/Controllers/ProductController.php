<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Color;
use App\Size;
use App\Brand;
use App\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Image;
use App\Attributes;
use App\ProductGallery;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    function ProductAdd(){
        $category = Category::all();
        $scat = SubCategory::all();
        $colors = Color::all();
        $sizes = Size::all();
        $brands = Brand::all();
        $images = ProductGallery::all();
        return view('backend.products.product_add',[
            'category' => $category,
            'scat' => $scat,
            'colors' => $colors,
            'sizes' => $sizes,
            'brands' => $brands,
            'images' => $images
        ]);
    }

    function ProductPost(Request $request){
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $ext = Str::random(10). '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('images/'. $ext));


            $product_id = Product::insertGetId([
                'product_title' => $request->product_title,
                'slug' => Str::slug($request->product_title),
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'summery' => $request->summery,
                'descripiton' => $request->descripiton,
                'thumbnail' => $ext,
                'created_at' => Carbon::now()
            ]);

            foreach ($request->color_id as $key => $value) {
                Attributes::insert([
                    'color_id' => $value,
                    'product_id' => $product_id,
                    'size_id' => $request->size_id[$key],
                    'price' => $request->price[$key],
                    'quantity' => $request->quantity[$key],
                    'created_at' => Carbon::now(),

                ]);
            }

            if ($request->hasFile('image')) {
                $images = $request->file('image');

                $new_location = public_path('gallery/')
                . Carbon::now()->format('Y/m/')
                . $product_id . '/';

                File::makeDirectory($new_location, $mode = 0777, true, true);

                foreach ($images as $img) {
                    $img_ext = Str::random(10). '.' . $img->getClientOriginalExtension();
                    Image::make($img)->save($new_location. $img_ext);

                    ProductGallery::insert([
                        'product_id' => $product_id,
                        'image' => $img_ext,
                        'created_at' => Carbon::now(),
                    ]);
                }
            }
        }

        // return 'Ok';
        return back();
    }

    function ProductList(){
        $products = Product::paginate();
        return view('backend.products.product_list',[
            'products' => $products
        ]);
    }
}
