<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
    @include('layouts.navbar')
    <div class="container mt-4" >
        <h1>Liste des filières</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Emploi du temps</th>
                </tr>
            </thead>
            <tbody>
                @foreach($filieres as $filiere)
                <tr>
                    <td>{{ $filiere->codFil }}</td>
                    <td>{{ $filiere->libFil }}</td>
                    <td><a href="{{ route('emplois.show', $filiere->codFil) }}">Emplois du temps</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="boutons">
            <a href="{{ route('filiere.create') }}"><button type="button" class="btn btn-primary">Créer une filiere</button></a>
            {{-- <a href="{{ route('emplois.destroy') }}"><button type="button" class="btn btn-danger">Supprimer</button></a>
            <a href="{{ route('emplois.edit') }}"><button type="button" class="btn btn-warning">Modifier</button></a> --}}
        </div>
    </div>


</body>
</html>
