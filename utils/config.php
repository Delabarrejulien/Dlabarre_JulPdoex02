<?php

DEFINE('DSN', 'mysql:host=localhost;dbname=hospitale2n');
DEFINE('LOGIN', 'doctor');
DEFINE('PASSWORD', 'zY9JyK18tHlhbmz7');

$displayMsg = array(
    '0' => ['type' => 'alert-danger', 'msg' => 'Une erreur inconnue s\'est produite'],
    '1' => ['type' => 'alert-success', 'msg' => 'Le patient a bien été ajouté'],
    '2' => ['type' => 'alert-success', 'msg' => 'Le patient a bien été mis à jour'],
    '3' => ['type' => 'alert-danger', 'msg' => 'Le patient n\'a pas été trouvé'],
    '4' => ['type' => 'alert-danger', 'msg' => 'Le patient n\'a pas été enregistré en base de données'],
    '5' => ['type' => 'alert-danger', 'msg' => 'Le patient n\'a pas été mis à jour'],
    '6' => ['type' => 'alert-success', 'msg' => 'Le rdv a bien été mis à jour'],
    '7' => ['type' => 'alert-danger', 'msg' => 'Le rdv n\'a pas été mis à jour'],
    '23000' => ['type' => 'alert-danger', 'msg' => 'Le mail est déjà existant'],
    
);