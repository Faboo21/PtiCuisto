<?php 
    session_start();

    $user = $_SESSION['user'];

    require_once '../model/RecipeManager.php';

    $recipe = new RecipeManager();
    $res = $recipe->afficheMesRecettes($user);
    $_SESSION['recipes'] = $res;
    $_SESSION['suppr'] = 1;
    header("Location: ../view/page/recettes.php");
?>