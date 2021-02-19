<?php
require_once(dirname(__FILE__) . '/../models/Patients.php');
require_once(dirname(__FILE__) . '/../models/Appointment.php');

$patient = Patient::get($id);

if(!$patient){
    header('location: /controllers/list-patientCtrl.php?msgCode=3');
}


include(dirname(__FILE__) . '/../views/templates/header.php');
    include(dirname(__FILE__) . '/../views/rendezvous.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');

