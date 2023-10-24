<?php

require_once 'connexion.php';

function afficheTroisRecette(){

$stmt = $bdd->prepare("SELECT rec_TITRE, REC_Resum, rec_IMAGE, rec_datecreation from PC_RECETTE order by rec_DATECREATION desc LIMIT 0, 3 ");
$stmt->execute();
return $stmt; 
}







?>