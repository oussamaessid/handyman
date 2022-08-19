<?php

use App\Http\Controllers\ContactController;
use App\Http\Livewire\CategorieComponent;
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


Route::resource('/provider-liste', App\Http\Controllers\ProviderController::class);
Route::resource('/subcategory', App\Http\Controllers\SubCategoryController::class);
Route::resource('/category', App\Http\Controllers\CategoryController::class);
Route::resource('/service', App\Http\Controllers\ServiceController::class);
Route::get('/provider-create','App\Http\Controllers\ProviderController@create');
Route::get('/user-create','App\Http\Controllers\user_simpleController@create');
Route::get('/handyman-create','App\Http\Controllers\HandymanController@create');
Route::get('/service-create','App\Http\Controllers\ServiceController@create');
Route::get('/category-create','App\Http\Controllers\CategoryController@create');
Route::get('/subcategory-create','App\Http\Controllers\SubCategoryController@create');

Route::resource('/user-liste', App\Http\Controllers\user_simpleController::class);
Route::resource('/handyman-liste', App\Http\Controllers\HandymanController::class);

Route::get('/fullcalender', [ App\Http\Controllers\FullCalenderController::class, 'index']);
Route::post('fullcalenderAjax', [App\Http\Controllers\FullCalenderController::class, 'ajax']);

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/amir', function (){
//   return view('provider.create') ;
//});
Route::group(['middleware'=>['auth','isAdmin']],function (){
    Route::get('/dashboard', function () {
        return view('home');
    });

});
Route::group(['middleware'=>['auth','isUser']],function (){
    Route::get('/user', function () {
        return view('home');
    });

});

Route::group(['middleware'=>['auth','isProvider']],function (){
   // Route::get('/provider', function () {
      //  return view('home');

  //  });
  Route::get('/homeprovider', [App\Http\Controllers\HomeProviderController::class, 'index']);
});
Route::group(['middleware'=>['auth','isHandyman']],function (){
    Route::get('/handyman', function () {
        return view('home');
    });

});




