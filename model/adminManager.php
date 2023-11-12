<?php

require_once 'Manager.php';

class AdminManager extends Manager
{
    function verifieAdmin($mail)
    {
        $stmt = parent::connexion()->prepare("SELECT UTI_TypeUser as typeUser from PC_UTILISATEUR WHERE uti_mail = '$mail'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function afficheComptes()
    {
        $stmt = parent::connexion()->prepare("SELECT * from PC_UTILISATEUR");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function afficheUnCompte($id)
    {
        $stmt = parent::connexion()->prepare("SELECT * from PC_UTILISATEUR WHERE UTI_Id = $id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function modifieUnCompte($nom, $prenom, $mdp, $type, $statut, $id)
    {
        $stmt = parent::connexion()->prepare("UPDATE PC_UTILISATEUR SET uti_nom = '$nom', uti_prenom = '$prenom', 
        uti_mdp = '$mdp', uti_typeUser = $type, uti_statut = $statut WHERE UTI_Id = $id");
        $stmt->execute();
    }

    function banirUnCompte($id)
    {
        $stmt = parent::connexion()->prepare("UPDATE PC_UTILISATEUR SET uti_statut = 0 WHERE UTI_Id = $id");
        $stmt->execute();
    }

    function debanirUnCompte($id)
    {
        $stmt = parent::connexion()->prepare("UPDATE PC_UTILISATEUR SET uti_statut = 1 WHERE UTI_Id = $id");
        $stmt->execute();
    }
}

?>