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
    <div class="container">
        <h1>Liste des Etudiants</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Mat</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Sexe</th>
                </tr>
            </thead>
            <tbody>
                @foreach($etudiants as $etudiant)
                <a href="#">
                    <tr>
                        <td>{{ $etudiant->matricule }}</td>
                        <td>{{ $etudiant->nom }}</td>
                        <td>{{ $etudiant->prenom }}</td>
                        <td>{{ $etudiant->sexe }}</td>
                    </tr>
                </a>
                @endforeach
            </tbody>
        </table>    
    </div>    
</body>
</html> 