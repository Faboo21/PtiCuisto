<?php ob_start(); ?>

<?php
session_start();
$recipes = $_SESSION['recipes'] ?? null;
echo $recipes;
unset($_SESSION['recipes']);
?>
<?php $content = ob_get_clean();
require_once('../template.php'); ?>
