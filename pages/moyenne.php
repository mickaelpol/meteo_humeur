<?php
if (!isset($_SESSION['pseudo'])) {
    header('location:?p=connexion');
}

////////////////// LANCEMENT REQUETE MOYENNE JOURNALIERE ///////////////////////////////////
$date = strftime("%A %d %B %Y");
$mois = date("n");

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
////////////////// FIN LANCEMENT REQUETE MOYENNE JOURNALIERE ///////////////////////////////////

////////////////// LANCEMENT REQUETE MOYENNE PAR MOIS ///////////////////////////////////

$req_janvier = $bdd->query('SELECT avg(not_note) as mois_janvier FROM not_note WHERE month(not_date)= 1');
$req_fevrier = $bdd->query('SELECT avg(not_note) as mois_fevrier FROM not_note WHERE month(not_date)= 2');
$req_mars = $bdd->query('SELECT avg(not_note) as mois_mars FROM not_note WHERE month(not_date)= 3');
$req_avril = $bdd->query('SELECT avg(not_note) as mois_avril FROM not_note WHERE month(not_date)= 4');
$req_mai = $bdd->query('SELECT avg(not_note) as mois_mai FROM not_note WHERE month(not_date)= 5');
$req_juin = $bdd->query('SELECT avg(not_note) as mois_juin FROM not_note WHERE month(not_date)= 6');
$req_juillet = $bdd->query('SELECT avg(not_note) as mois_juillet FROM not_note WHERE month(not_date)= 7');
$req_aout = $bdd->query('SELECT avg(not_note) as mois_aout FROM not_note WHERE month(not_date)= 8');
$req_septembre = $bdd->query('SELECT avg(not_note) as mois_septembre FROM not_note WHERE month(not_date)= 9');
$req_octobre = $bdd->query('SELECT avg(not_note) as mois_octobre FROM not_note WHERE month(not_date)= 10');
$req_novembre = $bdd->query('SELECT avg(not_note) as mois_novembre FROM not_note WHERE month(not_date)= 11');
$req_decembre = $bdd->query('SELECT avg(not_note) as mois_decembre FROM not_note WHERE month(not_date)= 12');

while ($donnees = $req_janvier->fetch()) {
    $janvierEncoder = $donnees['mois_janvier'];
}
while ($donnees = $req_fevrier->fetch()) {
    $fevrierEncoder = $donnees['mois_fevrier'];
}
while ($donnees = $req_mars->fetch()) {
    $marsEncoder = $donnees['mois_mars'];
}
while ($donnees = $req_avril->fetch()) {
    $avrilEncoder = $donnees['mois_avril'];
}
while ($donnees = $req_mai->fetch()) {
    $maiEncoder = $donnees['mois_mai'];
}
while ($donnees = $req_juin->fetch()) {
    $juinEncoder = $donnees['mois_juin'];
}
while ($donnees = $req_juillet->fetch()) {
    $juilletEncoder = $donnees['mois_juillet'];
}
while ($donnees = $req_aout->fetch()) {
    $aoutEncoder = $donnees['mois_aout'];
}
while ($donnees = $req_septembre->fetch()) {
    $septembreEncoder = $donnees['mois_septembre'];
}
while ($donnees = $req_octobre->fetch()) {
    $octobreEncoder = $donnees['mois_octobre'];
}
while ($donnees = $req_novembre->fetch()) {
    $novembreEncoder = $donnees['mois_novembre'];
}
while ($donnees = $req_decembre->fetch()) {
    $decembreEncoder = $donnees['mois_decembre'];
}

$mensuel = array(
    "moyenne" => array($janvierEncoder, $fevrierEncoder, $marsEncoder, $avrilEncoder, $maiEncoder, $juinEncoder, $juilletEncoder, $aoutEncoder, $septembreEncoder, $octobreEncoder, $novembreEncoder, $decembreEncoder));
$mensuelEncoder = json_encode($mensuel);

// Envoi des moyennes mensuelle dans le fichier moyenne_mensuelle.json
$moyenneJson = "moyenne/moyenne_mensuelle.json";
$openFichier = fopen($moyenneJson, "w+");
if ($openFichier === false) {
    echo "Une erreur interne est survenu, contactez le développeur";
} else {
    fputs($openFichier, $mensuelEncoder);
    fclose($openFichier);
}

////////////////// FIN LANCEMENT REQUETE MOYENNE PAR MOIS ///////////////////////////////////

////////////////// LANCEMENT REQUETE MOYENNE PAR MOIS + NOM ///////////////////////////////////

$mensuelMoisNom = array(
    "moyenne" => array("janvier" => $janvierEncoder, "fevrier" => $fevrierEncoder, "mars" => $marsEncoder, "avril" => $avrilEncoder, "mai" => $maiEncoder, "juin" => $juinEncoder, "juillet" => $juilletEncoder, "aout" => $aoutEncoder, "septembre" => $septembreEncoder, "octobre" => $octobreEncoder, "novembre" => $novembreEncoder, "decembre" => $decembreEncoder));
$mensuelMoisNomEncoder = json_encode($mensuelMoisNom);

// Envoi des moyennes mensuelMoisNomle dans le fichier moyenne_mensuelMoisNomle.json
$moyenneJson = "moyenne/moyennemensuelMoisNomleNom.json";
$openFichier = fopen($moyenneJson, "w+");
if ($openFichier === false) {
    echo "Une erreur interne est survenu, contactez le développeur";
} else {
    fputs($openFichier, $mensuelMoisNomEncoder);
    fclose($openFichier);
}

