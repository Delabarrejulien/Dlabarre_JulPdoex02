<?php
require_once(dirname(__FILE__) . '/../models/Appointment.php');

$errorArray = [];
$id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));

$destroy = new Appointment();
$delete2 = $destroy ->delete($id);
if($delete2){
    header('location: /controllers/rdv-listCtrl.php');
}

include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');

?>