<?php

use App\Http\Controllers\BatchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;


// Route::post('/createUser',[UserController::class ,'createUser']);
Route::post('/user',[UserController::class,'store']);
Route::apiresource('/user',UserController::class);

Route::group(['middleware' => ['auth:sanctum']], function () {
    // Route::post('/createUser',[UserController::class ,'createUser']);
    Route::apiresource('/student', StudentController::class);
    Route::get('/orderByName', [UserController::class,'orderByFname']);
    Route::get('/studentBaccth/{filter}', [StudentController::class, 'filterStudentByBatch']);
    Route::get('/studentClass/{filter}', [StudentController::class , 'filterStudentByClass']);
    Route::get('/studentMajor/{filter}', [StudentController::class , 'filterStudentByMajor']);
    Route::get('/getUserBy/{role}',[UserController::class,'getUserBy']);
    Route::apiResource('batch',BatchController::class);
    Route::post('/logout', [UserController::class, 'logout']);
});
// ----------------------userLogin-------------------------
Route::post('/login', [UserController::class, 'login']);