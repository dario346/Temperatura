<?php
class MySQLIDatabase{
    public $MySQLi;
    protected $host, $user, $password, $database;

    public function __construct($host, $user, $password, $database){
       $this->host = $host; 
       $this->user = $user; 
       $this->password = $password; 
       $this->database = $database; 

       $this->connect();
    }

    protected function connect(){
        $this->MySQLi = new MySQLi($this->host, $this->user, $this->password, $this->database);
        if(mysqli_connect_errno()){
            throw new DatabaseException("Failed connecting to database: " . $this->database . "<br>");
        }
    }

    public function sendQuery($query){
        return $this->MySQLi->query($query);
    }

    public function fetchArray($result = null){
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    public static function numberOfRows($result){
        return $result->num_rows;
    }
}