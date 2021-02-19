<?php
require_once(dirname(__FILE__).'/../utils/database.php');

class Patient{

    
    private $_lastname;
    private $_firstname;
    private $_birthdate;
    private $_mail;
    private $_phone;


    private $_pdo;


    
    public function __construct($lastname = NULL, $firstname = NULL, $birthdate = NULL, $mail = NULL, $phone = NULL) {

        $this->_lastname = $lastname;
        $this->_firstname = $firstname;
        $this->_birthdate = $birthdate;
        $this->_mail = $mail;
        $this->_phone = $phone;
        $this->_pdo = database::connect();
    }

    public function addPatient(){
    try{

        $sql = "INSERT INTO `patients`(`lastname`, `firstname`, `birthdate`, `mail`, `phone`)
                VALUES ('$this->_lastname', '$this->_firstname', '$this->_birthdate', '$this->_mail', '$this->_phone')";
    
        $sth = $this->_pdo->prepare($sql);

        $sth->bindValue(':lastname',$this->_lastname,PDO::PARAM_STR);
            $sth->bindValue(':firstname',$this->_firstname,PDO::PARAM_STR);
            $sth->bindValue(':birthdate',$this->_birthdate,PDO::PARAM_STR);
            $sth->bindValue(':phone',$this->_phone,PDO::PARAM_STR);
            $sth->bindValue(':mail',$this->_mail,PDO::PARAM_STR);
            return $sth->execute();

    }
    catch(PDOException $e){
        return $e->getMessage();
    }
    }

    public static function getAll(){
        
        $pdo = Database::connect();

        try{
            $sql = 'SELECT * FROM `patients`';
            $sth = $pdo->query($sql);
            return($sth->fetchAll());
        }
        catch(PDOException $e){
            return false;
        }

    }

    public static function get($id){
        
        $pdo = Database::connect();

        try{
            $sql = 'SELECT * FROM `patients` WHERE `id` = :id';
            $sth = $pdo->prepare($sql);

            $sth->bindValue(':id',$id,PDO::PARAM_INT);
            $sth->execute();
            return($sth->fetch());
        }
        catch(PDOException $e){
            return false;
        }

    }

    



    public function listPatient(){
        
        try{
            $sql = 'SELECT * FROM `patients`;';  
            $sth = $this->_pdo->query($sql);

            $listPatients = $sth -> fetchAll();

            return $listPatients;
        } catch(PDOException $e){
            echo 'echec : ' . $e->getMessage();
        }
    }

    public function profilPatient($id){
        
        try{
            $sql = "SELECT * FROM `patients` WHERE `id` = :id";

            $stmt = $this->_pdo->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $profil = $stmt->fetch(PDO::FETCH_OBJ);

            return $profil;
        }catch(PDOException $e){
            echo 'echec : ' . $e->getMessage();
            return false;
        }

}


public function updatepatient($id){
        
    try{
        $sql = 'UPDATE `patients` 

        SET `latsname` = :latsname,
            `firstname` = :firstname,
            `birthdate` = :birthdate,
            `phone` = :phone,
            `mail` = :mail,
        WHERE `id` = :id';
 
        $sth = $this->_pdo->prepare($sql);

        
        $sth->bindValue(':lastname', $this-> _lastname, PDO::PARAM_STR);
        $sth->bindValue(':firstname', $this-> _firstname, PDO::PARAM_STR);
        $sth->bindValue(':birthdate', $this-> _birthdate, PDO::PARAM_STR);
        $sth->bindValue(':phone', $this-> _phone, PDO::PARAM_STR);
        $sth->bindValue(':mail',$this->_mail,PDO::PARAM_STR);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        
        return($sth->execute());

    }
    catch(PDOException $e){
        return $e->getMessage();
    }
        
    }
}



     

    ?>