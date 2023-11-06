<?php

require_once 'Manager.php';

class SignInManager extends Manager
{
    function inscrire($pseudo, $nom, $prenom, $mail, $mdp)
    {   
        $stmt = parent::connexion()->prepare("INSERT INTO PC_UTILISATEUR (uti_pseudo, uti_nom, uti_prenom, uti_mail, uti_mdp, uti_dateinscription, uti_typeuser, uti_statut) 
        VALUES('$pseudo', '$nom', '$prenom', '$mail', '$mdp', SYSDATE(), 1, 1)");
        $stmt->execute();
    }

    function mailExiste($mail)
    {   
        $stmt = parent::connexion()->prepare("SELECT count(*) as nbMail from PC_UTILISATEUR WHERE uti_mail = '$mail'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function pseudoExiste($pseudo)
    {   
        $stmt = parent::connexion()->prepare("SELECT count(*) as nbPseudo from PC_UTILISATEUR WHERE uti_pseudo = '$pseudo'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>