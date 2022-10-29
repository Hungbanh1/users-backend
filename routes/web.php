<?php

use App\Mix_products;
use App\Products;
use App\order;

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

Route::get('/', function () {

    $mix_products = Mix_products::all();

    $products = Products::all();

    $code = "HB-".rand();



    
    return view('welcome' , compact('mix_products' , 'products' , 'code'));
});


Route::get('san-pham', function () {
    $mix_products = Mix_products::all();
    $products = Products::all();

    return view('welcome' , compact('mix_products' , 'products'));
});


// Route::get('/' , 'UsersHomeController');


Route::get('admin', function () {
    return view('layouts/admin');
});



//Product

Route::get('san-pham/{cat_title}' , 'UsersProductController@list')->name('list_product');


Route::get('san-pham/{cat_title}/{slug}' , 'UsersProductController@detail')->name('detail_product');

// Route::get('san-pham/{slug}', function (App\Products $slug) {
//     return $slug->slug;
// })->name('detail_product');
// Route::get('api/posts/{post}', function (App\Post $post) {
//     return $post->title;
// });

Route::get('dien-thoai' , 'UsersProductController@show');

Route::get('chi-tiet/{cat_title}/{slug}' , 'UsersProductController@chitiet')->name('chitiet');






Route::get('sort/{cat_title}' , 'UsersProductController@sort')->name('sort');



Route::get('blog/list' , 'UsersBlogController@list');

Route::get('cart/add/{id}' , 'UsersCartController@add')->name('cart_add');
Route::get('gio-hang/gio-hang-cua-ban' , 'UsersCartController@show');




Route::get('cart/remove/{rowId}' , 'UsersCartController@remove')->name('remove_cart');

Route::get('cart/destroy' , 'UsersCartController@destroy')->name('cart_destroy');

Route::post('cart/update' , 'UsersCartController@update')->name('cart_update');



// ajax
Route::post('cart/ajax' , 'UsersCartController@ajax')->name('ajax');

Route::get('search/searchajax' , 'UsersSearchController@searchajax');
Route::get('search', 'UsersSearchController@search')->name('search');






//checkout
Route::get('thanh-toan/dien-thong-tin-cua-ban' , 'UsersCheckoutController@show')->name('checkout');


Route::post('checkout/store' ,'UsersCheckoutController@store');

Route::get('checkout/destroy' , 'UsersCheckoutController@destroy')->name('checkout_destroy');


//chinh sach bao mat
Route::get('chinh-sach-bao-mat', function () {
    return view('users.privacy.privacy');
});


//bai-viet
Route::get('bai-viet' , 'UsersPostController@post');
Route::get('bai-viet/chi-tiet/{slug}' , 'UsersPostController@detail')->name('detail_post');


Route::get('page/list' , 'UsersPageController@list');


Route::get('order/read' , 'UsersOrderController@read');
Route::get('detailorder/read' , 'UsersDetailOrderController@read');


Route::get('chuc-mung-ban-da-dat-hang-thanh-cong' , 'UsersSuccessController@show')->name('success');

// Gioi thieu

Route::get('gioi-thieu', 'UsersAboutController@about');

//Lien he

Route::get('lien-he' , 'UsersContactController@contact');


//keyword

Route::get('keyword' , 'UsersKeywordController@keyword')->name('keyword');





// Mail

Route::get('demo/sendmail' , 'UsersMailController@sendmail');

Route::get('mail' , 'UsersProductController@mail');
Route::get('test' , 'UsersProductController@test');



Route::get('demo' ,function(){
    return view('users.demo.demo');
});












