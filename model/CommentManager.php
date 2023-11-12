<?php require_once 'Manager.php';
class CommentManager extends Manager
{

    function afficheCommentaire($recipe)
    {
        $sql = "SELECT * from PC_COMMENTAIRE join PC_UTILISATEUR using(uti_id) where REC_Id = :recette order by COM_Id desc";
        $stmt = parent::connexion()->prepare($sql);
        $stmt->bindParam(':recette', $recipe, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function insertCommentaire($recipe, $utilisateur, $message)
    {
        $sql = "INSERT into PC_COMMENTAIRE (UTI_Id, COM_message, REC_Id, COM_Date) values((select uti_id from PC_UTILISATEUR where UTI_Pseudo = :utilisateur),:commentaire, :recipe, sysdate())";

        $stmt = parent::connexion()->prepare($sql);

        $stmt->bindParam(':recipe', $recipe, PDO::PARAM_INT);
        $stmt->bindParam(':utilisateur', $utilisateur, PDO::PARAM_STR);
        $stmt->bindParam(':commentaire', $message, PDO::PARAM_STR);

        if ($stmt->execute()) {
            // Succès de l'exécution
        } else {
            // Échec de l'exécution
        }
    }

    function masquer($id)
    {
        $stmt = parent::connexion()->prepare("UPDATE PC_COMMENTAIRE SET COM_Etat = 0 WHERE COM_Id = $id");
        $stmt->execute();
    }

    function demasquer($id)
    {
        $stmt = parent::connexion()->prepare("UPDATE PC_COMMENTAIRE SET COM_Etat = 1 WHERE COM_Id = $id");
        $stmt->execute();
    }

    function idRecette($id)
    {
        $stmt = parent::connexion()->prepare("SELECT REC_Id from PC_COMMENTAIRE WHERE COM_Id = $id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