////////////////// FIN LANCEMENT REQUETE MOYENNE PAR MOIS + NOM ///////////////////////////////////


////////////////// LANCEMENT REQUETE MOYENNE DU MOIS EN COURS ///////////////////////////////////

$reponse = $bdd->query('SELECT avg(not_note) as moyenneClasse from not_note WHERE month(not_date) =' . $mois);

while ($donnees = $reponse->fetch()) {
    $moisEnCoursEncoder = $donnees['moyenneClasse'];
}

switch ($mois) {
    case '1':
        $mois = "janvier";
        break;
    case '2':
        $mois = "fevrier";
        break;
    case '3':
        $mois = "mars";
        break;
    case '4':
        $mois = "avril";
        break;
    case '5':
        $mois = "mai";
        break;
    case '6':
        $mois = "juin";
        break;
    case '7':
        $mois = "juillet";
        break;
    case '8':
        $mois = "août";
        break;
    case '9':
        $mois = "septembre";
        break;
    case '10':
        $mois = "octobre";
        break;
    case '11':
        $mois = "novembre";
        break;
    case '12':
        $mois = "décembre";
        break;
}


$moisEnCours = array(
    'mois' => $mois, 'note' => array($moisEnCoursEncoder));
$moisEnCoursEncoder = json_encode($moisEnCours, JSON_UNESCAPED_UNICODE);
$moisEnCoursJson = "moyenne/moisEnCours.json";
$openFichier = fopen($moisEnCoursJson, "w+");
if ($openFichier === false) {
    echo "Une erreur interne est survenu, contactez le développeur";
} else {
    fputs($openFichier, $moisEnCoursEncoder);
    fclose($openFichier);
}

////////////////// FIN LANCEMENT REQUETE MOYENNE DU MOIS EN COURS ///////////////////////////////////


?>
<div class="container">
    <h1 class="text-center text-primary margeBot60 page-header">moyenne de la promotion</h1>
</div>



    <div class="container">
        <div class="row">

        
            <div class="col-xs-2 col-xs-offset-2">
                <button class="btn btn-md btn-primary" id="journaBtn" type="button">Moyenne journalière</button>
            </div>
            <div class="col-xs-2">
                <button class="btn btn-md btn-primary" id="moisBtn" type="button">Moyennes mensuelle</button>
            </div>
            <div class="col-xs-2">
                <button class="btn btn-md btn-primary" id="btnEnCour" type="button">Moyenne du mois en cours</button>
            </div>
            <div class="col-xs-2">
                <div class="form-group">
                    <select class="form-control" id="choix">
                        <option value="1">janvier</option>
                        <option value="2">fevrier</option>
                        <option value="3">mars</option>
                        <option value="4">avril</option>
                        <option value="5">mai</option>
                        <option value="6">juin</option>
                        <option value="7">juillet</option>
                        <option value="8">aout</option>
                        <option value="9">septembre</option>
                        <option value="10">octobre</option>
                        <option value="11">novembre</option>
                        <option value="12">decembre</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="container fondConnexion margeBot60">
        <div class="row margeTop40">
            <div class="row">
                <div class="col-xs-1 col-xs-offset-1 block-center traitVert margeTop20"></div>
                <div class="col-xs-1"> entre 9 et 10 de moyenne</div>
                <div class="col-xs-1 col-xs-offset-1 block-center traitBleu margeTop20"></div>
                <div class="col-xs-1">entre 6 et 8 de moyenne</div>
                <div class="col-xs-1 col-xs-offset-1 block-center traitOrange margeTop20"></div>
                <div class="col-xs-1">entre 3 et 5 de moyenne</div>
                <div class="col-xs-1 col-xs-offset-1 block-center traitRouge margeTop20"></div>
                <div class="col-xs-1">inferieur a 3 de moyenne</div>
            </div>
            <div class="row">
            </div>
            
            
            
        </div>
        <div class="row">
            <div class="row margeTop60">
            <div class="col-xs-6">
                <canvas id="moyJourna" height="500" width="500"></canvas>
            </div>
            <div class="col-xs-6">
                <canvas id="moyenneParMois" height="500" width="500"></canvas>
            </div>
        </div>
        <div class="row margeTop60">
            <div class="col-xs-6 margeTop40">
                <canvas id="moisEnCours" height="500" width="500"></canvas>
            </div>
            <div class="col-xs-6">
                <div>
                    <p id="fermer" ><button class="btn btn-md btn-danger" type="button">X</button> Fermer</p>
                    <canvas id="moisChoisi" height="500" width="500"></canvas>
                </div>
            </div>
        </div>
        </div>
    </div>
    





<div class="container margeTop60">
    <form>
        <button class="btn btn-md btn-primary" type="button" onclick="history.go(-1)"><i class="fa fa-arrow-left" aria-hidden="true"></i> Precedent</button>
    </form>
</div>

<!-- SELECT not_note from not_note where date(not_date) = date(now());
Requete pour afficher les notes de la journée en cours -->

<script src="./node_modules/jquery/dist/jquery.min.js"></script>
<script src="./node_modules/chart.js/dist/Chart.js"></script>
<script src="./assets/js/moyenneJourna.js"></script>
<script src="./assets/js/moyenneMensuelle.js"></script>
<script src="./assets/js/moisChoisi.js"></script>
<script src="./assets/js/moyMoisEnCours.js"></script>
