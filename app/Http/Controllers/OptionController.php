<?php

namespace App\Http\Controllers;

use App\Http\Requests\OptionRequest;
use App\Models\option;
use App\Models\question;
use Illuminate\Http\Request;

class optionController extends Controller
{
    public function index()
    {
        $options =option::all();

        return view('professeur.options.index', compact('options'));
    }

    public function create()
    {
        $questions = question::all()->pluck('question_text', 'id');

        return view('professeur.options.create', compact('questions'));
    }

    public function store(OptionRequest $request)
    {
       option::create($request->validated());

        return redirect()->route('option.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function show(option $option)
    {
        return view('professeur.options.show', compact('option'));
    }

    public function edit(option $option)
    {
        $questions = Question::all()->pluck('question_text', 'id');

        return view('professeur.options.edit', compact('option', 'questions'));
    }

    public function update(OptionRequest $request,option $option)
    {
        $option->update($request->validated());

        return redirect()->route('option.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(option $option)
    {
        $option->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

}
