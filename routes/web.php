<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemController2;
use App\Http\Controllers\ItemController3;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserController2;
use App\Http\Controllers\UserController3;
use App\Models\Banner;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
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
    return view('home', [
        'route' => Request::route()->getName(),
        'title' => 'NIKKY',
        'items' => DB::table('items')->paginate(12),
        'banners' => Banner::all(),
    ]);
})->name('home');

Route::get('/products', function() {
    return view('products', [
        'items' => DB::table('items')->get(),
    ]);
});

// Route::get('/user/wishlist', function() {
//     return view('products', [
//         // 'items' => DB::table('items')->get(),
//         'route' => Request::route()->getName(),
//         'title' => 'NIKKY',
//         'items' => DB::table('items')->paginate(12),
//         'banners' => Banner::all(),
//     ]);
// });


Route::controller(AuthController::class)->prefix('/auth')->group(function (){
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::get('/logout', 'logout');
});

Route::controller(UserController2::class)->prefix('/user/setting')->group(function() {
    Route::get('/', 'index');
    Route::get('/show/{id}', 'show');
    // Route::get('/create', 'create');
    Route::get('/edit/{id}', 'edit');
    Route::post('/update', 'update');
    // Route::post('/store', 'store');
    // Route::get('/delete/{id}', 'delete');
});

Route::controller(UserController3::class)->prefix('/user/profile')->group(function() {
    Route::get('/', 'index');
    Route::get('/show/{id}', 'show');
    // Route::get('/create', 'create');
    Route::get('/edit/{id}', 'edit');
    Route::post('/update', 'update');
    // Route::post('/store', 'store');
    // Route::get('/delete/{id}', 'delete');
});

Route::controller(ItemController2::class)->prefix('/user/cart')->group(function() {
    Route::get('/', 'index');
    Route::get('/show/{id}', 'show');
    // Route::get('/create', 'create');
    // Route::get('/edit/{id}', 'edit');
    // Route::post('/update', 'update');
    // Route::post('/store', 'store');
    // Route::get('/delete/{id}', 'delete');
});

Route::controller(ItemController3::class)->prefix('/user/wishlist')->group(function() {
    Route::get('/', 'index');
    Route::get('/show/{id}', 'show');
    // Route::get('/create', 'create');
    // Route::get('/edit/{id}', 'edit');
    // Route::post('/update', 'update');
    // Route::post('/store', 'store');
    // Route::get('/delete/{id}', 'delete');
});


Route::middleware(['auth'])->prefix('/admin')->group(function (){
    Route::controller(ItemController::class)->prefix('/products')->group(function() {
        Route::get('/', 'index');
        Route::get('/show/{id}', 'show');
        Route::get('/create', 'create');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
        Route::post('/store', 'store');
        Route::get('/delete/{id}', 'delete');
    });
    Route::controller(UserController::class)->prefix('/users')->group(function() {
        Route::get('/', 'index');
        Route::get('/show/{id}', 'show');
        // Route::get('/create', 'create');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
        // Route::post('/store', 'store');
        // Route::get('/delete/{id}', 'delete');
    });
    Route::controller(OrderController::class)->prefix('/orders')->group(function() {
        Route::get('/', 'index');
        Route::post('/changeStatus/{id}', 'changeStatus');
    });
    Route::get('/dashboard', function () {
        return view(
            'admin.dashboard.index',
            [
                'pendingOrders' => OrderController::pendingOrders(),
            ]
        );
    });
});