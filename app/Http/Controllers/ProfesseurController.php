<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfesseurRequest;
use App\Models\Professeur;
use App\Models\User;
use Illuminate\Http\Request;

class ProfesseurController extends Controller
{
 public function index()
    {
        $professeurs = Professeur::all();

        return view('professeur.creation_des_prof.index', compact('professeurs'));
    }

    public function create()
    {
        $users=User::all();
        return view('professeur.creation_des_prof.create',compact('users'));
    }

    public function store( ProfesseurRequest $request)
    {
        Professeur::create($request->validated());

        return redirect()->route('')->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function show(Professeur $Professeur)
    {
        return view('professeur.creation_des_prof.index', compact('Professeur'));
    }

    public function edit(Professeur $Professeur)
    {
        $users=User::all();

        return view('professeur.creation_des_prof.edit', compact('Professeur','users'));
    }

    public function update(ProfesseurRequest $request, Professeur $Professeur)
    {
        $Professeur->update($request->validated());

        return redirect()->route('')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Professeur $Professeur)
    {
        $Professeur->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }


}
