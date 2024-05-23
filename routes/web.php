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
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmploiDuTempsController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EtudiantParentController;
use App\Http\Controllers\FiliereController;
use App\Models\Etudiant;
use App\Models\Filiere;
use Illuminate\Support\Facades\Route;

// Inscription
Route::get('/register', [userController::class, 'register'])->name('register');
Route::post('/register', [userController::class, 'handdleRegister'])->name('register.post');


// Connexion
Route::get('/login', [userController::class, 'login'])->name('login');
Route::post('/login', [userController::class, 'handdleLogin'])->name('login.post');
Route::get('/test', function () {
    $etudiants = Etudiant::all();
    return view('test', compact('etudiants'));
})->name('test');


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

Route::get('/testins', function () {
    return view('testsIns/role');
})->name('inscription');
Route::post('/identification', [AdminController::class, 'identifier'])->name('role.identifier');
Route::post('/users/store', [AdminController::class,'store'])->name('users.store');


  //test et resultats


  Route::get('test',[EtudiantTestController::class, 'index'])->name('etudiant.test');
  Route::post('test',[EtudiantTestController::class, 'store'])->name('etudiant.test.store');
  Route::get('results/{result_id}',[EtudiantResultController::class, 'show'])->name('etudiant.results.show');
  Route::get('results/etudiant',[EtudiantResultController::class, ' showResult'])->name('etudiant_results');
  Route::get('examenResult',[EtudiantResultController::class, 'showResult_prof'])->name('professeur_results');

 //composition
 Route::get('composition',[CompositionController::class,'fillComposition'])->name('composition');

Route::get('/administration', [AdminController::class, 'connection'])->name('admin.connection');
Route::post('/admin', [AdminController::class, 'adminIdentifier'])->name('admin.identifier');

//ETUDIANT
Route::get('/etudiant', [EtudiantController::class, 'create'])->name('etudiant.create');
Route::get('/etudiants', [EtudiantController::class, 'index'])->name('etudiants.index');

//PARENT
Route::get('/parent', [EtudiantParentController::class, 'create'])->name('parent.create');

