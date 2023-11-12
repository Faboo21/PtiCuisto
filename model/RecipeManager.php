<?php require_once 'Manager.php';
class RecipeManager extends Manager
{
    function afficheTroisRecette()
    {
        $stmt = parent::connexion()->prepare("SELECT * from PC_RECETTE where rec_statut = 1 order by rec_DATECREATION desc LIMIT 0, 3 ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function afficheRecetteById($id)
    {
        $a = "SELECT * from PC_RECETTE join PC_UTILISATEUR using(uti_id) where rec_id = $id";
        $stmt = parent::connexion()->prepare($a);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function afficheRecetteByIng($id)
    {
        $a = "SELECT * from PC_RECETTE join PC_RECETTE_INGREDIENT using(REC_Id) where ing_id = $id and rec_statut = 1";
        $stmt = parent::connexion()->prepare($a);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getTagsByRec($id)
    {
        $a = "SELECT * FROM PC_TAG join PC_RECETTE_TAG using (TAG_Id) where REC_Id = $id";
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

    function afficheRecette($categorie)
    {

        if ($categorie == 0) {
            $sql = "SELECT *
                FROM PC_RECETTE where rec_statut = 1 ORDER BY rec_DATECREATION DESC";
            $stmt = parent::connexion()->prepare($sql);
        } else {
            $sql = "SELECT *
                FROM PC_RECETTE 
                WHERE CAT_ID = :categorie and rec_statut = 1
                ORDER BY rec_DATECREATION DESC";
            $stmt = parent::connexion()->prepare($sql);
            $stmt->bindParam(':categorie', $categorie, PDO::PARAM_INT);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function afficheIngredient()
    {
        $stmt = parent::connexion()->prepare("SELECT * from PC_INGREDIENT where ing_statut = 1 order by ING_intitule ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function afficheTags()
    {
        $stmt = parent::connexion()->prepare("SELECT * from PC_TAG where tag_statut = 1 order by TAG_intitule ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function afficheTitreRecette()
    {
        $stmt = parent::connexion()->prepare("SELECT * from PC_RECETTE where rec_statut = 1 order by rec_titre");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function totalRecette()
    {
        $stmt = parent::connexion()->prepare("SELECT count(*) as total from PC_RECETTE");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function ajouter_recette($nom_recette, $Resume, $instructions, $categorie, $image, $user)
    {
        $sql = "INSERT INTO PC_RECETTE (rec_titre, rec_contenu, rec_resum, cat_id, rec_image, rec_datecreation, rec_datemodification, uti_id,rec_statut) 
    VALUES(:nom_recette, :instructions, :resume, :categorie, :image, SYSDATE(), SYSDATE(), (SELECT uti_id FROM PC_UTILISATEUR WHERE uti_pseudo = :user),2)";

        $stmt = parent::connexion()->prepare($sql);

        $stmt->bindParam(':nom_recette', $nom_recette);
        $stmt->bindParam(':instructions', $instructions);
        $stmt->bindParam(':resume', $Resume);
        $stmt->bindParam(':categorie', $categorie);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':user', $user);

        if ($stmt->execute()) {
        } else {
        }
    }


    function ajouter_newIngredients($nouveaux_ingredients)
    {
        $sqlInsertIngredient = "INSERT INTO PC_INGREDIENT (ing_intitule,ing_statut) VALUES (:ingredient, 2)";
        $sqlInsertRecipeIngredient = "INSERT INTO PC_RECETTE_INGREDIENT (rec_id, ing_id) VALUES ((SELECT max(rec_id) FROM PC_RECETTE), (SELECT max(ing_id) FROM PC_INGREDIENT))";

        $stmtInsertIngredient = parent::connexion()->prepare($sqlInsertIngredient);
        $stmtInsertRecipeIngredient = parent::connexion()->prepare($sqlInsertRecipeIngredient);

        foreach ($nouveaux_ingredients as $nouveau) {
            $stmtInsertIngredient->bindParam(':ingredient', $nouveau);

            if ($stmtInsertIngredient->execute()) {
                if ($stmtInsertRecipeIngredient->execute()) {
                } else {
                }
            } else {
            }
        }
    }


    function ajouter_Ingredients($ingredients)
    {
        $sql = "INSERT INTO PC_RECETTE_INGREDIENT (rec_id, ing_id) VALUES ((SELECT max(rec_id) FROM PC_RECETTE), :ingredient_id)";

        $stmt = parent::connexion()->prepare($sql);

        foreach ($ingredients as $nouveau) {
            $stmt->bindParam(':ingredient_id', $nouveau);

            if ($stmt->execute()) {
                // Insertion réussie
            } else {
                // Gestion de l'erreur
            }
        }
    }

    function ajouter_newTags($nouveaux_tags)
    {
        $sqlInsertTag = "INSERT INTO PC_TAG (tag_intitule,tag_statut) VALUES (:tag, 2)";
        $sqlInsertRecipeTag = "INSERT INTO PC_RECETTE_TAG (rec_id, tag_id) VALUES ((SELECT max(rec_id) FROM PC_RECETTE), (SELECT max(tag_id) FROM PC_TAG))";

        $stmtInsertTag = parent::connexion()->prepare($sqlInsertTag);
        $stmtInsertRecipeTag = parent::connexion()->prepare($sqlInsertRecipeTag);

        foreach ($nouveaux_tags as $nouveau) {
            $stmtInsertTag->bindParam(':tag', $nouveau);

            if ($stmtInsertTag->execute()) {
                if ($stmtInsertRecipeTag->execute()) {
                } else {
                }
            } else {
            }
        }
    }


    function ajouter_Tags($tags)
    {
        $sql = "INSERT INTO PC_RECETTE_TAG (rec_id, tag_id) VALUES ((SELECT max(rec_id) FROM PC_RECETTE), :tag_id)";

        $stmt = parent::connexion()->prepare($sql);

        foreach ($tags as $nouveau) {
            $stmt->bindParam(':tag_id', $nouveau);

            if ($stmt->execute()) {
                // Insertion réussie
            } else {
                // Gestion de l'erreur
            }
        }
    }

    function getlastRecipeId(){
        $stmt = parent::connexion()->prepare("SELECT max(rec_id) as max from PC_RECETTE");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function affichetouteRecette()
    {
        $stmt = parent::connexion()->prepare("SELECT * from PC_RECETTE where REC_Statut = 2 order by rec_DATECREATION desc ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function accepterRecette($id)
    {
        $stmt1 = parent::connexion()->prepare("UPDATE PC_RECETTE set REC_Statut = 1 where REC_Id = $id");
        $stmt2 = parent::connexion()->prepare("UPDATE PC_TAG set TAG_Statut = 1 where TAG_Id in (SELECT TAG_Id from PC_RECETTE_TAG WHERE REC_Id = $id)");
        $stmt3 = parent::connexion()->prepare("UPDATE PC_INGREDIENT set ING_Statut = 1 where ING_Id in (SELECT ING_Id from PC_RECETTE_INGREDIENT WHERE REC_Id = $id)");
        $stmt1->execute();
        $stmt2->execute();
        $stmt3->execute();
    }
    function refuserRecette($id)
    {
        $stmt1 = parent::connexion()->prepare("UPDATE PC_RECETTE set REC_Statut = 0 where REC_Id = $id");
        $stmt2 = parent::connexion()->prepare("UPDATE PC_TAG set TAG_Statut = 0 where TAG_Id in (SELECT TAG_Id from PC_RECETTE_TAG WHERE REC_Id = $id)");
        $stmt3 = parent::connexion()->prepare("UPDATE PC_INGREDIENT set ING_Statut = 0 where ING_Id in (SELECT ING_Id from PC_RECETTE_INGREDIENT WHERE REC_Id = $id)");
        $stmt1->execute();
        $stmt2->execute();
        $stmt3->execute();
    }

    function afficheMesRecettes($id){
        $sql = "SELECT * from PC_RECETTE join PC_UTILISATEUR using(UTI_Id) where uti_pseudo = :id and (REC_Statut = 1 or REC_Statut = 2)";
        $stmt = parent::connexion()->prepare($sql);
        $stmt->bindParam(':id', $id,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
