<?php
define("MASTER_DSN", "mysql:dbname=school_master");
define("MASTER_PASSWORD", "08062390086");
define("MASTER_USER", "root");
class Master_db{
    public static function connect(){
        try{
            $connection = new PDO(MASTER_DSN, MASTER_USER, MASTER_PASSWORD);
            $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $ex) {
            die("failed to reach server");
        }
        
    }
    public static function disconnect($connection){
        $connection = "";
    }
}



?>
