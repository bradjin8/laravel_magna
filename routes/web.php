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

Route::get('/welcome', function () {
    return view('welcome');
});


$module_controller = "Front\HomeController@";
Route::get('/', ['as' => 'home_index_get', 'uses' => $module_controller . 'index']);
Route::post('/', ['as' => 'home_index_post', 'uses' => $module_controller . 'register']);
Route::get('/initDatabase', ['as' => 'home_test', 'uses' => $module_controller . 'initDatabase']);
Route::get('/test', ['as' => 'home_test', 'uses' => $module_controller . 'test']);

Route::group(['middleware' => 'register'], function () {
    $module_controller = "Front\HomeController@";
    Route::get('/pano', ['as' => 'home_pano', 'uses' => $module_controller . 'pano']);
    Route::get('/category/{category}', ['as' => 'category', 'uses' => $module_controller . 'category']);


    Route::get('/videos/mechatronics/{sub_category}/{title}', ['as' => 'videos_mechatronics', 'uses' => $module_controller . 'videosMechatronics']);
    Route::get('/videos/{category}/{title}', ['as' => 'videos', 'uses' => $module_controller . 'videos']);

    Route::get('/pdfs/{category}/{title}', ['as' => 'pdfs', 'uses' => $module_controller . 'downloadPDF']);


});

$route_slug = 'admin_';
Route::group(array('prefix' => 'administrator'), function() use($route_slug)
{
    $module_controller = "Admin\DashboardController@";
    Route::get('/', ['as' => $route_slug . 'index', 'uses' => $module_controller . 'index']);
    Route::get('/contacts', ['as' => $route_slug . 'contact', 'uses' => $module_controller . 'contacts']);
    Route::get('/export', ['as' => $route_slug . 'contact', 'uses' => $module_controller . 'export']);
});