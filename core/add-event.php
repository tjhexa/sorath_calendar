<?php
require_once('./../utils/auth.php');
require_once('./../utils/sanitize.php');

if (isset($_POST['title'])) {

	$title = sanitizeInput($_POST['title']);
	$description = sanitizeInput($_POST['description']);
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = sanitizeInput($_POST['color']);
	$amount = sanitizeInput($_POST['amount']);

	$booking_type = sanitizeInput($_POST['booking_type']);

	$duration_type = sanitizeInput($_POST['duration_type']);

	$sql = "INSERT INTO events(title, description, start, end, color, amount,booking_type,duration_type) 
	values ('$title', '$description', '$start', '$end', '$color', '$amount', '$booking_type','$duration_type')";
	echo $sql;
	
	$prepareQuery = $auth->prepare($sql);

	if ($prepareQuery == false) {
	 print_r($auth->errorInfo());
	 die ('Error preparing the query.');
	}

	$executeQuery = $prepareQuery->execute();

	if ($executeQuery == false) {
	 print_r($prepareQuery->errorInfo());
	 die ('Error executing the query.');
	}
}

header('Location: '.$_SERVER['HTTP_REFERER']);
?>
