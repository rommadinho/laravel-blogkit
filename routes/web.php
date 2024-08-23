<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\LevelUserController;
use App\Http\Controllers\ReadmeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StokBarangController;
use App\Http\Controllers\TransaksiPenjualanController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Livewire\UserProfile;
use App\Http\Controllers\UserController;

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

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/list', [UserController::class, 'list']);
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::get('/{id}/edit', [UserController::class, 'edit']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});

Route::get('/', function () {
    return view('welcome', [
        'posts' => Post::count()
    ]);
})->name('home');


Route::resource('posts', PostController::class);
Route::post('/posts/{post}/publish', [PostController::class, 'publish'])->name('posts.publish');
Route::post('/posts/{post}/unpublish', [PostController::class, 'unpublish'])->name('posts.unpublish');

Route::resource('comments', CommentController::class)->only([
    'edit',
    'destroy',
]);

Route::get('/dashboard', [DashboardController::class, 'show'])->middleware(['auth', 'can:access-dashboards'])->name('dashboard');

if (config('blog.readme')) {
    Route::get('/readme', ReadmeController::class);
}

require __DIR__.'/auth.php';

Route::get('/user/profile', UserProfile::class)->name('user.profile');
Route::get('/download-pdf', [ReportController::class, 'generatePDF'])->name('report.pdf');
Route::get('article/cetak_pdf', [ArticleController::class, 'cetak_pdf']);
Route::resource('articles', ArticleController::class);
Route::get('/', [WelcomeController::class, 'index']);



Route::get('/level-user', [LevelUserController::class, 'index'])->name('level-user');
Route::get('/data-user', [UserController::class, 'index'])->name('data-user');

Route::get('/kategori-barang', [KategoriBarangController::class, 'index'])->name('kategori-barang');
Route::get('/data-barang', [BarangController::class, 'index'])->name('data-barang');

Route::get('/stok-barang', [StokBarangController::class, 'index'])->name('stok-barang');
Route::get('/transaksi-penjualan', [TransaksiPenjualanController::class, 'index'])->name('transaksi-penjualan');
