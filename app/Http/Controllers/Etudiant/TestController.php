<?php

namespace App\Http\Controllers\Etudiant;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestRequest;
use App\Models\Epreuve;
use App\Models\Option;
use App\Models\Question;
use App\Models\Result;
use Illuminate\Http\Request;
use App\Models\User;

class TestController extends Controller
{
    public function index()
    {

        $epreuves = Epreuve::with(['questions' => function ($query) {
                $query->inRandomOrder()
                    ->with(['options' => function ($query) {
                        $query->inRandomOrder();
                    }]);
            }])
            ->whereHas('questions')
            ->get();

        return view('etudiant.test', compact('epreuves'));
    }

    public function store(StoreTestRequest $request)
{
    $answers = $request->input('answers');

    $totalPoints = 0;
    $numEp = null; // Variable pour stocker le numéro d'épreuve

    foreach ($answers as $questionId => $optionId) {
        // Récupérer la question correspondante
        $question = Question::findOrFail($questionId);

        // Récupérer l'option choisie par l'utilisateur
        $option = Option::findOrFail($optionId);

        // Récupérer l'épreuve associée à la question
        $numEp = $question->epreuve_numEp;

        // Vérifier si l'option choisie est correcte en la comparant à la réponse de la question
        if ($option->is_correct && $option->question->reponse_text === $option->option_text) {
            $totalPoints += $question->points;
        }
    }

    // Récupérer le total des points normaux de l'épreuve
    $epreuve = Epreuve::findOrFail($numEp);
    $questions = $epreuve->questions()->get();
    $totalNormalPoints = $questions->sum('points');

    // Calculer le score sur 20
    $score = ($totalPoints / $totalNormalPoints) * 20;

    // Enregistrer le résultat dans la base de données
    $result = new Result();
    $result->numEp = $numEp; // Enregistrer le numéro d'épreuve
    $result->user_id = auth()->user()->id;
    $result->total_points = $score; // Enregistrer le score
    $result->save();

    // Vous pouvez enregistrer les réponses de l'utilisateur ici si nécessaire

    return redirect()->route('etudiant.results.show', $result->id);
 }

}

