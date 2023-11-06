<?php 
    session_start();
    unset($_SESSION["user"]);
    unset($_SESSION["isadmin"]);
?>
<?php header('Location: ../view/page/edito.php'); ?>