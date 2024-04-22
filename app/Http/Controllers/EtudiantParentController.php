<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant_Parent;

class EtudiantParentController extends Controller
{
    // Afficher tous les étudiants-parents
    public function index()
    {
        $etudiantsParents = Etudiant_Parent::all();
        return response()->json($etudiantsParents);
    }

    // Afficher un étudiant-parent spécifique
    public function show($id)
    {
        $Etudiant_Parent = Etudiant_Parent::find($id);
        if (!$Etudiant_Parent) {
            return response()->json(['message' => 'Étudiant-parent non trouvé'], 404);
        }
        return response()->json($Etudiant_Parent);
    }

    // Créer un nouvel étudiant-parent
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'user_id' => 'required|integer',
            // Ajoutez ici d'autres validations pour les champs nécessaires
        ]);

        $Etudiant_Parent = Etudiant_Parent::create($request->all());
        return response()->json($Etudiant_Parent, 201);
    }

    // Mettre à jour un étudiant-parent
    public function update(Request $request, $id)
    {
        $Etudiant_Parent = Etudiant_Parent::find($id);
        if (!$Etudiant_Parent) {
            return response()->json(['message' => 'Étudiant-parent non trouvé'], 404);
        }

        $Etudiant_Parent->update($request->all());
        return response()->json($Etudiant_Parent, 200);
    }

    // Supprimer un étudiant-parent
    public function destroy($id)
    {
        $Etudiant_Parent = Etudiant_Parent::find($id);
        if (!$Etudiant_Parent) {
            return response()->json(['message' => 'Étudiant-parent non trouvé'], 404);
        }

        $Etudiant_Parent->delete();
        return response()->json(['message' => 'Étudiant-parent supprimé avec succès']);
    }

    public function getEnfants($parentId)
    {
        // Trouver le parent par son ID
        $parent = Etudiant_Parent::find($parentId);

        // Vérifier si le parent existe
        if (!$parent) {
            return response()->json(['message' => 'Parent non trouvé'], 404);
        }

        // Récupérer les enfants du parent
        $enfants = $parent->enfants;

        return response()->json($enfants);
    }
}
