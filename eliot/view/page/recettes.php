<?php ob_start(); ?>

<?php

session_start();
$recipes = $_SESSION['recipes'] ?? [];

if (is_array($recipes) && !empty($recipes)) {
    foreach ($recipes as $row) {
        echo $row['rec_TITRE'].'  '.$row['REC_Resum'].' '.$row['rec_IMAGE'];
        echo "<br />";
    }
} else {
    // Vous pouvez afficher un message d'erreur ou autre chose ici
    echo "Aucune recette trouvée.";
}
?>


<?php $content = ob_get_clean();
require_once('../template.php'); ?>
