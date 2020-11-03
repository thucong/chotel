<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Chotel\IndexController;
use App\Http\Controllers\Chotel\RoomController;
use App\Http\Controllers\Chotel\ContactController;
use App\Http\Controllers\Chotel\AboutController;
use App\Http\Controllers\Chotel\CommentController;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\AdminRoomController;
use App\Http\Controllers\Admin\AdminRoomTypeController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminUtilityController;
use App\Http\Controllers\Auth\AuthController;

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
Route::pattern('id', '[0-9]+');
Route::pattern('slug', '(.*)');
Route::pattern('typeId', '[0-9]+');
Route::prefix('/')->group(function () {
    // Route::group(['namespace' => 'Chotel'], function () {
    //Trang chủ
    Route::get('/', [IndexController::class, 'index'])->name('chotel.index.index');
     //Trang liên hệ
    Route::get('/lien-he', [ContactController::class, 'contact'])->name('chotel.contact.contact');
    //Trang giới thiệu
    Route::get('/gioi-thieu', [AboutController::class, 'about'])->name('chotel.about.about');
    //Trang dịch vụ
    Route::get('/danh-sach-phong', [RoomController::class, 'index'])->name('chotel.room.index');
    Route::get('/danh-sach-phong/{slug}-{id}', [RoomController::class, 'list'])->name('chotel.room.list');
    Route::get('/chi-tiet/{slug}-{id}-{typeId}', [RoomController::class, 'detail'])->name('chotel.room.detail');
    Route::get('/search',[IndexController::class,'search'])->name('chotel.index.search');
    Route::post('/insert_rating',[RoomController::class,'insert_rating'])->name('chotel.room.rating');
    //Route::get('/comment/{id}',[CommentController::class,'postComment'])->name('chotel.room.detail');
});
//====ADMIN===//

Route::prefix('/admin')->middleware('auth')->group(function () {
    //Dashboard
    Route::get('/', [AdminIndexController::class, 'index'])->name('admin.index.index');
    //Loại phòng
    Route::prefix('/room-type')->group(function () {
        Route::get('/', [AdminRoomTypeController::class, 'index'])->name('admin.roomType.index');
        Route::get('/add', [AdminRoomTypeController::class, 'add'])->name('admin.roomType.add');
        Route::post('/add', [AdminRoomTypeController::class, 'postAdd'])->name('admin.roomType.add');
        Route::get('/edit/{id}', [AdminRoomTypeController::class, 'edit'])->name('admin.roomType.edit');
        Route::post('/edit/{id}', [AdminRoomTypeController::class, 'postEdit'])->name('admin.roomType.edit');
        Route::get('/delete/{id}', [AdminRoomTypeController::class, 'delete'])->name('admin.roomType.delete')->middleware('role:admin|vinaenter');
        Route::get('/search',[AdminRoomTypeController::class,'search'])->name('admin.roomType.search');
    });

    //Phòng
    Route::prefix('/room')->group(function () {
        Route::get('/', [AdminRoomController::class, 'index'])->name('admin.room.index');
        Route::get('/add', [AdminRoomController::class, 'add'])->name('admin.room.add');
        Route::post('/add', [AdminRoomController::class, 'postAdd'])->name('admin.room.add');
        Route::get('/edit/{id}', [AdminRoomController::class, 'edit'])->name('admin.room.edit');
        Route::post('/edit/{id}', [AdminRoomController::class, 'postEdit'])->name('admin.room.edit');
        Route::get('/delete/{id}', [AdminRoomController::class, 'delete'])->name('admin.room.delete');
        Route::get('/search',[AdminRoomController::class,'search'])->name('admin.room.search');
    });
     //User
    Route::prefix('/user')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('admin.user.index');
        Route::get('/add', [AdminUserController::class, 'add'])->name('admin.user.add')->middleware('role:admin');
        Route::post('/add', [AdminUserController::class, 'postAdd'])->name('admin.user.add')->middleware('role:admin');
        Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/edit/{id}', [AdminUserController::class, 'postEdit'])->name('admin.user.edit');
        Route::get('/delete/{id}', [AdminUserController::class, 'delete'])->name('admin.user.delete')->middleware('role:admin');
        Route::get('/search',[AdminUserController::class,'search'])->name('admin.user.search');
    });
    //Utility
    Route::prefix('/utility')->group(function () {
        Route::get('/', [AdminUtilityController::class, 'index'])->name('admin.utility.index');
        Route::get('/add', [AdminUtilityController::class, 'add'])->name('admin.utility.add');
        Route::post('/add', [AdminUtilityController::class, 'postAdd'])->name('admin.utility.add');
        Route::get('/edit/{id}', [AdminUtilityController::class, 'edit'])->name('admin.utility.edit');
        Route::post('/edit/{id}', [AdminUtilityController::class, 'postEdit'])->name('admin.utility.edit');
        Route::get('/delete/{id}', [AdminUtilityController::class, 'delete'])->name('admin.utility.delete');
        Route::get('/search',[AdminUtilityController::class,'search'])->name('admin.utility.search');
    });
});
//===AUTH===//

Route::prefix('/auth')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('auth.auth.login');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('auth.auth.login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.auth.logout');
});




//mã hóa password
Route::get('/pass', function(){
    return bcrypt('123123');
});
//Middleware
Route::get('error',function() {
    return "Bạn không có quyền thực hiện chức năng này";
});