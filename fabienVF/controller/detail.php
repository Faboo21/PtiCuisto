<?php 
    $id = $_GET['id'] ?? 0;
    session_start();
    
    require_once '../model/RecipeManager.php';
    $recipe = new RecipeManager();
    $res = $recipe->afficheRecetteById($id);
    $ing = $recipe->afficheIngredientsByRec($id);
    $_SESSION['recipe'] = $res[0];
    $_SESSION['ingredients'] = $ing;
    header("Location: ../view/page/detail_recette.php");
?>