<?php
session_start();
require_once '../model/signInManager.php';

$signIN = new SignInManager();
$stmtMail = $signIN->mailExiste($_GET["emailI"]);
$stmtPseudo = $signIN->pseudoExiste($_GET["pseudoI"]);

if ($stmtMail[0]['nbMail'] != 0) {
    $_SESSION["inscription_reussie"] = 'mail';
    echo '<script>window.history.back();</script>';
} 
elseif ($stmtPseudo[0]['nbPseudo'] != 0) {
    $_SESSION["inscription_reussie"] = 'pseudo';
    echo '<script>window.history.back();</script>';
} 
else {
    $signIN->inscrire($_GET["pseudoI"], $_GET["nameI"], $_GET["firstNameI"], $_GET["emailI"], $_GET["passwordI"]);
    $_SESSION["user"] = $_GET["pseudoI"];
    header('Location: ../view/page/edito.php');
}
?>