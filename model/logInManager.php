<?php

require_once 'Manager.php';

class LogInManager extends Manager
{
    function connexionValide($mail)
{
    $pdo = parent::connexion(); // Assure-toi d'avoir une méthode 'connexion()' dans ta classe parent

    $stmt = $pdo->prepare("SELECT UTI_Mdp FROM PC_UTILISATEUR WHERE uti_mail = :mail");
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getPseudo($mail)
{
    $pdo = parent::connexion(); // Assure-toi d'avoir une méthode 'connexion()' dans ta classe parent

    $stmt = $pdo->prepare("SELECT uti_pseudo FROM PC_UTILISATEUR WHERE uti_mail = :mail");
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function bannis($mail){
    $pdo = parent::connexion(); // Assure-toi d'avoir une méthode 'connexion()' dans ta classe parent

    $stmt = $pdo->prepare("SELECT uti_Statut FROM PC_UTILISATEUR WHERE uti_mail = :mail");
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


}
