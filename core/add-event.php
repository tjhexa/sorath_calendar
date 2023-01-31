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

	$check_in_time = sanitizeInput($_POST['check_in_time']);
	$check_out_time = sanitizeInput($_POST['check_out_time']);

	$hold_for_days = sanitizeInput($_POST['hold_for_days']);


	$party_name_full = sanitizeInput($_POST['party_name_full']);
	$party_contact_primary = sanitizeInput($_POST['party_contact_primary']);
	$party_reference_by = sanitizeInput($_POST['party_reference_by']);
	$party_reference_contact = sanitizeInput($_POST['party_reference_contact']);
	$total_days_of_final_booking = sanitizeInput($_POST['total_days_of_final_booking']);
	$sorath_contact_person = sanitizeInput($_POST['sorath_contact_person']);
	$internal_notes = sanitizeInput($_POST['internal_notes']);
	$party_payment_data = sanitizeInput($_POST['party_payment_data']);
	$party_token_data = sanitizeInput($_POST['party_token_data']);
	$date_added = sanitizeInput($_POST['date_added']);
	$added_by = sanitizeInput($_POST['added_by']);



	$sql = "INSERT INTO events(title, description, start, end, color, 
	amount,booking_type,duration_type, check_in_time,check_out_time,hold_for_days, party_name_full, 
	party_contact_primary, party_reference_by, party_reference_contact, total_days_of_final_booking, 
	sorath_contact_person, internal_notes, party_payment_data, party_token_data, date_added, added_by) 
	values ('$title', '$description',
	 '$start', '$end', '$color', '$amount', '$booking_type',
	 '$duration_type', '$check_in_time','$check_out_time','$hold_for_days',
	 '$party_name_full',
	 '$party_contact_primary',
	 '$party_reference_by',
	 '$party_reference_contact',
	 '$total_days_of_final_booking',
	 '$sorath_contact_person',
	 '$internal_notes',
	 '$party_payment_data',
	 '$party_token_data',
	 '$date_added',
	 '$added_by')";
	//echo $sql;

	$prepareQuery = $auth->prepare($sql);

	if ($prepareQuery == false) {
		print_r($auth->errorInfo());
		die('Error preparing the query.');
	}

	$executeQuery = $prepareQuery->execute();

	if ($executeQuery == false) {
		print_r($prepareQuery->errorInfo());
		die('Error executing the query.');
	}
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>