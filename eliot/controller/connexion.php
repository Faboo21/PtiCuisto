<?php
session_start();
require_once '../model/logInManager.php';
require_once '../model/adminManager.php';

$admin = new Adminmanager();
$logIN = new LogInManager();

$stmtadmin = $admin->verifieAdmin($_GET["emailC"]);
$stmt = $logIN->connexionValide($_GET["emailC"], $_GET["passwordC"]);

if ($stmt[0]['valide'] == 1 && !empty($_GET["emailC"]) && !empty($_GET["passwordC"])) {
    $stmt = $logIN->getPseudo($_GET["emailC"], $_GET["passwordC"]);
    $_SESSION["user"] = $stmt[0]['uti_pseudo'];
    $_SESSION["isadmin"] = $stmtadmin[0]['typeUser']; 
    header('Location: ../view/page/edito.php');
} else {
    if (empty($_GET["emailC"]) || empty($_GET["passwordC"])) {
        $_SESSION["connexion_rate"] = 'vide';
    } else {
        $_SESSION["connexion_rate"] = 'non';
    }
    echo '<script>window.history.back();</script>';
}
?>