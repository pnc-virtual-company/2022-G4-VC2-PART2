<?php
use App\Http\Controllers\BatchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\StudentController;


Route::post('/createUser',[UserController::class ,'createUser']);
Route::post('/user',[UserController::class,'store']);
Route::apiresource('/user',UserController::class);
Route::apiResource('/student', StudentController::class);
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Route::post('/createUser',[UserController::class ,'createUser']);
    // Route::apiresource('/student', StudentController::class);
    Route::get('/orderByName', [UserController::class,'orderByFname']);
    Route::post('/add', [UserController::class,'store']);
    //get student by batch
    Route::get('/getStudentByBatch/{batch}', [StudentController::class, 'getStudentByBatch']);
    //get student by class
    Route::get('/getStudentByClass/{class}', [StudentController::class , 'getStudentByClass']);
    //get student major
    Route::get('/getStudentByMajor/{major}', [StudentController::class , 'getStudentByMajor']);
    //get user by sepcific role
    Route::get('/getUserBy/{role}',[UserController::class,'getUserBy']);
    //CRUD for batchs
    Route::apiResource('/batch',BatchController::class);
    //get all students follow up
    Route::get('/get_follow_up', [StudentController::class , 'getAllStudentFolowUp']);
    //set student to follow up
    Route::put('/get_follow_up/{id}', [StudentController::class , 'setFollowUp']);

// });
    Route::get('/studentBaccth/{filter}', [StudentController::class, 'filterStudentByBatch']);
    Route::get('/studentClass/{filter}', [StudentController::class , 'filterStudentByClass']);
    Route::get('/studentMajor/{filter}', [StudentController::class , 'filterStudentByMajor']);
    Route::get('/getUserBy/{role}',[UserController::class,'getUserBy']);
    Route::apiResource('batch',BatchController::class);
    Route::post('/logout', [UserController::class, 'logout']);
});
// ----------------------userLogin-------------------------
Route::post('/resetPassword/{id}', [UserController::class, 'createNewPassword']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/mailFollowUp', [MailController::class , 'informFolowUpToStudent']);
Route::post('/sendVeifyCode', [MailController::class , 'sendCodeResetPSW']);
