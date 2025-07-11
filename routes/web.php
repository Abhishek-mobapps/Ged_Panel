<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminForgotPasswordController;
use App\Http\Controllers\AdminResetPasswordController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\TypeController;

    Route::get('/', function () {
    return redirect()->route('admin.login');
    })->name('login');

// Admin Routes Group
    Route::prefix('admin')->name('admin.')->group(function () {

    /**
     * ========== Guest Routes ==========
     * Accessible only when not logged in as admin
     */
    // Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AdminAuthController::class, 'login']);
        Route::post('/admin/update', [AdminAuthController::class, 'update'])->name('update');
        Route::get('register', [AdminAuthController::class, 'showRegisterForm'])->name('register');
        Route::post('register', [AdminAuthController::class, 'register']);

        // Route::get('password/forgot', [AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
        // Route::post('password/email', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

        // Route::get('password/reset/{token}', [AdminResetPasswordController::class, 'showResetForm'])->name('password.reset');
        // Route::post('password/reset', [AdminResetPasswordController::class, 'reset'])->name('password.update');

        Route::get('password',[AdminResetPasswordController::class, 'index'])->name('password.change');
        Route::post('new-password',[AdminResetPasswordController::class, 'updatePassword'])->name('password.update');
    // });

    /**
     * ========== Authenticated Routes ==========
     * Accessible only after login
     */
    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('dashboards', [DashboardController::class, 'show'])->name('grid');
        Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout');

        
        Route::resource('products', ProductController::class);
      
        Route::get('/user-profile',[ProfileController::class, 'index'])->name('user-profiles');
        Route::post('/admin/profile/upload', [ProfileController::class, 'uploadImage'])
        ->name('profile.upload');
        
        Route::resource('type', \App\Http\Controllers\Admin\TypeController::class)->name('type');
        Route::get('type/restore/{id}', [\App\Http\Controllers\Admin\TypeController::class, 'restore'])->name('type.restore');
        
        Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

    });
});
