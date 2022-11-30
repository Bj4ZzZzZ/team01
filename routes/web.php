<?php

use App\Http\Controllers\BedsController;
use App\Http\Controllers\DormitoriesController;
use App\Http\Controllers\LatesController;
use App\Http\Controllers\LeavesController;
use App\Http\Controllers\RollcallsController;
use App\Http\Controllers\SbrecordsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\FeaturesController;

use App\Models\Sbrecord;
use App\Models\Student;
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
    return redirect('students');
});

Route::get('students',[StudentsController::class,'index'])->name('students.index');
Route::get('students/create',[StudentsController::class,'create'])->name('students.create');
Route::get('students/{id}',[StudentsController::class,'show'])->where("id","[0-9]+")->name('students.show');
Route::delete('students/delete/{id}',[StudentsController::class,'destroy'])->where("id","[0-9]+")->name('students.destroy');
Route::post('students/store',[StudentsController::class,'store'])->name('students.store');

Route::get('dormitories',[DormitoriesController::class,'index'])->name('dormitories.index');
Route::get('dormitories/create',[DormitoriesController::class,'create'])->name('dormitories.create');
Route::get('dormitories/{id}',[DormitoriesController::class,'show'])->where("id","[0-9]+")->name('dormitories.show');
Route::delete('dormitories/delete/{id}',[DormitoriesController::class,'destroy'])->where("id","[0-9]+")->name('dormitories.destroy');
Route::post('dormitories/store',[DormitoriesController::class,'store'])->name('dormitories.store');

Route::get('beds',[BedsController::class,'index'])->name('beds.index');
Route::get('beds/create',[BedsController::class,'create'])->name('beds.create');
Route::get('beds/{id}',[BedsController::class,'show'])->where("id","[0-9]+")->name('beds.show');
Route::delete('beds/delete/{id}',[BedsController::class,'destroy'])->where("id","[0-9]+")->name('beds.destroy');
Route::post('beds/store',[BedsController::class,'store'])->name('beds.store');

Route::get('sbrecords',[SbrecordsController::class,'index'])->name('sbrecords.index');
Route::get('sbrecords/create',[SbrecordsController::class,'create'])->name('sbrecords.create');
Route::get('sbrecords/{id}',[SbrecordsController::class,'show'])->where("id","[0-9]+")->name('sbrecords.show');
Route::delete('sbrecords/delete/{id}',[SbrecordsController::class,'destroy'])->where("id","[0-9]+")->name('sbrecords.destroy');
Route::post('sbrecords/store',[SbrecordsController::class,'store'])->name('sbrecords.store');

Route::get('rollcalls',[RollcallsController::class,'index'])->name('rollcalls.index');
Route::get('rollcalls/create',[RollcallsController::class,'create'])->name('rollcalls.create');
Route::get('rollcalls/{id}',[RollcallsController::class,'show'])->where("id","[0-9]+")->name('rollcalls.show');
Route::delete('rollcalls/delete/{id}',[RollcallsController::class,'destroy'])->where("id","[0-9]+")->name('rollcalls.destroy');
Route::post('rollcalls/store',[RollcallsController::class,'store'])->name('rollcalls.store');

Route::get('lates',[LatesController::class,'index'])->name('lates.index');
Route::get('lates/create',[LatesController::class,'create'])->name('lates.create');
Route::get('lates/{id}',[LatesController::class,'show'])->where("id","[0-9]+")->name('lates.show');
Route::get('lates/examine/{id}',[LatesController::class,'examine'])->where("id","[0-9]+")->name('lates.examine');
Route::delete('lates/delete/{id}',[LatesController::class,'destroy'])->where("id","[0-9]+")->name('lates.destroy');
Route::post('lates/store',[LatesController::class,'store'])->name('lates.store');

Route::get('leaves',[LeavesController::class,'index'])->name('leaves.index');
Route::get('leaves/create',[LeavesController::class,'create'])->name('leaves.create');
Route::get('leaves/{id}',[LeavesController::class,'show'])->where("id","[0-9]+")->name('leaves.show');
Route::get('leaves/examine/{id}',[LeavesController::class,'examine'])->where("id","[0-9]+")->name('leaves.examine');
Route::delete('leaves/delete/{id}',[LeavesController::class,'destroy'])->where("id","[0-9]+")->name('leaves.destroy');
Route::post('leaves/store',[LeavesController::class,'store'])->name('leaves.store');

Route::get('features',[FeaturesController::class,'index'])->name('features.index');
Route::get('features/create',[FeaturesController::class,'create'])->name('features.create');
Route::get('features/{id}',[FeaturesController::class,'show'])->where("id","[0-9]+")->name('features.show');
Route::delete('features/delete/{id}',[FeaturesController::class,'destroy'])->where("id","[0-9]+")->name('features.destroy');
Route::post('features/store',[FeaturesController::class,'store'])->name('features.store');