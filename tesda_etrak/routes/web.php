<?php

use App\Http\Controllers\EtrakController;
use App\Http\Controllers\ImportExcelFileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/login', [UserController::class, 'index'])->name('login-page');
Route::post('/login/post', [UserController::class, 'login'])->name('login');

Route::get('/login/signup', [UserController::class, 'signup_page'])->name('signup-page');
Route::post('/login/signup/post', [UserController::class, 'signup'])->name('signup');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/e-trak', [EtrakController::class, 'index'])->name('e-trak');

Route::get('/e-trak/view-records', [EtrakController::class, 'view_records'])->name('view-records');
Route::get('/e-trak/view-records/get', [EtrakController::class, 'search_graduates'])->name('search-graduates');

Route::get('/e-trak/create-record', [EtrakController::class, 'create_record_page'])->name('create-record-page');
Route::post('/e-trak/create-record/post', [EtrakController::class, 'create_record'])->name('create-record');

Route::get('/e-trak/record-details/{graduate}', [EtrakController::class, 'record_details'])->name('record-details');

Route::get('/e-trak/update-record/{graduate}', [EtrakController::class, 'update_record_page'])->name('update-record-page');
Route::put('/e-trak/update-record/{graduate}/put', [EtrakController::class, 'update_record'])->name('update-record');

Route::delete('/e-trak/record-details/{graduate}/delete', [EtrakController::class, 'delete_record'])->name('delete-record');

Route::get('/import-excel-file', [ImportExcelFileController::class, 'index'])->name('import-excel-file-page');
Route::post('/import-excel-file/post', [ImportExcelFileController::class, 'import_excel_file'])->name('import-excel-file');