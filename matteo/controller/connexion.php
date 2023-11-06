<?php 
session_start();
    require_once '../model/logInManager.php';

    $logIN = new LogInManager();

    $stmt = $logIN->connexionValide($_GET["emailC"], $_GET["passwordC"]);
    if($stmt[0]['valide'] == 1){
        $stmt = $logIN->getPseudo($_GET["emailC"], $_GET["passwordC"]);
        $_SESSION["user"]=$stmt[0]['uti_pseudo'];
        header('Location: ../view/page/edito.php');
    } else {
        $_SESSION["connexion_rate"] = 'non';
        echo '<script>window.history.back();</script>';
    }
?>