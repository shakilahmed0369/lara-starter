<?php

use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\AdminUserController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SettingsController;


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
| Here all Backend routs has been define    
*/
Route::group(['prefix'=> 'admin', 'as' => 'admin.'], function () {
  // Role Routes
  Route:: resource('/role', RoleController::class);
  // Admin User Routes
  Route:: resource('/admin-user', AdminUserController::class);
  // Menu Routes
  Route:: post('/menu/updaterow', [MenuController::class, 'updaterow']);
  Route:: resource('/menu', MenuController::class);
  /* Profile Routes */
  Route:: get('/admin-profile', [AdminProfileController::class, 'index'])->name('profile');
  Route:: put('/admin-profile/update/{id}', [AdminProfileController::class, 'update'])->name('profile.update');

  /* Route Group */
  Route::group(['middleware' => ['admin.auth','role:super-admin', 'auth:admin']],function () {
    /* Env Editor Routes */
    Route:: get('/env-editor', function(){ return view('vendor.geo-sv.env-editor.index'); });
    /* Backup Manager Routes */
    Route:: get('/backup', function(){ return view('vendor.laravel_backup_panel.layout');});
  });

  /* Setting Routes */
  Route:: get('/settings', [SettingsController::class, 'index'])->name('settings.index');
  /* Webinfo Route */
  Route:: post('/settings/webinfoupdate', [SettingsController::class, 'webinfoUpdate'])->name('settings.webinfoupdate');
  /* Webinfo Route */
  Route:: post('/settings/contactinfo', [SettingsController::class, 'ContactInfoUpdate'])->name('settings.contactInfoUpdate');
  Route:: post('/settings/imageupdate', [SettingsController::class, 'ImageUpdate'])->name('settings.imageUpdate');

});