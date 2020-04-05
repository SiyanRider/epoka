<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <title>Paramètrage distance</title>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="/">EPOKA</a>
            <div class="menu">
                                @if ($_SESSION['view_missions'] == '1')
                                <a href="/missions"><img src="check.png" width="32" /> Validation des missions</a>
                                @endif
                                @if ($_SESSION['view_paiements'] == '1')
                                <a href="/paiement-frais" ><img src="money.png" width="32" /> Paiement des frais</a>
                                <a href="/settings" class="active"><img src="settings.png" width="32"/> Paramétrage</a>
                                @endif
                                <span class="logout">Connecté en tant que {{ $_SESSION['nom'] }} <a href="/disconnect"> <img src="logout.png" width="32"/>  Déconnexion</a></span>
</div>
        </nav>
        <div class="card-body">
        <br/><br/><br/>
<div class="authpanel">
    <img src="distance.png" height="150" /><a href="/settings/distances" class="active">Parametrez la distance entres deux villes</a>
</div>
<div class="authpanel">
    <img src="prix.png" width="200" height="200" /><a href="/settings/prix" class="active">Parametrez les indemnités</a>
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