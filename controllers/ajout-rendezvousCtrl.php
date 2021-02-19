<?php
require_once(dirname(__FILE__) . '/../models/Patients.php');
require_once(dirname(__FILE__) . '/../models/Appointment.php');

require_once(dirname(__FILE__) . '/../utils/regex.php');

//Tableau d'objets de tous les patients
$allPatients = Patient::getAll();
$errorsArray = [];
$idPatients = null;

if($_SERVER['REQUEST_METHOD'] == 'POST'){


    //Recupérer en post l'idpatients
    $idPatients = intval(trim(filter_input(INPUT_POST, 'idPatients', FILTER_SANITIZE_NUMBER_INT)));
    if($idPatients==0){
        $errorsArray['idPatients_error'] = 'Le champ Patient est obligatoire';
    }

    //récupérer datehour
    $dateHour = trim(filter_input(INPUT_POST, 'dateHour', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    //On test si le champ n'est pas vide
    if(!empty($dateHour)){
        // On test la valeur
        $testRegex = preg_match(REGEXP_DATE_HOUR,$dateHour);

        if($testRegex == false){
            $errorsArray['dateHour_error'] = 'Le date n\'est pas valide, le format attendu est JJ/MM/AAAA';
        }
    }else{
        $errorsArray['dateHour_error'] = 'Le champ date est obligatoire';
    }

    if(empty($errorsArray)){
        $appointment = new Appointment($dateHour,$idPatients);
        if($appointment->save()===true){
            header('location: /controllers/rdv-listCtrl.php?');
        }
    }

}



include(dirname(__FILE__) . '/../views/templates/header.php');

    include(dirname(__FILE__) . '/../views/ajout-rendezvous.php');

include(dirname(__FILE__) . '/../views/templates/footer.php');