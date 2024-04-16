<?php

use App\Http\Controllers\Admin\MainController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/admin/users/login', [LoginController::class, 'index'])->name('login');

Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function(){
    Route::prefix('admin')->group(function (){

        Route::get('/', [MainController::class, 'index'])->name('admin');

        Route::get('dashboard', [MainController::class, 'index'])->name('index');
        
    

    //Categories
    Route::prefix('categories')->name('cate.')->group(function (){

        Route::get('/list', [CategoriesController::class, 'index'])->name('list');

        Route::get('/add', [CategoriesController::class, 'create'])->name('addCate');

        Route::post('/add', [CategoriesController::class, 'storeCate'])->name('storeCate');
        
        Route::get('/edit/{categories}', [CategoriesController::class, 'show'])->name('edit');

        Route::post('/edit/{categories}', [CategoriesController::class, 'update'])->name('update');
        
        Route::DELETE('/destroy', [CategoriesController::class, 'destroy'])->name('delete');
    });
    #Post
    Route::prefix('posts')->name('post.')->group(function (){
        Route::get('/add', [PostController::class, 'create'])->name('addPost');

         Route::post('/add', [PostController::class, 'storePost'])->name('storePost');

         Route::get('/list', [PostController::class, 'index'])->name('list');

         Route::get('/edit/{post}', [PostController::class, 'show'])->name('edit');

         Route::post('/edit/{post}', [PostController::class, 'update'])->name('update');

         Route::DELETE('/destroy', [PostController::class, 'destroy'])->name('delete');
    });

        #upload
        Route::post('/upload/services', [UploadController::class, 'store']);
    });
});