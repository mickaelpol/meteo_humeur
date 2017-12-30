<?php

$validForm = $_POST['validConnexion'];

// Si le formulaire est sétté
if (isset($validForm)) {

    if (empty($_POST['pseudo']) && empty($_POST['password']) && empty($_POST['pseudo']) || empty($_POST['password'])) {
        $loader = "<div class='loader center-block'></div>";
        $message = "<h3 class='text-danger text-center margeTop60'>Vous n'avez pas entrer d'identifient</h3>";
        $redirect = "<p class='text-primary'>redirection en cours</p>";
        header('refresh:5;url=?p=connexion');
    }

    // alors je verifie si le pseudo et le password ne sont pas vide
    if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {

        // s'il ne le sont pas je stocke les valeurs dans mes variables
        $loader = "<div class='loader center-block'></div>";
        $pseudo = htmlspecialchars($_POST['pseudo'], ENT_QUOTES);
        $password = $_POST['password'];

        // je lance une requete sql avec mes variables
        $sql = sprintf('SELECT * FROM uti_utilisateur WHERE uti_pseudo = "%s";', $pseudo);
        $reponse = $bdd->query($sql);
        $row = $reponse->fetch();

        // je verifie quele pseudo existe dans la bdd
        if ($pseudo === $row['uti_pseudo']) {

            // si l'utilisateur existe je verifie que le mot de passe tapé correspond a celui stocké dans la bdd
            if (password_verify($password, $row['uti_password']) || $password === $row['uti_password']) {
                $_SESSION['pseudo'] = $row['uti_pseudo'];
                $_SESSION['admin'] = $row['uti_isadmin'];
                $_SESSION['nom'] = $row['uti_nom'];
                $_SESSION['prenom'] = $row['uti_prenom'];
                $_SESSION['id'] = $row['uti_oid'];

                // je verifie ensuite si l'utilisateur est un formateur ou non
                if ($_SESSION['admin'] === '1') {
                    // si c'est un formateur je renvoi un message et re dirige vers la page des moyennes de classe
                    $validConnexion = "<h3 class='text-success text-center margeTop60'>Connexion du formateur : <br><p class='text-primary'>" . $_SESSION['nom'] . " " . $_SESSION['prenom'] . "</p></h3>";
                    $redirect = "<p class='text-primary'>redirection en cours</p>";
                    header('refresh:5;url=?p=vote');
                }
                // Sinon si l'utilisateur est un apprenant je renvoi un message et le re dirige vers la page des votes
                else {
                    $validConnexion = "<h3 class='text-success text-center margeTop60'>Connexion de l'apprenant : <br><p class='text-primary'>" . $_SESSION['nom'] . " " . $_SESSION['prenom'] . "</p></h3>";
                    $redirect = "<p class='text-primary'>redirection en cours</p>";
                    header('refresh:5;url=?p=vote');
                }

            } else {
                $validConnexion = "<h3 class='text-danger text-center margeTop60'>Identifiant Incorrect</h3>";
                $redirect = "<p class='text-primary'>redirection en cours</p>";
                header('refresh:5;url=?p=connexion');
            }
        } else {
            $erreurId = "<h3 class='text-danger text-center margeTop60'>Identifiant Incorrect</h3>";
            $redirect = "<p class='text-primary'>redirection en cours</p>";
            header('refresh:5;url=?p=connexion');
        }

    }
}

?>



<div class="container">
    <div class="row">
        <div class="col-xs-4 col-xs-offset-4 margeBot60">
            <?=isset($message) ? $message : ""?>
            <?=isset($validConnexion) ? $validConnexion : ""?>
            <?=isset($erreurId) ? $erreurId : ""?>
        </div>
        <div class="col-xs-4 col-xs-offset-4">
            <?=isset($loader) ? $loader : ""?>
        </div>
        <div class="col-xs-4 col-xs-offset-4 text-center margeTop20">
            <?=isset($redirect) ? $redirect : "" ?>
        </div>
    </div>
</div>