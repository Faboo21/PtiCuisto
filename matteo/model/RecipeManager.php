<?php require_once 'Manager.php';
class RecipeManager extends Manager{
    function afficheTroisRecette()
    {
        $stmt = parent::connexion()->prepare("SELECT * from PC_RECETTE order by rec_DATECREATION desc LIMIT 0, 3 ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function afficheRecetteById($id)
    {
        $a = "SELECT * from PC_RECETTE where rec_id = $id";
        $stmt = parent::connexion()->prepare($a);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function afficheRecetteByIng($id)
    {
        $a = "SELECT * from PC_RECETTE join PC_RECETTE_INGREDIENT using(REC_Id) where ing_id = $id";
        $stmt = parent::connexion()->prepare($a);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function afficheIngredientsByRec($id)
    {
        $a = "SELECT * from PC_INGREDIENT join PC_RECETTE_INGREDIENT using(ING_Id) where rec_id = $id";
        $stmt = parent::connexion()->prepare($a);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function afficheRecette($categorie) {

        if ($categorie == 0){
            $sql = "SELECT *
                FROM PC_RECETTE 
                ORDER BY rec_DATECREATION DESC";
            $stmt = parent::connexion()->prepare($sql);
        }
        else {
            $sql = "SELECT *
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
        $stmt = parent::connexion()->prepare("SELECT * from PC_INGREDIENT order by ING_intitule");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function afficheTitreRecette(){
        $stmt = parent::connexion()->prepare("SELECT * from PC_RECETTE order by rec_titre");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    function rechercheNom($nom){
        $stmt = parent::connexion()->prepare("SELECT count(*) as total from PC_RECETTE where REC_IMAGE = '$nom'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }





}
