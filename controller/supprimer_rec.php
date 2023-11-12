<?php
session_start();
require_once '../model/RecipeManager.php';

$recette = new RecipeManager();
$recette->refuserRecette($_GET["id"]);
header('Location: ../view/page/edito.php');
?>