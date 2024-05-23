<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <input type="text" id="searchInput" placeholder="Rechercher un enfant...">
    <div id="searchSuggestions"></div>
    <div id="test">

    </div>
    <style>
        #test{
            height: 40px;
            background: blue;
            width: 40px;
        }
        #enfants {
            position: absolute;
        }
    </style>
    {{-- <div class="form-group row">
        <label for="enfants" class="col-md-4 col-form-label text-md-right">Enfants</label>
    
        <div class="col-md-6">
            <select id="enfants" type="text" class="form-control @error('enfants') is-invalid @enderror" name="enfants[]" multiple required autocomplete="enfants" autofocus>
                @foreach ($enfants as $enfant)
                    <option value="{{ $enfant->matricule}}">{{ $enfant->nom}} {{ $enfant->prenom}}</option>
                @endforeach
            </select>
            @error('enfants')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>     --}}
    <!-- Inclure jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Votre script JavaScript -->
    <script>
        // Données de recherche fictives (simulez les données de votre base de données)
        const enfants = {!! json_encode($etudiants) !!};
        enfants.forEach(enfant => {
            enfant.name = enfant.nom + ' ' + enfant.prenom;
        });
        // Fonction pour filtrer les suggestions en fonction de la recherche
        function filtrerSuggestions(recherche) {
            return enfants.filter(enfant => enfant.name.toLowerCase().includes(recherche.toLowerCase()));
        }

        // Fonction pour afficher les suggestions de recherche
        function afficherSuggestions(suggestions) {
            let suggestionsHTML = '<select id="enfants" type="text" class="form-control @error('enfants') is-invalid @enderror" name="enfants[]" multiple required autocomplete="enfants" autofocus>';
            suggestions.forEach(suggestion => {
                suggestionsHTML += `<option value="${suggestion.matricule}">${suggestion.nom} ${suggestion.prenom}</option>`;
            });
            suggestionsHTML += '</select>';
            $('#searchSuggestions').html(suggestionsHTML);
        }

        // Écouter l'événement de saisie dans l'input de recherche
        $('#searchInput').on('input', function() {
            const recherche = $(this).val().trim();
            if (recherche !== '') {
                const suggestions = filtrerSuggestions(recherche);
                if (suggestions.length > 0) {
                    afficherSuggestions(suggestions);
                } else {
                    $('#searchSuggestions').empty();
                }
            } else {
                $('#searchSuggestions').empty();
            }
        });


        // Écouter l'événement de clic sur une suggestion de recherche
        $('#searchSuggestions').on('click', 'div', function() {
            const suggestion = $(this).text();
            $('#searchInput').val(suggestion);
            $('#searchSuggestions').empty();
            // Faire quelque chose avec la suggestion sélectionnée, comme effectuer une recherche
        });

        // Tableau pour stocker les valeurs sélectionnées
        let valeursSelectionnees = [];

        // Écouter l'événement de clic sur les options de la liste déroulante
        document.getElementById('searchSuggestions').addEventListener('click', function(event) {
            // Vérifier si l'élément cliqué est une option de la liste déroulante
            if (event.target.tagName === 'OPTION') {
                // Récupérer la valeur de l'option cliquée
                let valeurOption = event.target.value;
                
                // Ajouter la valeur de l'option au tableau des valeurs sélectionnées
                valeursSelectionnees.push(valeurOption);

                // Mettre à jour le champ de formulaire caché avec les valeurs sélectionnées
                document.getElementById('valeursSelectionneesInput').value = JSON.stringify(valeursSelectionnees);
                
                // Afficher les valeurs sélectionnées dans la console (à des fins de débogage)
                console.log('Valeurs sélectionnées :', valeursSelectionnees);
            }
        });

    </script>
</body>
</html>
