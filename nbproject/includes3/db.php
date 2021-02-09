<?php

    //class for creating and terminating a connection to mysql
  class Db{
      private $dsn;
      public function __construct($dsn) {
          $this->dsn = $dsn ;
      }
    public static function connect(){
        
    try {
        $connection = new PDO($this->dsn,'root','08062390086');
        $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //echo" all good";
        return $connection;
} catch (PDOException $ex) {
        die("Fatal Error").$ex->getMessage();
}
    }
    public static function disconnect($conn){
      $conn = "";  
    }
    }
 
    



?>