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

    //method enregistrer rdv

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

    // method affiche les rdv et les patients

    public static function getAppointments(){
        
        $pdo = Database::getinstance();

        try{
            $sql = 'SELECT  `appointments`.`id` as `idAppointment`, 
                            `appointments`.`idPatients` as `idPatient`, 
                            `patients`.`lastname`, 
                            `patients`.`firstname`, 
                            `appointments`.`dateHour` 
                    FROM `appointments`
                    INNER JOIN `patients` ON `patients`.`id` = `appointments`.`idPatients`;';
                    
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll();
        } catch(PDOException $e){
            return false;
        }
    }

    //method affiche le rdv et le patient  

    public static function getPatientAppointments($id){
        
        $pdo = Database::getinstance();

        try{
            $sql = 'SELECT  `appointments`.`id` as `idAppointment`, 
                            `appointments`.`idPatients` as `idPatient`, 
                            `appointments`.`dateHour`, 
                            `patients`.`lastname`, 
                            `patients`.`firstname`,
                            `patients`.`birthdate`,
                            `patients`.`mail`,
                            `patients`.`phone`
                            
                    FROM `appointments`
                    INNER JOIN `patients` ON `patients`.`id` = `appointments`.`idPatients`
                    WHERE `appointments`.`id`= :id ;';
                     
        
            $stmt = $pdo->prepare($sql);
            $stmt ->bindValue(':id',$id,PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch();

        } catch(PDOException $e){
            return false;
        }
    }

// method qui modifie un rdv pour un patient


    public function update($id){

        try{
            $sql = 'UPDATE `appointments` SET `dateHour` = :dateHour, `idPatients` = :idPatients
                    WHERE `id` = :id';
            $sth = $this->_pdo->prepare($sql);
            $sth->bindValue(':dateHour',$this->_dateHour,PDO::PARAM_STR);
            $sth->bindValue(':idPatients',$this->_idPatients,PDO::PARAM_INT);
            $sth->bindValue(':id',$id,PDO::PARAM_INT);
            return($sth->execute()); 
        }
        catch(PDOException $e){
            return $e->getCode();
        }

    }

    //affiche tout les rdv pour un patient

    public static function getAllAppointmentsByPatient($id){
        
        $pdo = Database::getinstance();

        try{
            $sql = 'SELECT  `appointments`.`id` as `idAppointment`, 
                            `appointments`.`idPatients` as `idPatient`, 
                            `appointments`.`dateHour`, 
                            `patients`.`lastname`, 
                            `patients`.`firstname`,
                            `patients`.`birthdate`,
                            `patients`.`mail`,
                            `patients`.`phone`
                            
                    FROM `appointments`
                    INNER JOIN `patients` ON `patients`.`id` = `appointments`.`idPatients`
                    WHERE `appointments`.`idPatients`= :id ;';
                     
        
            $stmt = $pdo->prepare($sql);
            $stmt ->bindValue(':id',$id,PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetchAll();

        } catch(PDOException $e){
            return false;
        }
     }

      //method effacer rdv

      public function delete($id){

        try{
            $sql = 'DELETE FROM `appointments`Where id = :id;';

            $stmt = $this->_pdo->prepare($sql);

           
            $stmt->bindValue(':id',$id, PDO::PARAM_INT);

            return $stmt->execute();// return true/false
        }catch(PDOException $e){
            return false;
        }
    }

        

    }










?>