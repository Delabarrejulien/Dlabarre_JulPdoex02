<?php
require_once(dirname(__FILE__).'/../utils/database.php');

class Appointment{

    private $_idPatients;
    private $_dateHour;
    private $_pdo;

    public function __construct($dateHour=NULL, $idPatients=NULL){ // Méthode magique appellée automatiquement lors de l'instanciation de la classe (new Appointment)
        $this->_dateHour = $dateHour;
        $this->_idPatients = $idPatients;
        $this->_pdo = Database::getinstance();
    }

    public function save(){

        try{
            $sql = 'INSERT INTO `appointments` (`dateHour`, `idPatients`) 
                    VALUES (:dateHour, :idPatients);';
            $stmt = $this->_pdo->prepare($sql);

            $stmt->bindValue(':dateHour', $this->_dateHour, PDO::PARAM_STR);
            $stmt->bindValue(':idPatients', $this->_idPatients, PDO::PARAM_INT);

            return $stmt->execute();
        }catch(PDOException $e){
            return false;
        }

    }

    public static function getAppointments(){
        
        $pdo = Database::getinstance();

        try{
            $sql = 'SELECT  `appointments`.`id` as `idAppointment`, 
                            `appointments`.`idPatients` as `idPatient`, 
                            `patients`.`lastname`, 
                            `patients`.`firstname`, 
                            `appointments`.`dateHour` 
                    FROM `appointments`
                    INNER JOIN `patients` ON `patients`.`id` = `appointments`.`idPatients`
            ;';
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll();
        } catch(PDOException $e){
            return false;
        }
    }

    public static function getPatientAppointments(){
        
        $pdo = Database::getinstance();

        try{
            $sql = 'SELECT  `appointments`.`id` as `idAppointment`, 
                            `appointments`.`idPatients` as `idPatient`, 
                            `appointments`.`dateHour` 
                            `patients`.`lastname`, 
                            `patients`.`firstname`,
                            `patients`.`birthdate`,
                            `patients`.`mail`,
                            `patients`.`phone`,
                            
                    FROM `appointments`
                    INNER JOIN `patients` ON `patients`.`id` = `appointments`.`idPatients`
            ;';
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll();
        } catch(PDOException $e){
            return false;
        }
    }




}

?>