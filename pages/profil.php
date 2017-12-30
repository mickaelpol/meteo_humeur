<?php
if (!isset($_SESSION['pseudo'])) {
    header('location:?p=connexion');
}



?>

<div class="container text-center page-header text-primary">
    <h1 class="text-capitalize">profil</h1>
</div>

<?php 

$reponse = $bdd->query('SELECT uti_nom, uti_prenom, uti_pseudo, uti_email, DATE_FORMAT(uti_date_inscription, "%d/%m/%Y à %Hh%i") as Dinscription FROM uti_utilisateur WHERE uti_oid = ' . $_SESSION["id"].'');

while ($donnees = $reponse->fetch()) {?>

<div class="container font25 text-center fondConnexion">
    <div class="row page-header">
        <div class="col-xs-4 col-xs-offset-2">
            <p>Nom :</p>
        </div>
        <div class="col-xs-4">
            <p><?= $donnees['uti_nom'] ?></p>
        </div>
    </div>
    <div class="row page-header">
        <div class="col-xs-4 col-xs-offset-2">
            <p>Prenom :</p>
        </div>
        <div class="col-xs-4">
            <p><?= $donnees['uti_prenom'] ?></p>
        </div>
    </div>
    <div class="row page-header">
        <div class="col-xs-4 col-xs-offset-2">
            <p>Pseudo :</p>
        </div>
        <div class="col-xs-4">
            <p><?= $donnees['uti_pseudo'] ?></p>
        </div>
    </div>
    <div class="row page-header">
        <div class="col-xs-4 col-xs-offset-2">
            <p>Email :</p>
        </div>
        <div class="col-xs-4">
            <p><a href="<?= $donnees['uti_email']?>"><?= $donnees['uti_email']?></a></p>
        </div>
    </div>
    <div class="row page-header">
        <div class="col-xs-4 col-xs-offset-2">
            <p>Date d'inscription :</p>
        </div>
        <div class="col-xs-4">
            <p><?= $donnees['Dinscription'] ?></p>
        </div>
    </div>
</div>
<?php
}

?>

<div class="container margeTop60">
    <form>
        <button class="btn btn-md btn-primary" type="button" onclick="history.go(-1)"><i class="fa fa-arrow-left" aria-hidden="true"></i> Precedent</button>
    </form>
</div>
