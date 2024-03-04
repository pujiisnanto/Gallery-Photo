<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\viewController;
use App\Http\Controllers\albumController;
use App\Http\Controllers\fiturController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\exploreController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\postinganController;
use App\Models\LaporanPostingan;

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
Route::middleware(['tamu'])->group(function () {
    Route::get('/', [indexController::class, 'index']);
    Route::get('/index', 'indexController@index')->name('index');
    Route::get('/logout', [viewController::class, 'logout']);
    Route::get('/jelajahi', [indexController::class, 'jelajahi']);
    Route::get('/getDataExplore', [exploreController::class, 'getData' ]);
    Route::get('/details/{id}', [indexController::class, 'detail']);
    Route::get('/login', [indexController::class, 'login']);
    Route::get('/daftar', [indexController::class, 'daftar']);
    Route::post('/Auth-login', [AuthController::class, 'Authlogin']);
    Route::post('/Auth-daftar', [AuthController::class, 'Authdaftar']);
    Route::get('/getDataKomentar/{id}', [fiturController::class, 'komentar']);
    Route::get('/getExploreDetail/{id}', [exploreController::class, 'dataDetail']);
});

Route::middleware(['user'])->group(function () {
    Route::get('/beranda', [viewController::class, 'beranda']);
    Route::get('/profile', [viewController::class, 'profile']);
    Route::get('/detail/{id}', [viewController::class, 'detail'])->name('detail');
    Route::get('/explore', [viewController::class, 'explore']);
    Route::get('/pengikut', [viewController::class, 'pengikut']);
    Route::get('/user-profile/{id}', [viewController::class, 'userProfile']);
    Route::get('/plus',[viewController::class, 'plus']);
    Route::get('/logout', [viewController::class, 'logout']);

    // postingan
    Route::get('/form-add-postingan', [postinganController::class, 'formAdd']);
    Route::post('/add-postingan', [postinganController::class, 'add']);
    Route::get('/form-update-postingan/{id}', [postinganController::class, 'formUpdate']);
    Route::post('/update-postingan', [postinganController::class, 'update']);
    Route::get('/delete-postingan/{id}', [postinganController::class, 'delete']);
    Route::post('/laporan-postingan', [fiturController::class, 'laporanPostingan']);

    // album
    Route::get('/detail-album/{id}', [albumController::class, 'detail']);
    Route::get('/form-add-album', [albumController::class, 'formAdd']);
    Route::post('/add-album', [albumController::class, 'add']);
    Route::get('/form-update-album/{id}', [albumController::class, 'formUpdate']);
    Route::post('/update-album', [albumController::class, 'update']);
    Route::get('/delete-album/{id}', [albumController::class, 'delete']);

    // explore
    Route::get('/getExplore', [exploreController::class, 'getData']);
    Route::get('/explore-beranda', [exploreController::class, 'exploreBeranda']);
    Route::get('/explore-plus-postingan', [exploreController::class, 'plusPostingan']);
    Route::get('/getProfileUser/{id}', [exploreController::class, 'profileUser']);
    Route::get('/getExploreDetail/{id}', [exploreController::class, 'dataDetail']);

    // profile
    Route::post('/update-profile', [profileController::class, 'update']);
    Route::post('/change-password', [profileController::class, 'changePassword']);
    Route::post('/change-avatar', [profileController::class, 'changeAvatar']);

    // like
    Route::post('/like/{id}', [fiturController::class, 'like'])->name('like');
    Route::post('/dislike/{id}', [fiturController::class, 'dislike'])->name('dislike');

    // follow
    Route::post('/follow/{id}', [fiturController::class, 'follow'])->name('follow');
    Route::post('/unfollow/{id}', [fiturController::class, 'unfollow'])->name('unfollow');

    // komentar
    Route::get('/getDataKomentar/{id}', [fiturController::class, 'komentar']);
    Route::post('/upload-Komentar', [fiturController::class, 'uploadKomentar']);
    Route::post('/laporkan-Komentar', [fiturCOntroller::class, 'laporanKomentar']);

    //search
    Route::get('/search', [fiturController::class, 'search']);
    Route::get('/cariData', [fiturController::class, 'cariData']);
    Route::get('/data-berdasarkan-kategori/{id}', [fiturController::class, 'getDataByCategory']);

});


