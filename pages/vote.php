<?php
if (!isset($_SESSION['pseudo'])) {
    header('location:?p=connexion');
}

$voteJourna = ('SELECT COUNT(*) as not_compteur FROM not_note WHERE not_uti_oid =' . $_SESSION['id'] . ' and day(not_date) = day(now())');

$nb_enr = $bdd->query($voteJourna);
$compteTab = $nb_enr->fetch();
$compteur = (int)$compteTab['not_compteur'];

if ($compteur === 0) {
    
    $affichage = '<div class="from-group margeTop60">
            <form action="?p=traitVote" method="post">
                <div class="row">
                    <div class="col-xs-2 col-xs-offset-5">
                        <select class="form-control font20" name="note">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                </div>
                <div class="row margeTop60">
                    <div class="col-xs-4 col-xs-offset-4 margeBot40">
                        <button class="btn btn-block btn-success font20" type="submit" name="validHumeur">Envoyez mon vote</button>
                    </div>
                </div>
            </form>
        </div>';
    
} else {
    
    $affichage = "<h1 class='text-center text-danger'>Vous avez déjà voter aujourd'hui <br>
    Revenez demain ! </h1>";
    
}

?>
<div class="container">
    <div class="row text-center text-primary page-header">
        <h2>Selectionnez votre humeur du jour <?= $_SESSION['prenom'] ?></h2>
        <small>il fait beau aujourd'hui j'espère</small>
    </div>
</div>

<div class="container fondConnexion font25">
    <div class="row">
        <?= $affichage ?>
    </div>
</div>




<div class="container margeTop60">
    <form>
        <button class="btn btn-md btn-primary" type="button" onclick="history.go(-1)"><i class="fa fa-arrow-left" aria-hidden="true"></i> Precedent</button>
    </form>
</div>
