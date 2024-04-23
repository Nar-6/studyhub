<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Etudiant;
use App\Models\Filiere;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    /**
     * Affiche le formulaire d'inscription.
     */
    public function create()
    {
        // Récupérer la liste des filières
        $filieres = Filiere::all();

        // Récupérer les étudiants non inscrits dans une filière et pendant l'année en cours
        $etudiantsNonInscrits = $this->getEtudiantsNonInscrits();

        // Afficher le formulaire d'inscription avec les étudiants non inscrits et les filières
        return view('inscriptions.create', [
            'etudiants' => $etudiantsNonInscrits,
            'filieres' => $filieres,
        ]);
    }

    /**
     * Gère l'inscription d'un ou plusieurs étudiants dans une filière.
     */
    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'etudiants' => 'required|array',
            'etudiants.*' => 'exists:etudiants,matricule',
            'filiere' => 'required|exists:filieres,codFil',
        ]);

        // Récupérer la filière sélectionnée
        $codeFil = $request->input('filiere');

        // Récupérer la liste des étudiants sélectionnés
        $etudiantMatricules = $request->input('etudiants');

        // L'année d'inscription (supposons que l'année actuelle est utilisée pour l'exemple)
        $anneeInscription = now()->year;

        // Parcourir chaque étudiant sélectionné et créer une inscription si elle n'existe pas déjà
        foreach ($etudiantMatricules as $matricule) {
            // Vérifier si l'étudiant est déjà inscrit dans la même filière et année
            $existingInscription = Inscription::where('matricule', $matricule)
                ->where('codFil', $codeFil)
                ->whereYear('dateIns', $anneeInscription)
                ->first();

            // S'il n'existe pas déjà d'inscription pour cet étudiant, filière et année, créer une nouvelle inscription
            if (!$existingInscription) {
                $inscription = new Inscription();
                $inscription->matricule = $matricule;
                $inscription->codFil = $codeFil;
                $inscription->dateIns = now(); // Date d'inscription actuelle
                $inscription->annee = now()->year; //
                $inscription->user_id = auth()->user()->id; // Utilisateur actuellement connecté
                $inscription->save();
            }
        }

        // Rediriger avec un message de succès
        return redirect()->route('inscriptions.create')->with('success', 'Inscriptions réussies!');
    }

    /**
     * Récupère les étudiants qui ne sont pas encore inscrits dans une filière pendant l'année en cours.
     */
    private function getEtudiantsNonInscrits()
    {
        $anneeInscription = now()->year;

        // Obtenir tous les étudiants
        $etudiants = Etudiant::all();

        // Filtrer les étudiants qui ne sont pas encore inscrits dans une filière pendant l'année en cours
        $etudiantsNonInscrits = $etudiants->filter(function ($etudiant) use ($anneeInscription) {
            $inscriptions = Inscription::where('matricule', $etudiant->matricule)
                ->whereYear('dateIns', $anneeInscription)
                ->count();

            // Si l'étudiant n'a aucune inscription pour l'année en cours, le conserver
            return $inscriptions === 0;
        });

        return $etudiantsNonInscrits;
    }
}
