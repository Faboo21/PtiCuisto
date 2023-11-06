<?php
session_start();
require_once '../model/logInManager.php';
require_once '../model/adminManager.php';

$admin = new Adminmanager();
$logIN = new LogInManager();

$stmtadmin = $admin->verifieAdmin($_GET["email"]);
$stmt = $logIN->connexionValide($_GET["email"], $_GET["password"]);

if ($stmt[0]['valide'] == 1 && !empty($_GET["email"]) && !empty($_GET["password"])) {
    $stmt = $logIN->getPseudo($_GET["email"], $_GET["password"]);
    $_SESSION["user"] = $stmt[0]['uti_pseudo'];
    $_SESSION["isadmin"] = $stmtadmin[0]['typeUser']; 
    header('Location: ../view/page/edito.php');
} else {
    if (empty($_GET["email"]) || empty($_GET["password"])) {
        $_SESSION["connexion_rate"] = 'vide';
    } else {
        $_SESSION["connexion_rate"] = 'non';
    }
    echo '<script>window.history.back();</script>';
}
?>