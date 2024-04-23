<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initisAl-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Emplois du temps</title>
</head>

<body>
    @include('layouts.navbar')
    @if ($emploisActif)
    <table class="table table-bordered mt-4 py-3 table striped">
        <thead>
            <tr>
                <th scope="col">Jour</th>
                <th scope="col">Lundi</th>
                <th scope="col">Mardi</th>
                <th scope="col">Mercredi</th>
                <th scope="col">Jeudi</th>
                <th scope="col">Vendredi</th>
                <th scope="col">Samedi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">Matin</th>
                <td>{{ $emploisActif->lundi_matin }}</td>
                <td>{{ $emploisActif->mardi_matin }}</td>
                <td>{{ $emploisActif->mercredi_matin }}</td>
                <td>{{ $emploisActif->jeudi_matin }}</td>
                <td>{{ $emploisActif->vendredi_matin }}</td>
                <td>{{ $emploisActif->samedi_matin }}</td>
            </tr>
            <tr>
                <th scope="row">Après-midi</th>
                <td>{{ $emploisActif->lundi_aprem }}</td>
                <td>{{ $emploisActif->mardi_aprem }}</td>
                <td>{{ $emploisActif->mercredi_aprem }}</td>
                <td>{{ $emploisActif->jeudi_aprem }}</td>
                <td>{{ $emploisActif->vendredi_aprem }}</td>
                <td>{{ $emploisActif->samedi_aprem }}</td>
            </tr>
            <tr>
                <th scope="row">Soir</th>
                <td>{{ $emploisActif->lundi_soir }}</td>
                <td>{{ $emploisActif->mardi_soir }}</td>
                <td>{{ $emploisActif->mercredi_soir }}</td>
                <td>{{ $emploisActif->jeudi_soir }}</td>
                <td>{{ $emploisActif->vendredi_soir }}</td>
                <td>{{ $emploisActif->samedi_soir }}</td>
            </tr>
        </tbody>
    </table>
    <div class="container">
        <div class="boutons">
            <a href="{{ route('emplois.create', $filiere->codFil) }}"><button type="button"
                    class="btn btn-primary">Créer un nouvel emploi</button></a>
            <a href="{{ route('emplois.destroy', $emploisActif->numEmploi) }}"><button type="button"
                    class="btn btn-danger">Supprimer</button></a>
            <a href="{{ route('emplois.edit', $emploisActif->numEmploi) }}"><button type="button"
                    class="btn btn-warning">Modifier</button></a>
        </div>
    </div>

    @else
    {{-- <div class="container">
        <h1><a href="{{ route('emplois.create',$filiere->codFil) }}">Creer un emplois du temps</a></h1>
    </div> --}}
    @endif

    <style>
        .boutons {
            display: flex;
            justify-content: space-around;
        }
    </style>
</body>

</html>
