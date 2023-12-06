<?php

use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ArticelController;
use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::get('login', [LoginController::class, 'indexLogin']);
Route::post('login/store', [LoginController::class, 'storeLogin']);

Route::get('register', [LoginController::class, 'indexRegister']);
Route::post('register/store', [LoginController::class, 'storeRegister']);

Route::get('logout', function (Request $request) {
    if (auth()->check()) {
        Auth::logout();
    }
    return redirect()->route('home');
});

Route::middleware(['auth','admin', 'admin_role'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index'])->name('main');

        #Menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create'])->name('menu.create');
            Route::post('add', [MenuController::class, 'store'])->name('menu.store');
            Route::get('list', [MenuController::class, 'index'])->name('menu.list');
            Route::get('edit/{menu}', [MenuController::class, 'show'])->name('menu.edit');
            Route::post('edit/{menu}', [MenuController::class, 'update'])->name('menu.update');
            Route::DELETE('destroy', [MenuController::class, 'destroy'])->name('menu.delete');
        }
        );

        #Product
        Route::prefix('products')->group(function () {
            Route::get('add', [ProductController::class, 'create'])->name('product.create');
            Route::post('add', [ProductController::class, 'store'])->name('product.store');
            Route::get('list', [ProductController::class, 'index'])->name('product.index');
            Route::get('edit/{product}', [ProductController::class, 'show'])->name('product.edit');
            Route::post('edit/{product}', [ProductController::class, 'update'])->name('product.update');
            Route::DELETE('destroy', [ProductController::class, 'destroy'])->name('product.delete');
        }
        );
        #qlbaibao
        Route::prefix('Qlbaiviet')->group(function () {
            Route::get('add', [ArticelController::class, 'create'])->name('article.create');
            Route::post('add', [ArticelController::class, 'InsertArticel'])->name('article.store');
            Route::get('list', [ArticelController::class, 'index'])->name('article.list');
            Route::delete('destroy', [ArticelController::class, 'destroy'])->name('article.delete');
            Route::get('edit/{product}', [ArticelController::class, 'show'])->name('article.edit');
            Route::post('edit/{product}', [ArticelController::class, 'update'])->name('article.update');
        }
        );
        #Slider
        Route::prefix('sliders')->group(function () {
            Route::get('add', [SliderController::class, 'create'])->name('slider.create');
            Route::post('add', [SliderController::class, 'store'])->name('slider.store');
            Route::get('list', [SliderController::class, 'index'])->name('slider.index');
            Route::get('edit/{slider}', [SliderController::class, 'show'])->name('slider.edit');
            Route::post('edit/{slider}', [SliderController::class, 'update'])->name('slider.update');
            Route::DELETE('destroy', [SliderController::class, 'destroy'])->name('slider.delete');
        }
        );

        #User
        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('user.index');
            Route::get('edit/{user}', [UserController::class, 'show'])->name('user.edit');
            Route::post('edit/{user}', [UserController::class, 'update'])->name('user.update');
            Route::DELETE('destroy', [UserController::class, 'destroy'])->name('user.delete');
        }
        );

        #Role
        Route::prefix('roles')->group(function () {
            Route::get('add', [RoleController::class, 'create'])->name('role.create');
            Route::post('add', [RoleController::class, 'store'])->name('role.store');
            Route::get('/', [RoleController::class, 'index'])->name('role.index');
            Route::get('edit/{slider}', [RoleController::class, 'show'])->name('role.edit');
            Route::post('edit/{slider}', [RoleController::class, 'update'])->name('role.update');
            Route::DELETE('destroy', [RoleController::class, 'destroy'])->name('role.delete');
        }
        );

        #Role
        Route::prefix('comments')->group(function () {
            Route::get('/', [CommentController::class, 'index'])->name('comment.index');
            Route::DELETE('destroy', [CommentController::class, 'destroy'])->name('comment.delete');
        }
        );

        Route::get('contact', [\App\Http\Controllers\MainController::class, 'contactList'])->name('contact.index');
        Route::delete('contact/destroy', [\App\Http\Controllers\MainController::class, 'destroyContact'])->name('contact.delete');

        #Upload
        Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);

        #Cart
        Route::get('customers', [CartController::class, 'index'])->name('customer.index');
        Route::post('customers/change-status', [CartController::class, 'changeStatus'])->name('customer.update-status');
        Route::get('customers/view/{customer}', [CartController::class, 'show'])->name('customer.detail');
        Route::delete('customers/destroy', [CartController::class, 'destroy'])->name('customer.detail');
    });
});

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('home');
Route::post('/services/load-product', [App\Http\Controllers\MainController::class, 'loadProduct']);

Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);

Route::get('bai-viet/{id}', [App\Http\Controllers\ArticelController::class, 'detail']);

Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index']);
Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
Route::get('carts/delete/{id}', [App\Http\Controllers\CartController::class, 'remove']);
Route::post('carts', [App\Http\Controllers\CartController::class, 'addCart']);

Route::post('comment', [App\Http\Controllers\CommentController::class, 'addComment']);

Route::get('test',function (){
    return view('test');
});

Route::get('blogs', [App\Http\Controllers\MainController::class, 'blogList']);

Route::get('contact',function (){
    return view('contact',[
        'title' => 'Liên hệ',
        'sliders' => [],
        'menus' => [],
        'products' => [],
    ]);
});

Route::get('about-us',function (){
    return view('about-us',[
        'title' => 'Về chúng tôi',
        'sliders' => [],
        'menus' => [],
        'products' => [],
    ]);
});

Route::post('contact', [App\Http\Controllers\MainController::class, 'addContact']);

Route::get('search', [App\Http\Controllers\SearchController::class, 'search']);
