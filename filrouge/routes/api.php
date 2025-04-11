<?php
use App\Http\Controllers\API\TicketController;
use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tickets', [TicketController::class, 'index']);
    Route::post('/tickets', [TicketController::class, 'store']);
    Route::get('/tickets/{ticket}', [TicketController::class, 'show']);
    Route::put('/tickets/{ticket}', [TicketController::class, 'update']);
    Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);

});