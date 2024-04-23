<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Emploie modifier</title>
</head>
<body>
    @include('layouts.navbar')
    <form method="POST" action="{{ route('emplois.update', $emploiDuTemps->numEmploi) }}"class="mt-3">
        @csrf
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Période</th>
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
                    <td><input type="text" name="lundi_matin" value="{{ $emploiDuTemps->lundi_matin }}"></td>
                    <td><input type="text" name="mardi_matin" value="{{ $emploiDuTemps->mardi_matin }}"></td>
                    <td><input type="text" name="mercredi_matin" value="{{ $emploiDuTemps->mercredi_matin }}"></td>
                    <td><input type="text" name="jeudi_matin" value="{{ $emploiDuTemps->jeudi_matin }}"></td>
                    <td><input type="text" name="vendredi_matin" value="{{ $emploiDuTemps->vendredi_matin }}"></td>
                    <td><input type="text" name="samedi_matin" value="{{ $emploiDuTemps->samedi_matin }}"></td>
                </tr>
                <tr>
                    <th scope="row">Après-midi</th>
                    <td><input type="text" name="lundi_aprem" value="{{ $emploiDuTemps->lundi_aprem }}"></td>
                    <td><input type="text" name="mardi_aprem" value="{{ $emploiDuTemps->mardi_aprem }}"></td>
                    <td><input type="text" name="mercredi_aprem" value="{{ $emploiDuTemps->mercredi_aprem }}"></td>
                    <td><input type="text" name="jeudi_aprem" value="{{ $emploiDuTemps->jeudi_aprem }}"></td>
                    <td><input type="text" name="vendredi_aprem" value="{{ $emploiDuTemps->vendredi_aprem }}"></td>
                    <td class="samedi-soir"></td>
                </tr>
                <tr>
                    <th scope="row">Soir</th>
                    <td><input type="text" name="lundi_soir" value="{{ $emploiDuTemps->lundi_soir }}"></td>
                    <td><input type="text" name="mardi_soir" value="{{ $emploiDuTemps->mardi_soir }}"></td>
                    <td><input type="text" name="mercredi_soir" value="{{ $emploiDuTemps->mercredi_soir }}"></td>
                    <td><input type="text" name="jeudi_soir" value="{{ $emploiDuTemps->jeudi_soir }}"></td>
                    <td><input type="text" name="vendredi_soir" value="{{ $emploiDuTemps->vendredi_soir }}"></td>
                    <td class="samedi-soir"></td>
                </tr>
            </tbody>
        </table>
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
