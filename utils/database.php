<?php

 require_once dirname(__FILE__).'/../utils/config.php';

 class Database{

     public static function getInstance(){ // va pouvoir etre appellée par Database::getInstance();

         try{
             $pdo = new PDO(DSN, LOGIN, PASSWORD);
             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
             return $pdo;
         }
         catch(PDOException $e){
            echo 'erreur de connexion à la BDD : '. $e->getMessage();
         }

     }
 }

// <?php
// require_once(dirname(__FILE__).'/../utils/config.php');

// class Database {

//     public static $pdo = null;

//     public static function dbconnect(){
//         if (is_null(self::$pdo)) {

//             try {
//                 self::$pdo = new PDO('mysql:dbname='.DB_DATABASE_NAME.';host=localhost', DB_USER_NAME, DB_PWD);
//                 // self::$pdo = new PDO('mysql:dbname='.DB_DATABASE_NAME.';host=db5001797920.hosting-data.io', DB_USER_NAME, DB_PWD);
//                 self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//                 self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

//             } catch (PDOException $e) {
//                 echo '<div class="alert alert-danger">'.$e->getMessage().'</div>';

//             }
//         }
        
//         return self::$pdo;
//     }
// }