<?php
$filterValue = $_GET['filter'] ?? null;

// petit dej = 1 dej = 2 dinner = 3 toute = 0
// faire une requette qui fait les recettes avec le filtre
//$recipes = $model->getRecipesByFilter($filterValue);

session_start();
$recipes = "aaaa";
$_SESSION['recipes'] = $recipes;

?>
<?php header('Location: ../view/page/recettes.php'); ?>