<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Inscription;
use App\Models\Filiere;
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
