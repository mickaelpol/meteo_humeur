<?php
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_FR.utf8', 'fra');

session_start();

include ("connectDb/connectToDb.php");

// include ("/pages/traitement/traitMoyenneMois.php");

if (isset($_GET['p'])) {
    
    $p = $_GET['p'];
    
}
else {

    $p = 'home';
    
}

ob_start();

// ----- PAGE D'ACCUEIL ---- //
if ($p === 'home') {
    
    require('pages/home.php');
    
}

// ----- PAGE DES VOTES ---- //
if ($p === 'vote') {
    
    require('pages/vote.php');
    
}

// ----- PAGE DE PROFIL DES APPRENANTS DE LA PROMO OU DU FORMATEUR ---- //
if ($p === 'profil') {
    
    require('pages/profil.php');
    
}

// ----- PAGE DU GRAPHIQUE MOYENNE JOURNALIERE/MENSUELLE ---- //
if ($p === 'moyenne') {
    require('pages/moyenne.php');
}

// ----- PAGE DE CONNEXION ---- //
if ($p === 'connexion') {
    require ('pages/connexion.php');
}

// ----- PAGE DE DECONNEXION ---- //
if ($p === 'deconnexion') {
    require ('pages/deconnexion.php');
}

// ----- PAGE D'INSCRIPTION ---- //
if ($p === 'inscription') {
    require ('pages/inscription.php');
}

// ----- PAGE DES UTILISATEURS ---- //
if ($p === 'listeUser') {
    require ('pages/listeUtilisateurs.php');
}


///////////////////////////////////// TRAITEMENT DES REQUETES ////////////////////////////////////

// ----- traitement de la note ---- //
if ($p === 'traitVote') {
    require('pages/traitement/traitVote.php');
}

// ----- traitement de la moyenne par mois ---- //
if ($p === 'traitMoyenneParMois') {
    require('pages/traitement/traitMoyenneParMois.php');
}

// ----- traitement de la connexion utilisateur ---- //
if ($p === 'traitConnexion') {
    require('pages/traitement/traitConnexion.php');
}

// ----- traitement de l'inscription ---- //
if ($p === 'traitInscription') {
    require('pages/traitement/traitInscription.php');
}

// ----- traitement des moyennes du mois choisi ---- //
if ($p === 'traitMoyenneMoisChoisi') {
    require('pages/traitement/traitMoyenneMoisChoisi.php');
}

// ----- traitement des moyennes de la journée en cours ---- //
if ($p === 'traitMoyenneJournalier') {
    require('pages/traitement/traitMoyenneJournalier.php');
}

// ----- traitement des moyennes du mois en cours ---- //
if ($p === 'traitMoyenneMoisEnCours') {
    require('pages/traitement/traitMoyenneMoisEnCours.php');
}

// ----- PAGE PAR DEFAUT SOIT LE TEMPLATES COMMUN A TOUTES LES PAGES ---- //

$content = ob_get_clean();
require('pages/templates/default.php');