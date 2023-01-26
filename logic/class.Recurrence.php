<?php

require_once 'class.Event.php';

class Recurrence extends Event
{

  function __construct(
    $__id,
    $__rid,
    $__eventType,
    $__title,
    $__description,
    $__start,
    $__end,
    $__color,
    $__amount,
    $__booking_type,
    $__duration_type,
    $__check_in_time,
    $__check_out_time,
    $__hold_for_days,
    $__party_name_full,
    $__party_contact_primary,
    $__party_reference_by,
    $__party_reference_contact,
    $__total_days_of_final_booking,
    $__sorath_contact_person,
    $__internal_notes,
    $__party_payment_data,
    $__party_token_data,
    $__date_added,
    $__date_modified,
    $__added_by,
    $__modified_by
  )
  {
    parent::__construct(
      $__id,
      $__rid,
      $__eventType,
      $__title,
      $__description,
      $__start,
      $__end,
      $__color,
      $__amount,
      $__booking_type,
      $__duration_type,
      $__check_in_time,
      $__check_out_time,
      $__hold_for_days,
      $__party_name_full,
      $__party_contact_primary,
      $__party_reference_by,
      $__party_reference_contact,
      $__total_days_of_final_booking,
      $__sorath_contact_person,
      $__internal_notes,
      $__party_payment_data,
      $__party_token_data,
      $__date_added,
      $__date_modified,
      $__added_by,
      $__modified_by
    );
  }

  // method overriding for calculating start, end dates
  public function setStartDateTime($__start)
  {
    $startTime = explode(" ", $_POST['start'])[1];

    // set to date if 'all day, many day' event
    if ($startTime === '00:00:00') {
      $this->start = $__start;
    } else {
      $this->start = $__start . " " . $startTime;
    }
  }

  public function setEndDateTime($__end, $__start)
  {
    $startDate = explode(" ", $_POST['start'])[0];
    $endDate = explode(" ", $_POST['end'])[0];
    $endTime = explode(" ", $_POST['end'])[1];

    if ($endTime === '00:00:00') {

      // set to date if 'all day, many day' event
      $diff = (strtotime($endDate) - strtotime($startDate)) / 60 / 60 / 24;

      // calculate diff between start/end
      // diff will be used for all dates' end date
      $this->end = date('Y-m-d', strtotime($__end . " + " . $diff . " day"));
    } else {
      $this->end = $__end . " " . $endTime;
    }
  }
}

?>