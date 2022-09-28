<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ThemeSettingsContoller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WholesellerController;
use App\Models\Wholeseller;

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
//Redirect to the login page
Route::get('/', function() {
    return redirect()->route('login');
});
//admin auth
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
   //Admin Routes
    Route::group(['prefix' => 'admin',  'middleware' => ['auth']], function () {
        // Users routes
    Route::get('/users/pdf', 'UserController@createPDF')->name('users.pdf');
    Route::resource('users', 'UserController', [
            'names' => [
            'index' => 'users.index',
            'create' => 'users.create',
            'store' => 'users.store',
            'show' => 'users.show',
            'edit' => 'users.edit',
            'update' => 'users.update',
        ]
    ]);
    Route::get('users/{slug}/staus', 'UserController@changeStatus')->name('users.status');
    Route::get('users/{id}/delete', 'UserController@destroy')->name('users.delete');

        // admin dashboard route
        Route::get('dashboard', [AdminController::class,'index'])->name('dashboard');
        // lang change
        Route::get('lang/change', [LanguageController::class, 'change'])->name('changeLang');
        // admin profile route
        Route::get('profile', 'AdminController@profilePage')->name('admin.profile');

        // admin profile update route
        Route::put('profile/{email}', 'AdminController@profileUpdate')->name('admin.profile.update');
        // setup route
        Route::get('setup', 'AdminController@setupPage')->name('admin.setup');

        // general settings routes
        Route::get('general-settings', 'AdminController@generalSettings')->name('admin.setup.general');
        Route::post('general-settings', 'AdminController@updateGeneralSettings')->name('admin.setup.general.update');

        
    });

// Route for wholesellers
Route::group(['prefix' => 'wholeseller'], function() {
	Route::group(['middleware' => 'wholeseller.guest'], function(){
		Route::view('/login','wholeseller.auth.login')->name('wholeseller.login');
		Route::post('/login',[WholesellerController::class, 'authenticate'])->name('wholeseller.auth');
	});
	
	Route::group(['middleware' => 'wholeseller.auth'], function(){
    Route::get('/dashboard',[WholesellerController::class, 'dashboard'])->name('wholeseller.dashboard');
    Route::post('/logout',[WholesellerController::class,'logout'])->name('wholeseller.logout');
});
});


