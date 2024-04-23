@extends('layouts.base')

@section('container')
@include('layouts.navbar')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Détails de l'étudiant
                </div>
                <div class="card-body">
                    <p><strong>Matricule:</strong> {{ $etudiant->matricule }}</p>
                    <p><strong>Nom:</strong> {{ $etudiant->nom }}</p>
                    <p><strong>Prénom:</strong> {{ $etudiant->prenom }}</p>
                    <p><strong>Sexe:</strong> {{ $etudiant->sexe === 'M' ? 'Masculin' : 'Féminin' }}</p>
                    <p><strong>Filière:</strong> {{ $etudiant->numero }}</p>
                    {{-- <p><strong>Parent:</strong> {{ $etudiant->parent->Nom }}</p> --}}
                </div>
                <div class="card-footer">
                    <a href="javascript:history.back()" class="btn btn-secondary">Retour</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
