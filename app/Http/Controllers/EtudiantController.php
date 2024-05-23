<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Filiere;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('testsIns/etudiant/etudiants', compact('etudiants'));
    }

    // Afficher un emploi du temps spécifique
    public function show($EtudiantId)
    {
        $Etudiant = Etudiant::find($EtudiantId);
        $emploiDuTemps = $Etudiant->emploieDuTemps();
        $emploisActif = $emploiDuTemps->latest()->first();
        return view('tests/emploidutemps', compact('emploisActif','Etudiant'));
    }

    // Afficher le formulaire de création d'un nouvel emploi du temps
    public function create()
    {
        $role = 'etudiant';
        $filieres = Filiere::all();
        return view('testsIns/formtest', compact('role','filieres'));
    }

    // Enregistrer un nouvel emploi du temps
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'codFil' => 'string|required',
            'libFil' => 'string|required'
            // Ajoutez d'autres règles de validation au besoin
        ]);
        $Etudiants = Etudiant::all();
        foreach ($Etudiants as $Etudiant) {
            if ($Etudiant->codFil == $request->all()['codFil']) {
                return redirect()->route('Etudiant.create')->with('info', 'Ce code est deja applique a une Etudiant.');
            }
        }

        // Créer un nouvel emploi du temps
        Etudiant::create($request->all());
    
        // Rediriger vers la page d'index des emplois du temps avec un message de succès
        return redirect()->route('Etudiant')->with('success', 'Etudiant créé avec succès.');
    }
    

    // Afficher le formulaire d'édition d'un emploi du temps
    public function edit($emploiId)
    {
        $emploiDuTemps = Etudiant::findOrFail($emploiId);
        return view('tests/emploiedit', compact('emploiDuTemps',));
    }

    // Mettre à jour un emploi du temps
    public function update(Request $request, $emploiId)
    {
       
    }

    // Supprimer un emploi du temps
    public function destroy($id)
    {
        // Trouver l'emploi du temps à supprimer
        $emploiDuTemps = Etudiant::findOrFail($id);

        // Supprimer l'emploi du temps
        $emploiDuTemps->delete();

        // Rediriger vers la page d'index des emplois du temps avec un message de succès
        return redirect()->route('home')->with('success', 'Emploi du temps supprimé avec succès.');
    }
}
