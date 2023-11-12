<?php
session_start();
$id = $_GET['ing'] ?? 0;

require_once '../model/RecipeManager.php';

$recipe = new RecipeManager();
$recipes = $recipe->afficheRecetteByIng( $id );

$_SESSION['recipes'] = $recipes;

?>
<?php header('Location: ../view/page/recettes.php'); ?>