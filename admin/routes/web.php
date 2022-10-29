<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// namespace UniSharp\LaravelFilemanager;

// use Illuminate\Contracts\Config\Repository as Config;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Str;
// use UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder;
// use UniSharp\LaravelFilemanager\Middlewares\MultiUser;


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
    return view('auth.loginnn');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//USER 

Route::middleware('auth')->group(function () {

    //dashboard
    Route::get('dashboard', 'DashboardController@show');
    Route::Get('admin/user/add', 'AdminUserController@add')->middleware('can:member-add');
    Route::Get('admin/user/list', 'AdminUserController@list')->middleware('can:member-list');

    Route::Get('admin/user/test', 'AdminUserController@test');



    Route::post('admin/user/store', 'AdminUserController@store');

    Route::get('admin/user/delete/{id}', 'AdminUserController@delete')->name('delete_user');

    Route::get('admin/user/action', 'AdminUserController@action');



    Route::post('admin/user/update/{id}', 'AdminUserController@update')->name('update_user');

    Route::get('admin/user/update_pass/{id}', 'AdminUserController@update_pass')->name('update_pass');

    Route::post('admin/user/pass_have_update/{id}', 'AdminUserController@pass_have_update')->name('pass_have_update');

    Route::get('admin/user/update_account/{id}', 'AdminUserController@update_account')->name('update_account');

    Route::post('admin/user/account_have_update/{id}', 'AdminUserController@account_have_update')->name('account_have_update');




    Route::get('admin/user/detail/{id}', 'AdminUserController@detail')->name('detail_user');




    Route::get('admin/user/edit/{id}', 'AdminUserController@edit')->name('edit_user');




    //Product

    Route::Get('admin/product/add', 'AdminProductController@add')->middleware('can:product-add');
    Route::Get('admin/product/list', 'AdminProductController@list')->middleware('can:product-list');

    Route::Get('admin/product/list/cat', 'AdminProductController@cat');

    Route::post('admin/product/store', 'AdminProductController@store');

    Route::get('admin/product/action', 'AdminProductController@action');
    Route::get('admin/product/add_folder', 'AdminProductController@add_folder');
    Route::get('admin/product/edit_folder_product/{id}', 'AdminProductController@edit_folder_product')->name('edit_folder_product');
    Route::get('admin/product/delete_folder_product/{id}', 'AdminProductController@delete_folder_product')->name('delete_folder_product');
    Route::get('admin/product/update_folder_product/{id}', 'AdminProductController@update_folder_product')->name('update_folder_product');
    Route::get('admin/product/detail_product/{id}', 'AdminProductController@detail_product')->name('detail_product');




    Route::get('admin/product/delete/{id}', 'AdminProductController@delete')->name('delete_product');

    Route::get('admin/product/edit/{id}', 'AdminProductController@edit')->name('edit_product');

    Route::post('admin/product/update/{id}', 'AdminProductController@update')->name('update_product');

    Route::get('admin/product/page/detail/{id}', 'AdminProductController@detail')->name('detail_page_product');







    //Post



    Route::Get('admin/post/add', 'AdminPostController@add')->middleware('can:post-add');
    Route::Get('admin/post/list', 'AdminPostController@list')->middleware('can:post-list');
    Route::Get('admin/post/list/cat', 'AdminPostController@cat');

    Route::post('admin/post/store', 'AdminPostController@store');

    Route::get('admin/post/delete/{id}', 'AdminPostController@delete')->name('delete_post');

    Route::get('admin/post/action', 'AdminPostController@action');


    Route::get('admin/post/add_folder_post', 'AdminPostController@add_folder_post');
    Route::get('admin/post/edit_folder_post/{id}', 'AdminPostController@edit_folder_post')->name('edit_folder_post');
    Route::get('admin/post/delete_folder_post/{id}', 'AdminPostController@delete_folder_post')->name('delete_folder_post');
    Route::get('admin/post/update_folder_post/{id}', 'AdminPostController@update_folder_post')->name('update_folder_post');



    Route::post('admin/post/update/{id}', 'AdminPostController@update')->name('update_post');

    Route::get('admin/post/edit/{id}', 'AdminPostController@edit')->name('edit_post');

    Route::get('admin/post/page/detail/{id}', 'AdminPostController@detail')->name('detail_page_post');


    //order

    Route::Get('admin/order/list', 'AdminOrderController@list')->middleware('can:order-list');

    Route::Get('admin/detail_order/{id}}', 'AdminOrderController@detail_order')->name('detail_order');
    Route::Get('admin/order/action/{id}', 'AdminOrderController@action')->name('update_order');

    Route::get('admin/order/update', 'AdminOrderController@update');






    // page
    Route::Get('admin/page/add', 'AdminPageController@add')->middleware('can:page-add');
    Route::Get('admin/page/list',  'AdminPageController@list')->middleware('can:page-list');

    Route::Get('admin/page/list/detail/{id}', 'AdminPageController@detail')->name('detail_page');

    Route::post('admin/page/store', 'AdminPageController@store');
    Route::get('admin/page/action', 'AdminPageController@action');



    Route::post('admin/page/update/{id}', 'AdminPageController@update')->name('update_page');

    Route::get('admin/page/edit/{id}', 'AdminPageController@edit')->name('edit_page');

    Route::get('admin/page/delete/{id}', 'AdminPageController@delete')->name('delete_page');

    // ROle

    route::get('admin/role/add', 'AdminRoleController@add')
        ->middleware('can:role-add');
    route::get('admin/role/list', 'AdminRoleController@list');

    route::post('admin/role/action', 'AdminRoleController@action');

    route::get('admin/role/edit/{id}', 'AdminRoleController@edit')->name('edit_role')
        ->middleware('can:role-edit');

    route::post('admin/role/update/{id}', 'AdminRoleController@update')->name('update_role');
    // ->middleware('can:role-update');


    Route::group(['prefix' => 'laravel-filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
        });
        









});



// Route::group(['prefix' => 'laravel-filemanager'], function () { 'UniSharp\LaravelFilemanager\Lfm::routes()'; });
// Route::group(['prefix' => 'laravel-filemanager', 'middleware'], function () {
//     '\UniSharp\LaravelFilemanager\Lfm::routes()';
//     });

