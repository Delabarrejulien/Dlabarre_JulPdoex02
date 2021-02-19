<?php
require_once(dirname(__FILE__).'/../models/Patients.php');
require_once(dirname(__FILE__).'/../models/Appointment.php');
require_once(dirname(__FILE__).'/../utils/regex.php');

$errorarray=[];


$dateHour=trim(filter_input(INPUT_POST, 'birthday', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

if(!empty($dateHour)){
   
    $testRegex= preg_match(REGEX_DATE,$dateHour);
    if($testRegex == false){
        $errorarray['dateHour_error'] = 'not valid';
    }
}else{
    $errorsArray['dateHour_error'] = 'request';
}

if(empty($errorarray)){

    

    $appointment = new Appointment();
    $appointed=$appointment->addappointement($id);
}



$patient = new Patient();

$profil = $patient->listPatient();



include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/ajout-rendezvous.php');

include(dirname(__FILE__).'/../views/templates/footer.php');
?>