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
use App\Http\Controllers\Superadmin\WholesellerController as SuperadminWholesellerController;

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
// create new wholeseller
        Route::get('wholeseller/index',[SuperadminWholesellerController::class,'index'])->name('superadmin.wholeseller.index');
        Route::get('superadmin/wholeseller/create',[SuperadminWholesellerController::class,'create'])->name('superadmin.wholeseller.create');
        Route::post('superadmin/wholeseller/store',[SuperadminWholesellerController::class,'store'])->name('superadmin.wholeseller.store');
        Route::get('superadmin/wholeseller/edit/{id}',[SuperadminWholesellerController::class,'edit'])->name('superadmin.wholeseller.edit');
        Route::put('superadmin/wholeseller/update/{id}',[SuperadminWholesellerController::class,'update'])->name('superadmin.wholeseller.update');
        Route::get('superadmin/wholeseller/delete/{id}',[SuperadminWholesellerController::class,'destroy'])->name('superadmin.wholeseller.delete');
        Route::get('superadmin/wholeseller/show/{id}',[SuperadminWholesellerController::class,'show'])->name('superadmin.wholeseller.show');
        Route::get('superadmin/wholeseller/status/{id}',[SuperadminWholesellerController::class,'status'])->name('superadmin.wholeseller.status');
    });
    // return purchases route
    Route::get('/return-purchases/pdf', 'PurchaseReturnController@createPDF')->name('purchaseReturn.pdf');
    Route::resource('return-purchases', 'PurchaseReturnController', [
        'names' => [
            'index' => 'purchaseReturn.index',
            'create' => 'purchaseReturn.create',
            'store' => 'purchaseReturn.store',
            'show' => 'purchaseReturn.show',
            'edit' => 'purchaseReturn.edit',
            'update' => 'purchaseReturn.update',
        ]
    ]);
    Route::get('return-purchases/{code}/status', 'PurchaseReturnController@changeStatus')->name('purchaseReturn.status');
    Route::get('return-purchases/{code}/delete', 'PurchaseReturnController@destroy')->name('purchaseReturn.delete');

    // damage purchases route
    Route::get('/damage-purchases/pdf', 'PurchaseDamageController@createPDF')->name('purchaseDamage.pdf');
    Route::resource('damage-purchases', 'PurchaseDamageController', [
        'names' => [
            'index' => 'purchaseDamage.index',
            'create' => 'purchaseDamage.create',
            'store' => 'purchaseDamage.store',
            'show' => 'purchaseDamage.show',
            'edit' => 'purchaseDamage.edit',
            'update' => 'purchaseDamage.update',
        ]
    ]);
    Route::get('damage-purchases/{code}/status', 'PurchaseDamageController@changeStatus')->name('purchaseDamage.status');
    Route::get('damage-purchases/{code}/delete', 'PurchaseDamageController@destroy')->name('purchaseDamage.delete');

    // purchase inventory route
    Route::get('/purchase-inventory/pdf', 'PurchaseInventoryController@createPDF')->name('purchaseInventory.pdf');
    Route::resource('purchase-inventory', 'PurchaseInventoryController', [
        'names' => [
            'index' => 'purchaseInventory.index',
        ]
    ]);

    // processing products route
    Route::get('/processing-products/pdf', 'ProcessingProductController@createPDF')->name('processing.pdf');
    Route::resource('processing-products', 'ProcessingProductController', [
        'names' => [
            'index' => 'processing.index',
            'create' => 'processing.create',
            'store' => 'processing.store',
            'show' => 'processing.show',
            'edit' => 'processing.edit',
            'update' => 'processing.update',
        ]
    ]);
    Route::get('processing-products/{slug}/status', 'ProcessingProductController@changeStatus')->name('processing.status');
    Route::get('processing-products/{slug}/delete', 'ProcessingProductController@destroy')->name('processing.delete');

    // finished products route
    Route::get('/finished-products/pdf', 'FinishedProductController@createPDF')->name('finished.pdf');
    Route::post('/sizes', 'FinishedProductController@productSizes')->name('finished.sizes');
    Route::post('/finished-purchase-products', 'FinishedProductController@finishedPurchaseProducts')->name('finished.purchase.products');
    Route::resource('finished-products', 'FinishedProductController', [
        'names' => [
            'index' => 'finished.index',
            'create' => 'finished.create',
            'store' => 'finished.store',
            'show' => 'finished.show',
            'edit' => 'finished.edit',
            'update' => 'finished.update',
        ]
    ]);
    Route::get('finished-products/{id}/status', 'FinishedProductController@changeStatus')->name('finished.status');
    Route::get('finished-products/{id}/delete', 'FinishedProductController@destroy')->name('finished.delete');

    // transferred products route
    Route::get('/transferred-products/pdf', 'TransferredProductController@createPDF')->name('transferred.pdf');
    Route::post('/finished-product-sizes', 'TransferredProductController@finishedProductSizes')->name('transferred.finished.sizes');
    Route::resource('transferred-products', 'TransferredProductController', [
        'names' => [
            'index' => 'transferred.index',
            'create' => 'transferred.create',
            'store' => 'transferred.store',
            'show' => 'transferred.show',
            'edit' => 'transferred.edit',
            'update' => 'transferred.update',
        ]
    ]);
    Route::get('transferred-products/{id}/status', 'TransferredProductController@changeStatus')->name('transferred.status');
    Route::get('transferred-products/{id}/delete', 'TransferredProductController@destroy')->name('transferred.delete');


    // purchase report
    Route::get('purchase-report', 'PurchaseReport@purchaseReport')->name('purchase.report');
    Route::post('purchase-report', 'PurchaseReport@postPurchaseReport')->name('purchase.report.post');

    // processing report
    Route::get('processing-report', 'ProductReport@processingReport')->name('processing.report');
    Route::post('processing-report', 'ProductReport@filterProcessingReport')->name('processing.report.filter');

    // finished report
    Route::get('finished-report', 'ProductReport@finishedReport')->name('finished.report');
    Route::post('finished-report', 'ProductReport@filterFinishedReport')->name('finished.report.filter');

    // transferred report
    Route::get('transferred-report', 'ProductReport@transferredReport')->name('transferred.report');
    Route::post('transferred-report', 'ProductReport@filterTransferredReport')->name('transferred.report.filter');

    // lang change
    Route::get('lang/change', [LanguageController::class, 'change'])->name('changeLang');
    // categories route
    Route::get('/categories/pdf', 'CategoryController@createPDF')->name('categories.pdf');
    Route::resource('categories', 'CategoryController', [
        'names' => [
            'index' => 'categories.index',
            'create' => 'categories.create',
            'store' => 'categories.store',
            'edit' => 'categories.edit',
            'update' => 'categories.update',
        ]
    ]);
    Route::get('categories/{id}/status', 'CategoryController@changeStatus')->name('categories.status');
    Route::get('categories/{id}/delete', 'CategoryController@destroy')->name('categories.delete');
});
// sub categories route
Route::get('/sub-categories/pdf', 'SubCategoryController@createPDF')->name('subCategories.pdf');
Route::resource('sub-categories', 'SubCategoryController', [
    'names' => [
        'index' => 'subCategories.index',
        'create' => 'subCategories.create',
        'store' => 'subCategories.store',
        'edit' => 'subCategories.edit',
        'update' => 'subCategories.update',
    ]
]);
// staff routes
Route::get('/staff/pdf', 'StaffController@createPDF')->name('staff.pdf');
Route::resource('staff', 'StaffController', [
    'names' => [
        'index' => 'staff.index',
        'create' => 'staff.create',
        'store' => 'staff.store',
        'show' => 'staff.show',
        'edit' => 'staff.edit',
        'update' => 'staff.update',
    ]
]);
Route::get('staff/{slug}/staus', 'StaffController@changeStatus')->name('staff.status');
Route::get('staff/{id}/delete', 'StaffController@destroy')->name('staff.delete');

