<?php

use App\Http\Controllers\Api\V1\ScannerController;
use Illuminate\Http\Request;
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

    Route::prefix('v1')->group(callback: function () {

        Route::post('scanner', [ScannerController::class, 'create']);

    });
});
