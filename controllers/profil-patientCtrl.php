<?php
    require_once(dirname(__FILE__) . '/../models/Patients.php');
        
    $id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
    $patient = new Patient();
    $profil = $patient->profilPatient($id);

    if(!$profil){
        header('location: /index.php');
    }


    include(dirname(__FILE__) . '/../views/templates/header.php');

    include(dirname(__FILE__) . '/../views/profil-patient.php');

    include(dirname(__FILE__) . '/../views/templates/footer.php');
?>