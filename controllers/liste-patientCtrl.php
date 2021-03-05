<?php

require_once(dirname(__FILE__).'/../models/Patients.php');


$patient = new Patient();





// recherche de patient
$search = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search'])) {

    $search = trim(filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

}
 //===================================================================
 
 //calcul de la 1er page

 $currentPage=intval (trim(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT)));

 if ($currentPage<=0){
     $currentPage =1;
 }

 $limit = 2;

 // Calcul du 1er patient de la page

$offset = $limit *( $currentPage -1);

$totalPatient = Patient ::bodyCountPerPage();


// On calcule le nombre de pages total

$pages = ceil($totalPatient->nb_patient / $limit);

$allPatients = Patient::getlimit($search,$offset,$limit);


include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/liste-patient.php');

include(dirname(__FILE__).'/../views/templates/footer.php');
?>