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

        $score= $result->total_points ; // Calculer le score sur 20

            return view('etudiant.results', compact('result', 'score'));
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


