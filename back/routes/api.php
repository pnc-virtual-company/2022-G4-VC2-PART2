<?php
use App\Http\Controllers\BatchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CommentController;




// Route::group(['middleware' => ['auth:sanctum']], function () {
Route::apiresource('/user', UserController::class);
Route::apiresource('/student', StudentController::class);
//get students order by first name
Route::get('/orderByName', [UserController::class , 'orderByFname']);
Route::post('/add', [UserController::class , 'store']);
//get student by batch
Route::get('/getStudentByBatch/{batch}', [StudentController::class , 'getStudentByBatch']);
//get student by class
Route::get('/getStudentByClass/{class}', [StudentController::class , 'getStudentByClass']);
//get student major
Route::get('/getStudentByMajor/{major}', [StudentController::class , 'getStudentByMajor']);
//get user by sepcific role
Route::get('/getUserBy/{role}', [UserController::class , 'getUserBy']);
//CRUD for batchs
Route::apiResource('/batch', BatchController::class);
//CRUD comments
Route::apiResource('/comment', CommentController::class);
//get all students follow up
Route::get('/getAllStudentFolowUp', [StudentController::class , 'getAllStudentFolowUp']);
//set student to follow up
Route::post('/setFollowUp/{id}', [StudentController::class , 'setFollowUp']);
//
// });
// ----------------------userLogin-------------------------
Route::post('/login', [UserController::class , 'login']);
Route::post('/logout', [UserController::class , 'logout']);
Route::post('/createUser', [UserController::class , 'createUser']);
