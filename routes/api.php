<?php

use App\Http\Controllers\SectionController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// we-hope.herokuapp.com/api/sections/1
Route::get('skills',[SkillController::class,'index'])->middleware("auth:sanctum");

Route::get('skills/{skill}',[SkillController::class,'show'])->middleware("auth:sanctum");

Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);
Route::post('logout',[UserController::class,'logout'])->middleware("auth:sanctum");

Route::get("sections",[SectionController::class,'index'])->middleware("auth:sanctum");
Route::get("sections/{section}",[SectionController::class,'show'])->middleware("auth:sanctum");

Route::get("doctors",[UserController::class,'doctors']);
Route::get("patients",[UserController::class,'patients']);
// Route::get("doctors/{user}");