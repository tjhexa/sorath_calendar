<?php
require_once('./utils/auth.php');

include "database.php";
include "restricted.php";


$sql = "SELECT id, title, description, color, start, end, amount, booking_type, duration_type, check_in_time, check_out_time, hold_for_days, party_name_full, party_contact_primary, party_reference_by, party_reference_contact, total_days_of_final_booking, sorath_contact_person, internal_notes, party_payment_data, party_token_data, date_added, date_modified, added_by, modified_by, is_deleted FROM events where is_deleted = 0 ";

$req = $auth->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Sorath Resort Portal">
	<meta name="author" content="TJ">

	<title>Sorath Resort Booking Portal -
		<?php echo $username_loggedin ?>
	</title>

	<!-- FullCalendar -->
	<link href='css/fullcalendar.min.css' rel='stylesheet' />
	<!-- Bootstrap Core CSS -->

	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



	<!-- Custom CSS -->

	<style>
		#calendar {
			max-width: 1200px;
		}

		.nocheckbox {
			display: none;
		}

		.label-on {
			border-radius: 3px;
			background: red;
			color: #ffffff;
			padding: 10px;
			border: 1px solid red;
			display: table-cell;
		}

		.label-off {
			border-radius: 3px;
			background: white;
			border: 1px solid red;
			padding: 10px;
			display: table-cell;
		}

		#calendar a.fc-event {
			color: #fff;
			/* bootstrap default styles make it black. undo */
			background-color: #0065A6;
		}

		/* Important part */
		/* .modal-dialog {
			overflow-y: initial !important
		} */

		/* .modal-body {
			height: 80vh;
			overflow-y: auto;
		} */
	</style>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>

<?php

include "headerbar.php";

