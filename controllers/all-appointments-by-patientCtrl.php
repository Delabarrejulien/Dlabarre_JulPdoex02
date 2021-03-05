<?php
require_once(dirname(__FILE__) . '/../models/Patients.php');
require_once(dirname(__FILE__) . '/../models/Appointment.php');

$errorArray = [];
$id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));

if ($id <= 0) {
    header('location: /controllers/liste-patientCtrl.php?msgCode=3');}

$appointed = Appointment::getPatientAppointments($id);
$allAppointed = Appointment::getAllAppointmentsByPatient($id);

include(dirname(__FILE__) . '/../views/templates/header.php');
    include(dirname(__FILE__) . '/../views/all-appointments-by-patient.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');