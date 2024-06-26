<?php

use App\Http\Controllers\API\v1\CashTransactionStatisticController;
use App\Http\Controllers\API\v1\DataTables\AdministratorController;
use App\Http\Controllers\API\v1\DataTables\ApproveTransactionController;
use App\Http\Controllers\API\v1\DataTables\CashTransactionController;
use App\Http\Controllers\API\v1\DataTables\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1/')->name('api.v1.')->group(function () {
    Route::get('/cash-transactions/statistics', CashTransactionStatisticController::class)
        ->name('cash-transactions.statistics');

    Route::prefix('datatable/')->name('datatables.')->group(function () {
        Route::apiResources([
            '/administrators' => AdministratorController::class,
            '/students' => StudentController::class,
            '/cash-transactions' => CashTransactionController::class,
        ]);

    });


    Route::get('datatable/approve/list',[CashTransactionController::class,'viewapprove'])->name('datatables.approved.list');
    Route::post('approve',[ApproveTransactionController::class,'approved'])->name('approved');

});
