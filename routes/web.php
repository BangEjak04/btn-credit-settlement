<?php

use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('generate-pdf')->name('generate-pdf.')->group(function () {
    Route::controller(PdfController::class)->group(function () {
        Route::get('/memo/{record}', 'memo')->name('memo');
        Route::get('/form/{record}', 'form')->name('form');
    });
});

