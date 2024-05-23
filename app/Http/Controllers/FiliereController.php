<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    public function index()
    {
        $emploisDuTemps = Filiere::all();
        return view('emplois.index', compact('emploisDuTemps'));
    }

    // Afficher un emploi du temps spécifique
    public function show($filiereId)
    {
        $filiere = Filiere::find($filiereId);
        $emploiDuTemps = $filiere->emploieDuTemps();
        $emploisActif = $emploiDuTemps->latest()->first();
        return view('tests/emploidutemps', compact('emploisActif', 'filiere'));
    }

    // Afficher le formulaire de création d'un nouvel emploi du temps
    public function create()
    {
        return view('tests/filierecreate');
    }

    // Enregistrer un nouvel emploi du temps
    public function store(Request $request)
    {

        // Valider les données du formulaire
        $validated =  $request->validate([
            'codFil' => 'string|required',
            'libFil' => 'string|required'
            // Ajoutez d'autres règles de validation au besoin
        ]);

        $filieres = Filiere::all();
        foreach ($filieres as $filiere) {
            if ($filiere->codFil == $validated['codFil']) {
                return redirect()->route('filiere.create')->with('info', 'Ce code est deja applique a une filiere.');
            }
        }

        // Créer un nouvel emploi du temps
        Filiere::create($validated);

        // Rediriger vers la page d'index des emplois du temps avec un message de succès
        return redirect()->route('filiere')->with('success', 'Filiere créé avec succès.');
    }


    // Afficher le formulaire d'édition d'un emploi du temps
    public function edit($emploiId)
    {
        $emploiDuTemps = Filiere::findOrFail($emploiId);
        return view('tests/emploiedit', compact('emploiDuTemps',));
    }

    // Mettre à jour un emploi du temps
    public function update(Request $request, $emploiId)
    {

        // Valider les données du formulaire
        $request->validate([
            'lundi_matin' => 'nullable|string|max:255',
            'lundi_aprem' => 'nullable|string|max:255',
            'lundi_soir' => 'nullable|string|max:255',
            'mardi_matin' => 'nullable|string|max:255',
            'mardi_aprem' => 'nullable|string|max:255',
            'mardi_soir' => 'nullable|string|max:255',
            'mercredi_matin' => 'nullable|string|max:255',
            'mercredi_aprem' => 'nullable|string|max:255',
            'mercredi_soir' => 'nullable|string|max:255',
            'jeudi_matin' => 'nullable|string|max:255',
            'jeudi_aprem' => 'nullable|string|max:255',
            'jeudi_soir' => 'nullable|string|max:255',
            'vendredi_matin' => 'nullable|string|max:255',
            'vendredi_aprem' => 'nullable|string|max:255',
            'vendredi_soir' => 'nullable|string|max:255',
            'samedi_matin' => 'nullable|string|max:255',
            // Ajoutez d'autres règles de validation au besoin
        ]);

        // Trouver l'emploi du temps à mettre à jour
        $emploiDuTemps = Filiere::findOrFail($emploiId);

        // Mettre à jour les données de l'emploi du temps
        $emploiDuTemps->update($request->all());

        // Rediriger vers la page d'index des emplois du temps avec un message de succès
        return redirect()->route('emplois.show', ['filiereId' => $emploiDuTemps->codFil])->with('success', 'Emploi du temps mis à jour avec succès.');
    }

    // Supprimer un emploi du temps
    public function destroy($id)
    {
        // Trouver l'emploi du temps à supprimer
        $emploiDuTemps = Filiere::findOrFail($id);

        // Supprimer l'emploi du temps
        $emploiDuTemps->delete();

        // Rediriger vers la page d'index des emplois du temps avec un message de succès
        return redirect()->route('home')->with('success', 'Emploi du temps supprimé avec succès.');
    }
}
