<?php

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

Route::get('/table', function () {
    return view('table');
});

Route::get('/invoice_pending', function () {
    return view('invoice_pending');
});

Route::get('/form_invoice', function () {
    return view('form_invoice');
});

Route::get('/upload_file_invoice', function () {
    return view('upload_file_invoice');
});

Route::get('/upload', [UploadManager::class, 'upload'])->name('upload.form');
Route::post('/uploadFile', [UploadManager::class, 'uploadPost']);
