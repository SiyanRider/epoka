<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement frais | Epoka</title>
</head>
<body>
<div class="bandeau"><a href="/missions">Validation des missions</a><a href="paiement-frais">Paiement des frais</a> Paramétrage <a href="/disconnect">Déconnexion</a></div>
    <fieldset>
        <legend>Validation des missions de vos subordonés :</legend>
            <table>
            <tr><td>Nom du salarié</td><td>Prénom du salarié</td><td>Début de la mission</td><td>Fin de la mission</td><td>Lieu de la mission</td><td>Montant</td><td>Etat du paiement</td></tr>
            @if (isset($liste_missions))
                @foreach ($liste_missions as $missions)
                    <tr>
                    <td>{{ $missions -> user_nom }}</td><td>{{ $missions -> user_prenom }}</td><td> {{ $missions -> miss_debut }}</td><td> {{ $missions -> miss_fin }}</td><td>{{ $missions -> ville_nom_reel }}</td> <td>/</td><td><span class="button"><a href='/paiement-frais/rembourser/{{ $missions -> miss_id }}'>Valider</a></span></td>
                    </tr>
                @endforeach
            @endif
<!--Works : https://stackoverflow.com/questions/30555747/laravel-5-passing-database-query-from-controller-to-view -->
            </table>
    </fieldset>
</body>
</html>