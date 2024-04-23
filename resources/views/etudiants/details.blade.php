@extends('layouts.base')
@include('layouts.navbar')
@section('container')
<div class="container mt-4">

    <h1 class="mb-4">Détails de l'étudiant : <strong>{{ $inscription->etudiant->nom ?? 'Néant' }} {{
            $inscription->etudiant->prenom ?? 'Néant' }}</strong></h1>

    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title mb-3">Parents :</h2>
            <p class="card-text">{{ $inscription->etudiant->parent->nom ?? 'Néant' }}</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title mb-3">Grille de notes :</h3>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Matière</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inscription->compositions ?? [] as $composition)
                        <tr>
                            <td>{{ $composition->epreuve->matiere->libMat ?? 'Néant' }}</td>
                            <td>{{ $composition->note ?? 'Néant' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title mb-3">Filière :</h2>
            <p class="card-text">{{ $inscription->filiere->libFil ?? 'Néant' }}</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title mb-3">Emploi du temps :</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Créneau horaire</th>
                            @foreach($jours as $jour)
                            <th>{{ ucfirst($jour) }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td>Matin (8h - 12h)</td>
                            @foreach($jours as $jour)
                            <td>{{ $inscription->filiere->emploieDuTemps->first()->{$jour . '_matin'} ?? 'Néant' }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Après-midi (13h - 17h)</td>
                            @foreach($jours as $jour)
                            <td>{{ $inscription->filiere->emploieDuTemps->first()->{$jour . '_aprem'} ?? 'Néant' }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Soir (18h - 21h)</td>
                            @foreach($jours as $jour)
                            <td>{{ $inscription->filiere->emploieDuTemps->first()->{$jour . '_soir'} ?? 'Néant' }}</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
            <p class="mt-2 text-muted">NB : Cet emploi du temps est susceptible de connaître des modifications.</p>
        </div>
    </div>

</div>
@endsection
