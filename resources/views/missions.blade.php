<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <title>Validations des missions | Epoka</title>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="/">EPOKA</a>
            <div class="menu">
                                @if ($_SESSION['view_missions'] == '1')
                                <a href="/missions" class="active"><img src="check.png" width="32" /> Validation des missions</a>
                                @endif
                                @if ($_SESSION['view_paiements'] == '1')
                                <a href="/paiement-frais" ><img src="money.png" width="32" /> Paiement des frais</a>
                                <a href="/settings"><img src="settings.png" width="32"/> Paramétrage</a>
                                @endif
                                <span class="logout">Connecté en tant que {{ $_SESSION['nom'] }} <a href="/disconnect"> <img src="logout.png" width="32"/>  Déconnexion</a></span>
</div>
        </nav>
               
        <div class="card-body">
        <br/><br/><br/>
        <center>Validation des missions de vos subordonés :</center>
            <div class="table-responsive">
                <div class="row">
                    <div class="col-sm-12">
            <table class="table table-bordered dataTable" id="dataTable" role="grid" style="width=90%;float=right" width="90%" cellspacing="0">
            <thead>
            <tr role="row">
                <th class="sorting" aria-controls="dataTable" rowspan="1" colspan="1">Nom du salarié</th>
                <th class="sorting" aria-controls="dataTable" rowspan="1" colspan="1"> Prénom du salarié</th>
                <th class="sorting" aria-controls="dataTable" rowspan="1" colspan="1"> Début de la mission</th>
                <th class="sorting" aria-controls="dataTable" rowspan="1" colspan="1"> Fin de la mission</th>
                <th class="sorting" aria-controls="dataTable" rowspan="1" colspan="1"> Lieu de la mission</th>
                <th class="sorting" aria-controls="dataTable" rowspan="1" colspan="1"> Etat de la validation</th>
            </tr>
            </thead>
            <tbody>
            @if (isset($liste_missions))
                @foreach ($liste_missions as $missions)
                    <tr class="odd" role="row">
                    <td class="sorting_1">{{ $missions -> user_nom }}</td>
                    <td>{{ $missions -> user_prenom }}</td>
                    <td> {{ $missions -> miss_debut }}</td>
                    <td> {{ $missions -> miss_fin }}</td>
                    <td>{{ $missions -> ville_nom_reel }}</td>
                    <td>
                    @if( $missions -> isValidate == 0)
                    <span class="button"><a href='/missions/valider/{{ $missions -> miss_id }}' class="button-link">Valider</a></span>
                    @else
                    @if ($missions -> isRembour==0)
                    Validée mais non remboursée
                    @else
                    Validée et remboursée
                    @endif
                    @endif
                    </td></tr>
                @endforeach
            @endif
<!--Works : https://stackoverflow.com/questions/30555747/laravel-5-passing-database-query-from-controller-to-view -->
            </table>
</div>
</div>
</div>
</div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>

</body>
</html>