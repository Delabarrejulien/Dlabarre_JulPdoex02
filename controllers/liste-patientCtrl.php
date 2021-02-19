<?php

require_once(dirname(__FILE__).'/../models/Patients.php');

$allPatients = Patient::getAll();

include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/liste-patient.php');

include(dirname(__FILE__).'/../views/templates/footer.php');
?>