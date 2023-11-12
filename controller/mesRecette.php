<?php 
    $user =  $_SESSION['user'];
    session_start();
    require_once '../model/RecipeManager.php';



    $recipe = new RecipeManager();
    $res = $recipe->afficheMesRecettes($user);
    
    $_SESSION['mesRecette'] = $res;
    header("Location: ../view/page/detail_recette.php");
?>