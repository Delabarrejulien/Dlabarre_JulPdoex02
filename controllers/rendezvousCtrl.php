<?php
require_once(dirname(__FILE__) . '/../models/Patients.php');
require_once(dirname(__FILE__) . '/../models/Appointment.php');

$patient = Appointment::getPatientAppointments();


include(dirname(__FILE__) . '/../views/templates/header.php');
    include(dirname(__FILE__) . '/../views/rendezvous.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');

