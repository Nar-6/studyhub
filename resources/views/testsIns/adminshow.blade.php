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
       <h1>Ceci est un compte admin</h1>
       <div class="boutons">
            {{-- <div>
                <button id="dropdownButton" class="btn btn-primary">Créer un compte Etudiant</button>
                <div id="dropdownList" class="shadow" style="display: none;">
                    <a href="#"><option>Nouvel etudiant</option></a>
                    <a href="#"><option>Etudiant existant</option></a>
                </div>
            </div> --}}
            <a href="{{ route('etudiant.create')}}"><button type="button" class="btn btn-primary">Créer un compte Etudiant</button></a>
            <a href="{{ route('parent.create')}}"><button type="button" class="btn btn-danger">Créer un compte Parent</button></a>
            <a href="#"><button type="button" class="btn btn-warning">Créer un compte Professeur</button></a>
        </div>
    </div>
</body>
<style>
    .boutons{
        margin-top: 30px;
        display: flex;
        justify-content: space-around;
    }
    #dropdownList {
        margin: 5px;
        background: white;
        border-radius: 4px;
    }
    option:hover{
        cursor: pointer;
        background: rgb(206, 206, 206);
        border-radius: 4px;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#dropdownButton').click(function(){
            $('#dropdownList').toggle();
        });
    });
</script>
</html> 