<?php

namespace App\Http\Controllers;

use App\Models\Composition;
use App\Models\Inscription;
use App\Models\result;
use Illuminate\Http\Request;

class CompositionController extends Controller
{
    public function fillComposition()
    {
        
        // Récupérer tous les résultats
        $results = result::all();

        foreach ($results as $result) {
            // Vérifier si le user_id dans result correspond à un enregistrement dans la table inscriptions
            $inscription = Inscription::where('user_id', $result->user_id)->first();

            if ($inscription) {
                // Si une inscription correspondante est trouvée, créer une composition
                $composition = new Composition();
                $composition->numIns = $inscription->numIns;
                $composition->numEp = $result->numEp;
                $composition->note = $result->total_points;
                $composition->save();
            }
        }
    }
}
