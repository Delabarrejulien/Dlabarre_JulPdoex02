<?php


require_once(dirname(__FILE__).'/../models/Appointment.php');

$appointed = Appointment::getAppointments();





include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/rdv-list.php');

include(dirname(__FILE__).'/../views/templates/footer.php');
?>