<?php require_once 'Manager.php';
class RecipeManager extends Manager{
    function afficheTroisRecette()
    {
        $stmt = parent::connexion()->prepare("SELECT rec_TITRE, REC_Resum, rec_IMAGE, rec_datecreation from PC_RECETTE order by rec_DATECREATION desc LIMIT 0, 3 ");
        $stmt->execute();
        return $stmt;
    }

    function afficheRecette($categorie) {

        if ($categorie == 0){
            $sql = "SELECT rec_TITRE, REC_Resum, rec_IMAGE, rec_datecreation 
                FROM PC_RECETTE 
                ORDER BY rec_DATECREATION DESC";
            $stmt = parent::connexion()->prepare($sql);
        }
        else {
            $sql = "SELECT rec_TITRE, REC_Resum, rec_IMAGE, rec_datecreation 
                FROM PC_RECETTE 
                WHERE CAT_ID = :categorie 
                ORDER BY rec_DATECREATION DESC";
            $stmt = parent::connexion()->prepare($sql);
            $stmt->bindParam(':categorie', $categorie, PDO::PARAM_INT);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function afficheIngredient(){
        $stmt = parent::connexion()->prepare("SELECT ing_id,ING_intitule from PC_INGREDIENT order by ING_intitule");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function afficheTitreRecette(){
        $stmt = parent::connexion()->prepare("SELECT rec_id,rec_TITRE from PC_RECETTE order by rec_titre");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
