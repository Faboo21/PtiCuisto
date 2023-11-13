<?php
session_start();
require_once '../model/logInManager.php';
require_once '../model/adminManager.php';

$admin = new Adminmanager();
$logIN = new LogInManager();

$stmtadmin = $admin->verifieAdmin($_GET["emailC"]);
$stmt = $logIN->connexionValide($_GET["emailC"]);
$ban = $logIN->bannis($_GET["emailC"]);


if (isset($stmt[0])) {
    if (password_verify($_GET["passwordC"], $stmt[0]['UTI_Mdp']) && !empty($_GET["emailC"]) && !empty($_GET["passwordC"])) {
        if ($ban[0]['uti_Statut'] == 0){
            $_SESSION["connexion_rate"] = 'ban';
        } else {
            $stmt = $logIN->getPseudo($_GET["emailC"]);
        $_SESSION["user"] = $stmt[0]['uti_pseudo'];
        $_SESSION["isadmin"] = $stmtadmin[0]['typeUser']; 
        }
        header('Location: ../view/page/edito.php');
    }
}
else {
    if (empty($_GET["emailC"]) || empty($_GET["passwordC"])) {
        $_SESSION["connexion_rate"] = 'vide';
    } else {
        $_SESSION["connexion_rate"] = 'non';
    }
    echo '<script>window.history.back();</script>';
}
?>