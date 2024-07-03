<?php

use Illuminate\Support\Facades\Route;

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

//backend route...
Route::get('/admin_login', 'App\Http\Controllers\AdminController@index')->name('admin.login');
Route::get('/admin_logout', 'App\Http\Controllers\AdminController@logout')->name('admin.logout');
Route::get('/dashboard', 'App\Http\Controllers\AdminController@dashboard')->name('admin.dashboard');
Route::get('/admin_check', 'App\Http\Controllers\AdminController@admin_check')->name('admin_check');
Route::post('/admin_dashboard', 'App\Http\Controllers\AdminController@show_dashboard')->name('admin.show_dashboard');

//backend category route...
Route::group(['prefix'=>'categories'],function (){
    Route::get('/', 'App\Http\Controllers\CategoryController@manage_category')->name('admin.categories');
    Route::get('/edit/{id}', 'App\Http\Controllers\CategoryController@category_edit')->name('admin.category.edit');
    Route::get('/create', 'App\Http\Controllers\CategoryController@category_create')->name('admin.category.create');
    Route::get('/status/{id}', 'App\Http\Controllers\CategoryController@cat_status_change')->name('admin.category.status');

    Route::post('/create', 'App\Http\Controllers\CategoryController@category_store')->name('admin.category.store');
    Route::post('/edit/{id}', 'App\Http\Controllers\CategoryController@category_update')->name('admin.category.update');
    Route::get('/delete/{id}', 'App\Http\Controllers\CategoryController@category_delete')->name('admin.category.delete');
});

//backend subcategory route...
Route::group(['prefix'=>'subcategories'],function (){
    Route::get('/', 'App\Http\Controllers\SubCategoryController@manage_subcategory')->name('admin.subcategories');
    Route::get('/edit/{id}', 'App\Http\Controllers\SubCategoryController@subcategory_edit')->name('admin.subcategory.edit');
    Route::get('/create', 'App\Http\Controllers\SubCategoryController@subcategory_create')->name('admin.subcategory.create');
    Route::get('/status/{id}', 'App\Http\Controllers\SubCategoryController@subcat_status_change')->name('admin.subcategory.status');

    Route::post('/create', 'App\Http\Controllers\SubCategoryController@subcategory_store')->name('admin.subcategory.store');
    Route::post('/edit/{id}', 'App\Http\Controllers\SubCategoryController@subcategory_update')->name('admin.subcategory.update');
    Route::get('/delete/{id}', 'App\Http\Controllers\SubCategoryController@subcategory_delete')->name('admin.subcategory.delete');
});

//backend brand route...
Route::group(['prefix'=>'brands'],function (){
    Route::get('/', 'App\Http\Controllers\BrandController@manage_brand')->name('admin.brands');
    Route::get('/edit/{id}', 'App\Http\Controllers\BrandController@brand_edit')->name('admin.brand.edit');
    Route::get('/create', 'App\Http\Controllers\BrandController@brand_create')->name('admin.brand.create');
    Route::get('/status/{id}', 'App\Http\Controllers\BrandController@brand_status_change')->name('admin.brand.status');

    Route::post('/create', 'App\Http\Controllers\BrandController@brand_store')->name('admin.brand.store');
    Route::post('/edit/{id}', 'App\Http\Controllers\BrandController@brand_update')->name('admin.brand.update');
    Route::get('/delete/{id}', 'App\Http\Controllers\BrandController@brand_delete')->name('admin.brand.delete');
});

//backend unit route...
Route::group(['prefix'=>'units'],function (){
    Route::get('/', 'App\Http\Controllers\UnitController@manage_unit')->name('admin.units');
    Route::get('/edit/{id}', 'App\Http\Controllers\UnitController@unit_edit')->name('admin.unit.edit');
    Route::get('/create', 'App\Http\Controllers\UnitController@unit_create')->name('admin.unit.create');
    Route::get('/status/{id}', 'App\Http\Controllers\UnitController@unit_status_change')->name('admin.unit.status');

    Route::post('/create', 'App\Http\Controllers\UnitController@unit_store')->name('admin.unit.store');
    Route::post('/edit/{id}', 'App\Http\Controllers\UnitController@unit_update')->name('admin.unit.update');
    Route::get('/delete/{id}', 'App\Http\Controllers\UnitController@unit_delete')->name('admin.unit.delete');
});

