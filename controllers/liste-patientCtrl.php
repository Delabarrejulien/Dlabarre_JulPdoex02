<?php

require_once(dirname(__FILE__).'/../models/Patients.php');


$patient = new Patient();

$allPatients = Patient::getAll();

// recherche de patient

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search'])) {

    $search = trim(filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    $search = strip_tags($search); 

    $allPatients = Patient::searchPatient($search);
}

//numeroter la page list-patient

if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}





include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/liste-patient.php');

include(dirname(__FILE__).'/../views/templates/footer.php');
?>