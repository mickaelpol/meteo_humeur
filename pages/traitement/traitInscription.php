<?php

if (!isset($_SESSION['pseudo'])) {
    header('location:?p=connexion');
}


// Si le formulaire d'inscription est sétté
if (isset($_POST['validUser'])) {

    // alors je verifie que tous les inputs ne soit pas vide
    if (!empty($_POST['nomInscription']) && !empty($_POST['prenomInscription']) && !empty($_POST['pseudoInsciption']) && !empty($_POST['passwordInscription']) && !empty($_POST['verifPasswordInscription']) && !empty($_POST['emailInscription']) && $_POST['verifEmailInscription'] && !empty($_POST['isAdminInscription'])) {

        // Sil ne sont pas vide je stocke mes valeurs dans mes variables
        $nomIns = htmlspecialchars($_POST['nomInscription'], ENT_QUOTES);
        $prenomIns = htmlspecialchars($_POST['prenomInscription'], ENT_QUOTES);
        $pseudoIns = htmlspecialchars($_POST['pseudoInsciption'], ENT_QUOTES);
        $passwordIns = htmlspecialchars($_POST['passwordInscription'], ENT_QUOTES);
        $passwordVerifyIns = htmlspecialchars($_POST['verifPasswordInscription'], ENT_QUOTES);
        $emailIns = htmlspecialchars($_POST['emailInscription'], ENT_QUOTES);
        $verifEmailIns = htmlspecialchars($_POST['verifEmailInscription'], ENT_QUOTES);
        $isAdminIns = htmlspecialchars($_POST['isAdminInscription'], ENT_QUOTES);

        // je verifie que les deux mots de passe et adresse mail soit les meme pour eviter une erreur
        //  si ils sont different alors je renvoi une erreur
        if ($passwordIns != $passwordVerifyIns || $emailIns != $verifEmailIns) {
            $loader = "<div class='loader center-block'></div>";
            $erreurMailPwd = "<h3 class='text-danger text-center margeTop60'>Les mot de passe ou adresse mail ne correspondent pas</h3>";
            $redirect = "<p class='text-primary'>redirection en cours</p>";
            header('refresh:5;url=?p=inscription');
        } else {
            // sinon je hashe le mot de passe et j'execute la requete sql qui permettra d'enregistrer l'utilisateur ou le formateur

            // Hash du mot de passe
            $pwdHasher = password_hash($passwordIns, PASSWORD_DEFAULT);

            // je prepare la requetes sql pour inserer les données
            $sql = sprintf("INSERT INTO uti_utilisateur (uti_nom, uti_prenom, uti_pseudo, uti_password, uti_email, uti_isadmin, uti_date_inscription) VALUES
            ('%s', '%s', '%s', '%s', '%s', '%s', now())", $nomIns, $prenomIns, $pseudoIns, $pwdHasher, $emailIns, $isAdminIns);

            // je verifie que l'email ou le pseudo ne soit pas déjà utilisé
            // si c'est pas le cas je renvoi le message d'inscription validé
            if ($bdd->exec($sql) === 1) {

                $loader = "<div class='loader center-block'></div>";
                $messageValid = "<h3 class='text-success text-center margeTop60'>inscription validé</h3>";
                $redirect = "<p class='text-primary'>redirection en cours</p>";
                header('refresh:5;url=?p=inscription');

            } else {
                $loader = "<div class='loader center-block'></div>";
                $redirect = "<p class='text-primary'>redirection en cours</p>";
                $messageErreur = "<h3 class='text-danger text-center margeTop60'>email ou pseudo déjà utilisé</h3>";
                header('refresh:3;url=?p=inscription');
            }

        }

        // et si tous les inputs ne sont pas remplis je renvois une erreur aussi pour ne pas prendre en compte le forumlaire s'il n'est pas correctement remplis et je re dirige vers le formulaire
    } else {
        $inputVide = "<h3 class='text-danger text-center margeTop60'>Vous devez remplir tous les champs<h3>";
        $loader = "<div class='loader center-block'></div>";
        $redirect = "<p class='text-primary'>redirection en cours</p>";
        header('refresh:3;url=?p=inscription');
    }

}

?>

<div class="container">
    <div class="row">
        <div class="col-xs-4 col-xs-offset-4 margeBot60">
            <h1><?=isset($messageValid) ? $messageValid : ""?></h1>
            <h1><?=isset($erreurMailPwd) ? $erreurMailPwd : ""?></h1>
            <h1><?=isset($inputVide) ? $inputVide : ""?></h1>
            <h1><?=isset($messageErreur) ? $messageErreur : ""?></h1>
        </div>
        <div class="col-xs-4 col-xs-offset-4">
            <?=isset($loader) ? $loader : ""?>
        </div>
        <div class="col-xs-4 col-xs-offset-4 text-center margeTop20">
            <?=isset($redirect) ? $redirect : "" ?>
        </div>
    </div>
</div>



