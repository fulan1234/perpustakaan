<?php

use App\Http\Controllers\admin\bookController;
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\dashboard;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [dashboard::class, 'Index'])->name('index');

Route::get('/dashboard', function () {
    return view('admin.allbook');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','role:admin'])->group(function(){     // buat ngebatasin hak akses antara role admin dengan user ( tergantung dari auth nya )
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/admin/all-category', 'AllCategory')->name('allcategory');
        Route::get('/admin/add-category', 'AddCategory')->name('addcategory');
        Route::post('/admin/store-category', 'StoreCategory')->name('storecategory');
        Route::get('/admin/edit-category/{id}', 'EditCategory')->name('editcategory');
        Route::post('/admin/update-category', 'UpdateCategory')->name('updatecategory');
        Route::get('/admin/delete-category/{id}', 'DeleteCategory')->name('deletecategory');
    });

    Route::controller(bookController::class)->group(function () {
        Route::get('/admin/all-book', 'AllBook')->name('allbook');
        Route::get('/admin/add-book', 'AddBook')->name('addbook');
        Route::post('/admin/store-book', 'StoreBook')->name('storebook');
        Route::get('/admin/edit-book/{id}', 'EditBook')->name('editbook');
        Route::post('/admin/update-book', 'UpdateBook')->name('updatebook');
        Route::get('/admin/delete-book/{id}', 'DeleteBook')->name('deletebook');
    });
});

Route::middleware(['auth','role:user'])->group(function(){     // buat ngebatasin hak akses antara role admin dengan user ( tergantung dari auth nya )

    Route::controller(dashboard::class)->group(function () {
        Route::get('/user/dashboard', 'Dashboard')->name('dashboard');
        Route::get('/user/detail-book/{id}', 'DetailBook')->name('detailbook');
        Route::post('/user/addcart', 'AddBookToCart')->name('addbooktocart');
        Route::get('/user/cart', 'AddCart')->name('addcart');
        Route::get('/user/book', 'BookItems')->name('bookitems');
        Route::get('/user/category', 'CategoryItems')->name('categoryitems');
        Route::get('/user/categoryMenu', 'CategoryMenu')->name('categorymenu');
        Route::get('/user/bookCat/{id}', 'BookCat')->name('bookcat');
        Route::get('/user/remove-cart-item/{id}', 'RemoveCartItem')->name('removeitem');
        Route::get('/user/download-file/{id}', 'DownloadFile')->name('downloadfile');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
