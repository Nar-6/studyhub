<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Etudiant_Parent;
use App\Models\Inscription;
use App\Models\Professeur;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function identifier(Request $request) {
        $request->validate([
            'identifiant' => 'string|required',
        ]);

        if ($request->all()['identifiant'] == 'admin') {
            return redirect()->route('admin.connection');
        }
    }

    public function connection() {
        return view('testsIns/adminconnection');
    }

    public function adminIdentifier(Request $request) {
        $request->validate([
            'identifiant'=> 'string|required',
            'passwd'=> 'string|required',
        ]);
        $users = User::all();
        foreach ($users as $user) {
            if ($user->email == $request->get('identifiant')) {
                if ($user->password == $request->get('passwd')) {
                    if ($user->role == 'admin') {
                        return view('testsIns/adminshow');
                    } else {
                        return redirect()->route('admin.connection')->with('error', 'Identifiant incorrect');
                    }  
                }else {
                    return redirect()->route('admin.connection')->with('error', 'Identifiant incorrect');
                } 
            }else {
                return redirect()->route('admin.connection')->with('error', 'Identifiant incorrect');
            } 
        }
    }

    public function store(Request $request) {

        if ($request->get('role') == 'etudiant') {
            // Validation des données du formulaire
            $request->validate([
                'nom' => 'required|string|max:255',
                'prenom' => 'required|string|max:255',
                'sexe' => 'required|in:Masculin,Feminin',
                'filiere' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
            ]);
            
            //compte user
            $user = new User();
            $user->name = $request->get('prenom') . ' ' .  $request->get('nom');
            $user->email = $request->get('email');
            $user->role = $request->get('role');
            $user->password = 'achanger';
            $user->save();

            //etudiant
            $etudiant = new Etudiant();
            $etudiant->nom = $request->get('nom');
            $etudiant->prenom = $request->get('prenom');
            $etudiant->sexe = $request->get('sexe');
            $etudiant->save();

            //inscription
            $inscription = new Inscription();
            $inscription->dateIns = Carbon::now();
            $inscription->annee = Carbon::now()->year;
            $inscription->codFil = $request->get('filiere');
            $inscription->matricule = $etudiant->matricule;
            $inscription->user_id = $user->id;
            $inscription->save();

            return redirect()->route('etudiants.index')->with('success', 'Étudiant créé avec succès.');

        } else if ($request->get('role') == 'parent') {
            dd($request->all());
            $request->validate([
                'nom' => 'required|string|max:255',
                'enfants[]' => 'required',
                'email' => 'required|string|email|max:255|unique:users',
            ]);

            $user = new User();
            $user->name =  $request->get('nom');
            $user->email = $request->get('email');
            $user->role = $request->get('role');
            $user->password = 'achanger';
            $user->save();

            $parent = new Etudiant_Parent();
            $parent->nom = $request->get('nom');
            $parent->user_id = $user->id;
            $parent->save();

            return redirect()->route('etudiants.index')->with('success', 'Parent créé avec succès.');

        } else if ($request->get('role') == 'professeur') {

            $user = new User();
            $user->name =  $request->get('nom');
            $user->email = $request->get('email');
            $user->role = $request->get('role');
            $user->password = 'achanger';
            $user->save();

            $prof = new Professeur();
            $prof->nomProf = $request->get('nom');
            $prof->user_id = $user->id;
            $prof->save();

            return redirect()->route('etudiants.index')->with('success', 'Parent créé avec succès.');

        }
        
        return redirect()->route('etudiants.index')->with('error', 'Y a un truc qui cloche.');

    }
}    
