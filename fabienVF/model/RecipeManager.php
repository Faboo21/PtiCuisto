<?php require_once 'Manager.php';
class RecipeManager extends Manager
{
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

    function afficheRecette($categorie)
    {

        if ($categorie == 0) {
            $sql = "SELECT *
                FROM PC_RECETTE 
                ORDER BY rec_DATECREATION DESC";
            $stmt = parent::connexion()->prepare($sql);
        } else {
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

    function afficheIngredient()
    {
        $stmt = parent::connexion()->prepare("SELECT * from PC_INGREDIENT order by ING_intitule");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function afficheTitreRecette()
    {
        $stmt = parent::connexion()->prepare("SELECT * from PC_RECETTE order by rec_titre");
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
        $sql = "INSERT INTO PC_RECETTE (rec_titre, rec_contenu, rec_resum, cat_id, rec_image, rec_datecreation, rec_datemodification, uti_id) 
    VALUES(:nom_recette, :instructions, :resume, :categorie, :image, SYSDATE(), SYSDATE(), (SELECT uti_id FROM PC_UTILISATEUR WHERE uti_pseudo = :user))";

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
        $sqlInsertIngredient = "INSERT INTO PC_INGREDIENT (ing_intitule) VALUES (:ingredient)";
        $sqlInsertRecipeIngredient = "INSERT INTO PC_RECETTE_INGREDIENT (rec_id, ing_id) VALUES ((SELECT max(rec_id) FROM PC_RECETTE), (SELECT max(ing_id) FROM PC_INGREDIENT))";

        $stmtInsertIngredient = parent::connexion()->prepare($sqlInsertIngredient);
        $stmtInsertRecipeIngredient = parent::connexion()->prepare($sqlInsertRecipeIngredient);

        foreach ($nouveaux_ingredients as $nouveau) {
            $stmtInsertIngredient->bindParam(':ingredient', $nouveau);

            if ($stmtInsertIngredient->execute()) {
                $ingredient_id = parent::connexion()->lastInsertId(); // Récupérez l'ID de l'ingrédient inséré

                if ($stmtInsertRecipeIngredient->execute()) {
                    echo "a";
                } else {
                    echo "b";
                }
            } else {
                echo "c";
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
}
