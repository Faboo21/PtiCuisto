<?php ob_start(); session_start();?>

<!-- Conteneur à 70% de la largeur du site -->
<div class="custom-container mt-3">

    <!-- Image en haut -->
    <img src="../../images/accueil.jpg" alt="image cuisine" class="w-100">
    <!-- Contenu en dessous de l'image -->
    <div class="row">
        <!-- Zone des dernières recettes -->
        <div class="col-md-5 border border-primary m-5"> <!-- Ici, changez de col-md-8 à col-md-6 -->
            <h1 class="titre mt-2">Les dernières recettes</h1>
            <?php
            require_once '../../model/RecipeManager.php';

            $recipe = new RecipeManager();
            $recipes = $recipe->afficheTroisRecette();

            if (is_array($recipes) && !empty($recipes)) {
                echo '<div class="col-md-10 mt-5 mb-5">';
            
                foreach ($recipes as $row) {
                    echo '<a href="../../controller/detail.php?id=' . $row['REC_Id'] . '" class="text-decoration-none text-dark">'; // Ouvrez le lien autour de la recette
                    echo '<div class="row mb-4 border border-primary">';
                    echo '<div class="col-md-3"><img src="../../images/image_recette/' . $row['REC_Image'] . '" alt="' . $row['REC_Titre'] . '" class="img-fluid"></div>';
                    echo '<div class="col-md-9 texte">';
                    echo '<h2>' . $row['REC_Titre'] . '</h2>';
                    echo '<p>' . $row['REC_Resum'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</a>'; // Fermez le lien autour de la recette
                }
            
                echo '</div>';
            } else {
                echo "Aucune recette trouvée.";
            }
            ?>
        </div>

        <!-- Zone d'édito -->
        <div class="col-md-6 bg-primary p-4"> <!-- Ici, changez de col-md-4 à col-md-6 -->
            <!-- Image centrée dans l'édito -->
            <img src="../../images/edito.png" alt="Image de l'édito" class="editorial-img mb-4">

            <!-- Titre et texte de l'édito -->
            <div class="editorial-content text-light">
                <h2 class="titre">Édito</h2>
                <p class="texte">
                    Bienvenue sur notre site de cuisine ! Ici, vous découvrirez une multitude de recettes alléchantes, des astuces de chefs et des conseils pour rendre chaque repas exceptionnel. Que vous soyez débutant ou cuisinier chevronné, notre site est conçu pour vous inspirer et enrichir votre passion pour la cuisine. Plongez dans nos contenus et laissez-vous guider par les saveurs !
                </p>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean();
require_once('../template.php'); ?>