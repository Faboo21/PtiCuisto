<?php
session_start();
$filterValue = $_GET['filter'] ?? 0;

// entree = 1 plat = 2 dessert = 3 toute = 0

require_once '../model/RecipeManager.php';

$recipe = new RecipeManager();
$recipes = $recipe->afficheRecette($filterValue);

$_SESSION['recipes'] = $recipes;

?>
<?php header('Location: ../view/page/recettes.php'); ?>