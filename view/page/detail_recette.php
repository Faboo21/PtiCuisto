<?php ob_start(); ?>
<?php session_start();

// Vérifiez si les données de recette sont disponibles
if (isset($_SESSION['recipe'])) {
    $recipe = $_SESSION['recipe'];
    $ingredients = $_SESSION['ingredients'];
    $tags = $_SESSION['tags'];
    $comments = $_SESSION['comment'];

    echo '<div class="container-fluid mt-5 mb-5">';
    echo '<div class="row">';

    // Partie gauche
    echo '<div class="col-lg-8">';

    // Titre de la recette
    echo '<h1 class="titre">' . $recipe['REC_Titre'] . '</h1>';

    // Résumé de la recette
    echo '<p class="texte">' . $recipe['REC_Resum'] . '</p>';

    // Tags de la recette
    echo '<p class="texte"><strong>Tags :</strong> ';
    foreach ($tags as $tag) {
        echo $tag['TAG_Intitule'] . '  ';
    }
    echo '</p>';

    // Nom du créateur
    echo '<p class="texte"><strong>Créé par :</strong> ' . $recipe['UTI_Pseudo'] . '</p>';

    // Liste des ingrédients
    echo '<h2 class="titre">Ingrédients :</h2>';
    echo '<ul>';
    foreach ($ingredients as $ingredient) {
        echo '<li class="texte">' . $ingredient['ING_Intitule'] . '</li>';
    }
    echo '</ul>';

    // Instructions de la recette
    echo '<h2 class="titre mt-4">Instructions :</h2>';
    echo '<p class="texte">' . $recipe['REC_Contenu'] . '</p>';

    // Formulaire d'ajout de commentaire
    if (isset($_SESSION["user"])) {
        echo '<form method="POST" action="../../controller/ajout_comment.php">';
        echo '<label for="comment" class="mb-2">Ajouter un commentaire :</label>';
        echo '<input type="text" id="comment" name="comment" placeholder="Écrivez un commentaire" class="form-control mb-3">';
        echo '<input type="submit" name="Publier" value="Publier" class="btn btn-primary">';
        echo '</form>';
    }

    // Liste des commentaires
    echo '<h2 class="titre mt-4">Commentaires :</h2>';
    echo '<div class="comments-container">';
    foreach ($comments as $row) {
        if($row['COM_Etat'] == 1 || (isset($_SESSION["isadmin"]) && $_SESSION["isadmin"] == 2)){
            echo '<div class="comment-container border p-3 mb-3 texte">';
            echo '<strong>' . $row['UTI_Pseudo'] . ' : </strong>';
            echo '<p class="texte">' . $row['COM_Message'] . '</p>';
            if($row['COM_Etat'] == 1 && isset($_SESSION["isadmin"]) && $_SESSION["isadmin"] == 2){
                echo '<p class="texte">Statut : Visible</p>';
                echo "<a class='nav-link cursor-pointer' href='../../controller/masquer.php?id=".$row['COM_Id']."&n=1' style='color:#000000;'>Masquer</a>";
            } elseif(isset($_SESSION["isadmin"]) && $_SESSION["isadmin"] == 2) {
                echo '<p class="texte">Statut : Masqué</p>';
                echo "<a class='nav-link cursor-pointer' href='../../controller/masquer.php?id=".$row['COM_Id']."&n=2' style='color:#000000;'>Demasquer</a>";
            }
            echo '</div>';
        }
    }
    echo '</div>'; // Fin de la comments-container

    echo '</div>'; // Fin de la partie gauche

    // Partie droite
    echo '<div class="col-lg-4">';
    
    // Image de la recette
    echo '<img src="../../images/image_recette/' . $recipe['REC_Image'] . '" alt="' . $recipe['REC_Titre'] . '" class="img-fluid mb-4">';

    echo '</div>'; // Fin de la partie droite

    echo '</div>'; // Fin de la row
    echo '</div>'; // Fin du container
} else {
    echo "Aucune recette trouvée.";
}

$content = ob_get_clean();
require_once('../template.php');
?>
