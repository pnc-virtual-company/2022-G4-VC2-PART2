<?php
use App\Http\Controllers\BatchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowUpController;


// send veify code to user for reset their password
Route::post('/sendVeifyCode', [MailController::class , 'sendCodeResetPSW']);

// Route::group(['middleware' => ['auth:sanctum']], function () {
Route::apiresource('/user', UserController::class);
Route::apiresource('/student', StudentController::class);
//CRUD follow up for add follow up list
Route::apiresource('/follow_up', FollowUpController::class);
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
//send mail to student to inform that they have been added to student follow up list
Route::post('/mailFollowUp', [MailController::class , 'informFolowUpToStudent']);

//
// });
// ----------------------userLogin-------------------------
Route::get('/login', [UserController::class , 'login']);
Route::post('/logout', [UserController::class , 'logout']);
Route::post('/createUser', [UserController::class , 'createUser']);
