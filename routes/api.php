<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\KelasController;
use Illuminate\Support\Facades\Route;

// Route Index API prefix
Route::get('/', function () {
    return response()->json([
        'app-name' => env('APP_NAME')
    ], 200, [
        'Content-Type' => 'application/json'
    ]);
});

// Authentification Route
Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::post('login', 'login')->name('login');
    Route::post('validate', 'validate')->middleware('auth:sanctum')->name('auth.validate');
    Route::post('logout', 'logout')->middleware('auth:sanctum')->name('auth.logout');
});

// Route Siswa Data

// Route Kelas Data
Route::controller(KelasController::class)->prefix("kelas")->middleware('auth:sanctum')->group(function () {
    Route::get('/', 'get')->name('kelas.get');
    Route::get('/{id}', 'getDetail')->name('kelas.getDetail');
    Route::post('/', 'create')->name('kelas.create');
    Route::patch('/{id}', 'update')->name('kelas.update');
    Route::delete('/{id}', 'delete')->name('kelas.delete');
});

// Route Guru Data

// Route Mata Pelajaran Data

// Route Pivot Table Guru & Kelas Data


// Not Found Route
Route::fallback(function () {
    return response()->json(['statusCode' => 404, 'status' => "error", 'message' => 'not found!'], 404, ['Content-Type' => 'application/json']);
});
