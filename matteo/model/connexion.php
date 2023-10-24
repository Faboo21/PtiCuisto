<?php
// Test de connexion
try
{
    $bdd = new PDO('mysql:host=mysql.info.unicaen.fr;dbname=leroy223_2;charset=utf8', 'leroy223', 'eifieth5EeTohdai');
}
// Gestion des erreurs
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>