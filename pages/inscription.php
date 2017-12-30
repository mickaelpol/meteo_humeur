<?php

if (!isset($_SESSION['pseudo'])) {
    header('location:?p=connexion');
}

?>

<div class="container fondConnexion margeTop60">
    <form class="margeTop60 margeBot60 font20" action="?p=traitInscription" method="post">
        <div class="form-group">
            <div class="row margeBot40">
                <div class="col-xs-4 text-center">
                    <label for="nom">nom</label>
                    <input class="form-control font25" id="nom" type="text" name="nomInscription">
                </div>
                <div class="col-xs-4 text-center">
                    <label for="prenom">prenom</label>
                    <input class="form-control font25" id="prenom" type="text" name="prenomInscription">
                </div>
                <div class="col-xs-4 text-center">
                    <label for="pseudo">pseudo</label>
                    <input class="form-control font25" id="pseudo" type="text" name="pseudoInsciption">
                </div>
            </div>
            <div class="row margeTop40">
                <div class="col-xs-5 col-xs-offset-1 text-center">
                    <label for="password">mot de passe</label>
                    <input class="form-control font25" id="password" type="password" name="passwordInscription">
                </div>
                <div class="col-xs-5 text-center">
                    <label for="verifPassword">Verification du mot de passe</label>
                    <input class="form-control font25" id="verifPassword" type="password" name="verifPasswordInscription">
                </div>
            </div>
            <div class="row margeTop40">
                <div class="col-xs-5 col-xs-offset-1 text-center">
                    <label for="email">email</label>
                    <input class="form-control font25" id="email" type="email" name="emailInscription">
                </div>
                <div class="col-xs-5 text-center">
                    <label for="verifEmail">email</label>
                    <input class="form-control font25" id="verifEmail" type="email" name="verifEmailInscription">
                </div>
            </div>
            <div class="row margeTop40">
                <div class="col-xs-6 col-xs-offset-4">
                    <label>Est ce un admin ?
                        <label class="radio-inline"><input type="radio" value="1" name="isAdminInscription">oui</label>
                        <label class="radio-inline"><input type="radio" value="2" name="isAdminInscription">non</label>
                    </label>
                </div>
            </div>
            <div class="row margeTop60">
                <div class="col-xs-10 col-xs-offset-1">
                    <button class="btn btn-block btn-success font25" type="submit" name="validUser">Creer l'utilisateur</button>
                </div>
            </div>
        </div>
    </form>
</div>


<div class="container margeTop60">
    <form>
        <button class="btn btn-md btn-primary" type="button" onclick="history.go(-1)"><i class="fa fa-arrow-left" aria-hidden="true"></i> Precedent</button>
    </form>
</div>
