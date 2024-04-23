@extends('layouts.base')

@section('link_css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('title', 'Liste Etudiants')

@section('container')
@include('layouts.navbar')
<div class="container">
    <div class="d-flex justify-content-between align-items-center my-3">
        <h1 class="mb-0">Liste des étudiants</h1>
        <a href="{{ route('etudiants.create') }}" class="btn text-white" style="background-color: rgb(232, 127, 79);">
            Ajouter un étudiant
        </a>
    </div>
    <hr>
    {{--
    barre de recherche
    --}}
    <form action="{{ route('etudiants.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Rechercher un étudiant..."
                aria-label="Rechercher un étudiant..." value="{{ request()->query('query') }}">
            <button class="btn btn-outline-secondary" type="submit">Rechercher</button>
        </div>
    </form>
    <div class="col s12">
        <table class="table table-hover table-striped table-responsive table-bordered">
            <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Sexe</th>
                    <th>Numéro</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($etudiants->count()>0)
                @foreach ($etudiants as $etudiant)
                <tr>
                    <td class="align-middle">{{ $etudiant->matricule }}</td>
                    <td class="align-middle">{{ $etudiant->nom }}</td>
                    <td class="align-middle">{{ $etudiant->prenom }}</td>
                    <td class="align-middle">{{ $etudiant->sexe }}</td>
                    <td class="align-middle">{{ $etudiant->numero }}</td>
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('etudiants.show', $etudiant->matricule) }}" class="btn">
                                <i class="bi bi-eye-fill" style="color:dimgrey"></i> <!-- Icône pour le détail -->
                            </a>
                            <a href="{{ route('etudiants.edit', $etudiant->matricule) }}" class="btn">
                                <i class="bi bi-pencil-square " style="color: #d79a00b9;"></i> <!-- Icône pour modifier -->
                            </a>
                            <form action="{{ route('etudiants.destroy', $etudiant->matricule) }}" method="POST"
                                class="btn p-0" onsubmit="return confirm('Supprimer?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn">
                                    <i class="bi bi-trash" style="color: red;"></i> <!-- Icône pour supprimer -->
                                </button>
                            </form>
                        </div>


                        <!-- Vérifier si l'étudiant est déjà inscrit dans une filière cette année -->
                        @php
                        $inscriptionExistante = App\Models\Inscription::where('matricule', $etudiant->matricule)
                        ->whereYear('dateIns', now()->year)
                        ->exists();
                        @endphp

                        <!-- Afficher l'icône de coche verte si l'étudiant est déjà inscrit -->
                        @if($inscriptionExistante)
                        <a href="{{ route('etudiants.details', $etudiant->matricule) }}">
                            <i class="bi bi-person-fill-check" style="color: green;"></i>
                        </a>
                        @endif
                    </td>
                </tr>
                @endforeach

                @else
                <tr>
                    <td class="text-center" colspan="5">Aucun étudiant trouvé</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('footer_content')

<div class="footer_link" style="display: flex; justify-content: space-around;">
    <a href="#">
        <img src="{{ asset('images/liste_etudiants/actif.png') }}" alt="Liste des étudiants">
    </a>
    <a href="#">
        <img src="{{ asset('images/cours/actif.png') }}" alt="Cours">
    </a>
    <a href="{{route('filiere')}}">
        <img src="{{ asset('images/emploi_du_temps/actif.png') }}" alt="Emploi du temps">
    </a>
    {{-- <a href="#">
        <img src="{{ asset('images/notes/actif.png') }}" alt="Notes">
    </a> --}}
    <a href="{{ route('inscriptions.create') }}">
        <img src="{{ asset('images/contacter/actif.png') }}" alt="Contacter">
    </a>
</div>

@endsection
