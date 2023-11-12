<?php
session_start();
require_once '../model/RecipeManager.php';

$recette = new RecipeManager();


if ($_GET["r"] == 'v'){
    if ($_GET["n"] == 1){
        $recette->accepterRecette($_GET["id"]);
    } else {
        $recette->refuserRecette($_GET["id"]);
    }
    header('Location: ./recetteAdminValider.php');
} else {
    if ($_GET["n"] == 0){
        $recette->masquerRecette($_GET["id"]);
    } else {
        $recette->demasquerRecette($_GET["id"]);
    }
    header('Location: ./recetteAdmin.php');
}

?>