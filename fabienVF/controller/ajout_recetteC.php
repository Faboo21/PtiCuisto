<?php
require_once '../model/RecipeManager.php';

session_start();

$recipe = new RecipeManager();
$dossier = '../images/image_recette/';
$fichier = basename($_FILES['image_recette']['name']);
$taille_maxi = 100000000000000;
$taille = filesize($_FILES['image_recette']['tmp_name']);
$extensions = array('.png', '.jpg', '.jpeg');
$extension = strrchr($_FILES['image_recette']['name'], '.'); 
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 'Vous devez uploader un fichier de type png, jpg ou jpeg';
}
if($taille>$taille_maxi)
{
     $erreur = 'Le fichier est trop gros...';
}
if(!isset($_SESSION['user'])){
     $erreur = "Vous vous etes deconnecté";
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
          $recipe->ajouter_recette($_POST['nom_recette'],$_POST['resume'],$_POST['instructions'],$_POST['categorieR'],$nouveauNom,$_SESSION['user']);
          if (isset($_POST['nouveaux_ingredients'])){
               $recipe->ajouter_newIngredients($_POST['nouveaux_ingredients']);
          }
          if (isset($_POST['ingredients'])){
               $recipe->ajouter_Ingredients($_POST['ingredients']);
          }
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