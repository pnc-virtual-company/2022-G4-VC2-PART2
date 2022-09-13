<?php

use App\Http\Controllers\BatchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;


Route::apiresource('/user',UserController::class);
Route::apiresource('/student', StudentController::class);
Route::get('/orderByName', [UserController::class,'orderByFname']);
Route::get('/studentBaccth/{filter}', [StudentController::class, 'filterStudentByBatch']);
Route::get('/studentClass/{filter}', [StudentController::class , 'filterStudentByClass']);
Route::get('/studentMajor/{filter}', [StudentController::class , 'filterStudentByMajor']);

Route::get('/getUserBy/{role}',[App\Http\Controllers\UserController::class,'getUserBy']);
Route::apiResource('batch',BatchController::class);
