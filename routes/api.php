<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;    
use App\Http\Controllers\Api\ProgramController;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return response()->json([
        'status' => true,
        'hello' => "World"
    ]);
});

Route::get('/programs', [ProgramController::class, 'show']);