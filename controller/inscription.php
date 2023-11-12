<?php
session_start();
require_once '../model/signInManager.php';

$signIN = new SignInManager();

$stmtMail = $signIN->mailExiste($_GET["emailI"]);
$stmtPseudo = $signIN->pseudoExiste($_GET["pseudoI"]);

if (empty($_GET["emailI"]) || empty($_GET["passwordI"]) || empty($_GET["nameI"]) || empty($_GET["firstNameI"]) || empty($_GET["pseudoI"])) {
    $_SESSION["inscription_rate"] = 'vide';
    echo '<script>window.history.back();</script>';
} 
elseif ($stmtMail[0]['nbMail'] != 0) {
    $_SESSION["inscription_rate"] = 'mail';
    echo '<script>window.history.back();</script>';
} 
elseif ($stmtPseudo[0]['nbPseudo'] != 0) {
    $_SESSION["inscription_rate"] = 'pseudo';
    echo '<script>window.history.back();</script>';
} 
else {
    $signIN->inscrire($_GET["pseudoI"], $_GET["firstNameI"], $_GET["nameI"], $_GET["emailI"], password_hash($_GET["passwordI"], PASSWORD_DEFAULT));
    $_SESSION["user"] = $_GET["pseudoI"];
    header('Location: ../view/page/edito.php');
}
?>