<?php
session_start();
require_once '../model/signInManager.php';

$signIN = new SignInManager();

$stmtMail = $signIN->mailExiste($_GET["email"]);
$stmtPseudo = $signIN->pseudoExiste($_GET["pseudo"]);

if (empty($_GET["email"]) || empty($_GET["password"]) || empty($_GET["name"]) || empty($_GET["firstName"]) || empty($_GET["pseudo"])) {
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
    $signIN->inscrire($_GET["pseudo"], $_GET["firstName"], $_GET["name"], $_GET["email"], $_GET["password"]);
    $_SESSION["user"] = $_GET["pseudo"];
    header('Location: ../view/page/edito.php');
}
?>