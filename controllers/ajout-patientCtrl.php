<?php

require_once(dirname(__FILE__).'/../utils/regex.php');
require_once(dirname(__FILE__).'/../models/Patients.php');      

$errorarray=[];

if($_SERVER['REQUEST_METHOD'] == 'POST'){



    $name=trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($name)){

        $testRegex= preg_match(REGEX_STR_NO_NUMBER,$name);

        if($testRegex == false){
            $errorarray['name_error'] = 'not valid';
        }
    }else{
        $errorsArray['name_error'] = 'request';
    }




    $surname=trim(filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($surname)){

        $testRegex= preg_match(REGEX_STR_NO_NUMBER,$surname);
        if($testRegex == false){
            $errorarray['surname_error'] = 'not valid';
        }
    }else{
        $errorsArray['surname_error'] = 'request';
    }



    $birthday=trim(filter_input(INPUT_POST, 'birthday', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($birthday)){
       
        $testRegex= preg_match(REGEX_DATE,$birthday);
        if($testRegex == false){
            $errorarray['birthday_error'] = 'not valid';
        }
    }else{
        $errorsArray['birthday_error'] = 'request';
    }


    $phone=trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($phone)){

        $testRegex= preg_match(REGEX_PHONE,$phone);
        if($testRegex == false){
            $errorarray['phone_error'] = 'not valid';
        }
    }else{
        $errorsArray['phone_error'] = 'request';
    }

    
    $email=trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($email)){

        $testRegex= preg_match(REGEX_MAIL,$email);
        if($testRegex == false){
            $errorarray['email_error'] = 'not valid';
        }
    }else{
        $errorsArray['email_error'] = 'request';
    }

    // Si il n'y a pas d'erreurs, on enregistre un nouveau patient.
    
    $patient = new Patient($name, $surname, $birthday, $phone, $email );
   if(empty($errorarray)){
      $result = $patient->create();

      if($result===true){
        header('location: /controllers/liste-patientCtrl.php?msgCode=1');
    } else {
        // Si l'enregistrement s'est mal passé, on affiche à nouveau le formulaire de création avec un message d'erreur.
        $msgCode = $result;
    }

   }

}





include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/ajout-patient.php');
include(dirname(__FILE__).'/../views/templates/footer.php');
?>