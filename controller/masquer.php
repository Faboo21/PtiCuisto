<?php
session_start();
require_once '../model/CommentManager.php';

$comment = new CommentManager();

if ($_GET["n"] == 1){
    $comment->masquer($_GET["id"]);
} else {
    $comment->demasquer($_GET["id"]);
}
$recId = $comment->idRecette($_GET["id"]);
$commentaire = $comment->afficheCommentaire($recId[0]['REC_Id']);
$_SESSION['comment'] = $commentaire;
echo '<script>window.history.back();</script>';
?>