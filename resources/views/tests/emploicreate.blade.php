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
    <form method="POST" action="{{ route('emplois.store' , $filiere->codFil) }}" class="mt-3">
        @csrf
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Jours</th>
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
                    <td><input type="text" name="lundi_matin" placeholder=""></td>
                    <td><input type="text" name="mardi_matin" placeholder="Exemple : Mathematique"></td>
                    <td><input type="text" name="mercredi_matin" placeholder=""></td>
                    <td><input type="text" name="jeudi_matin" placeholder=""></td>
                    <td><input type="text" name="vendredi_matin" placeholder=""></td>
                    <td><input type="text" name="samedi_matin" placeholder=""></td>
                </tr>
                <tr>
                    <th scope="row">Après-midi</th>
                    <td><input type="text" name="lundi_aprem" placeholder=""></td>
                    <td><input type="text" name="mardi_aprem" placeholder=""></td>
                    <td><input type="text" name="mercredi_aprem" placeholder=""></td>
                    <td><input type="text" name="jeudi_aprem" placeholder=""></td>
                    <td><input type="text" name="vendredi_aprem" placeholder=""></td>
                    <td class="samedi-soir"></td>
                </tr>
                <tr>
                    <th scope="row">Soir</th>
                    <td><input type="text" name="lundi_soir" placeholder=""></td>
                    <td><input type="text" name="mardi_soir" placeholder=""></td>
                    <td><input type="text" name="mercredi_soir" placeholder=" "></td>
                    <td><input type="text" name="jeudi_soir" placeholder=""></td>
                    <td><input type="text" name="vendredi_soir" placeholder=" "></td>
                    <td class="samedi-soir"></td>
                </tr>
            </tbody>
        </table>
        <input type="hidden" name="codFil" value="{{$filiere->codFil}}">
        <button type="submit">Enregistrer</button>
    </form>

</body>
<style>
    .samedi-soir {
        background-color: black;
    }
    td {
       /* padding: 0 !important; */
    }
    input {
        width: 100%;
        height: 100% !important;
        border: 0px;
    }
</style>
</html>
