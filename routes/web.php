<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
    //     return view('welcome');
    // });

    Auth::routes(['verify' => true]);

Route::get('/', 'FrontEndController@Front')->name('Front');
Route::get('/home', 'HomeController@index')->name('home');

// Category Route
Route::get('/add/category', 'CategoryController@AddCategory')->name('AddCategory');
Route::post('/post/category', 'CategoryController@CategoryPost')->name('CategoryPost');
Route::get('/category/list', 'CategoryController@CategoryList')->name('CategoryList');
Route::get('/category/delete/{id}', 'CategoryController@CategoryDelete')->name('CategoryDelete');
Route::get('/category/restore/{id}', 'CategoryController@CategoryRestore')->name('CategoryRestore');
Route::get('/category/parmanent/delete/{id}', 'CategoryController@CategoryParmanentDelete')->name('CategoryParmanentDelete');
Route::get('/category/edit/{id}', 'CategoryController@CategoryEdit')->name('CategoryEdit');
Route::post('/category/update/', 'CategoryController@CategoryUpdate')->name('CategoryUpdate');
// SubCategory Route
Route::get('/subcategory/add', 'SubCategoryController@SubCategoryAdd')->name('SubCategoryAdd');
Route::post('/subcategory/post', 'SubCategoryController@SubCategoryPost')->name('SubCategoryPost');
Route::get('/subcategory/list/', 'SubCategoryController@SubCategoryList')->name('SubCategoryList');
Route::get('/subcategory/delete/{did}', 'SubCategoryController@SubCategoryDelete')->name('SubCategoryDelete');
Route::get('/subcategory/restore/{rid}', 'SubCategoryController@SubCategoryRestore')->name('SubCategoryRestore');
Route::get('/subcategory/parmanent/delete/{id}', 'SubCategoryController@SubCategoryParmanentDelete')->name('SubCategoryParmanentDelete');
Route::get('/subcategory/edit/{id}', 'SubCategoryController@SubCategoryEdit')->name('SubCategoryEdit');
Route::post('/subcategory/update', 'SubCategoryController@SubCategoryUpdate')->name('SubCategoryUpdate');
// Attribute Color Route
Route::get('/color/add', 'ColorController@ColorAdd')->name('ColorAdd');
Route::post('/color/post', 'ColorController@ColorPost')->name('ColorPost');
Route::get('/color/view', 'ColorController@ColorView')->name('ColorView');
Route::get('/color/delete/{id}', 'ColorController@ColorDelete')->name('ColorDelete');
Route::get('/color/restore/{id}', 'ColorController@ColorRestore')->name('ColorRestore');
Route::get('/color/parmanent/delete/{id}', 'ColorController@ColorParmanentDelete')->name('ColorParmanentDelete');
Route::get('/color/edit/{id}', 'ColorController@ColorEdit')->name('ColorEdit');
Route::post('/color/update', 'ColorController@ColorUpdate')->name('ColorUpdate');
// Attribute Size Route
Route::get('/size/add', 'SizeController@SizeAdd')->name('SizeAdd');
Route::post('/size/post', 'SizeController@SizePost')->name('SizePost');
Route::get('/size/list', 'SizeController@SizeList')->name('SizeList');
Route::get('/size/delete/{id}', 'SizeController@SizeDelete')->name('SizeDelete');
Route::get('/size/restore/{id}', 'SizeController@SizeRestore')->name('SizeRestore');
Route::get('/size/parmanent/delete/{id}', 'SizeController@SizeParmanentDelete')->name('SizeParmanentDelete');
Route::get('/size/edit/{id}', 'SizeController@SizeEdit')->name('SizeEdit');
Route::post('/size/update', 'SizeController@SizeUpdate')->name('SizeUpdate');
// Users Route
Route::get('/user/list', 'HomeController@UserList')->name('UserList');
Route::get('/user/delete/{id}', 'HomeController@UserDelete')->name('UserDelete');
// Brand Route
Route::get('/brand/add/', 'BrandController@BrandAdd')->name('BrandAdd');
Route::post('/brand/post/', 'BrandController@BrandPost')->name('BrandPost');
Route::get('/brand/list/', 'BrandController@BrandList')->name('BrandList');
Route::get('/brand/delete/{id}', 'BrandController@BrandDelete')->name('BrandDelete');
Route::get('/brand/restore/{id}', 'BrandController@BrandRestore')->name('BrandRestore');
Route::get('/brand/parmanent/delete/{id}', 'BrandController@BrandParmanentDelete')->name('BrandParmanentDelete');
Route::get('/brand/edit/{id}', 'BrandController@BrandEdit')->name('BrandEdit');
Route::post('/brand/update', 'BrandController@BrandUpdate')->name('BrandUpdate');
// Product Route
Route::get('/product/add', 'ProductController@ProductAdd')->name('ProductAdd');
Route::post('/product/post', 'ProductController@ProductPost')->name('ProductPost');
Route::get('/product/list', 'ProductController@ProductList')->name('ProductList');
// Role Route
Route::get('/role/view', 'RoleController@RoleView')->name('RoleView');
Route::post('/role/add', 'RoleController@RolePost')->name('RolePost');
Route::post('/permission/post', 'RoleController@PermissionPost')->name('PermissionPost');
Route::post('/role-add-to-permission', 'RoleController@RoleAddToPermission')->name('RoleAddToPermission');

// Front pages
Route::get('/about-us', 'FrontEndController@Aboutus')->name('Aboutus');
Route::get('/blog', 'FrontEndController@Blog')->name('Blog');
Route::get('/single-blog', 'FrontEndController@SingleBlog')->name('SingleBlog');
Route::get('/checkout', 'FrontEndController@Checkout')->name('Checkout');
Route::get('/contact', 'FrontEndController@Contact')->name('Contact');
Route::get('/faq', 'FrontEndController@Faq')->name('Faq');
Route::get('/single_product', 'FrontEndController@ProductDetails')->name('ProductDetails');
Route::get('/shop-page', 'FrontEndController@ShopPage')->name('ShopPage');
Route::get('/shoping-cart', 'FrontEndController@ShoppingCart')->name('ShoppingCart');
Route::get('/wishlist', 'FrontEndController@WhishList')->name('WhishList');
