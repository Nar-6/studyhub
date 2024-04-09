@extends('layouts.etudiant')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Resultat du test</div>

                <div class="card-body">
                    <p class="mt-3">Étudiant: {{ Auth::user()->name }}</p>
                    <p>Épreuve: {{ $result->epreuve->nomEp }}</p>
                    <p>Note obtenue: {{ $score }}/20</p>
                    <p>Total points: {{ $result->total_points }} points</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
