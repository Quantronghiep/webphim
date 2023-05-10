<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\LoginUserController;
use App\Models\Episode;
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
// login 
Route::get('/login',[LoginUserController::class,'login'])->name('login');
Route::post('/login-user',[LoginUserController::class,'loginUser'])->name('login-user');
Route::get('/register',[LoginUserController::class,'register'])->name('register');
Route::post('/register-user',[LoginUserController::class,'registerUser'])->name('register-user');
Route::get('/logout-user', [LoginUserController::class, 'logout'])->name('logout');

Route::get('/', [IndexController::class,'home'])->name('homepage');
Route::get('/danh-muc/{slug}', [IndexController::class,'category'])->name('category');
Route::get('/the-loai/{slug}', [IndexController::class,'genre'])->name('genre');
Route::get('/quoc-gia/{slug}', [IndexController::class,'country'])->name('country');
Route::get('/phim/{slug}', [IndexController::class,'movie'])->name('movie');
Route::get('/xem-phim/{slug}/{episode}', [IndexController::class,'watch'])->name('watch');
Route::get('/episode', [IndexController::class,'episode'])->name('episode');
Route::get('/nam/{year}',[IndexController::class,'locTheoNam'])->name('admin.locTheoNam');
Route::get('/tag/{tag}',[IndexController::class,'tag']);
Route::get('/tim-kiem-phim',[IndexController::class,'timKiemPhim'])->name('timKiemPhim');
Route::get('/locphim',[IndexController::class,'locphim'])->name('locphim');
Route::post('/add-rating',[IndexController::class,'addRating'])->name('addRating');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/login',[LoginController::class,'login'])->name('admin.login');
Route::post('/check_login', [LoginController::class, 'checkLogin'])->name('check_login');
Route::get('/logout', [LoginUserController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->group(function () {
    Route::get('/index', [HomeController::class, 'index'])->name('admin.home');
    Route::post('/resorting',[CategoryController::class,'resorting'])->name('admin.resorting');
    Route::resource('/category', CategoryController::class);
    Route::resource('/genre', GenreController::class);
    Route::resource('/country', CountryController::class);
    Route::resource('/episode', EpisodeController::class); //tap phim
    Route::get('/index-episode/{movie_id}',[EpisodeController::class,'indexEpisodeByMovieId'])->name('episode.indexEpisodeByMovieId');
    Route::get('/add-episode/{movie_id}',[EpisodeController::class,'createEpisodeByMovieId'])->name('episode.createEpisodeByMovieId');
    Route::get('/get-episode-by-movie',[EpisodeController::class,'getEpisodeByMovie'])->name('admin.getEpisodeByMovie');
    Route::resource('/movie', MovieController::class);
    Route::post('/update-year-phim',[MovieController::class,'updateYearPhim'])->name('admin.updateYearPhim');
    Route::post('/update-topview-phim',[MovieController::class,'updateTopView'])->name('admin.updateTopView');
    Route::post('/update-season-phim',[MovieController::class,'updateSeasonPhim'])->name('admin.updateSeasonPhim');
    Route::post('/filter-topview-phim',[MovieController::class,'filterTopViewPhim'])->name('admin.filterTopViewPhim');
    Route::get('/filter-topview-phim-default',[MovieController::class,'filterTopViewPhimDefault'])->name('admin.filterTopViewPhimDefault');
    Route::post('/watch-video',[MovieController::class,'watchVideo'])->name('admin.watch-video');
});

