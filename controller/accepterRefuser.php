<?php
session_start();
require_once '../model/RecipeManager.php';

$recette = new RecipeManager();

if ($_GET["n"] == 1){
    $recette->accepterRecette($_GET["id"]);
} else {
    $recette->refuserRecette($_GET["id"]);
}
header('Location: ./recetteAdmin.php');
?>