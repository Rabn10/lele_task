<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SkillController;

Route::get('/', function () {
    return view('welcome');
});
;

Route::middleware(['auth'])->group(function () {
    // AdminController routes
    Route::get('/home', [AdminController::class, 'index'])->name('home');
    Route::get('/uploadCV', [AdminController::class, 'create'])->name('uploadCV');
    Route::post('/upload-resumes', [AdminController::class, 'uploadResumes'])->name('upload-resumes');
    Route::get('/exportRankedCsv', [AdminController::class, 'exportRankedCsv'])->name('exportRankedCsv');

    // SkillController routes
    Route::get('/skills', [SkillController::class, 'index'])->name('skills');
    Route::get('/createSkill', [SkillController::class, 'create'])->name('createSkill');
    Route::get('/editSkill/{id}', [SkillController::class, 'editPage'])->name('editSkill');
    Route::put('/updateSkill/{id}', [SkillController::class, 'update'])->name('updateSkill');
    Route::post('/storeSkill', [SkillController::class, 'store'])->name('storeSkill');
    Route::delete('/deleteSkill/{id}', [SkillController::class, 'delete'])->name('deleteSkill');
});

