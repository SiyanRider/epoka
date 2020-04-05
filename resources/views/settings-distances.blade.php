<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/styles.css" rel="stylesheet" />
    <link href="/style.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <title>Paramètrage distance</title>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="/">EPOKA</a>
            <div class="menu">
                                @if ($_SESSION['view_missions'] == '1')
                                <a href="/missions"><img src="/check.png" width="32" /> Validation des missions</a>
                                @endif
                                @if ($_SESSION['view_paiements'] == '1')
                                <a href="/paiement-frais" ><img src="/money.png" width="32" /> Paiement des frais</a>
                                <a href="/settings" class="active"><img src="/settings.png" width="32"/> Paramétrage</a>
                                @endif
                                <span class="logout">Connecté en tant que {{ $_SESSION['nom'] }} <a href="/disconnect"> <img src="/logout.png" width="32"/>  Déconnexion</a></span>
</div>
        </nav>

        <div class="card-body">
        <br/><br/><br/>
Paramètrage distance entre deux villes :

<form method="post" action="/settings/distances/set-distance">
@csrf
Distance entre
<select name="ville1">
    @foreach ($agences as $agences)
        <option value="{{$agences -> ville_id }}">{{$agences -> ag_nom}}</option>
    @endforeach
</select>
et
<select name="ville2">
    @foreach ($villes as $villes)
        <option value="{{$villes -> ville_id }}">{{ $villes -> ville_nom_reel}}</option>
    @endforeach
</select>
<input type="number" maxlenght="4" name="km">
km
<input type="submit" value="Valider">
</form>
<br><br>
Distances déjà saisies : 
<br><br>
<div class="table-responsive">
                <div class="row">
                    <div class="col-sm-12">
            <table class="table table-bordered dataTable" id="dataTable" role="grid" style="width=90%;float=right" width="90%" cellspacing="0">
            <thead>
            <tr role="row">
                <th class="sorting" aria-controls="dataTable" rowspan="1" colspan="1">De</th>
                <th class="sorting" aria-controls="dataTable" rowspan="1" colspan="1"> A</th>
                <th class="sorting" aria-controls="dataTable" rowspan="1" colspan="1"> Distance en kilomètres</th>
            </tr>
            </thead>
            <tbody>
            @if (isset($distances))
                @foreach ($distances as $distance)
                    <tr class="odd" role="row">
                    <td class="sorting_1">{{ $distance -> ville1 }}</td>
                    <td>{{ $distance -> ville2 }}</td>
                    <td> {{ $distance -> dist_km }}</td>
                    </td></tr>
                @endforeach
            @endif
<!--Works : https://stackoverflow.com/questions/30555747/laravel-5-passing-database-query-from-controller-to-view -->
            </table>
</div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="/assets/demo/datatables-demo.js"></script>
</body>
</html>