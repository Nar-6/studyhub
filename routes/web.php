<?php

use App\Http\Controllers\CompositionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EpreuveController;
use App\Http\Controllers\Etudiant\TestController as EtudiantTestController;
use App\Http\Controllers\Etudiant\ResultController as EtudiantResultController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

// Inscription
Route::get('/register', [userController::class, 'register'])->name('register');
Route::post('/register', [userController::class, 'handdleRegister'])->name('register.post');

// Connexion
Route::get('/login', [userController::class, 'login'])->name('login');
Route::post('/login', [userController::class, 'handdleLogin'])->name('login.post');

// Déconnexion
Route::get('/logout', [userController::class, 'logout'])->name('logout');

// Réinitialisation de mot de passe
Route::get('/forgot-password', [userController::class, 'forgotView'])->name('password.request');
Route::post('/forgot-password', [userController::class, 'forgotPwdEmail'])->name('password.email');
Route::get('/reset-password/{token}', [userController::class, 'resetPwdView'])->name('password.reset');
Route::post('/reset-password', [userController::class, 'resetPwdForm'])->name('password.update');


  //professeurs
  Route::resource('professeur',ProfesseurController::class);

  // epreuves
  Route::resource('epreuve', EpreuveController::class);

  // questions
  Route::resource('question',QuestionController::class);

  // options
  Route::resource('option', OptionController::class);

  //dashboard
  Route::get('dashboard',[ DashboardController::class,'prof'])->name('dashboard.prof');

  //test et resultats

  Route::get('test',[EtudiantTestController::class, 'index'])->name('etudiant.test');
  Route::post('test',[EtudiantTestController::class, 'store'])->name('etudiant.test.store');
  Route::get('results/{result_id}',[EtudiantResultController::class, 'show'])->name('etudiant.results.show');
  Route::get('results/etudiant',[EtudiantResultController::class, ' showResult'])->name('etudiant_results');
  Route::get('examenResult',[EtudiantResultController::class, 'showResult_prof'])->name('professeur_results');

 //composition
 Route::get('composition',[CompositionController::class,'fillComposition'])->name('composition');
