<?php
require_once(dirname(__FILE__) . '/../models/Patients.php');

$errorArray = [];
// recup id dans l'url et clean l'id

$id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));

$patient = new Patient();
$delete2 = $patient ->deletepatient($id);
if($delete2){
    header('location: /controllers/liste-patientCtrl.php');
}

include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');

?>