<?php require_once("includes/init.php"); ?>
<?php require_once("includes/header.php"); ?>

<?php 

	$session->logout();	
	redirect("/gallery/admin/login.php");

?>