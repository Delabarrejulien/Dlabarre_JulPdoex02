<?php
require_once(dirname(__FILE__).'/../utils/database.php');

class Appointment{

    
    private $_dateHour;
    private $_idPatients;
    


    private $_pdo;


    
    public function __construct($dateHour = NULL, $idPatients = NULL) {

        $this->_dateHour = $dateHour;
        $this->_idPatients = $idPatients;

        $this->_pdo = database::connect();
    }


public function addappointement($id){
    try{

        $sql = "INSERT INTO `appointments`(`dateHour`, `idPatients`)
                VALUES ('$this->_dateHour', '$this->_idPatients')";
    
        $sth = $this->_pdo->prepare($sql);

        $sth->bindValue(':_dateHour',$this->_dateHour,PDO::PARAM_STR);
            $sth->bindValue(':idPatients',$this->_idPatients,PDO::PARAM_INT);
            
            return $sth->execute();

    }
    catch(PDOException $e){
        return $e->getMessage();
    }
}



public function listAppointement(){
        
    try{
        $sql = 'SELECT * FROM `appointments`;';  
        $sth = $this->_pdo->query($sql);

        $appointedList = $sth -> fetchAll();

        return $appointedList;
    } catch(PDOException $e){
        echo 'echec : ' . $e->getMessage();
    }
}
}

?>