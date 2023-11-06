<?php

require_once 'Manager.php';

class LogInManager extends Manager
{
    function connexionValide($mail, $mdp)
    {
        $stmt = parent::connexion()->prepare("SELECT count(*) as valide from PC_UTILISATEUR WHERE uti_mail = '$mail' and uti_mdp = '$mdp'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getPseudo($mail, $mdp)
    {
        $stmt = parent::connexion()->prepare("SELECT uti_pseudo from PC_UTILISATEUR WHERE uti_mail = '$mail' and uti_mdp = '$mdp'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>