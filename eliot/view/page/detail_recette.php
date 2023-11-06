<?php ob_start(); ?>
<?php session_start();

// Vérifiez si les données de recette sont disponibles
if (isset($_SESSION['recipe'])) {
    $recipe = $_SESSION['recipe'];
    $ingredients = $_SESSION['ingredients'];
    
   
    echo '<div class="col-md-10 mt-5 mb-5">';
    
    // Afficher le titre de la recette
    echo '<h1 class="titre">' . $recipe['REC_Titre'] . '</h1>';
    
    // Afficher l'image de la recette
    echo '<img src="' . $recipe['REC_Image'] . '" alt="' . $recipe['REC_Titre'] . '" class="img-fluid">';
    
    // Afficher le résumé de la recette
    echo '<p class="texte">' . $recipe['REC_Resum'] . '</p>';
    
    // Afficher la liste des ingrédients
    echo '<div class="float-right">'; // Ajoutez cette div pour aligner à droite
    echo '<h2 class="titre">Ingrédients :</h2>';
    echo '<ul>';
    foreach ($ingredients as $ingredient) {
        echo '<li class="texte">' . $ingredient['ING_Intitule'] . '</li>';
    }
    echo '</ul>';
    echo '</div>';
    
    // Afficher le contenu de la recette
    echo '<h2 class="titre">Préparation :</h2>';
    echo '<p class="texte">' . $recipe['REC_Contenu'] . '</p>';
    
    echo '</div>';
} else {
    echo "Aucune recette trouvée.";
}

$content = ob_get_clean();
require_once('../template.php');
?>
