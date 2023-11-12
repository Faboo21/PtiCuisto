<?php
session_start();

require_once '../model/accountManager.php';

$account = new AccountManager();

if (($_GET["passwordM"]) == "" || $_GET["nameM"] == "" || $_GET["firstNameM"] == "") {
    $_SESSION["modif_rate"] = 'vide';
    echo '<script>window.history.back();</script>';
} 
else {
    $account->modifieCompte($_GET["pseudoM"], $_GET["firstNameM"], $_GET["nameM"], $_GET["emailM"], password_hash($_GET["passwordM"], PASSWORD_DEFAULT));
    header('Location: ../view/page/edito.php');
}
?>