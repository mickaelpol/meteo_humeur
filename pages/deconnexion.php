<?php
if (!isset($_SESSION['pseudo'])) {
    header('location:?p=connexion');
}

$loader = "<div class='loader center-block'></div>";
$message = "<h3 class='text-success text-center margeTop60'>Deconnexion en cours</h3>";
session_destroy();
header('refresh:5;url=?p=connexion');
?>

<div class="container">
    <div class="row">
        <div class="col-xs-4 col-xs-offset-4 margeBot60">
            <?=isset($message) ? $message : ""?>
        </div>
        <div class="col-xs-4 col-xs-offset-4">
            <?=isset($loader) ? $loader : ""?>
        </div>
        <div class="col-xs-4 col-xs-offset-4 text-center margeTop20">
            A bientôt <?= $_SESSION['prenom'] ?>
        </div>
    </div>
</div>