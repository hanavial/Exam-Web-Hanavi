<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeGuruController;
use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\InformasiController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

// User
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth:web')->prefix('user')->as('user.')->group(function(){

    Route::prefix('materi')->as('materi.')->group(function(){
        Route::get('/',[MateriController::class,'index'])->name('index');
        Route::get('/show/{id}',[MateriController::class,'show'])->name('show');
        Route::get('/download/{file}',[MateriController::class,'download'])->name('download');
    });

    Route::prefix('event')->as('event.')->group(function(){
        Route::get('/',[EventController::class,'index'])->name('index');
        Route::get('/show/{id}',[EventController::class,'show'])->name('show');
    });

    Route::prefix('fasilitas')->as('fasilitas.')->group(function(){
        Route::get('/',[FasilitasController::class,'index'])->name('index');
    });

    Route::prefix('informasi')->as('informasi.')->group(function(){
        Route::get('/',[InformasiController::class,'index'])->name('index');
        Route::get('/show/{id}',[InformasiController::class,'show'])->name('show');
        Route::get('/detail/{id}',[InformasiController::class,'detail'])->name('detail');
    });
});

// Guru
Route::get('/guru/login',[LoginController::class,'showLoginFormGuru'])->name('guru.login_view');
Route::post('/guru/login',[LoginController::class,'loginGuru'])->name('guru.login');

Route::get('/guru', [HomeGuruController::class, 'index'])->name('guru');

