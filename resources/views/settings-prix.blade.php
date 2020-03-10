<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement frais | Epoka</title>
</head>
<body>
<div class="bandeau"><a href="/missions">Validation des missions</a><a href="paiement-frais">Paiement des frais</a> Paramétrage <a href="/disconnect">Déconnexion</a></div>
Montant du remboursement au kilomètre :
<form method="POST" action="/settings/prix/modify">
@csrf
Remboursement au km : <input type="text" maxlenght="5" name="km" value="@foreach ($requette as $km){{ $km ->prix_km}} @endforeach" />
Indemnité d'hébergement : <input type="text" name="heberg" value="@foreach ($requette as $heberg){{ $heberg ->prix_heberg}} @endforeach"/>
<input type="submit" value="Modifier">
</body>
</html>