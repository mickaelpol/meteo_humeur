<?php
$btnHome = "";
if (isset($_SESSION['pseudo'])) {
    $btnHome = !isset($_SESSION['pseudo']) ? "" : "<a class='font20' href='?p=home'>Accueil</a>";
}

$btnWebSiteName = "";
if (isset($_SESSION['pseudo'])) {
    $btnWebSiteName = !isset($_SESSION['pseudo']) ? "" : "<a  class='navbar-brand font20' href='?p=home'>Meteo de l'humeur</a>";
}


$btnVote = "";
if (isset($_SESSION['pseudo'])) {
    $btnVote = !isset($_SESSION['pseudo']) ? "" : "<a class='font20' href='?p=vote'>Vote</a>";
}

$btnProfil = "";
if (isset($_SESSION['pseudo'])) {
    $btnProfil = !isset($_SESSION['pseudo']) ? "" : "<a class='font20' href='?p=profil'>" . $_SESSION['nom'] . " " . $_SESSION['prenom'] . "</a>";
}

$btnMoyenne = "";
if (isset($_SESSION['pseudo'])) {
    $btnMoyenne = !isset($_SESSION['pseudo']) ? "" : "<a class='font20' href='?p=moyenne'>Moyenne</a>";
}

$btnConnexion = isset($_SESSION['pseudo']) ? '<a class="font20" href="?p=deconnexion">Deconnexion  <i class="fa fa-power-off" aria-hidden="true"></i></a>' : '';


$btnInscription = "";
if (isset($_SESSION['pseudo'])) {
    if ($_SESSION['admin'] === "1") {
        $btnInscription = "<a class='font20' href='?p=inscription'>Inscrire un apprenant</a>";
    }
}

$btnListUtilisateur = "";
if (isset($_SESSION['pseudo'])) {
    if ($_SESSION['admin'] === "1") {
        $btnListUtilisateur = "<a class='font20' href='?p=listeUser'>Liste des utilisateurs</a>";
    }
}
$btnDropdown = "";
if (isset($_SESSION['pseudo'])) {
    $btnDropdown = '<li class="dropdown">
            <a class="dropdown-toggle font20" data-toggle="dropdown" href="#">Configuration
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li>'. $btnInscription . '</li>
                <li>'. $btnProfil .'</li>
                <li>'. $btnListUtilisateur .'</li>
            </ul>
            </li>';
}

$widgetMeto = "";
if (isset($_SESSION['pseudo'])) {
    $widgetMeto = '<div class="col-xs-2 col-xs-offset-10 widgetMeteo navbar-fixed-top">
            <div class="row ville">
                <div class="col-xs-12">
                    <h3 class="text-center" id="ville"></h3>
                </div>
                <div class="col-xs-10 col-xs-offset-1 trait"></div>
            </div>
            <div class="row fD">
                <div class="col-xs-6 margeBot20">
                    <div class="text-center" id="icone"></div>
                    <div class="text-center" id="temp"></div>
                </div>
                <div class="col-xs-6 margeTop20">
                    <div class="text-center" id="temperature"></div>
                    <div class="text-center margeTop45" id="vent"></div>
                </div>
            </div>
            <div class="row ville2">
                <div class="col-xs-10 col-xs-offset-1 trait2"></div>
                <div class="col-xs-12">
                    <div class="text-center margeTop20" id="humidité"></div>
                </div>
                <div class="col-xs-6">
                    <div class="text-center" id="maximale"></div>
                </div>
                <div class="col-xs-6">
                    <div class="text-center" id="minimale"></div>
                </div>
            </div>
        </div>';
}



?>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <?= $btnWebSiteName ?>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><?=$btnHome?></li>
            <li><?=$btnVote?></li>
            <li><?=$btnMoyenne?></li>
            <?= $btnDropdown ?>
        </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><?= $btnConnexion ?></li>
            </ul> 
    </div>
</nav>
<div class="container">
    <?= $widgetMeto ?>
</div>

<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="./assets/js/activeLien.js"></script>
<script src="./assets/js/widget.js"></script>