Route::middleware('auth:guru')->prefix('guru')->as('guru.')->group(function(){

    Route::prefix('user')->as('user.')->group(function(){
        Route::get('/',[UserController::class,'index'])->name('index');
        Route::get('/create',[UserController::class,'create'])->name('create');
        Route::get('/show/{id}',[UserController::class,'show'])->name('show');
        Route::get('/edit/{id}',[UserController::class,'edit'])->name('edit');
        Route::post('/store',[UserController::class,'store'])->name('store');
        Route::put('/update/{id}',[UserController::class,'update'])->name('update');
        Route::delete('/delete/{id}',[UserController::class,'destroy'])->name('destroy');
    });

    Route::prefix('guru')->as('guru.')->group(function(){
        Route::get('/',[GuruController::class,'index'])->name('index');
        Route::get('/show/{id}',[GuruController::class,'show'])->name('show');
        Route::get('/edit/{id}',[GuruController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[GuruController::class,'update'])->name('update');
    });

    Route::prefix('materi')->as('materi.')->group(function(){
        Route::get('/',[MateriController::class,'index'])->name('index');
        Route::get('/create',[MateriController::class,'create'])->name('create');
        Route::get('/show/{id}',[MateriController::class,'show'])->name('show');
        Route::get('/download/{file}',[MateriController::class,'download'])->name('download');
        Route::get('/edit/{id}',[MateriController::class,'edit'])->name('edit');
        Route::post('/store',[MateriController::class,'store'])->name('store');
        Route::put('/update/{id}',[MateriController::class,'update'])->name('update');
        Route::delete('/delete/{id}',[MateriController::class,'destroy'])->name('destroy');
    });

    Route::prefix('event')->as('event.')->group(function(){
        Route::get('/',[EventController::class,'index'])->name('index');
        Route::get('/create',[EventController::class,'create'])->name('create');
        Route::get('/show/{id}',[EventController::class,'show'])->name('show');
        Route::get('/edit/{id}',[EventController::class,'edit'])->name('edit');
        Route::post('/store',[EventController::class,'store'])->name('store');
        Route::put('/update/{id}',[EventController::class,'update'])->name('update');
        Route::delete('/delete/{id}',[EventController::class,'destroy'])->name('destroy');
    });

    Route::prefix('fasilitas')->as('fasilitas.')->group(function(){
        Route::get('/',[FasilitasController::class,'index'])->name('index');
    });

    Route::prefix('informasi')->as('informasi.')->group(function(){
        Route::get('/',[InformasiController::class,'index'])->name('index');
        Route::get('/card',[InformasiController::class,'card'])->name('card');
        Route::get('/create',[InformasiController::class,'create'])->name('create');
        Route::get('/show/{id}',[InformasiController::class,'show'])->name('show');
        Route::get('/detail/{id}',[InformasiController::class,'detail'])->name('detail');
        Route::get('/edit/{id}',[InformasiController::class,'edit'])->name('edit');
        Route::post('/store',[InformasiController::class,'store'])->name('store');
        Route::put('/update/{id}',[InformasiController::class,'update'])->name('update');
        Route::delete('/delete/{id}',[InformasiController::class,'destroy'])->name('destroy');
    });
});

// Admin
Route::get('/admin/login',[LoginController::class,'showLoginFormAdmin'])->name('admin.login_view');
Route::post('/admin/login',[LoginController::class,'loginAdmin'])->name('admin.login');

Route::get('/admin', [HomeAdminController::class, 'index'])->name('admin');

Route::middleware('auth:admin')->prefix('admin')->as('admin.')->group(function(){

    Route::prefix('user')->as('user.')->group(function(){
        Route::get('/',[UserController::class,'index'])->name('index');
        Route::get('/create',[UserController::class,'create'])->name('create');
        Route::get('/show/{id}',[UserController::class,'show'])->name('show');
        Route::get('/edit/{id}',[UserController::class,'edit'])->name('edit');
        Route::post('/store',[UserController::class,'store'])->name('store');
        Route::put('/update/{id}',[UserController::class,'update'])->name('update');
        Route::delete('/delete/{id}',[UserController::class,'destroy'])->name('destroy');
    });

    Route::prefix('guru')->as('guru.')->group(function(){
        Route::get('/',[GuruController::class,'index'])->name('index');
        Route::get('/create',[GuruController::class,'create'])->name('create');
        Route::get('/show/{id}',[GuruController::class,'show'])->name('show');
        Route::get('/edit/{id}',[GuruController::class,'edit'])->name('edit');
        Route::post('/store',[GuruController::class,'store'])->name('store');
        Route::put('/update/{id}',[GuruController::class,'update'])->name('update');
        Route::delete('/delete/{id}',[GuruController::class,'destroy'])->name('destroy');
    });

    Route::prefix('materi')->as('materi.')->group(function(){
        Route::get('/',[MateriController::class,'index'])->name('index');
        Route::get('/create',[MateriController::class,'create'])->name('create');
        Route::get('/show/{id}',[MateriController::class,'show'])->name('show');
        Route::get('/download/{file}',[MateriController::class,'download'])->name('download');
        Route::get('/edit/{id}',[MateriController::class,'edit'])->name('edit');
        Route::post('/store',[MateriController::class,'store'])->name('store');
        Route::put('/update/{id}',[MateriController::class,'update'])->name('update');
        Route::delete('/delete/{id}',[MateriController::class,'destroy'])->name('destroy');
    });

    Route::prefix('event')->as('event.')->group(function(){
        Route::get('/',[EventController::class,'index'])->name('index');
        Route::get('/create',[EventController::class,'create'])->name('create');
        Route::get('/show/{id}',[EventController::class,'show'])->name('show');
        Route::get('/edit/{id}',[EventController::class,'edit'])->name('edit');
        Route::post('/store',[EventController::class,'store'])->name('store');
        Route::put('/update/{id}',[EventController::class,'update'])->name('update');
        Route::delete('/delete/{id}',[EventController::class,'destroy'])->name('destroy');
    });

    Route::prefix('fasilitas')->as('fasilitas.')->group(function(){
        Route::get('/',[FasilitasController::class,'index'])->name('index');
        Route::get('/create',[FasilitasController::class,'create'])->name('create');
        Route::get('/edit/{id}',[FasilitasController::class,'edit'])->name('edit');
        Route::post('/store',[FasilitasController::class,'store'])->name('store');
        Route::put('/update/{id}',[FasilitasController::class,'update'])->name('update');
        Route::delete('/delete/{id}',[FasilitasController::class,'destroy'])->name('destroy');
    });

    Route::prefix('informasi')->as('informasi.')->group(function(){
        Route::get('/',[InformasiController::class,'index'])->name('index');
        Route::get('/create',[InformasiController::class,'create'])->name('create');
        Route::get('/show/{id}',[InformasiController::class,'show'])->name('show');
        Route::get('/edit/{id}',[InformasiController::class,'edit'])->name('edit');
        Route::post('/store',[InformasiController::class,'store'])->name('store');
        Route::put('/update/{id}',[InformasiController::class,'update'])->name('update');
        Route::delete('/delete/{id}',[InformasiController::class,'destroy'])->name('destroy');
    });
});