?>
	<!-- Page Content -->
	<div class="container">

		<div class="row">
			<div class="col-lg-12 text-center">
				<div style="height:20px"></div>
				<div id="calendar" class="col-centered">
				</div>
			</div>

		</div>
		<!-- /.row -->
		<!-- Modal -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
			aria-hidden="true">
			<div class="modal-dialog modal-lg" style="overflow-y: initial !important" role="document">
				<div class="modal-content">
					<form class="form-horizontal" method="POST" action="./core/add-event.php">

						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">Add Event</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
									aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body" style="height: 80vh;overflow-y: auto;">


							<div class="form-group row">
								<label for="booking_type" class="col-3 col-form-label">Booking Type</label>
								<div class="col-9">
									<select id="booking_type" name="booking_type" class="custom-select"
										aria-describedby="booking_typeHelpBlock" required="required">
										<option value="on_hold">On Hold</option>
										<option value="final_booking">Final Booking</option>
										<option value="other">Other</option>
									</select>
									<span id="booking_typeHelpBlock" class="form-text text-muted">Please select Booking
										Type</span>
								</div>
							</div>
							<div class="form-group row">
								<label for="duration_type" class="col-3 col-form-label">Duration Type</label>
								<div class="col-9">
									<select id="duration_type" name="duration_type" class="custom-select"
										aria-describedby="duration_typeHelpBlock" required="required">
										<option value="half_day">Half Day</option>
										<option value="full_day">Full Day</option>
									</select>
									<span id="duration_typeHelpBlock" class="form-text text-muted">Please select
										Duration Type</span>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-3">Check In Time</label>
								<div class="col-9">
									<div class="custom-control custom-radio custom-control-inline">
										<input name="check_in_time" id="check_in_time_0" type="radio"
											class="custom-control-input" value="0800"
											aria-describedby="check_in_timeHelpBlock" required="required">
										<label for="check_in_time_0" class="custom-control-label">08 AM</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input name="check_in_time" id="check_in_time_1" type="radio"
											class="custom-control-input" value="1600"
											aria-describedby="check_in_timeHelpBlock" required="required">
										<label for="check_in_time_1" class="custom-control-label">04 PM</label>
									</div>
									<!-- <span id="check_in_timeHelpBlock" class="form-text text-muted">Please select Check
										In Time</span> -->
								</div>
							</div>
							<div class="form-group row">
								<label class="col-3">Check Out Time</label>
								<div class="col-9">
									<div class="custom-control custom-radio custom-control-inline">
										<input name="check_out_time" id="check_out_time_0" type="radio"
											class="custom-control-input" value="0600"
											aria-describedby="check_out_timeHelpBlock" required="required">
										<label for="check_out_time_0" class="custom-control-label">06 AM</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input name="check_out_time" id="check_out_time_1" type="radio"
											class="custom-control-input" value="1400"
											aria-describedby="check_out_timeHelpBlock" required="required">
										<label for="check_out_time_1" class="custom-control-label">02 PM</label>
									</div>
									<!-- <span id="check_out_timeHelpBlock" class="form-text text-muted">Please select Check
										Out Time</span> -->
								</div>
							</div>
							<div class="form-group row">
								<label for="hold_for_days" class="col-3 col-form-label">Hold For Days</label>
								<div class="col-9">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-calendar-minus-o"></i>
											</div>
										</div>
										<input id="hold_for_days" name="hold_for_days"
											placeholder="Please enter Hold For __ Days" type="number" step="any"
											class="form-control" aria-describedby="hold_for_daysHelpBlock"
											required="required">
										<div class="input-group-append">
											<div class="input-group-text">Days</div>
										</div>
									</div>
									<span id="hold_for_daysHelpBlock" class="form-text text-muted">Please enter Hold
										For Days</span>
								</div>
							</div>
							<div class="form-group row">
								<label for="party_name_full" class="col-3 col-form-label">Party Name</label>
								<div class="col-9">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-user-circle"></i>
											</div>
										</div>
										<input id="party_name_full" name="party_name_full"
											placeholder="Please Enter Party Name" type="text" required="required"
											class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="party_contact_primary" class="col-3 col-form-label">Party Mobile No.</label>
								<div class="col-9">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-phone"></i>
											</div>
										</div>
										<input id="party_contact_primary" name="party_contact_primary"
											placeholder="Please Enter Contact Number of Party" type="text"
											class="form-control" required="required">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="party_reference_by" class="col-3 col-form-label">Reference By</label>
								<div class="col-9">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-sitemap"></i>
											</div>
										</div>
										<input id="party_reference_by" name="party_reference_by"
											placeholder="Please enter Reference Name" type="text" class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="party_reference_contact" class="col-3 col-form-label">Reference Mobile
									No.</label>
								<div class="col-9">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-telegram"></i>
											</div>
										</div>
										<input id="party_reference_contact" name="party_reference_contact"
											placeholder="Please Enter Reference Contact Number" type="text"
											class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="total_days_of_final_booking" class="col-3 col-form-label">Total Days of
									Booking/Hold</label>
								<div class="col-9">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-calendar-check-o"></i>
											</div>
										</div>
										<input id="total_days_of_final_booking" name="total_days_of_final_booking"
											type="number" step="any" placeholder="Enter Total Days of Booking/Hold"
											class="form-control">
										<div class="input-group-append">
											<div class="input-group-text">Days</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="sorath_contact_person" class="col-3 col-form-label">Sorath Contact
									Person</label>
								<div class="col-9">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-bolt"></i>
											</div>
										</div>
										<input id="sorath_contact_person" name="sorath_contact_person"
											placeholder="Please Enter Sorath Contact Person Details" type="text"
											class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="internal_notes" class="col-3 col-form-label">Internal Notes</label>
								<div class="col-9">
									<textarea id="internal_notes" name="internal_notes" cols="40" rows="3"
										class="form-control" aria-describedby="internal_notesHelpBlock"></textarea>
									<span id="internal_notesHelpBlock" class="form-text text-muted">Write Down Internal
										Notes (if any)</span>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-3">Payment</label>
								<div class="col-9">
									<div class="custom-control custom-radio custom-control-inline">
										<input name="party_payment_data" id="party_payment_data_0" type="radio"
											class="custom-control-input" value="yes"
											aria-describedby="party_payment_dataHelpBlock">
										<label for="party_payment_data_0" class="custom-control-label">Yes</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input name="party_payment_data" id="party_payment_data_1" type="radio"
											class="custom-control-input" value="no"
											aria-describedby="party_payment_dataHelpBlock">
										<label for="party_payment_data_1" class="custom-control-label">No</label>
									</div>
									<span id="party_payment_dataHelpBlock" class="form-text text-muted">Please Select
										Payment Option</span>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-3">Token</label>
								<div class="col-9">
									<div class="custom-control custom-radio custom-control-inline">
										<input name="party_token_data" id="party_token_data_0" type="radio"
											aria-describedby="party_token_dataHelpBlock" class="custom-control-input"
											value="yes">
										<label for="party_token_data_0" class="custom-control-label">Yes</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input name="party_token_data" id="party_token_data_1" type="radio"
											aria-describedby="party_token_dataHelpBlock" class="custom-control-input"
											value="no">
										<label for="party_token_data_1" class="custom-control-label">No</label>
									</div>
									<span id="party_token_dataHelpBlock" class="form-text text-muted">Please Select
										Token Option</span>
								</div>
							</div>
							<div class="form-group row">
								<label for="title" class="col-3 col-form-label">Event Type</label>
								<div class="col-9">
									<select id="title" name="title" class="custom-select" required="required">
										<option value="marriage">Marriage</option>
										<option value="anniversary ">Anniversary</option>
										<option value="engagement">Engagement</option>
										<option value="janoi">Janoi</option>
										<option value="birthday">Birthday</option>
										<option value="meeting">Meeting</option>
										<option value="other">Other</option>
									</select>
								</div>
							</div>

							<div class="form-group row">
								<label for="color" class="col-3 col-form-label">Event Color</label>
								<div class="col-9">
									<select id="color" name="color" class="custom-select" required="required">
										<option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
										<option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
										<option style="color:#008000;" value="#008000">&#9724; Green</option>
										<option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
										<option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
										<option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
										<option style="color:#000;" value="#000">&#9724; Black</option>
									</select>
									<span id="colorHelpBlock" class="form-text text-muted">This color will be shown on
										Calendar events.</span>
								</div>
							</div>


							<div class="form-group row">
								<label for="start" class="col-3 col-form-label">Event Start Date</label>
								<div class="col-9">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-play"></i>
											</div>
										</div>
										<input id="start" name="start" placeholder="Event Start Date" type="text"
											class="form-control" required="required">
									</div>
								</div>
							</div>

							<div class="form-group row">
								<label for="end" class="col-3 col-form-label">Event End Date</label>
								<div class="col-9">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-stop"></i>
											</div>
										</div>
										<input id="end" name="end" placeholder="Event End Date" type="text"
											class="form-control" required="required">
									</div>
								</div>
							</div>



							<input type="hidden" type="text" for="date_added" value="getdateinformat();" id="date_added"
								name="date_added" />
							<input type="hidden" type="text" for="added_by" value='<?php echo $username_loggedin ?>'
								id="added_by" name="added_by" />
							<input type="hidden" type="text" for="amount" value='0' id="amount" name="amount" />
							<input type="hidden" type="text" for="description" value='NA' id="description"
								name="description" />

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
			aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<form class="form-horizontal" method="POST" action="./core/editEventTitle.php">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">
								<?php if (
									(isset($user_can_edit) && $user_can_edit == 1) ||
									(((isset($user_is_admin) && $user_is_admin == 1)))
								) {
									echo "Edit Event";
								} else {
									echo "View Event";
								} ?>
							</h4>


							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
									aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body" style="height: 80vh;overflow-y: auto;">


							<div class="form-group row">
								<label for="booking_type" class="col-3 col-form-label">Booking Type</label>
								<div class="col-9">
									<select id="booking_type" name="booking_type" class="custom-select" <?php if (
										(isset($user_can_edit) && $user_can_edit == 1) ||
										(((isset($user_is_admin) && $user_is_admin == 1)))
									) {
										echo "";
									} else {
										echo " disabled ";
									} ?>
										aria-describedby="booking_typeHelpBlock" required="required">
										<option value="on_hold">On Hold</option>
										<option value="final_booking">Final Booking</option>
										<option value="other">Other</option>
									</select>
									<span id="booking_typeHelpBlock" class="form-text text-muted">Please select Booking
										Type</span>
								</div>
							</div>
							<div class="form-group row">
								<label for="duration_type" class="col-3 col-form-label">Duration Type</label>
								<div class="col-9">
									<select id="duration_type" name="duration_type" class="custom-select" <?php if (
										(isset($user_can_edit) && $user_can_edit == 1) ||
										(((isset($user_is_admin) && $user_is_admin == 1)))
									) {
										echo "";
									} else {
										echo " disabled ";
									} ?>
										aria-describedby="duration_typeHelpBlock" required="required">
										<option value="half_day">Half Day</option>
										<option value="full_day">Full Day</option>
									</select>
									<span id="duration_typeHelpBlock" class="form-text text-muted">Please select
										Duration Type</span>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-3">Check In Time</label>
								<div class="col-9">
									<div class="form-check form-check-inline">

										<label><input name="check_in_time" id="check_in_time_0" type="radio"
												class="form-check-input" value="0800" <?php if (
													(isset($user_can_edit) && $user_can_edit == 1) ||
													(((isset($user_is_admin) && $user_is_admin == 1)))
												) {
													echo "";
												} else {
													echo " disabled ";
												} ?>
												aria-describedby="check_in_timeHelpBlock" required="required">08
											AM</label>
									</div>
									<div class="form-check form-check-inline">

										<label><input name="check_in_time" id="check_in_time_1" type="radio"
												class="form-check-input" value="1600" <?php if (
													(isset($user_can_edit) && $user_can_edit == 1) ||
													(((isset($user_is_admin) && $user_is_admin == 1)))
												) {
													echo "";
												} else {
													echo " disabled ";
												} ?>
												aria-describedby="check_in_timeHelpBlock" required="required">04
											PM</label>
									</div>

								</div>
							</div>
							<div class="form-group row">
								<label class="col-3">Check Out Time</label>
								<div class="col-9">
									<div class="form-check form-check-inline">

										<label><input name="check_out_time" id="check_out_time_0" type="radio"
												class="form-check-input" value="0600" <?php if (
													(isset($user_can_edit) && $user_can_edit == 1) ||
													(((isset($user_is_admin) && $user_is_admin == 1)))
												) {
													echo "";
												} else {
													echo " disabled ";
												} ?>
												aria-describedby="check_out_timeHelpBlock" required="required">06
											AM</label>
									</div>
									<div class="form-check form-check-inline">

										<label><input name="check_out_time" id="check_out_time_1" type="radio"
												class="form-check-input" value="1400" <?php if (
													(isset($user_can_edit) && $user_can_edit == 1) ||
													(((isset($user_is_admin) && $user_is_admin == 1)))
												) {
													echo "";
												} else {
													echo " disabled ";
												} ?>
												aria-describedby="check_out_timeHelpBlock" required="required">02
											PM</label>
									</div>

								</div>
							</div>
							<div class="form-group row">
								<label for="hold_for_days" class="col-3 col-form-label">Hold For Days</label>
								<div class="col-9">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-calendar-minus-o"></i>
											</div>
										</div>
										<input id="hold_for_days" name="hold_for_days"
											placeholder="Please enter Hold For __ Days" type="number" step="any"
											class="form-control" aria-describedby="hold_for_daysHelpBlock" <?php if (
												(isset($user_can_edit) && $user_can_edit == 1) ||
												(((isset($user_is_admin) && $user_is_admin == 1)))
											) {
												echo "";
											} else {
												echo " readonly ";
											} ?>
											required="required">
										<div class="input-group-append">
											<div class="input-group-text">Days</div>
										</div>
									</div>
									<span id="hold_for_daysHelpBlock" class="form-text text-muted">Please enter Hold
										For Days</span>
								</div>
							</div>
							<div class="form-group row">
								<label for="party_name_full" class="col-3 col-form-label">Party Name</label>
								<div class="col-9">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-user-circle"></i>
											</div>
										</div>
										<input id="party_name_full" name="party_name_full" <?php if (
											(isset($user_can_edit) && $user_can_edit == 1) ||
											(((isset($user_is_admin) && $user_is_admin == 1)))
										) {
											echo "";
										} else {
											echo " readonly ";
										} ?>
											placeholder="Please Enter Party Name" type="text" required="required"
											class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="party_contact_primary" class="col-3 col-form-label">Party Mobile No.</label>
								<div class="col-9">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-phone"></i>
											</div>
										</div>
										<input id="party_contact_primary" name="party_contact_primary" <?php if (
											(isset($user_can_edit) && $user_can_edit == 1) ||
											(((isset($user_is_admin) && $user_is_admin == 1)))
										) {
											echo "";
										} else {
											echo " readonly ";
										} ?>
											placeholder="Please Enter Contact Number of Party" type="text"
											class="form-control" required="required">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="party_reference_by" class="col-3 col-form-label">Reference By</label>
								<div class="col-9">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-sitemap"></i>
											</div>
										</div>
										<input id="party_reference_by" name="party_reference_by" <?php if (
											(isset($user_can_edit) && $user_can_edit == 1) ||
											(((isset($user_is_admin) && $user_is_admin == 1)))
										) {
											echo "";
										} else {
											echo " readonly ";
										} ?>
											placeholder="Please enter Reference Name" type="text" class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="party_reference_contact" class="col-3 col-form-label">Reference Mobile
									No.</label>
								<div class="col-9">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-telegram"></i>
											</div>
										</div>
										<input id="party_reference_contact" name="party_reference_contact" <?php if (
											(isset($user_can_edit) && $user_can_edit == 1) ||
											(((isset($user_is_admin) && $user_is_admin == 1)))
										) {
											echo "";
										} else {
											echo " readonly ";
										} ?>
											placeholder="Please Enter Reference Contact Number" type="text"
											class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="total_days_of_final_booking" class="col-3 col-form-label">Total Days of
									Booking/Hold</label>
								<div class="col-9">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-calendar-check-o"></i>
											</div>
										</div>
										<input id="total_days_of_final_booking" name="total_days_of_final_booking" <?php if (
											(isset($user_can_edit) && $user_can_edit == 1) ||
											(((isset($user_is_admin) && $user_is_admin == 1)))
										) {
											echo "";
										} else {
											echo " readonly ";
										} ?> type="number" step="any"
											placeholder="Enter Total Days of Booking/Hold" class="form-control">
										<div class="input-group-append">
											<div class="input-group-text">Days</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="sorath_contact_person" class="col-3 col-form-label">Sorath Contact
									Person</label>
								<div class="col-9">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-bolt"></i>
											</div>
										</div>
										<input id="sorath_contact_person" name="sorath_contact_person" <?php if (
											(isset($user_can_edit) && $user_can_edit == 1) ||
											(((isset($user_is_admin) && $user_is_admin == 1)))
										) {
											echo "";
										} else {
											echo " readonly ";
										} ?>
											placeholder="Please Enter Sorath Contact Person Details" type="text"
											class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label for="internal_notes" class="col-3 col-form-label">Internal Notes</label>
								<div class="col-9">
									<textarea id="internal_notes" name="internal_notes" cols="40" rows="3" <?php if (
										(isset($user_can_edit) && $user_can_edit == 1) ||
										(((isset($user_is_admin) && $user_is_admin == 1)))
									) {
										echo "";
									} else {
										echo " readonly ";
									} ?>
										class="form-control" aria-describedby="internal_notesHelpBlock"></textarea>
									<span id="internal_notesHelpBlock" class="form-text text-muted">Write Down Internal
										Notes (if any)</span>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-3">Payment</label>
								<div class="col-9">
									<div class="form-check form-check-inline">
										<label><input name="party_payment_data" id="party_payment_data_0" type="radio"
												class="form-check-input" value="yes" <?php if (
													(isset($user_can_edit) && $user_can_edit == 1) ||
													(((isset($user_is_admin) && $user_is_admin == 1)))
												) {
													echo "";
												} else {
													echo " disabled ";
												} ?>
												aria-describedby="party_payment_dataHelpBlock">Yes</label>
									</div>
									<div class="form-check form-check-inline">
										<label><input name="party_payment_data" id="party_payment_data_1" type="radio"
												class="form-check-input" value="no" <?php if (
													(isset($user_can_edit) && $user_can_edit == 1) ||
													(((isset($user_is_admin) && $user_is_admin == 1)))
												) {
													echo "";
												} else {
													echo " disabled ";
												} ?>
												aria-describedby="party_payment_dataHelpBlock">No</label>
									</div>
									<span id="party_payment_dataHelpBlock" class="form-text text-muted">Please Select
										Payment Option</span>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-3">Token</label>
								<div class="col-9">
									<div class="form-check form-check-inline">

										<label><input name="party_token_data" id="party_token_data_0" type="radio" <?php if (
											(isset($user_can_edit) && $user_can_edit == 1) ||
											(((isset($user_is_admin) && $user_is_admin == 1)))
										) {
											echo "";
										} else {
											echo " disabled ";
										} ?> aria-describedby="party_token_dataHelpBlock"
												class="form-check-input" value="yes">Yes</label>
									</div>
									<div class="form-check form-check-inline">

										<label><input name="party_token_data" id="party_token_data_1" type="radio" <?php if (
											(isset($user_can_edit) && $user_can_edit == 1) ||
											(((isset($user_is_admin) && $user_is_admin == 1)))
										) {
											echo "";
										} else {
											echo " disabled ";
										} ?> aria-describedby="party_token_dataHelpBlock"
												class="form-check-input" value="no">No</label>
									</div>
									<span id="party_token_dataHelpBlock" class="form-text text-muted">Please Select
										Token Option</span>
								</div>
							</div>
							<div class="form-group row">
								<label for="title" class="col-3 col-form-label">Event Type</label>
								<div class="col-9">
									<select id="title" name="title" class="custom-select" <?php if (
										(isset($user_can_edit) && $user_can_edit == 1) ||
										(((isset($user_is_admin) && $user_is_admin == 1)))
									) {
										echo "";
									} else {
										echo " disabled ";
									} ?>
										required="required">
										<option value="marriage">Marriage</option>
										<option value="anniversary ">Anniversary</option>
										<option value="engagement">Engagement</option>
										<option value="janoi">Janoi</option>
										<option value="birthday">Birthday</option>
										<option value="meeting">Meeting</option>
										<option value="other">Other</option>
									</select>
								</div>
							</div>

							<div class="form-group row">
								<label for="color" class="col-3 col-form-label">Event Color</label>
								<div class="col-9">
									<select id="color" name="color" class="custom-select" <?php if (
										(isset($user_can_edit) && $user_can_edit == 1) ||
										(((isset($user_is_admin) && $user_is_admin == 1)))
									) {
										echo "";
									} else {
										echo " disabled ";
									} ?>
										required="required">
										<option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
										<option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
										<option style="color:#008000;" value="#008000">&#9724; Green</option>
										<option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
										<option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
										<option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
										<option style="color:#000;" value="#000">&#9724; Black</option>
									</select>
									<span id="colorHelpBlock" class="form-text text-muted">This color will be shown on
										Calendar events.</span>
								</div>
							</div>


							<div class="form-group row">
								<label for="start" class="col-3 col-form-label">Event Start Date</label>
								<div class="col-9">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-play"></i>
											</div>
										</div>
										<input id="start" name="start" placeholder="Event Start Date" type="text" <?php if (
											(isset($user_can_edit) && $user_can_edit == 1) ||
											(((isset($user_is_admin) && $user_is_admin == 1)))
										) {
											echo "";
										} else {
											echo " readonly ";
										} ?> class="form-control" required="required">
									</div>
								</div>
							</div>

							<div class="form-group row">
								<label for="end" class="col-3 col-form-label">Event End Date</label>
								<div class="col-9">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fa fa-stop"></i>
											</div>
										</div>
										<input id="end" name="end" placeholder="Event End Date" type="text" <?php if (
											(isset($user_can_edit) && $user_can_edit == 1) ||
											(((isset($user_is_admin) && $user_is_admin == 1)))
										) {
											echo "";
										} else {
											echo " readonly ";
										} ?>
											class="form-control" required="required">
									</div>
								</div>
							</div>


							<!-- <?php if (
								(isset($user_can_edit) && $user_can_edit == 1) ||
								(((isset($user_is_admin) && $user_is_admin == 1)))
							) {
								echo "<div class=\"form-group\">
								<div class=\"col-sm-2\">
									<label onclick=\"toggleCheck('check1');\" class=\"label-off\" for=\"check1\"
										id=\"check1_label\">
										Delete
									</label>
									<input class=\"nocheckbox\" type=\"checkbox\" id=\"check1\" name=\"delete\">
								</div>
							</div>";
							} else {
								;
							} ?> -->

							<!-- <div class="form-group">
								<div class="col-sm-2">
									<label onclick="toggleCheck('check1');" class="label-off" for="check1"
										id="check1_label">
										Delete
									</label>
									<input class="nocheckbox" type="checkbox" id="check1" name="delete">
								</div>
							</div> -->
							<script>
								function toggleCheck(check) {
									if ($('#' + check).is(':checked')) {
										$('#' + check + '_label').removeClass('label-on');
										$('#' + check + '_label').addClass('label-off');
									} else {
										$('#' + check + '_label').addClass('label-on');
										$('#' + check + '_label').removeClass('label-off');
									}
								}		  
							</script>



							<input type="hidden" name="id" class="form-control" id="id">
							<input type="hidden" type="text" for="date_added" value="2023-01-28 00:00:00"
								id="date_added" name="date_added" />
							<input type="hidden" type="text" for="date_modified" value="2023-01-28 00:00:00"
								id="date_modified" name="date_modified" />
							<input type="hidden" type="text" for="modified_by" value="<?php echo $username_loggedin ?>"
								id="modified_by" name="modified_by" />
							<input type="hidden" type="text" for="added_by" value='' id="added_by" name="added_by" />
							<input type="hidden" type="text" for="amount" value='0' id="amount" name="amount" />
							<input type="hidden" type="text" for="description" value='NA' id="description"
								name="description" />


						</div>
						<div class="modal-footer">

							<?php if (
								(isset($user_can_edit) && $user_can_edit == 1) ||
								(((isset($user_is_admin) && $user_is_admin == 1)))
							) {
								echo "<button id=\"delete_event\" data-dismiss=\"modal\" class='btn btn-danger mr-auto'>Delete</button>";
							} else {
								;
							} ?>

							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

							<?php if (
								(isset($user_can_edit) && $user_can_edit == 1) ||
								(((isset($user_is_admin) && $user_is_admin == 1)))
							) {
								echo "<button type='submit' class='btn btn-primary'>Save</button>";
							} else {
								;
							} ?>


						</div>
					</form>
				</div>
			</div>
		</div>


		<div id="myModalEventUpdated" class="modal fade">
			<div class="modal-dialog modal-confirm">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Event Updated!</h4>
						<button type="button" class="close" data-dismiss="modal"
							onclick="javascript:window.location.href='index.php';" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>Your Event date has been successfully updated. Click OK to continue</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-success"
							onclick="javascript:window.location.href='index.php';">Ok</button>
					</div>
				</div>
			</div>
		</div>

		<div id="myModalEventDeleteConfirm" class="modal fade">
			<form class="form-horizontal" method="POST" action="./core/editEventTitle.php">
				<input type="hidden" name="id" class="form-control" id="id">
				
				<input type="hidden" type="text" for="date_modified" value="2023-01-28 00:00:00" id="date_modified"
					name="date_modified" />
				<input type="hidden" type="text" for="modified_by" value="<?php echo $username_loggedin ?>"
					id="modified_by" name="modified_by" />
				<input class="nocheckbox" type="hidden" value="true" id="dlt" checked name="delete">

				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content border-0">
						<div class="modal-body p-0">
							<div class="card border-0 p-sm-3 p-2 justify-content-center">
								<div class="card-header pb-0 bg-white border-0 ">
									<div class="row">
										<div class="col ml-auto"><button type="button" class="close"
												data-dismiss="modal" aria-label="Close"> <span
													aria-hidden="true">&times;</span> </button></div>
									</div>
									<p class="font-weight-bold mb-2"> Are you sure you want to delete this event?</p>
									<p class="text-muted "> This event entry and all related information will be deleted
										right away.</p>
								</div>
								<div class="card-body px-sm-4 mb-2 pt-1 pb-0">
									<div class="row justify-content-end no-gutters">
										<div class="col-auto"><button type="button" class="btn btn-light text-muted"
												data-dismiss="modal">Cancel</button></div>
										<div class="col-auto"><button type="submit" 
												class="btn btn-danger px-4">Delete</button></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>

	</div>
	<!-- /.container -->

	<!-- jQuery Version 1.11.1 -->
	<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'></script>
	<script src='js/moment.min.js'></script>
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"
		integrity="sha256-wS9gmOZBqsqWxgIVgA8Y9WcQOa7PgSIX+rPA0VL2rbQ=" crossorigin="anonymous"></script>

	<!-- FullCalendar -->
	<script src='js/fullcalendar.min.js'></script>

	<!-- Bootstrap Core JavaScript -->
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>


	<script>

		$('#delete_event').on("click", function () {
			// do something

			$('#myModalEventDeleteConfirm #id').val($('#ModalEdit #id').val());

			$('#myModalEventDeleteConfirm').modal('show');
		});

		function getdateinformat() {
			const dt = new Date();
			const padL = (nr, len = 2, chr = `0`) => `${nr}`.padStart(2, chr);

			return `${dt.getFullYear()}-${padL(dt.getMonth() + 1)}-${padL(dt.getDate())} ${padL(dt.getHours())}:${padL(dt.getMinutes())}:${padL(dt.getSeconds())}`;
		}
		$("#ModalAdd #date_added").val(getdateinformat());
		$("#ModalEdit #date_added").val(getdateinformat());
		$("#ModalEdit #date_modified").val(getdateinformat());

		
		$("#myModalEventDeleteConfirm #date_modified").val(getdateinformat());

		//		$('#date_added').val(new Date());
		$(function () {

			$("#ModalAdd #date_added").val(getdateinformat());
			$("#ModalEdit #date_added").val(getdateinformat());
			$("#ModalEdit #date_modified").val(getdateinformat());
			$("#myModalEventDeleteConfirm #date_modified").val(getdateinformat());
			$('#calendar').fullCalendar({
				header: {
					left: 'prev,today,next',
					center: 'title',
					right: 'month,agendaWeek,agendaDay,listWeek'
				},
				height: 590,
				businessHours: {
					dow: [1, 2, 3, 4, 5],

					start: '00:00',
					end: '24:00',
				},
				nowIndicator: true,
				now: new Date(), //'2020-12-11T11:15:00', //remove - only for demo
				scrollTime: '06:00:00',
				defaultDate: new Date(), //'2020-12-07', // Use this line to use the current date: new Date(),
				editable: true,
				navLinks: true,
				eventLimit: true, // allow "more" link when there are too many events
				selectable: true,
				selectHelper: true,
				select: function (start, end) {

					<?php
					if (isset($_COOKIE['is_admin']) && $_COOKIE['is_admin'] == 1) {
						echo
							"$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
					$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
					$('#ModalAdd').modal('show');";
					} else
						if (isset($_COOKIE['can_add']) && $_COOKIE['can_add'] == 1) {
							echo
								"$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
					$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
					$('#ModalAdd').modal('show');";
						}

					?>
					// $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
					// $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
					// $('#ModalAdd').modal('show');


				},
				eventAfterRender: function (eventObj, $el) {
					var request = new XMLHttpRequest();
					request.open('GET', '', true);
					request.onload = function () {
						var finalContectStr = eventObj.party_name_full;
						if(eventObj.check_in_time == "0800")
						{
							finalContectStr += ' ' + '(Check In : 08 AM.)'
						}else{
							finalContectStr += ' ' + '(Check In : 04 PM.)'
						}
						$el.popover({
							title: eventObj.title,
							content: finalContectStr ,
							trigger: 'hover',
							placement: 'top',
							container: 'body'
						});
					}
					request.send();
				},

				eventRender: function (event, element) {
					element.bind('click', function () {
						$('#ModalEdit #id').val(event.id);
						$('#ModalEdit #title').val(event.title);

						$('#ModalEdit #start').val(event.start);
						$('#ModalEdit #end').val(event.end);

						$('#ModalEdit #description').val(event.description);
						$('#ModalEdit #amount').val(event.amount);
						$('#ModalEdit #booking_type').val(event.booking_type);
						$('#ModalEdit #duration_type').val(event.duration_type);

						if (event.check_in_time == "0800") {

							$("#ModalEdit #check_in_time_0").click();
							$("#ModalEdit #check_in_time_0").prop('checked', true);

						} else {
							$("#ModalEdit #check_in_time_1").click();
							$("#ModalEdit #check_in_time_1").prop('checked', true);

						}



						if (event.check_out_time == "0600") {
							$('#ModalEdit #check_out_time_0').click();
							$('#ModalEdit #check_out_time_0').prop('checked', true);
						} else {
							$('#ModalEdit #check_out_time_1').click();
							$('#ModalEdit #check_out_time_1').prop('checked', true);
						}



						$('#ModalEdit #hold_for_days').val(event.hold_for_days);

						$('#ModalEdit #party_name_full').val(event.party_name_full);
						$('#ModalEdit #party_contact_primary').val(event.party_contact_primary);
						$('#ModalEdit #party_reference_by').val(event.party_reference_by);
						$('#ModalEdit #party_reference_contact').val(event.party_reference_contact);
						$('#ModalEdit #total_days_of_final_booking').val(event.total_days_of_final_booking);
						$('#ModalEdit #sorath_contact_person').val(event.sorath_contact_person);
						$('#ModalEdit #internal_notes').val(event.internal_notes);


						if (event.party_payment_data == "yes") {
							$('#ModalEdit #party_payment_data_0').click();
							$('#ModalEdit #party_payment_data_0').prop('checked', true);
						} else {
							$('#ModalEdit #party_payment_data_1').click();
							$('#ModalEdit #party_payment_data_1').prop('checked', true);
						}

						if (event.party_token_data == "yes") {
							$('#ModalEdit #party_token_data_0').click();
							$('#ModalEdit #party_token_data_0').prop('checked', true);
						} else {
							$('#ModalEdit #party_token_data_1').click();
							$('#ModalEdit #party_token_data_1').prop('checked', true);
						}


						$('#ModalEdit #date_added').val(event.date_added);
						$('#ModalEdit #added_by').val(event.added_by);

						$('#ModalEdit #color').val(event.color);
						$('#ModalEdit').modal('show');
					});
				},
				eventDrop: function (event, delta, revertFunc) { // si changement de position
					<?php if (
						(isset($user_can_edit) && $user_can_edit == 1) ||
						(((isset($user_is_admin) && $user_is_admin == 1)))
					) {
						echo " edit(event); ";
					} else {
						echo "  location.reload(true);  ";
					} ?>
					//edit(event);

				},
				eventResize: function (event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur

					<?php if (
						(isset($user_can_edit) && $user_can_edit == 1) ||
						(((isset($user_is_admin) && $user_is_admin == 1)))
					) {
						echo " edit(event); ";
					} else {
						echo "  location.reload(true); ";
					} ?>
					//edit(event);

				},
				events: [

					<?php foreach ($events as $event):

						$start = explode(" ", $event['start']);
						$end = explode(" ", $event['end']);
						if ($start[1] == '00:00:00') {
							$start = $start[0];
						} else {
							$start = $event['start'];
						}
						if ($end[1] == '00:00:00') {
							$end = $end[0];
						} else {
							$end = $event['end'];
						}

						?>
						{
							id: '<?php echo $event['id']; ?>',
							title: '<?php echo $event['title']; ?>',
							description: '<?php echo $event['description']; ?>',
							amount: '<?php echo $event['amount']; ?>',
							booking_type: '<?php echo $event['booking_type']; ?>',
							duration_type: '<?php echo $event['duration_type']; ?>',
							check_in_time: '<?php echo $event['check_in_time']; ?>',
							check_out_time: '<?php echo $event['check_out_time']; ?>',
							hold_for_days: '<?php echo $event['hold_for_days']; ?>',

							party_name_full: '<?php echo $event['party_name_full']; ?>',
							party_contact_primary: '<?php echo $event['party_contact_primary']; ?>',
							party_reference_by: '<?php echo $event['party_reference_by']; ?>',
							party_reference_contact: '<?php echo $event['party_reference_contact']; ?>',
							total_days_of_final_booking: '<?php echo $event['total_days_of_final_booking']; ?>',
							sorath_contact_person: '<?php echo $event['sorath_contact_person']; ?>',
							internal_notes: '<?php echo $event['internal_notes']; ?>',
							party_payment_data: '<?php echo $event['party_payment_data']; ?>',
							party_token_data: '<?php echo $event['party_token_data']; ?>',
							date_added: '<?php echo $event['date_added']; ?>',
							added_by: '<?php echo $event['added_by']; ?>',


							start: '<?php echo $start; ?>',
							end: '<?php echo $end; ?>',
							color: '<?php echo $event['color']; ?>',
						},
					<?php endforeach; ?>
				]
			});

			function edit(event) {
				start = event.start.format('YYYY-MM-DD HH:mm:ss');
				if (event.end) {
					end = event.end.format('YYYY-MM-DD HH:mm:ss');
				} else {
					end = start;
				}

				id = event.id;

				Event = [];
				Event[0] = id;
				Event[1] = start;
				Event[2] = end;

				$.ajax({
					url: './core/edit-date.php',
					type: "POST",
					data: { Event: Event },
					success: function (rep) {
						console.log(rep);
						if (rep == 'OK') {
							//alert('Saved');
							$('#myModalEventUpdated').modal('show');
						} else {
							alert('Could not be saved. try again.');
						}
					}
				});
			}

		});

	</script>

</body>

</html>