<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Front\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController as ControllersPermissionController;
use App\Http\Controllers\ProductController as ControllersProductController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {

//register 
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store'])
        ->name('newuser');
    

//login 
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])
        ->name('auth');


//forgot password

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('passwordrequest');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');


//reset password       
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('passwordreset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');


        
    Route::get('/shop', [ControllersProductController::class, 'index'])
        ->name('shop');

    Route::get('/Cart', [ControllersProductController::class, 'cart'])
        ->name('cart');
    Route::get('/Contact-Us', fn() => view('themes.default.front.pages.contact'))
        ->name('contact');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');


    
    // dashboard pages    
    Route::get('/buttons', fn() => view('themes.default.back.dashboard.ui-features.buttons'))->name('buttons');
    Route::get('/dropdowns', fn() => view('themes.default.back.dashboard.ui-features.dropdowns'))->name('dropdowns');
    Route::get('/typography', fn() => view('themes.default.back.dashboard.ui-features.typography'))->name('typography');
    Route::get('/form', fn() => view('themes.default.back.dashboard.forms.basic_elements'))->name('form');
    Route::get('/blog', fn() => view('themes.default.back.dashboard.orms'))->name('blog');
    Route::get('/tables', fn() => view('themes.default.back.dashboard.tables.basic-table'))->name(name: 'tables');
    Route::get('/charts', fn() => view('themes.default.back.dashboard.charts.charts'))->name('charts');
    Route::get('/icons', fn() => view('themes.default.back.dashboard.icons.mdi'))->name('icons');
    Route::get('/blank', fn() => view('themes.default.back.dashboard.samples.blank-page'))->name('blank-page');
    Route::get('/error-404', fn() => view('themes.default.back.dashboard.samples.error-404'))->name('error-404');
    Route::get('/error-500', fn() => view('themes.default.back.dashboard.samples.error-500'))->name('error-500');
    // Route::get('/Sign-in', fn() => view('themes.default.auth.login'))->name('signin');
    
    
    //User managment page
    Route::get('user-management', [ControllersPermissionController::class,'index'])->name('permission');
    Route::get('role-management', [RoleController::class,'index'])->name('role');
    Route::put('role-create', [ControllersPermissionController::class,'store'])->name('user_create');
    Route::put('role-update', [RoleController::class,'update'])->name('role_change');
    // Route::get('edit-permission', [ControllersPermissionController::class,'showpermissions'])->name('permission');
    Route::get('/permissions', [ControllersPermissionController::class, 'showpermissions']);
    Route::put('register', [RoleController::class, 'store'])->name('role_create');
    Route::put('role-management/update-permissions}', [ControllersPermissionController::class, 'update'])->name('update_permission');
    // Route::get('/users/{id}/permissions', [ControllersPermissionController::class,'show'])->name('update_permission');
    Route::get('/users/{id}/permissions', [ControllersPermissionController::class, 'show']);

    // // front pages

    // // Route::get('/dropdowns', fn() => view('themes.default.back.dashboard.ui-features.dropdowns'))->name('dropdowns');
    // // Route::get('/typography', fn() => view('themes.default.back.dashboard.ui-features.typography'))->name('typography');
    // // Route::get('/form', fn() => view('themes.default.back.dashboard.forms.basic_elements'))->name('form');
    // // Route::get('/blog', fn() => view('themes.default.back.dashboard.orms'))->name('blog');
    // // Route::get('/tables', fn() => view('themes.default.back.dashboard.tables.basic-table'))->name(name: 'tables');
    // // Route::get('/charts', fn() => view('themes.default.back.dashboard.charts.charts'))->name('charts');
    // // Route::get('/icons', fn() => view('themes.default.back.dashboard.icons.mdi'))->name('icons');
    // // Route::get('/blank', fn() => view('themes.default.back.dashboard.samples.blank-page'))->name('blank-page');
    // // Route::get('/error-404', fn() => view('themes.default.back.dashboard.samples.error-404'))->name('error-404');
    // Route::get('/error-500', action: fn() => view('themes.default.back.dashboard.samples.error-500'))->name('error-500');

});
