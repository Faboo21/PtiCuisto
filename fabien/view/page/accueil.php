<?php ob_start(); ?>

<!-- Conteneur à 70% de la largeur du site -->
<div class="custom-container mt-3">

    <!-- Image en haut -->
    <img src="../../images/accueil.jpg" alt="image cuisine" class="w-100">
    <!-- Contenu en dessous de l'image -->
    <div class="row">
        <!-- Zone des dernières recettes -->
        <div class="col-md-6">  <!-- Ici, changez de col-md-8 à col-md-6 -->
        <h2 class="titre text-light">Nos dernières recettes</h2>
            <!-- Vos recettes ici -->
        </div>

        <!-- Zone d'édito -->
        <div class="col-md-6 bg-primary p-4">  <!-- Ici, changez de col-md-4 à col-md-6 -->
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