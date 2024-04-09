<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Models\Epreuve;
use App\Models\Result;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    public function show($result_id)
    {
        $result = Result::whereHas('user', function ($query) {
            $query->whereId(Auth::id());
        })->findOrFail($result_id);

        $epreuve=$result->epreuve;
        // Calculer la note sur le total des points normaux
        if($epreuve){
            $questions=$epreuve->questions()->get();
            $totalPoints=0;
            foreach($questions as $question){
                $totalPoints += $question->points;
            }

            $score = ($result->total_points / $totalPoints) * 20; // Calculer le score sur 20

            return view('etudiant.results', compact('result', 'score'));

        }else{
            return redirect()->back()->with('error',"Vous n'aviez pas composé,pas de note");
        }

    }

    public function showResult()
    {

            $users = User::with('results.epreuve')->get();

            return view('etudiant.index', compact('users'));
    }

    public function showResult_prof()
    {
        $epreuves = Epreuve::with('results.user')->get();

        return view('professeur.results', compact('epreuves'));
    }
}


