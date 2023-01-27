<?php

use App\Http\Controllers\Api\V1\Book\AuthorController;
use App\Http\Controllers\Api\V1\Book\BookController;
use App\Http\Controllers\Api\V1\ScanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::name('api.')->middleware(['return-json'])->group(function () {

    Route::prefix('v1')->name('v1.')->group(callback: function () {

        Route::post(uri: 'scan', action: [ScanController::class, 'create'])->name('scan.post');

        Route::get(uri:'author/top-100', action: [AuthorController::class, 'list'])->name('author.top-100.get');
        Route::get(uri:'author/search', action: [AuthorController::class, 'search'])->name('author.search.get');
        Route::get(uri:'author/average-per-year', action: [AuthorController::class, 'averagePerYear'])->name('author.average-per-year.get');

        Route::get(uri: 'books/list', action: [BookController::class, 'list'])->name('books.list.get');

    });

    Route::fallback(function () {
        return response()->json([
            'error' => __('Not found2'),
        ], 404);
    });
});
