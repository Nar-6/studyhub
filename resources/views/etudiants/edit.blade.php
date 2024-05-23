@extends('layouts.base')

@section('link_css')
<link rel="stylesheet" href="resources/css/style.css">
<link rel="stylesheet" href="resources/css/app.css">
@endsection

@section('title', 'Modifier un Etudiant')
@include('layouts.navbar')
@section('container')

<div>
    @if (session('success'))
    <span style="" class="alert alert-success">
        {{ session('success') }}
    </span>
    @endif



    @section('form_action', route('etudiants.update', $etudiant->matricule))

    @section('titleform', 'Modifier un étudiant')
    @extends('layouts.form')
    @section('actionButton', 'Modifier un étudiant')

</div>

@endsection


@section('footer_content')

<div class="footer_link" style="display: flex; justify-content: space-around;">
    <a href="{{ route('etudiants.index') }}"
        style="width: 100%; text-decoration:none; text-transform:uppercase; color:#FF8700">Retourner à la liste
        d'étudiants</a>
    <img src="{{ asset('images/liste_etudiants/actif.png') }}" alt="liste des étudiants">
</div>

@endsection
