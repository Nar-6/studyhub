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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create User</div>
    
                    <div class="card-body">
                        @if ( $role == 'etudiant')
                            @include('testsIns/form/etudiant')
                        @elseif ($role == 'parent')
                            @include('testsIns/form/parent')
                        @elseif ($role == 'professeur')
                            @include('testsIns/form/etudiant')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($role == 'parent')
    <!-- Inclure jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Votre script JavaScript -->
    <script>
        // Données de recherche fictives (simulez les données de votre base de données)
        const enfants = {!! json_encode($enfants) !!};
        enfants.forEach(enfant => {
            enfant.name = enfant.nom + ' ' + enfant.prenom;
        });
        // Fonction pour filtrer les suggestions en fonction de la recherche
        function filtrerSuggestions(recherche) {
            return enfants.filter(enfant => enfant.name.toLowerCase().includes(recherche.toLowerCase()));
        }

        // Fonction pour afficher les suggestions de recherche
        function afficherSuggestions(suggestions) {
            let suggestionsHTML ;
            suggestions.forEach(suggestion => {
                suggestionsHTML += `<option value="${suggestion.matricule}">${suggestion.nom} ${suggestion.prenom}</option>`;
            });
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
    </script>
    @endif

</body>

</html>

