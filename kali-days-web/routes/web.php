<?php
use App\Http\Controllers\VlogController;
use Illuminate\Support\Facades\Route;

Route::resource('vlogs', VlogController::class);

// Para que la página principal sea tu lista de vlogs
Route::get('/', [VlogController::class, 'index']);
