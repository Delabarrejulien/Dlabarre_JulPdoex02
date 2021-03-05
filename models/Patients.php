<?php

require_once(dirname(__FILE__).'/../utils/database.php');

class Patient{

    private $_firstname;
    private $_lastname;
    private $_birthdate;
    private $_phone;
    private $_mail;
    private $_pdo;

    /**
     * Méthode magique qui permet d'hydrater notre objet 'patient'
     * 
     * @return boolean
     */
    public function __construct($lastname=NULL, $firstname=NULL, $birthdate=NULL, $phone=NULL, $mail=NULL){
        
        // Hydratation de l'objet contenant la connexion à la BDD
        
        $this->_lastname = $lastname;
        $this->_firstname = $firstname;
        $this->_birthdate = $birthdate;
        $this->_phone = $phone;
        $this->_mail = $mail;

        $this->_pdo = Database::getInstance();
    }

    /**
     * Méthode qui permet de créer un patient
     * 
     * @return boolean
     */
    public function create(){

        try{
            $sql = 'INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`, `phone`, `mail`) 
                    VALUES (:lastname, :firstname, :birthdate, :phone, :mail)';
            $sth = $this->_pdo->prepare($sql);

            $sth->bindValue(':lastname',$this->_lastname,PDO::PARAM_STR);
            $sth->bindValue(':firstname',$this->_firstname,PDO::PARAM_STR);
            $sth->bindValue(':birthdate',$this->_birthdate,PDO::PARAM_STR);
            $sth->bindValue(':phone',$this->_phone,PDO::PARAM_STR);
            $sth->bindValue(':mail',$this->_mail,PDO::PARAM_STR);
            return $sth->execute();
        }
        catch(PDOException $e){
            return $e->getCode();
        }

    }

    /**
     * Méthode qui permet de lister tous les patients existants
     * 
    
     */
    public static function getAll(){
        
        $pdo = Database::getInstance();

        try{
            $sql = 'SELECT * FROM `patients`';
            $stmt = $pdo->query($sql);
            return($stmt->fetchAll());
        }
        catch(PDOException $e){
            return false;
        }

    }

    /**
     * Méthode qui permet de récupérer le profil d'un patient
     * 
     * @return object
     */
    public static function get($id){
        
        $pdo = Database::getInstance();

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

    //==============================================================================================================

    /**
     * Méthode qui permet de modifier un patient
     * 
     * @return boolean
     */
    public function update($id){

        try{
            $sql = 'UPDATE `patients` SET `lastname` = :lastname, `firstname` = :firstname, `birthdate` = :birthdate, `phone` = :phone, `mail` = :mail
                    WHERE `id` = :id';
            $sth = $this->_pdo->prepare($sql);
            $sth->bindValue(':lastname',$this->_lastname,PDO::PARAM_STR);
            $sth->bindValue(':firstname',$this->_firstname,PDO::PARAM_STR);
            $sth->bindValue(':birthdate',$this->_birthdate,PDO::PARAM_STR);
            $sth->bindValue(':phone',$this->_phone,PDO::PARAM_STR);
            $sth->bindValue(':mail',$this->_mail,PDO::PARAM_STR);
            $sth->bindValue(':id',$id,PDO::PARAM_INT);
            return($sth->execute()); 
        }
        catch(PDOException $e){
            return $e->getCode();
        }

    }

    public function deletepatient($id){

        try{
            $sql = 'DELETE FROM `patients`Where id = :id;';

            $stmt = $this->_pdo->prepare($sql);

           
            $stmt->bindValue(':id',$id, PDO::PARAM_INT);

            return $stmt->execute();
        }catch(PDOException $e){
            return false;
        }
    }

  //=============================================================================================  
    
    //recherche de patient

        public static function searchpatient($search){

                $pdo = Database::getInstance();

            try{ 
                $sql= " SELECT * FROM `patients` 
                WHERE `lastname` LIKE  :search OR `firstname` LIKE :search;";
        
                $stmt = $pdo->prepare($sql);

                $stmt->bindValue(':search', '%'.$search.'%', PDO::PARAM_STR);

                $stmt->execute();
                $count =$stmt-> rowcount();

            if($count !=0){
                $listSearch = $stmt->fetchAll();
                return $listSearch;

            }else{
                    return false;
                }

            }catch(PDOException $e){
                
                echo 'erreur de requête: ' . $e->getMessage();
                return false;
           }
        }

//==============================================================================================

       // compte le nombre total de patients

        public static function bodyCountPerPage(){

            $pdo = Database::getInstance();

            try{

        // On détermine le nombre total de patients
            $sql = 'SELECT COUNT(*) AS nb_patient FROM `patients`;';

        // On prépare la requête
            $stmt = $pdo->prepare($sql);
            $stmt -> execute();
           

            return( $stmt->fetch());

           

        }catch(PDOException $e){
                
            echo 'erreur de requête: ' . $e->getMessage();
            return false;
       }
    }

 

//===============================================================

       
     // Méthode qui permet de lister les patients par limite dans une page
    
    public static function getlimit($search='',$offset=0,$limit=2){
        
        $pdo = Database::getInstance();

        try{
            $sql = 'SELECT * FROM  `patients` WHERE `lastname` LIKE :search OR `firstname`LIKE :search ORDER BY `lastname` LIMIT :offset, :limit ;';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':search','%'.$search.'%',PDO::PARAM_STR);
                $stmt->bindValue(':offset', $offset ,PDO::PARAM_INT);
                $stmt->bindValue(':limit', $limit ,PDO::PARAM_INT);
                $stmt->execute();
                return ($stmt->fetchAll());
        
        }
        catch(PDOException $e){
            return false;
        }

    }
}
    