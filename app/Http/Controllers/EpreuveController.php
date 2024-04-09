<?php

namespace App\Http\Controllers;

use App\Http\Requests\EpreuveRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Epreuve;
use App\Models\Filiere;
use App\Models\Matiere;
use App\Models\Professeur;
use Illuminate\Http\Request;

class EpreuveController extends Controller
{
    public function index()
    {
        $epreuves = Epreuve::all();

        return view('professeur.epreuves.index', compact('epreuves',));
    }

    public function create()
    {


        $prof=Professeur::all();
        $filiere=Filiere::all();
        $matiere=Matiere::all();
        return view('professeur.epreuves.create', compact('filiere','prof','matiere',));
    }

    public function store( EpreuveRequest $request)
    {
        Epreuve::create($request->validated());

        return redirect()->route('epreuve.index')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function show(Epreuve $epreuve)
    {
        return view('professeur.epreuves.index', compact('Epreuve'));
    }

    public function edit(Epreuve $epreuve)
    {


        $prof=Professeur::all();
        $filiere=Filiere::all();
        $matiere=Matiere::all();
        return view('professeur.epreuves.edit', compact('epreuve','prof','matiere','filiere'));
    }

    public function update(EpreuveRequest $request, Epreuve $epreuve)
    {
        $epreuve->update($request->validated());

        return redirect()->route('epreuve.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Epreuve $epreuve)
    {
        $epreuve->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }


}
