<?php

use App\Http\Controllers\Admin\MainController;
// use App\Http\Controllers\Admin\Users\AdminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentController;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostControllerNew;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\User\UserPostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\User\UsersLoginController;
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

Route::get('/admin/login', [LoginController::class, 'index'])->name('login');

Route::post('/admin/login', [LoginController::class, 'login'])->name('login.post');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/user/login', [UsersLoginController::class, 'indexUser'])->name('loginUser');

Route::post('/user/login', [UsersLoginController::class, 'loginUser'])->name('loginUser.post');

Route::post('/logoutUser', [UsersLoginController::class, 'logoutUser'])->name('logoutUser');

Route::get('/register', [UsersLoginController::class, 'showRegistrationForm']);

Route::get('/test-email', [UsersLoginController::class, 'processQueue']);

Route::post('/register', [UsersLoginController::class, 'register'])->name('register');

Route::middleware(['admin:admin'])->group(function(){
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

         Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit');

         Route::post('/edit/{post}', [PostController::class, 'update'])->name('update');

         Route::DELETE('/destroy', [PostController::class, 'destroy'])->name('delete');
    });

    

    Route::prefix('users')->name('user.')->group(function (){
        Route::get('/add', [UserController::class, 'create'])->name('addUser');

         Route::post('/add', [UserController::class, 'storeUser'])->name('storeUser');

         Route::get('/list', [UserController::class, 'index'])->name('list');

         Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');

         Route::post('/edit/{user}', [UserController::class, 'update'])->name('update');

         Route::DELETE('/destroy', [UserController::class, 'destroy'])->name('delete');
    });

        #upload
        Route::post('/upload/services', [UploadController::class, 'store']);

});

Route::get('/home', [UserPostController::class, 'index'])->name('home');

Route::get('/post/{post}', [UserPostController::class, 'show'])->name('post.show');

Route::middleware('user:user')->group(function () {

    Route::post('/post/{post}/comments', [CommentController::class, 'store']);
});

// Route::apiResource('posts', PostControllerNew::class);
