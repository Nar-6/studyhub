<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\Epreuve;
use App\Models\question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function index()
    {
        $questions = question::all();
        $epreuves = Epreuve::all()->pluck('nomEp', 'numEp');

        return view('professeur.questions.index', compact('questions','epreuves'));
    }

    public function create()
    {
        $epreuves = Epreuve::all()->pluck('nomEp', 'numEp');

        return view('professeur.questions.create', compact('epreuves'));
    }

    public function store(QuestionRequest $request)
    {
        Question::create($request->validated());

        return redirect()->route('question.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function show(Question $question)
    {
        return view('professeur.questions.show', compact('question'));
    }

    public function edit(Question $question)
    {
        $epreuves = Epreuve::all()->pluck('nomEp', 'numEp');

        return view('professeur.questions.edit', compact('question', 'epreuves'));
    }

    public function update(QuestionRequest $request, Question $question)
    {
        $question->update($request->validated());

        return redirect()->route('question.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Question $question)
    {
        $question->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }


}

