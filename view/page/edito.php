<?php ob_start();
session_start(); ?>

<!-- Conteneur à 70% de la largeur du site -->
<div class="custom-container mt-3">

    <!-- Carrousel -->
    <div id="myCarousel" class="carousel slide mb-3" data-ride="carousel">
        <!-- Indicateurs -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Diapositives du carrousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../../images/carroussel1.jpg" alt="Image 1" class="img-fluid">
            </div>
            <div class="carousel-item">
                <img src="../../images/carroussel2.jpg" alt="Image 2" class="img-fluid">
            </div>
            <div class="carousel-item">
                <img src="../../images/carroussel3.jpg" alt="Image 3" class="img-fluid">
            </div>
        </div>

        <!-- Contrôles du carrousel -->
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Précédent</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Suivant</span>
        </a>
    </div>
<div class="row">
    <!-- Zone des dernières recettes -->
    <div class="col-md-6 border border-primary">
        <h1 class="titre mt-2">Les dernières recettes</h1>
        <ul class="list-group list-group-flush">
            <?php
            require_once '../../model/RecipeManager.php';

            $recipe = new RecipeManager();
            $recipes = $recipe->afficheTroisRecette();

            if (is_array($recipes) && !empty($recipes)) {
                foreach ($recipes as $row) {
                    echo '<li class="list-group-item">';
                    echo '<a href="../../controller/detail.php?id=' . $row['REC_Id'] . '" class="text-decoration-none text-dark">';
                    echo '<div class="row mb-4">';
                    echo '<div class="col-md-4 col-12">';
                    echo '<img src="../../images/image_recette/' . $row['REC_Image'] . '" alt="Image_' . $row['REC_Titre'] . '" class="img-fluid">';
                    echo '</div>';
                    echo '<div class="col-md-8 col-12 texte">';
                    echo '<h2>' . $row['REC_Titre'] . '</h2>';
                    echo '<p>' . $row['REC_Resum'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</a>';
                    echo '</li>';
                }
            } else {
                echo '<li class="list-group-item"> Aucune recette trouvée. </li>';
            }
            ?>
        </ul>
    </div>

    <!-- Zone d'édito -->
    <div class="col-md-6 bg-primary p-4">
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

<?php $content = ob_get_clean();
require_once('../template.php'); ?>