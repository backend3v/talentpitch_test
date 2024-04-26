<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;    
use App\Http\Controllers\Api\ProgramController;
use App\Http\Controllers\Api\ChallengeController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProgramParticipantsController;
use Illuminate\Support\Facades\Log;
use App\Http\Middleware\RequestMiddleware;

Route::get('/', function () {
    return response()->json([
        'status' => true,
        'hello' => "World"
    ]);
});

Route::get('/programs', [ProgramController::class, 'index']);
Route::get('/programs/{id}', [ProgramController::class, 'show']);
Route::post('/programs', [ProgramController::class, 'store']);
Route::delete('/programs/{id}', [ProgramController::class, 'destroy']);
Route::patch('/programs/{id}', [ProgramController::class, 'update']);
Route::post('/programs/generate', [ProgramController::class, 'create']);

Route::get('/challenges', [ChallengeController::class, 'index']);
Route::get('/challenges/{id}', [ChallengeController::class, 'show']);
Route::post('/challenges', [ChallengeController::class, 'store']);
Route::delete('/challenges/{id}', [ChallengeController::class, 'destroy']);
Route::patch('/challenges/{id}', [ChallengeController::class, 'update']);
Route::post('/challenges/generate', [ChallengeController::class, 'create']);

Route::get('/companies', [CompanyController::class, 'index']);
Route::get('/companies/{id}', [CompanyController::class, 'show']);
Route::post('/companies', [CompanyController::class, 'store']);
Route::delete('/companies/{id}', [CompanyController::class, 'destroy']);
Route::patch('/companies/{id}', [CompanyController::class, 'update']);
Route::post('/companies/generate', [CompanyController::class, 'create']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::patch('/users/{id}', [UserController::class, 'update']);
Route::post('/users/generate', [UserController::class, 'create']);

Route::get('/programs/participants', [ProgramParticipantsController::class, 'index']);
Route::get('/programs/participants/{id}', [ProgramParticipantsController::class, 'show']);
Route::post('/programs/participants', [ProgramParticipantsController::class, 'store']);
Route::delete('/programs/participants/{id}', [ProgramParticipantsController::class, 'destroy']);
Route::patch('/programs/participants/{id}', [ProgramParticipantsController::class, 'update']);