//backend size route...
Route::group(['prefix'=>'sizes'],function (){
    Route::get('/', 'App\Http\Controllers\SizeController@manage_size')->name('admin.sizes');
    Route::get('/edit/{id}', 'App\Http\Controllers\SizeController@size_edit')->name('admin.size.edit');
    Route::get('/create', 'App\Http\Controllers\SizeController@size_create')->name('admin.size.create');
    Route::get('/status/{id}', 'App\Http\Controllers\SizeController@size_status_change')->name('admin.size.status');

    Route::post('/create', 'App\Http\Controllers\SizeController@size_store')->name('admin.size.store');
    Route::post('/edit/{id}', 'App\Http\Controllers\SizeController@size_update')->name('admin.size.update');
    Route::get('/delete/{id}', 'App\Http\Controllers\SizeController@size_delete')->name('admin.size.delete');
});

//backend color route...
Route::group(['prefix'=>'colors'],function (){
    Route::get('/', 'App\Http\Controllers\ColorController@manage_color')->name('admin.colors');
    Route::get('/edit/{id}', 'App\Http\Controllers\ColorController@color_edit')->name('admin.color.edit');
    Route::get('/create', 'App\Http\Controllers\ColorController@color_create')->name('admin.color.create');
    Route::get('/status/{id}', 'App\Http\Controllers\ColorController@color_status_change')->name('admin.color.status');

    Route::post('/create', 'App\Http\Controllers\ColorController@color_store')->name('admin.color.store');
    Route::post('/edit/{id}', 'App\Http\Controllers\ColorController@color_update')->name('admin.color.update');
    Route::get('/delete/{id}', 'App\Http\Controllers\ColorController@color_delete')->name('admin.color.delete');
});

//backend product route...
Route::group(['prefix'=>'products'],function (){
    Route::get('/', 'App\Http\Controllers\ProductController@manage_product')->name('admin.products');
    Route::get('/edit/{id}', 'App\Http\Controllers\ProductController@product_edit')->name('admin.product.edit');
    Route::get('/create', 'App\Http\Controllers\ProductController@product_create')->name('admin.product.create');
    Route::get('/status/{id}', 'App\Http\Controllers\ProductController@product_status_change')->name('admin.product.status');

    Route::post('/create', 'App\Http\Controllers\ProductController@product_store')->name('admin.product.store');
    Route::post('/edit/{id}', 'App\Http\Controllers\ProductController@product_update')->name('admin.product.update');
    Route::get('/delete/{id}', 'App\Http\Controllers\ProductController@product_delete')->name('admin.product.delete');
});

//backend product route...
Route::get('/manage_order', 'App\Http\Controllers\OrderController@manage_order')->name('admin.orders');
Route::get('/view_order/{id}', 'App\Http\Controllers\OrderController@view_order')->name('admin.view_order');

//frontend route...
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('index');
Route::get('/view-details/{id}', 'App\Http\Controllers\HomeController@view_details')->name('view_details');
Route::get('/product_by_cat/{id}', 'App\Http\Controllers\HomeController@product_by_cat')->name('product_by_cat');
Route::get('/product_by_subcat/{id}', 'App\Http\Controllers\HomeController@product_by_subcat')->name('product_by_subcat');
Route::get('/product_by_brand/{id}', 'App\Http\Controllers\HomeController@product_by_brand')->name('product_by_brand');

//frontend add to cart route...
Route::post('/add_to_cart', 'App\Http\Controllers\CartController@add_to_cart')->name('add_to_cart');
Route::get('/cart_delete/{id}', 'App\Http\Controllers\CartController@cart_delete')->name('cart_delete');

//frontend checkout route...
Route::get('/checkout', 'App\Http\Controllers\CheckoutController@checkout')->name('checkout');
Route::get('/login_check', 'App\Http\Controllers\CheckoutController@login_check')->name('login_check');

//frontend customer login route...
Route::post('/customer_login', 'App\Http\Controllers\CustomerController@customer_login')->name('customer_login');
//frontend customer reg route...
Route::post('/customer_reg', 'App\Http\Controllers\CustomerController@customer_reg')->name('customer_reg');
//frontend customer logout route...
Route::get('/customer_logout', 'App\Http\Controllers\CustomerController@customer_logout')->name('customer_logout');
//frontend shipping route...
Route::post('/save_shipping', 'App\Http\Controllers\ShippingController@save_shipping')->name('save_shipping');
Route::get('/payment', 'App\Http\Controllers\ShippingController@payment')->name('payment');
Route::post('/order_place', 'App\Http\Controllers\ShippingController@order_place')->name('order_place');
//frontend search route...
Route::get('/search', 'App\Http\Controllers\HomeController@search')->name('search');
