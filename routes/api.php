<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\GuruController;
use App\Http\Controllers\api\KelasController;
use App\Http\Controllers\api\SiswaController;
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
Route::controller(SiswaController::class)->prefix('siswa')->middleware('auth:sanctum')->group(function () {
    Route::get('/', 'get')->name('siswa.get');
    Route::get('/{id}', 'getDetail')->name('siswa.getDetail');
    Route::post('/', 'create')->name('siswa.create');
    Route::patch('/{id}', 'update')->name('siswa.update');
    Route::delete('/{id}', 'delete')->name('siswa.delete');
});


// Route Kelas Data
Route::controller(KelasController::class)->prefix("kelas")->middleware('auth:sanctum')->group(function () {
    Route::get('/', 'get')->name('kelas.get');
    Route::get('/{id}', 'getDetail')->name('kelas.getDetail');
    Route::post('/', 'create')->name('kelas.create');
    Route::patch('/{id}', 'update')->name('kelas.update');
    Route::delete('/{id}', 'delete')->name('kelas.delete');
});

// Route Guru Data
Route::controller(GuruController::class)->prefix('guru')->middleware('auth:sanctum')->group(function () {
    Route::get('/', 'get')->name('guru.get');
    Route::get('/{id}', 'getDetail')->name('guru.getDetail');
    Route::post('/', 'create')->name('guru.create');
    Route::patch('/{id}', 'update')->name('guru.update');
    Route::delete('/{id}', 'delete')->name('guru.delete');
});

// Route Mata Pelajaran Data

// Route Pivot Table Guru & Kelas Data


// Not Found Route
Route::fallback(function () {
    return response()->json(['statusCode' => 404, 'status' => "error", 'message' => 'not found!'], 404, ['Content-Type' => 'application/json']);
});
