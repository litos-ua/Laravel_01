<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\VacationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\UserController;
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


//Route::get('/main', [MainController::class, 'index'])->name('main');
Route::get('/test', [TestController::class, 'testIndex'])->name('test01');
Route::get('/test2', [TestController::class, 'testIndex2'])->name('test02');
Route::get('/test3', [TestController::class, 'testIndex3'])->name('test03');
Route::get('/data01', [TestController::class, 'database01'])->name('data01');
Route::get('/data02', [TestController::class, 'database02'])->name('data02');
Route::get('/data03', [TestController::class, 'database03'])->name('data03');
//Route::get('/register', [TestController::class, 'testRegister'])->name('register');
Route::get('/my_page', function () {return 'This is my page!';});



Route::get('/', [MainController::class, 'root'])->name('root');
Route::get('/home', [MainController::class, 'index'])->name('home');


Route::middleware("auth:web")->group(function () {
    Route::get ('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/search', [SearchController::class,'search'])->name('search');

    Route::get('/vacation', [VacationController::class, 'getAllVacationsFilenames'])->name('vacation');

    Route::get('/gallery/{vacCat}', [GalleryController::class, 'getAllPicturesByVacCode'])->where('vacCat', '[0-9]+')->name('gallery');

    Route::get('/picture/{currentFileName}', [PictureController::class, 'pictureForCarusel'])->name('picture');

    Route::get('/search/picture/{currentFileName}', [PictureController::class, 'pictureForCarusel'])->name('search/picture');

    Route::get('/pictures/create', [PictureController::class, 'create'])->name('create.picture');
    Route::post('/pictures/create_process', [PictureController::class, 'store'])->name('insert.picture');

    // Routes for ordinary users
    //Route::resource('user', UserController::class)->only(['edit', 'update']);
    Route::get('/user/edit', [UserController::class, 'editForm'])->name('user.edit');
    Route::put('/user/update', [UserController::class, 'update'])->name('user.update');
    // Routes for administrators (you can use a different prefix if needed)
    Route::prefix('admin')->group(function () {
        Route::resource('user', UserController::class)->only(['index', 'create', 'store', 'show', 'destroy']);
        // Add other administrator-specific routes here
    });


    //Route::post('/api/picturesa', [PictureController::class, 'showByQuery'])->name('api_picturesa'); //Постмен
});


Route::middleware("guest:web")->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login_process', [AuthController::class, 'login'])->name('login_process');

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register_process', [AuthController::class, 'register'])->name('register_process');

    Route::get('/forgot', [AuthController::class, 'showForgotForm'])->name('forgot');
    Route::post('/forgot_process', [AuthController::class, 'forgot'])->name('forgot_process');

    Route::get('/api/pictures/{id}', [PictureController::class, 'show']);
    //Route::post('/api/picturesg', [PictureController::class, 'showByQuery'])->name('api_picturesg'); //Постмен
    Route::get('/api/vacations/{id}', [VacationController::class, 'show']);
});


