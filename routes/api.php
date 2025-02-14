<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route Index API prefix
Route::get('/', function () {

    return response()->json(['app-name' => env('APP_NAME')], 200, ['Content-Type' => 'application/json']);
});

// Authentification Route
Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::post('login', 'login')->name('login');
    Route::post('logout', 'logout')->middleware('auth:sanctum');
});

// Route Siswa Data

// Route Kelas Data

// Route Guru Data

// Route Mata Pelajaran Data

// Route Pivot Table Guru & Kelas Data


// Not Found Route
Route::fallback(function () {
    return response()->json(['statusCode' => 404, 'status' => "error", 'message' => 'not found!'], 404, ['Content-Type' => 'application/json']);
});
