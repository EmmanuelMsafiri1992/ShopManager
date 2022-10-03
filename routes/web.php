<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ThemeSettingsContoller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WholesellerController;
use App\Http\Controllers\RetailerController;
use App\Http\Controllers\ShopkeeperController;
use App\Http\Controllers\CustomerController;

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

// //Admin Routes
Route::group(['prefix' => 'superadmin',  'middleware' => ['auth']],
function () {
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
Route::get('dashboard', [SuperAdminController::class,'index'])->name('dashboard');

// lang change
// admin profile route
Route::get('profile', 'AdminController@profilePage')->name('admin.profile');

// admin profile update route
Route::put('profile/{email}', 'AdminController@profileUpdate')->name('admin.profile.update');
// setup route
Route::get('setup', 'AdminController@setupPage')->name('admin.setup');
Route::get('lang/change', [LanguageController::class, 'change'])->name('changeLang');

// general settings routes
Route::get('general-settings', 'AdminController@generalSettings')->name('admin.setup.general');
Route::post('general-settings', 'AdminController@updateGeneralSettings')->name('admin.setup.general.update');
});


// Route for superadmins
Route::group(['prefix' => 'superadmin'], function() {
// Before admin is authenticated
Route::group(['middleware' => 'superadmin.guest'], function(){
Route::view('/login','superadmin.auth.login')->name('superadmin.login');
Route::post('/login',[SuperAdminController::class, 'authenticate'])
->name('superadmin.auth');
});
// After admin is authenticated
Route::group(['middleware' => 'superadmin.auth'], function(){
Route::get('/dashboard',[SuperAdminController::class,'index'])
->name('superadmin.dashboard');
Route::post('/logout',[SuperAdminController::class,'logout'])
->name('superadmin.logout');
});
});



// Route for admins
Route::group(['prefix' => 'admin'], function() {
// Before admin is authenticated
Route::group(['middleware' => 'admin.guest'], function(){
Route::view('/login','admin.auth.login')->name('admin.login');
Route::post('/login',[AdminController::class, 'authenticate'])
->name('admin.auth');
});
// After admin is authenticated
Route::group(['middleware' => 'admin.auth'], function(){
Route::get('/dashboard',[AdminController::class,'index'])
->name('admin.dashboard');
Route::post('/logout',[AdminController::class,'logout'])
->name('admin.logout');
});
});

// Route for wholesellers
Route::group(['prefix' => 'wholeseller'], function() {
// Before wholeseller is authenticated
Route::group(['middleware' => 'wholeseller.guest'], function(){
Route::view('/login','wholeseller.auth.login')->name('wholeseller.login');
Route::post('/login',[WholesellerController::class, 'authenticate'])
->name('wholeseller.auth');
});
// After wholeseller is authenticated
Route::group(['middleware' => 'wholeseller.auth'], function(){
Route::get('/dashboard',[WholesellerController::class,'index'])->name('wholeseller.dashboard');
Route::post('/logout',[WholesellerController::class,'logout'])->name('wholeseller.logout');
});
});

// Route for retailers
Route::group(['prefix' => 'retailer'], function() {
// Before retailer is authenticated
Route::group(['middleware' => 'retailer.guest'], function(){
Route::view('/login','retailer.auth.login')->name('retailer.login');
Route::post('/login',[RetailerController::class, 'authenticate'])->name('retailer.auth');
});

// After retailers is authenticated
Route::group(['middleware' => 'retailer.auth'], function(){
Route::get('/dashboard',[RetailerController::class,'index'])->name('retailer.dashboard');
Route::post('/logout',[RetailerController::class,'logout'])->name('retailer.logout');
});
});

// Route for shopkeepers
Route::group(['prefix' => 'shopkeeper'], function() {
// Before shopkeeper is authenticated
Route::group(['middleware' => 'shopkeeper.guest'], function(){
Route::view('/login','shopkeeper.auth.login')->name('shopkeeper.login');
Route::post('/login',[ShopkeeperController::class, 'authenticate'])->name('shopkeeper.auth');
});

// After shopkeeper is authenticated
Route::group(['middleware' => 'shopkeeper.auth'], function(){
Route::get('/dashboard',[ShopkeeperController::class,'index'])->name('shopkeeper.dashboard');
Route::post('/logout',[ShopkeeperController::class,'logout'])->name('shopkeeper.logout');
});
});

// Route for customers
Route::group(['prefix' => 'customer'], function() {
// Before customers is authenticated
Route::group(['middleware' => 'customer.guest'], function(){
Route::view('/login','customer.auth.login')->name('customer.login');
Route::post('/login',[CustomerController::class, 'authenticate'])->name('customer.auth');
});

// After customer is authenticated
Route::group(['middleware' => 'customer.auth'], function(){
Route::get('/dashboard',[CustomerController::class,'index'])->name('customer.dashboard');
Route::post('/logout',[CustomerController::class,'logout'])->name('customer.logout');
});
});

