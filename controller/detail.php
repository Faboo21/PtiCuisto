<?php 
    $id = $_GET['id'] ?? 0;
    session_start();
    require_once '../model/CommentManager.php';
    require_once '../model/RecipeManager.php';

    $comment = new CommentManager();

    $commentaire = $comment->afficheCommentaire($id);

    // Si vous devez faire des opérations avec $res, faites-le ici
    $_SESSION['comment'] = $commentaire;


    $recipe = new RecipeManager();
    $res = $recipe->afficheRecetteById($id);
    $ing = $recipe->afficheIngredientsByRec($id);
    $tag = $recipe->getTagsByRec($id);
    $_SESSION['recipe'] = $res[0];
    $_SESSION['ingredients'] = $ing;
    $_SESSION['tags'] = $tag;
    header("Location: ../view/page/detail_recette.php");
?>
