<?php

if (!isset($_SESSION['pseudo'])) {
    header('location:?p=connexion');
}

if (isset($_POST['validHumeur'])) {

    if (!empty($_POST['note'])) {

        $note = $_POST['note'];

        $sql = sprintf("INSERT INTO not_note(not_note, not_date, not_uti_oid) VALUES ('%s', now(), '%d')", $note, $_SESSION['id']);
        $bdd->exec($sql);
        $loader = "<div class='loader center-block'></div>";
        $message = "<div><p class='text-success text-center font25'>La note de : " . $note . " à bien été prise en compte<br>
        Vous allez être re dirigé automatiquement dans 5 secondes<br>sinon
        <a href='?p=home'>CLIQUEZ ICI</a><br>
        pour être redirigé a l'accueil</p></div>";
        header('refresh:5;url=?p=home');
    }

}

?>

<div class="container">
    <div class="row">
        <?=isset($message) ? $message : ""?>
    </div>
    <div class="row margeTop60">
        <?=isset($loader) ? $loader : ""?>
    </div>
</div>