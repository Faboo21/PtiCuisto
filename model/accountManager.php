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
        $stmt = parent::connexion()->prepare("UPDATE PC_UTILISATEUR SET uti_pseudo = '$pseudo', uti_nom = '$nom', uti_prenom = '$prenom', 
        uti_mail = '$mail', uti_mdp = '$mdp' WHERE uti_pseudo = '$pseudo' AND uti_mail = '$mail'");
        $stmt->execute();
    }
}
?>