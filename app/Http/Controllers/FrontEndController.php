<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    function Front(){
        return view('frontend.front');
    }

    function Aboutus(){
        return view('frontend.about');
    }

    function ShopPage(){
        return view('frontend.shop_page');
    }

    function ProductDetails(){
        return view('frontend.product_details');
    }

    function ShoppingCart(){
        return view('frontend.shopping_cart');
    }

    function Checkout(){
        return view('frontend.checkout');
    }

    function WhishList(){
        return view('frontend.wishlist');
    }

    function Faq(){
        return view('frontend.faq');
    }

    function Blog(){
        return view('frontend.blog');
    }

    function SingleBlog(){
        return view('frontend.single_blog');
    }

    function Contact(){
        return view('frontend.contact');
    }



}
