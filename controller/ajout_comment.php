<?php session_start();?>
<?php
require_once '../model/CommentManager.php';

$comment = new CommentManager();
if (isset($_SESSION['user'])){
    $comment->insertCommentaire($_SESSION['recipe']['REC_Id'],$_SESSION['user'],$_POST['comment']) ;
}

header("Location: ./detail.php?id=".$_SESSION['recipe']['REC_Id']); ?>