<?php
use App\Http\Controllers\BatchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowUpController;
use App\Http\Controllers\ReplyMessageController;

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
Route::get('/get_follow_up', [StudentController::class , 'getAllStudentFolowUp']);
//set student to follow up
Route::put('/get_follow_up/{id}', [StudentController::class , 'setFollowUp']);
//send mail to student to inform that they have been added to student follow up list
Route::post('/mailFollowUp', [MailController::class , 'informFolowUpToStudent']);
Route::get('/getSpecificComment/{id}', [CommentController::class , 'getSpecificComment']);
//student reply msg to teacher
Route::apiResource('/replyMsg', ReplyMessageController::class);
// get number of follow students
Route::get('/numberFollowUp/{id}', [FollowUpController::class,'getNumberFollowUp']);
//get reply chat by comment id
Route::get('/replyChatByFUID/{FUID}', [ReplyMessageController::class , 'getReplyByFUID']);
//get comment by follow up id
Route::get('/cmtChatByFuID/{followUpID}', [FollowUpController::class , 'getCmtByFUID']);



// });
// ----------------------userLogin-------------------------
Route::post('/login', [UserController::class , 'login']);
Route::post('/logout', [UserController::class , 'logout']);
Route::post('/createUser', [UserController::class , 'createUser']);
// getFollowUpOne

// getFollowUpOne
Route::get('/get_follow_up/{id}', [StudentController::class , 'getFollowUpOne']);
