<?php
class Database
{
    private $dbserver= "localhost";
    private $dbuser="root";
    private $dbpassword="";
    private $dbname="phpadvancecrud";
    protected $conn;


    // constructor
    public function __construct(){


        try{
            $dsn="mysql:host={$this->dbserver}; {$this->dbname}; charset=utf8";

// This syntax is not compulsary to be done. But for good practise it is done because it is going to exist for a longer period of time
            $options=array(PDO::ATTR_PERSISTENT);
    
            $this->conn = new PDO($dsn, $this->dbuser, $this->dbpassword, $options);
        }catch(PDOException $e){
            echo "Connection Error".$e->getMessage();
        }
        
    }
}
?>