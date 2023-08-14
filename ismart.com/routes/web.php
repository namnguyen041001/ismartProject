<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminDashBoardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminCatController;
use App\Http\Controllers\AdminCatPostController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminSliderController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AdminPermissionController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\CatergoryController;
use App\Http\Controllers\CatPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


#CLIENT
    #HOME
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('search', [HomeController::class, 'search'])->name('home.search');
    #Cat
    Route::get('san-pham/{slug}', [CatergoryController::class, 'category'])->name('home.category');
    #POST
    // CAT
    Route::get('trang-{slug}', [CatPostController::class, 'show'])->name('catPost.show');
    // DETAIL_POST
    Route::get('bai-viet/{slug}.html', [PostController::class, 'detail'])->name('post.detail');

    #PRODUCT
    Route::get('chi-tiet/{slug}-{id}.html', [ProductController::class, 'detail'])->name('product.detail');
    #CART 
    Route::get('cart/show',[CartController::class, 'show'])->name('cart.show');
    Route::get('cart/add/{id}',[CartController::class, 'add'])->name('cart.add');
    Route::get('cart/delete/{rowId}',[CartController::class, 'delete'])->name('cart.delete');
    Route::get('cart/destroy',[CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('cart/update',[CartController::class, 'update'])->name('cart.update');
    Route::get('cart/checkout',[CartController::class, 'checkout'])->name('cart.checkout')->middleware('auth');
    Route::post('cart/store',[CartController::class, 'store'])->name('cart.store')->middleware('auth');
    Route::get('cart/orderSuccess',[CartController::class, 'orderSuccess'])->name('cart.orderSuccess')->middleware('auth');
    Route::get('cart/buyNow/{id}',[CartController::class, 'buyNow'])->name('cart.buyNow')->middleware('auth');
    Route::post('cart/storeByNow',[CartController::class, 'storeByNow'])->name('cart.storeByNow')->middleware('auth');

 


Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


#ADMIN
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', [AdminDashBoardController::class, 'index'])->name('admin.index');
    #USER
    Route::get('/user/list', [AdminUserController::class, 'list'])->name('admin.user.list')->can('user.list');
    Route::get('/user/add', [AdminUserController::class, 'add'])->name('admin.user.add')->can('user.add');
    Route::post('/user/store', [AdminUserController::class, 'store'])->name('admin.user.store')->can('user.add');
    Route::get('/user/edit/{user}', [AdminUserController::class, 'edit'])->name('admin.user.edit')->can('user.update');
    Route::post('/user/update/{user}', [AdminUserController::class, 'update'])->name('admin.user.update')->can('user.update');
    Route::get('/user/delete/{user}', [AdminUserController::class, 'delete'])->name('admin.user.delete')->can('user.delete');
    Route::get('/user/action', [AdminUserController::class, 'action'])->name('admin.user.action')->can('user.list');
    #CATERGORY
    Route::get('/cat/add', [AdminCatController::class, 'add'])->name('admin.cat.add')->can('product.add');
    Route::get('/cat/store', [AdminCatController::class, 'store'])->name('admin.cat.store');
    Route::get('/cat/update/{cat}', [AdminCatController::class, 'update'])->name('admin.cat.update');
    Route::get('/cat/edit/{cat}', [AdminCatController::class, 'edit'])->name('admin.cat.edit');
    Route::get('/cat/delete/{cat}', [AdminCatController::class, 'delete'])->name('admin.cat.delete');
    #POST
        //Cat
    Route::get('/cat-post/add', [AdminCatPostController::class, 'add'])->name('admin.catPost.add')->can('post.add');
    Route::get('/cat-post/store', [AdminCatPostController::class, 'store'])->name('admin.catPost.store');
    Route::get('/cat-post/update/{cat}', [AdminCatPostController::class, 'update'])->name('admin.catPost.update');
    Route::get('/cat-post/edit{cat}', [AdminCatPostController::class, 'edit'])->name('admin.catPost.edit');
    Route::get('/cat-post/delete/{cat}', [AdminCatPostController::class, 'delete'])->name('admin.catPost.delete');
        //LIST
        
    Route::get('/post/show', [AdminPostController::class, 'show'])->name('admin.post.show')->can('post.list');
    Route::get('/post/add', [AdminPostController::class, 'add'])->name('admin.post.add')->can('post.add');
    Route::post('/post/store', [AdminPostController::class, 'store'])->name('admin.post.store')->can('post.add');
    Route::get('/post/update/{post}', [AdminPostController::class, 'update'])->name('admin.post.update')->can('post.edit');
    Route::post('/post/edit/{post}', [AdminPostController::class, 'edit'])->name('admin.post.edit')->can('post.edit');
    Route::get('/post/delete/{post}', [AdminPostController::class, 'delete'])->name('admin.post.delete')->can('post.delete');

    

    #PRODUCT
    Route::get('/product/list', [AdminProductController::class, 'list'])->name('admin.product.list')->can('product.list');
    Route::get('/product/add', [AdminProductController::class, 'add'])->name('admin.product.add')->can('product.add');
    Route::post('/product/store', [AdminProductController::class, 'store'])->name('admin.product.store')->can('product.add');
    Route::get('/product/update/{product}', [AdminProductController::class, 'update'])->name('admin.product.update')->can('product.edit');
    Route::post('/product/edit/{product}', [AdminProductController::class, 'edit'])->name('admin.product.edit')->can('product.edit');
    Route::get('/product/delete/{product}', [AdminProductController::class, 'delete'])->name('admin.product.delete')->can('product.delete');
    #Order:
    Route::get('/order/show', [AdminOrderController::class, 'show'])->name('admin.order.show')->can('order.list');
    Route::get('/order/edit/{id}', [AdminOrderController::class, 'edit'])->name('admin.order.edit')->can('order.edit');
    Route::post('/order/update/{id}', [AdminOrderController::class, 'update'])->name('admin.order.update')->can('order.edit');
    Route::get('/order/delete/{id}', [AdminOrderController::class, 'delete'])->name('admin.order.delete')->can('order.delete');
    #SLIDES:
    Route::get('/slider/show', [AdminSliderController::class, 'show'])->name('admin.slider.show')->can('slider.list');
    Route::get('/slider/add', [AdminSliderController::class, 'add'])->name('admin.slider.add')->can('slider.list');
    Route::post('/slider/store', [AdminSliderController::class, 'store'])->name('admin.slider.store')->can('slider.list');
    Route::get('/slider/update/{slider}', [AdminSliderController::class, 'update'])->name('admin.slider.update')->can('slider.list');
    Route::post('/slider/edit/{slider}', [AdminSliderController::class, 'edit'])->name('admin.slider.edit')->can('slider.list');
    Route::get('/slider/delete/{slider}', [AdminSliderController::class, 'delete'])->name('admin.slider.delete')->can('slider.list');

    #PERMISSION
    Route::get("/permission/add",[AdminPermissionController::class,'add'])->name('admin.permission.add')->can('permission.add');
    Route::post("/permission/store",[AdminPermissionController::class,'store'])->name('admin.permission.store')->can('permission.add');
    Route::get("/permission/update/{id}",[AdminPermissionController::class,'update'])->name('admin.permission.update')->can('permission.edit');
    Route::post("/permission/edit/{id}",[AdminPermissionController::class,'edit'])->name('admin.permission.edit')->can('permission.edit');
    Route::get("/permission/delete/{id}",[AdminPermissionController::class,'delete'])->name('admin.permission.delete')->can('permission.delete');

    #ROLES
    Route::get("/role/show",[AdminRoleController::class,'show'])->name("admin.role.show")->can('role.list');
    Route::get("/role/add",[AdminRoleController::class,'add'])->name("admin.role.add")->can('role.add');
    Route::post("/role/store",[AdminRoleController::class,'store'])->name("admin.role.store")->can('role.add');
    Route::post("/role/update/{role}",[AdminRoleController::class,'update'])->name("admin.role.update")->can('role.edit');
    Route::get("/role/edit/{role}",[AdminRoleController::class,'edit'])->name("admin.role.edit")->can('role.edit');
    Route::get("/role/delete/{role}",[AdminRoleController::class,'delete'])->name("admin.role.delete")->can('role.delete');

});

Route::group(['prefix' => 'user'], function () {
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/checkLogin', [UserController::class, 'checkLogin'])->name('user.checkLogin');
    Route::get('/add', [UserController::class, 'add'])->name('user.add');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/active', [UserController::class, 'active'])->name('user.active');

    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
});
