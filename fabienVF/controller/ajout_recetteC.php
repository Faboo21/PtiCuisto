<?php
require_once '../model/RecipeManager.php';

print_r($_POST);

$recipe = new RecipeManager();
$dossier = '../images/image_recette/';
$fichier = basename($_FILES['image_recette']['name']);
$taille_maxi = 100000;
$taille = filesize($_FILES['image_recette']['tmp_name']);
$extensions = array('.png', '.jpg', '.jpeg');
$extension = strrchr($_FILES['image_recette']['name'], '.'); 
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 'Vous devez uploader un fichier de type png, jpg, jpeg, txt ou doc...';
}
if($taille>$taille_maxi)
{
     $erreur = 'Le fichier est trop gros...';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier, 
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     $res = $recipe->totalRecette();
     $nouveauNom = explode('.' , $fichier)[0].$res[0]["total"].$extension;
     if(move_uploaded_file($_FILES['image_recette']['tmp_name'], $dossier .$nouveauNom)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          echo 'Upload effectué avec succès !';
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }
}
else
{
     echo $erreur;
}
?>