<?php
require_once(dirname(__FILE__) . '/../utils/regex.php');

require_once(dirname(__FILE__) . '/../models/Appointment.php');

// Initialisation du tableau d'erreurs
$errorsArray = array();
/*************************************/
var_dump($errorsArray);
// Nettoyage de l'id passé en GET dans l'url
$id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));

/*************************************************************/

//On ne controle que s'il y a des données envoyées 
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    
    $dateHour = trim(filter_input(INPUT_POST, 'dateHour', FILTER_SANITIZE_NUMBER_INT));

    //On test si le champ n'est pas vide
    if(!empty($dateHour)){
        // On test la valeur
        $testRegex = preg_match(REGEXP_DATE_HOUR,$dateHour);

        // On peut aller plus loin sur le test de la date à cet endroit

        if($testRegex == false){
            $errorsArray['dateHour_error'] = 'Le date n\'est pas valide, le format attendu est JJ/MM/AAAA';
        }
    }else{
        $errorsArray['dateHour_error'] = 'Le champ est obligatoire';
    }

    $idPatients = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));




    // Si il n'y a pas d'erreurs, on met à jour le patient.
    if(empty($errorsArray) ){    
        $appointed = new Appointment($dateHour, $idPatients, $id);
        $result = $appointed->update($id);
        if($result===true){
            header('location: /controllers/liste-patientCtrl.php?msgCode=2');
        } else {
            // Si l'enregistrement s'est mal passé, on affiche à nouveau le formulaire de création avec un message d'erreur.
            $msgCode=$result;
        }
    }
} else {
    $appointed= Appointment::getAppointments($id);
    // Si le patient n'existe pas, on redirige vers la liste complète avec un code erreur
    if($appointed){
        $id = $patient->id;
        $lastname = $patient->lastname;
        $firstname = $patient->firstname;
        $birthdate = $patient->birthdate;
        $phone = $patient->phone;
        $mail = $patient->mail;
    } else {
        header('location: /controllers/liste-patientCtrl.php?msgCode=3');
    }
    /*************************************************************/
}

/* ************* AFFICHAGE DES VUES **************************/

include(dirname(__FILE__) . '/../views/templates/header.php');
    include(dirname(__FILE__) . '/../views/update-patient.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');

/*************************************************************/