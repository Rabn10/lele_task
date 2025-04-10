<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SkillController;

Route::get('/', function () {
    return view('welcome');
});
;

route::get('/home',[AdminController::class,'index'])->name('home');
route::get('/uploadCV',[AdminController::class,'create'])->name('uploadCV');
route::post('/upload-resumes',[AdminController::class,'uploadResumes'])->name('upload-resumes');
route::get('/exportRankedCsv',[AdminController::class,'exportRankedCsv'])->name('exportRankedCsv');

route::get('/skills',[SkillController::class,'index'])->name('skills');
route::get('/createSkill',[SkillController::class,'create'])->name('createSkill');
route::post('/storeSkill',[SkillController::class,'store'])->name('storeSkill');
route::delete('/deleteSkill/{id}',[SkillController::class,'delete']);

