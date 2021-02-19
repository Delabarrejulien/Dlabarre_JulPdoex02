<?php

class database{

    public static function connect(){

        $dsn = 'mysql:host=localhost;dbname=hospitale2n';
        $user = 'doctor';
        $mdp = 'zY9JyK18tHlhbmz7';
        try{$pdo = new PDO($dsn, $user,$mdp); 
            $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            

        }catch(PDOException $e){

            echo 'ECHEC:' . $e->getMessage();
        }
        return $pdo;
    }
}
?>