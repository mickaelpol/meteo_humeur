<?php
if (!isset($_SESSION['pseudo'])) {
    header('location:?p=connexion');
}

$date = strftime("%A %d %B %Y");
$heure = strftime("%Hh%M");

$reponse = $bdd->query('SELECT avg(not_note) as moyenneClasse from not_note WHERE date(not_date) = date(now())');

while ($donnees = $reponse->fetch()) {
    $reponseEncoder = $donnees['moyenneClasse'];
}

$moyenneJourna = array(
    'jour' => $date, 'note' => array($reponseEncoder));
$moyenneJournaEncoder = json_encode($moyenneJourna, JSON_UNESCAPED_UNICODE);
$moyJournaJson = "moyenne/moyenne_journaliere.json";
$openFichier = fopen($moyJournaJson, "w+");
if ($openFichier === false) {
    echo "Une erreur interne est survenu, contactez le développeur";
} else {
    fputs($openFichier, $moyenneJournaEncoder);
    fclose($openFichier);
}



?>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-2 text-center fondConnexion">
            <p class="margeTop20 text-capitalize">bonjour <?= $_SESSION['prenom'] ?></p>
        </div>
        <div class="col-xs-8 text-center text-primary">
            <h1>Bienvenue sur la météo du jour</h1>
            <p>Nous sommes <?= $date ?></p>
            <p>Il est <?= $heure ?></p>
        </div>
    </div>

</div>
<div class="container margeTop60">
    <div class="row fondGrahp">
        <div class="col-xs-6 col-xs-offset-3">
            <canvas id="moyJourna" height="600" width="600"></canvas>
        </div>
    </div>
</div>

<div class="container margeTop60">
    <form>
        <button class="btn btn-md btn-primary" type="button" onclick="history.go(-1)"><i class="fa fa-arrow-left" aria-hidden="true"></i> Precedent</button>
    </form>
</div>

<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/chart.js/dist/Chart.js"></script>
<script src="./assets/js/moyenneJournaHome.js"></script>