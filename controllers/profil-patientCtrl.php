<?php
require_once(dirname(__FILE__) . '/../models/Patients.php');

// Nettoyage de l'id passé en GET dans l'url
$idpatient = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
/*************************************************************/

// Appel à la méthode statique permettant de récupérer toutes les infos d'un patient
$patient = Patient::get($idpatient);
/*************************************************************/

// Si le patient n'existe pas, on redirige vers la liste complète avec un code erreur
if(!$patient){
    header('location: /controllers/list-patientCtrl.php?msgCode=3');
}
/*************************************************************/


/* ************* AFFICHAGE DES VUES **************************/

include(dirname(__FILE__) . '/../views/templates/header.php');
    include(dirname(__FILE__) . '/../views/profil-patient.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');

/*************************************************************/