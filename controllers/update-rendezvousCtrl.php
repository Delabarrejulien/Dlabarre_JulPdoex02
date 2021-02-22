<?php
require_once(dirname(__FILE__) . '/../models/Appointment.php');

$errorArray = [];
$id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));

$appointed = Appointment::getPatientAppointments($id);


include(dirname(__FILE__) . '/../views/templates/header.php');
    include(dirname(__FILE__) . '/../views/update-rendezvous.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');

