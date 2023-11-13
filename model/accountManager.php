<?php

require_once 'Manager.php';

class AccountManager extends Manager
{
    function infoCompte($pseudo)
    {
        $stmt = parent::connexion()->prepare("SELECT * from PC_UTILISATEUR WHERE uti_pseudo = '$pseudo'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function modifieCompte($pseudo, $nom, $prenom, $mail, $mdp)
    {
        $connexion = parent::connexion();

        // Préparation de la requête avec des paramètres sous forme de marqueurs de position (?)
        $stmt = $connexion->prepare("UPDATE PC_UTILISATEUR SET uti_pseudo = :pseudo, uti_nom = :nom, uti_prenom = :prenom, uti_mail = :mail, uti_mdp = :mdp WHERE uti_pseudo = :pseudo_old AND uti_mail = :mail_old");

        // Liaison des paramètres avec les variables
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':mdp', $mdp);
        $stmt->bindParam(':pseudo_old', $pseudo);
        $stmt->bindParam(':mail_old', $mail);

        // Exécution de la requête
        $stmt->execute();

        // Fermeture de la requête
    }
}
