<?php

use App\Http\Controllers\ExerciesController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
use App\Models\Skill;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get("exercies/create",[ExerciesController::class,'create']);


Auth::routes();
Route::get("truncate",function(){
    Skill::truncate();
    return "ok";
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("skills/create",[SkillController::class,'create'])->name("skill.create")->middleware("auth");
Route::post("skills",[SkillController::class,'store'])->name("skill.store")->middleware("auth");
Route::get("skills",[SkillController::class,'home'])->name("skill.index")->middleware("auth");

Route::get("doctors/create",[UserController::class,"doctor_create"])->name("doctor.create");
Route::post("doctors",[UserController::class,"doctor_store"])->name("doctor.store");
Route::get("doctors",[UserController::class,"doctors"])->name("doctor.index");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("makefolder",function(){

    $targetFolder = $_SERVER['DOCUMENT_ROOT'].'/storage/app/public';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/public/storage';
    symlink($targetFolder,$linkFolder);
    echo 'Symlink process successfully completed';
    
});