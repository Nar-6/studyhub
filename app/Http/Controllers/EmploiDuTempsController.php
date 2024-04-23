<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmploiDuTemps;
use App\Models\Filiere;

class EmploiDuTempsController extends Controller
{
    // Afficher tous les emplois du temps
    public function index()
    {
        $emploisDuTemps = EmploiDuTemps::all();
        return view('emplois.index', compact('emploisDuTemps'));
    }

    // Afficher un emploi du temps spécifique
    public function show($filiereId)
    {
        $filiere = Filiere::find($filiereId);
        $emploiDuTemps = $filiere->emploieDuTemps();
        $emploisActif = $emploiDuTemps->latest()->first();
        return view('tests/emploidutemps', compact('emploisActif','filiere'));
    }

    // Afficher le formulaire de création d'un nouvel emploi du temps
    public function create($filiereId)
    {
        $filiere = Filiere::find($filiereId);
        return view('tests/emploicreate', compact('filiere'));
    }

    // Enregistrer un nouvel emploi du temps
    public function store(Request $request, $filiereId)
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
            'codFil' => 'required|string',
            // Ajoutez d'autres règles de validation au besoin
        ]);

        // Créer un nouvel emploi du temps
        EmploiDuTemps::create($request->all());

        // Rediriger vers la page d'index des emplois du temps avec un message de succès
        return redirect()->route('emplois.show', ['filiereId' => $filiereId])->with('success', 'Emploi du temps créé avec succès.');
    }


    // Afficher le formulaire d'édition d'un emploi du temps
    public function edit($emploiId)
    {
        $emploiDuTemps = EmploiDuTemps::findOrFail($emploiId);
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
        $emploiDuTemps = EmploiDuTemps::findOrFail($emploiId);

        // Mettre à jour les données de l'emploi du temps
        $emploiDuTemps->update($request->all());

        // Rediriger vers la page d'index des emplois du temps avec un message de succès
        return redirect()->route('emplois.show',  ['filiereId' => $emploiDuTemps->codFil])->with('success', 'Emploi du temps mis à jour avec succès.');
    }

    // Supprimer un emploi du temps
    public function destroy($id)
    {
        // Trouver l'emploi du temps à supprimer
        $emploiDuTemps = EmploiDuTemps::findOrFail($id);

        // Supprimer l'emploi du temps
        $emploiDuTemps->delete();

        // Rediriger vers la page d'index des emplois du temps avec un message de succès
        return redirect()->route('filiere')->with('success', 'Emploi du temps supprimé avec succès.');
    }
}
