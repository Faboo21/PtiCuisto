<?php 
    session_start();
    unset($_SESSION["user"]);
?>
<?php header('Location: ../view/page/edito.php'); ?>