<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Creer Emplois</title>
</head>
<body>
    @include('layouts.navbar')
    @if(session('info'))
        <div class="alert alert-info">
            {{ session('info') }}
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="content" class="mt-3">
        <form action="{{route("filiere.store")}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="codFil">code de la filière :</label>
                <input type="text" class="form-control" id="codFil" name="codFil" placeholder="Entrez le code de la filière" required>
            </div>
            <div class="form-group">
                <label for="libFil">Libellé de la filière :</label>
                <input type="text" class="form-control" id="libFil" name="libFil" placeholder="Entrez le libellé de la filière" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter Filière</button>
        </form>
    </div>
</body>
</html>
