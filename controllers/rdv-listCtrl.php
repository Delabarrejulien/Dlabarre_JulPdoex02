<?php


require_once(dirname(__FILE__).'/../models/Appointement.php');

$appointement = new Appointement();

$appointed = $appointement->listAppointement();



include(dirname(__FILE__).'/../views/templates/header.php');

include(dirname(__FILE__).'/../views/rdv-list.php');

include(dirname(__FILE__).'/../views/templates/footer.php');
?>