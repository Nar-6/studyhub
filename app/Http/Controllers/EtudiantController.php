<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Inscription;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{


    public function index(Request $request)
    {
        $query = $request->input('query');

        $etudiants = Etudiant::where('prenom', 'like', "%$query%")
            ->orWhere('nom', 'like', "%$query%")
            ->orWhere('matricule', 'like', "%$query%")
            ->get();
        return view('etudiants.index', compact('etudiants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $etudiant = new Etudiant();
        return view('etudiants.create', [
            "etudiant" => $etudiant
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Etudiant::create($request->all());
        return redirect()->route('etudiants.index')->with('success', 'Étudiant ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {

        return view('etudiants.show', compact('etudiant'));
    }
    public function showDetails($matricule)
    {
        // Récupérer l'inscription de l'étudiant avec le matricule fourni et charger les relations associées
        $inscription = Inscription::where('matricule', $matricule)
            ->with(['etudiant', 'compositions', 'filiere'])
            ->firstOrFail();

        // dd($inscription);
        // Retourner la vue avec les détails de l'étudiant
        $jours = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];
        return view('etudiants.details', ['inscription' => $inscription, 'jours' => $jours]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {

        return view('etudiants.edit', compact('etudiant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiant $etudiant)
    {

        $etudiant->update($request->all());
        return redirect()->route('etudiants.index')->with('success', 'Étudiant mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect()->route('etudiants.index')->with('success', 'Étudiant supprimé avec succès.');
    }
}
