<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UploadManager;
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

Route::get('/home', function () {
    return view('home');
});

// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/invoice_pending', function () {
//     return view('invoice_pending');
// }) -> name('invoice_pending');

Route::get('/form_invoice', function () {
    return view('form_invoice');
});

// Route::get('/upload_file_invoice', function () {
//     return view('upload_file_invoice');
// });
Route::get('/login', [PagesController::class, 'login']) -> name('login');
Route::post('/login', [LoginController::class, 'login']) -> name('login.post');

Route::get('/invoice_pending', [PagesController::class, 'invoice_pending']) -> name('invoice_pending');
Route::get('/table', [PagesController::class, 'table']) -> name('table');
Route::get('/upload_file_invoice/{id}', [UploadManager::class, 'edit']) -> name('upload_file_invoice');
Route::post('/post_upload_file_invoice/{id}', [UploadManager::class, 'update']) -> name('post_upload_file_invoice');

Route::get('/upload', [UploadManager::class, 'upload'])->name('upload.form');
Route::post('/post_invoice', [UploadManager::class, 'uploadPost']);
