<?php
session_start();
require_once '../model/adminManager.php';

$admin = new AdminManager();

$admin->banirUnCompte($_GET["id"]);
echo '<script>window.history.back();</script>';

?>