<?php
    class Database{
        private $dbname;
        
        
        public function __construct($dbname) {
            $this->dbname = $dbname;
        }
        public function getConnection(){
            $dsn = "mysql:dbname=". $this->dbname;
           try{
               $connection = new PDO($dsn,"root","08062390086");
               $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
               return $connection;
           } catch (PDOException $ex) {
               die("failed to create unique connection");
           } 
        }
        public static function connect(){
           $dsn = "mysql:dbname=school_master";
           try{
               $connection = new PDO($dsn,"root","08062390086");
               $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
               return $connection;
           } catch (PDOException $ex) {
               die("failed to create a connection");
           } 
        } 
        }
    
?>