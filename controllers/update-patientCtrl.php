<?php


require_once(dirname(__FILE__).'/../utils/regex.php');
require_once(dirname(__FILE__).'/../models/Patients.php');  

$errorarray= array();

        
$id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));



$patient = new Patient();
$profil = $patient->get($id);



if($_SERVER['REQUEST_METHOD'] == 'POST'){



    $name=trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($name)){

        $testRegex= preg_match(REGEX_STR_NO_NUMBER,$name);

        if($testRegex == false){
            $errorarray['name_error'] = 'not valid';
        }
    }else{
        $errorarray['name_error'] = 'request';
    }



    $surname=trim(filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($surname)){

        $testRegex= preg_match(REGEX_STR_NO_NUMBER,$surname);
        if($testRegex == false){
            $errorarray['surname_error'] = 'not valid';
        }
    }else{
        $errorarray['surname_error'] = 'request';
    }



    $birthday=trim(filter_input(INPUT_POST, 'birthday', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($birthday)){
       
        $testRegex= preg_match(REGEX_DATE,$birthday);
        if($testRegex == false){
            $errorarray['birthday_error'] = 'not valid';
        }
    }else{
        $errorarray['birthday_error'] = 'request';
    }


    



    $email=trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($email)){

        $testRegex= preg_match(REGEX_MAIL,$email);
        if($testRegex == false){
            $errorarray['email_error'] = 'not valid';
        }
    }else{
        $errorarray['email_error'] = 'request';
    }
    


    $phone=trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    if(!empty($phone)){

        $testRegex= preg_match(REGEX_PHONE,$phone);
        if($testRegex == false){
            $errorarray['phone_error'] = 'not valid';
        }
    }else{
        $errorarray['phone_error'] = 'request';
    }

    
    


    if(empty($errorarray)){

        $patient = new Patient($name, $surname, $birthday, $phone, $email);

        $update = $patient->update($id);


      

        if($update===true){
            header('location: /controllers/liste-patientCtrl.php?msgCode=2');
        }

    }else{

        $msgCode=$update;

    }
}else{

    $patient= Patient::get($id);



    if($patient){

        $id = $patient->id;
        $lastname = $patient->lastname;
        $firstname = $patient->firstname;
        $birthdate = $patient->birthdate;
        $phone = $patient->phone;
        $mail = $patient->mail;
    }else{
        header('location: /controllers/list-patientCtrl.php?');
    }
}





include(dirname(__FILE__) . '/../views/templates/header.php');

include(dirname(__FILE__) . '/../views/update-patient.php');

include(dirname(__FILE__) . '/../views/templates/footer.php');

?>