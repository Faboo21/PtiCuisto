<?php ob_start();
session_start(); 

if(!isset($_SESSION["isadmin"]) || !$_SESSION["isadmin"] == 2){
    header('Location: ./edito.php');
}
?>

<div class="row">
    <h1 class="titre mt-2">Comptes :</h1>
    <?php

    require_once '../../model/adminManager.php';


    $account = new AdminManager();
    $stmt = $account->afficheComptes();

    if (is_array($stmt) && !empty($stmt)) {
        echo '<div class="col-md-10 mt-5 mb-5">';

        foreach ($stmt as $row) {
            echo '<div class="row mb-4 border border-primary">';
            echo "<p>";
            echo "<strong>".$row['UTI_Pseudo']."</strong>";
            echo "<br />";
            echo "Nom Prenom : " . $row['UTI_Nom'] . "  " . $row['UTI_Prenom'];
            echo "<br />";
            echo "Adresse mail : " . $row['UTI_Mail'];
            echo "<br />";
            echo "Date d'inscription : " . $row['UTI_DateInscription'];
            echo "<br />";
            if ($row['UTI_TypeUser'] == 1) {
                echo "Type du compte : Utilisateur";
                echo "<br />";
            } else {
                echo "Type du compte : Administrateur";
                echo "<br />";
            }
            if ($row['UTI_Statut'] == 1) {
                echo "Type du compte : Actif";
                echo "<br />";
            } else {
                echo "Type du compte : bannis";
            }
            echo "</p>";
            if($row['UTI_Statut'] == 1){
                echo "<a class='nav-link cursor-pointer' href='../../controller/banir.php?id=".$row['UTI_Id']."' style='color:#000000;'>Bannir</a>";
            } else {
                echo "<a class='nav-link cursor-pointer' href='../../controller/debanir.php?id=".$row['UTI_Id']."' style='color:#000000;'>Debannir</a>";
            }
            echo '</div>';

        }

        echo '</div>';
    } else {
        echo "Aucun compte trouvée.";
    }
    ?>
</div>


<?php $content = ob_get_clean();
require_once('../template.php'); ?>