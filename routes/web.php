<?php

use App\Http\Controllers\Admin\AdminUserPictureController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\VacationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Http\Request;
use App\Http\Controllers\Mail\SendContactEmailController;
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

/**
 * Routes for sending contact email
 */
Route::get('/contact', [SendContactEmailController::class, 'showForm'])->name('contact.emailForm');
Route::post('/contact', [SendContactEmailController::class, 'sendEmail'])->name('contact.send');


Route::middleware("auth:web")->group(function () {

    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect('/home');
    })->middleware(['auth', 'signed'])->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        try {
            $request->user()->sendEmailVerificationNotification();
            return back()->with('message', 'Verification link sent!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send verification link.');
        }
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

    Route::get ('/logout', [AuthController::class, 'logout'])->name('logout');


    Route::get('/vacation', [VacationController::class, 'getAllVacationsFilenames'])->name('vacation');
    Route::middleware(['auth', 'verified'])->group(function () {
        //Route::middleware(['auth', 'verified'])->post('/search', [SearchController::class, 'search'])->name('search');
        Route::post('/search', [SearchController::class, 'search'])->name('search');

        //Route::get('/vacation', [VacationController::class, 'getAllVacationsFilenames'])->name('vacation');

        Route::get('/gallery/{vacCat}', [GalleryController::class, 'getAllPicturesByVacCode'])
            ->where('vacCat', '[0-9]+')->name('gallery');

        Route::get('/picture/{currentFileName}', [PictureController::class, 'pictureForCarusel'])->name('picture');

        Route::get('/search/picture/{currentFileName}', [PictureController::class, 'pictureForCarusel'])->name('search/picture');

        Route::get('/pictures/create', [PictureController::class, 'create'])->name('create.picture');
        Route::post('/pictures/create_process', [PictureController::class, 'store'])->name('insert.picture');
    });

    /**
     * Routes for ordinary users
     */
    Route::get('/user/edit', [UserController::class, 'editForm'])->name('user.edit');
    Route::put('/user/update', [UserController::class, 'update'])->name('user.update');
    Route::put('/user/change-password', [UserController::class, 'changePassword'])->name('user.changePassword');
    Route::post('/user/send-message', [UserController::class, 'sendMessage'])->name('user.sendMessage'); //Внутренний мессенджер

    /**
     * Routes for administrators (you can use a different prefix if needed)
     */
    Route::prefix('admin')->group(function () {
        //Route::resource('user', UserController::class)->only(['index', 'create', 'store', 'show', 'destroy']);
        Route::post('/user/update-status', [AdminUserController::class, 'updateStatus'])->name('admin.user.updateStatus');
        //Route::get('/messages', [AdminUserController::class, 'viewMessages'])->name('admin.messages');
        Route::get('/error', [AdminUserController::class, 'error'])->name('admin.error');
        Route::get('/picture/error', [AdminUserPictureController::class, 'error'])->name('admin.picture.error');
        Route::resource('user', AdminUserController::class)
            ->only(['index', 'create', 'store', 'show', 'destroy'])
            ->names([
                'index' => 'admin.user.index',
                'create' => 'admin.user.create',
                'store' => 'admin.user.store',
                'show' => 'admin.user.show',
                'destroy' => 'admin.user.destroy',
        ]);

    });

    Route::prefix('super')->group(function () {
//        Route::get('user/picture/main', [AdminUserPictureController::class, 'main'])
//            ->name('super.user.picture.main');
        Route::resource('user/picture', AdminUserPictureController::class)
            ->only(['index', 'store', 'create','edit', 'update' ,'show', 'destroy'])
            ->names([
                'index' => 'super.user.picture.index',
                'create' => 'super.user.picture.create',
                'store' => 'super.user.picture.store',
                'edit' => 'super.user.picture.edit',
                'update' => 'super.user.picture.update',
                'show' => 'super.user.picture.show',
                'destroy' => 'super.user.picture.destroy',
            ]);
        //Route::get('user/picture/input', [AdminUserPictureController::class,'input'])->name('super.user.picture.input');
    });

    Route::get('root/user/picture/input/{picture}', [AdminUserPictureController::class,'input'])
            ->name('root.user.picture.input');

    //Route::post('/api/picturesa', [PictureController::class, 'showByQuery'])->name('api_picturesa'); //Постмен
});




Route::middleware("guest:web")->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login_process', [AuthController::class, 'login'])->name('login_process');

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register_process', [AuthController::class, 'register'])->name('register_process');

    Route::get('/forgot', [AuthController::class, 'showForgotForm'])->name('forgot');
    Route::post('/forgot_process', [AuthController::class, 'forgot'])->name('forgot_process');

    Route::get('/update-language', [AuthController::class, 'updateLanguage'])->name('update.language');


    Route::get('/api/pictures/{id}', [PictureController::class, 'show']);
    //Route::post('/api/picturesg', [PictureController::class, 'showByQuery'])->name('api_picturesg'); //Постмен
    Route::get('/api/vacations/{id}', [VacationController::class, 'show']);


});


