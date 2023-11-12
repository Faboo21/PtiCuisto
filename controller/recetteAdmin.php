<?php
session_start();

require_once '../model/RecipeManager.php';

$recipe = new RecipeManager();
$recipes = $recipe->afficheTouteRecette();

$_SESSION['recipes'] = $recipes;

?>
<?php header('Location: ../view/page/valideRecettes.php'); ?>