@extends('layouts.base')
@include('layouts.navbar')
@section('container')
<div class="container mt-4" style="width: 50%">
    <div class="card">
        <div class="card-header">
            <h3>Inscrire des étudiants</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('inscriptions.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="etudiants" class="form-label">Étudiants</label>

                    <select name="etudiants[]" id="etudiants" class="form-select" multiple>
                        @foreach($etudiants as $etudiant)
                            <option value="{{ $etudiant->matricule }}">{{ $etudiant->nom }} {{ $etudiant->prenom }}</option>
                        @endforeach
                    </select>
                    <div class="form-text">Sélectionnez un ou plusieurs étudiants à inscrire.</div>
                </div>
                <div class="mb-3">
                    <label for="filiere" class="form-label">Filière</label>
                    <select name="filiere" id="filiere" class="form-select">
                        @foreach($filieres as $filiere)
                            <option value="{{ $filiere->codFil }}">{{ $filiere->libFil }}</option>
                        @endforeach
                    </select>
                    <div class="form-text">Sélectionnez la filière dans laquelle inscrire les étudiants.</div>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn" style="background-color: rgb(232, 127, 79)">Inscrire</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
