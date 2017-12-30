<?php

$reponse = $bdd->query('SELECT uti_nom, uti_prenom, uti_pseudo, uti_password, uti_email, uti_isadmin, DATE_FORMAT(uti_date_inscription, "%d/%m/%Y à %Hh%i") as Dinscription FROM uti_utilisateur');
?>

<div class="container font25 text-center margeTop60 fondConnexion">
        <?php
while ($donnees = $reponse->fetch()) {
    ?>

        
            <div class="col-xs-6 margeTop40 margeBot60 traitBottom">
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-2 traitLeft">
                        <p>Nom :</p>
                    </div>
                    <div class="col-xs-4">
                        <p class="text-capitalize"><?= $donnees['uti_nom']?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-2 traitLeft">
                        <p>Prenom :</p>
                    </div>
                    <div class="col-xs-4">
                        <p class="text-capitalize"><?= $donnees['uti_prenom']?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-2 traitLeft">
                        <p>Pseudo :</p>
                    </div>
                    <div class="col-xs-4">
                        <p class="text-capitalize"><?= $donnees['uti_pseudo']?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-2 traitLeft">
                        <p>Email :</p>
                    </div>
                    <div class="col-xs-4">
                        <p class="text-capitalize"><a href="mailto:<?=$donnees['uti_email']?>?subject=Inscription
                        &cc=<?=$donnees['uti_email']?>
                        &bcc=<?=$donnees['uti_email']?>
                        &body=Bonjour ci joint le pseudo de votre compte sur humeur meteo
                        Pseudo : <?=$donnees['uti_pseudo']?>
                        Mot de passe : <?= $donnees['uti_password'] ?>                                                     
                        Veillez a bien modifier le mot de passe une fois connecter pour eviter tout problème!! "><?=$donnees['uti_email']?></a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-2 traitLeft">
                        <p>Date d'inscription :</p>
                    </div>
                    <div class="col-xs-4">
                        <p><?= $donnees['Dinscription'] ?></p>
                    </div>
                </div>
                <div class="row margeBot60">
                    <div class="col-xs-4 col-xs-offset-2 traitLeft">
                        <p>Admin :</p>
                    </div>
                    <div class="col-xs-4">
                        <p class="text-uppercase"><?php
                            if ($donnees['uti_isadmin'] === "1") {
                                echo "oui";
                            } else {
                                echo "non";
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>

        
        <?php
}

?>
</div>
<div class="container margeTop60">
    <form>
        <button class="btn btn-md btn-primary" type="button" onclick="history.go(-1)"><i class="fa fa-arrow-left" aria-hidden="true"></i> Precedent</button>
    </form>
</div>