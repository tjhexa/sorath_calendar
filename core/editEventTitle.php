<?php

require_once('./../utils/auth.php');
if (isset($_POST['delete']) && isset($_POST['id'])) {

	$id = $_POST['id'];
	$date_modified = $_POST['date_modified'];
	$modified_by = $_POST['modified_by'];

	$sql = "UPDATE events set is_deleted=1, modified_by='$modified_by',date_modified='$date_modified' WHERE id = $id"; //"DELETE FROM events WHERE id = $id";

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

} else if (
	isset($_POST['title']) && isset($_POST['description']) && isset($_POST['color'])
	&& isset($_POST['duration_type'])
	&& isset($_POST['booking_type'])
	&& isset($_POST['check_in_time'])
	&& isset($_POST['check_out_time'])
	&& isset($_POST['hold_for_days'])
	&& isset($_POST['party_name_full'])
	&& isset($_POST['party_contact_primary'])
	&& isset($_POST['party_reference_by'])
	&& isset($_POST['party_reference_contact'])
	&& isset($_POST['total_days_of_final_booking'])
	&& isset($_POST['sorath_contact_person'])
	&& isset($_POST['internal_notes'])
	&& isset($_POST['party_payment_data'])
	&& isset($_POST['party_token_data'])
	&& isset($_POST['date_modified'])
	&& isset($_POST['amount'])
	&& isset($_POST['id'])
) {

	$id = $_POST['id'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$color = $_POST['color'];
	$amount = $_POST['amount'];

	$booking_type = $_POST['booking_type'];
	$duration_type = $_POST['duration_type'];

	$check_out_time = $_POST['check_out_time'];
	$check_in_time = $_POST['check_in_time'];

	$hold_for_days = $_POST['hold_for_days'];

	$party_name_full = $_POST['party_name_full'];
	$party_contact_primary = $_POST['party_contact_primary'];
	$party_reference_by = $_POST['party_reference_by'];
	$party_reference_contact = $_POST['party_reference_contact'];
	$total_days_of_final_booking = $_POST['total_days_of_final_booking'];
	$sorath_contact_person = $_POST['sorath_contact_person'];
	$internal_notes = $_POST['internal_notes'];
	$party_payment_data = $_POST['party_payment_data'];
	$party_token_data = $_POST['party_token_data'];

	$date_modified = $_POST['date_modified'];
	$modified_by = $_POST['modified_by'];

	$sql = "UPDATE events SET  title = '$title', description = '$description', amount = '$amount', color = '$color'
	, duration_type = '$duration_type', booking_type='$booking_type', check_in_time = '$check_in_time', check_out_time='$check_out_time',
	hold_for_days = '$hold_for_days'

,party_name_full			='$party_name_full'
,party_contact_primary		='$party_contact_primary'
,party_reference_by			='$party_reference_by'
,party_reference_contact	='$party_reference_contact'
,total_days_of_final_booking='$total_days_of_final_booking'
,sorath_contact_person		='$sorath_contact_person'
,internal_notes				='$internal_notes'
,party_payment_data			='$party_payment_data'
,party_token_data			='$party_token_data'
,date_modified 				= '$date_modified'
,modified_by 				= '$modified_by'
	 WHERE id = $id ";

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

header('Location: ../index.php');
?>