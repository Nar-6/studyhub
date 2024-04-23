<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmploiDuTempsController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ProfileController;
use App\Models\Filiere;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('etudiants', EtudiantController::class);
    Route::get('inscriptions', [InscriptionController::class, 'create'])->name('inscriptions.create');
    Route::post('inscriptions', [InscriptionController::class, 'store'])->name('inscriptions.store');
    Route::get('/etudiants/{matricule}/details', [EtudiantController::class, 'showDetails'])->name('etudiants.details');
});


////////////////////
//EMPLOI DU TEMPS//
///////////////////

Route::get('/testemplois', function () {
    $filieres = Filiere::all();
    return view('tests/filieres', compact('filieres'));
})->name('filiere');
Route::get('/emplois/{filiereId}', [EmploiDuTempsController::class, 'show'])->name('emplois.show');
Route::get('/emplois/create/{filiereId}', [EmploiDuTempsController::class, 'create'])->name('emplois.create');
Route::post('/emplois/store/{filiereId}', [EmploiDuTempsController::class, 'store'])->name('emplois.store');
Route::get('/emplois/edit/{emploiId}', [EmploiDuTempsController::class, 'edit'])->name('emplois.edit');
Route::post('/emplois/update/{emploiId}', [EmploiDuTempsController::class, 'update'])->name('emplois.update');
Route::get('/emplois/destroy/{emploiId}', [EmploiDuTempsController::class, 'destroy'])->name('emplois.destroy');


////////////////////
//FILIERES//
///////////////////

Route::get('/filiere/create', [FiliereController::class, 'create'])->name('filiere.create');
Route::post('/filiere/store', [FiliereController::class, 'store'])->name('filiere.store');


/////////////////
//INSCRIPTIONS//
////////////////

Route::get('/testins', function () {
    return view('testsIns/role');
})->name('inscription');
Route::post('/identification', [AdminController::class, 'identifier'])->name('role.identifier');

//ADMINISTRATION

Route::get('/administration', [AdminController::class, 'connection'])->name('admin.connection');
Route::post('/users/store', [FiliereController::class, 'store'])->name('filiere.store');

require __DIR__ . '/auth.php';
