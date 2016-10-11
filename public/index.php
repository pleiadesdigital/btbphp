<?php require_once("../includes/initialize.php"); ?>

<?php include_once('layouts/header.php'); ?>

<?php 

	$user = User::find_by_id(1);
	echo "<h3>Utilizing find_by_id() static to call methods</h3>";
	echo $user->full_name();

	echo "<hr>";

	echo "<h3>Utilizing find_all() static to call methods</h3>";
	$users = User::find_all();
	foreach ($users as $user) {
		echo "User: " . $user->username . "<br>";
		echo "Name: " .$user->full_name() . "<br><br>";
 	}





?>

<?php include_once('layouts/footer.php'); ?>

