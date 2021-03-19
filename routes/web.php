<?php

use App\Http\Controllers\Backend\AdminUserController;
use App\Http\Controllers\Backend\RoleController;
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
    return redirect('/admin');
});

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
| Here all Backend routs has been defind    
*/
Route::group(['prefix'=> 'admin', 'as' => 'admin.'], function () {
  // Role Routes
  Route::resource('/role', RoleController::class);
  // Admin User Routes
  Route::resource('/admin-user', AdminUserController::class);
});