<?php

// use PDO;
// use PDOException;

class DBConnector{
    private $SERVER="localhost";
    private $USER="root";
    private $PASSWORD="";
    private $DB="parkingscout";

    function getConnection(){
        try{
            $con = new PDO("mysql:host=$this->SERVER;dbname=$this->DB", $this->USER, $this->PASSWORD);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        }catch(PDOException $ex){
            return $ex->getMessage();
        }
        

    }
}

// $db=new DBConnector();
// $db->getConnection();
?>