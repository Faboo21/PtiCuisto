<?php ob_start(); ?>

<?php
session_start();
$recipes = $_SESSION['recipes'] ?? [];

if (is_array($recipes) && !empty($recipes)) {
    echo '<div class="col-md-10 mt-5 mb-5 p-5 border border-primary">';
    echo '<h1 class="titre m5-2">Recettes :</h1>';

    foreach ($recipes as $row) {
        echo '<a href="../../controller/detail.php?id=' . $row['REC_Id'] . '" class="text-decoration-none text-dark">';
        echo '<div class="row mb-4 border border-primary">';
        echo '<div class="col-md-3"><img src="../../images/image_recette/' . $row['REC_Image'] . '" alt="' . $row['REC_Titre'] . '" class="img-fluid"></div>';
        echo '<div class="col-md-9 texte">';
        echo '<h2>' . $row['REC_Titre'] . '</h2>';
        echo '<p>' . $row['REC_Resum'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</a>';
    }

    echo '</div>';
} else {
    echo "Aucune recette trouvée.";
}
?>


<?php $content = ob_get_clean();
require_once('../template.php'); ?>
