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
}

?>