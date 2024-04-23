@extends('layouts.base')


@section('title', 'Ajouter un Etudiant')
@include('layouts.navbar')
@section('container')


<div>
    @extends('layouts.form')
    @if (session('success'))
    <span style="" class="alert alert-success">
        {{ session('success') }}
    </span>
    @endif



    @section('form_action', route('etudiants.store'))

    @section('titleform', 'Ajouter un étudiant')

    @section('actionButton', 'Ajouter un étudiant')


</div>

@endsection


@section('footer_content')

<div class="footer_link" style="display: flex; justify-content: space-around;">
    <a href="{{route('etudiants.index')}}"
        style="width: 100% ;text-decoration:none;text-transform:uppercase;color:#FF8700">Retourner a la liste
        d'etudiants
        <img src="{{ asset('images/liste_etudiants/actif.png') }}" alt="liste des etudiants">
</div>



@endsection


