<?php
    require_once 'Database.php';
    
    class User extends Database{
        protected $tableName = "users";


        // function to add users

        public function add($data){

            if(!empty($data)){
                $fields=$placeholder=[];
                foreach($data as $field =>$value){
                    $fields[]=$field;
                    $placeholder[]=":{field}";
                }
            }

            // you have two method one is this and another is above one.
            // $sql= "INSERT INTO {$this->tableName} (pname,email,phone) VALUES (:pname,:email,:phone)";

            $sql= "INSERT INTO {$this->tableName} (". implode(',',$$fields).") VALUES (". implode(',',$fields).")";

            $stmt=$this->conn->prepare($sql);


            try{
                $this->conn->beginTransaction();
                $stmt->execute($data);
                $lastInsertedId=$this->conn->lastInsertId();
                $this->conn->commit();
                return $lastInsertedId;

            }catch(PDOException $e){
                echo "Error:".$e->getMessage();
                this->conn->rollback();
            }


        }



        // function to get rows
        public function getRows($start=0, $limit=10){
            $sql="SELECT * FROM {$this->tableName} ORDER BY DESC LIMIT {$start},{$limit}";

            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount()>0){
                $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $result=[];
            }
            return $result;
        }

        // function to get single row

        
        // function to count number of rows

        // function to upload photo

        // function to delete


        // function for search

    } 

?>