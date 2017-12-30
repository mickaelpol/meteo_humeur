<?php

if (isset($_SESSION['pseudo'])) {
    if ($_SESSION['admin'] === '1') {
        header('header:5;url=?p=moyenne');
    } else {
        header('header:5;url=?p=vote');
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-xs-offset-4 col-xs-4 fondConnexion">

            <form class="form margeTop20" action="?p=traitConnexion" method="post">
                <div id="error1" class="form-group text-center">
                    <label id="textError1" class="font20" for="pseudo">pseudo</label>
                    <input class="form-control font18" id="pseudo" type="text" name="pseudo">
                </div>
                <div id="error2" class="form-group text-center">
                    <label id="textError2" class="font20" for="password">mot de passe</label>
                    <input class="form-control font18" id="password" type="password" name="password">

                </div>
                <label for="passClair"><input type="checkbox" id="passClair"> Affichez le mot de passe</label>
                <button id="validCo" class="btn btn-block btn-success margeBot20 margeTop20 font20" name="validConnexion" type="submit" >se connecter</button>
            </form>

        </div>
    </div>
</div>

<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="./assets/js/verifConnexion.js"></script>
