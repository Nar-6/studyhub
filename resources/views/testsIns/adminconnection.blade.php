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
        <form action="{{route("role.identifier")}}" method="POST">
            @csrf
            <div class="form-group">                
                <label for="identifiant">Votre identifiant :</label>
                <input type="text" class="form-control" id="identifiant" name="identifiant" placeholder="Entrez votre identifiant" required>
            </div>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>    
    </div>
</body>
</html> 