// supplier routes
Route::get('/suppliers/pdf', 'SupplierController@createPDF')->name('suppliers.pdf');
Route::resource('suppliers', 'SupplierController', [
    'names' => [
        'index' => 'suppliers.index',
        'create' => 'suppliers.create',
        'store' => 'suppliers.store',
        'show' => 'suppliers.show',
        'edit' => 'suppliers.edit',
        'update' => 'suppliers.update',
    ]
]);
Route::get('suppliers/{id}/status', 'SupplierController@changeStatus')->name('suppliers.status');
Route::get('suppliers/{id}/delete', 'SupplierController@destroy')->name('suppliers.delete');
// purchases route
Route::get('/purchases/pdf', 'PurchaseController@createPDF')->name('purchases.pdf');
Route::resource('purchases', 'PurchaseController', [
    'names' => [
        'index' => 'purchases.index',
        'create' => 'purchases.create',
        'store' => 'purchases.store',
        'show' => 'purchases.show',
        'edit' => 'purchases.edit',
        'update' => 'purchases.update',
    ]
]);
Route::get('purchases/{code}/invoice', 'PurchaseController@getInvoice')->name('purchases.invoice');
Route::get('purchases/{code}/status', 'PurchaseController@changeStatus')->name('purchases.status');
Route::post('/purchase-products', 'PurchaseController@purchaseProducts')->name('purchase.purchaseProducts');
Route::get('purchases/{code}/delete', 'PurchaseController@destroy')->name('purchases.delete');


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
        Route::get('/dashboard',[WholesellerController::class,'dashboard'])->name('wholeseller.dashboard');
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

