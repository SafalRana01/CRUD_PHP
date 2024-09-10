<?php
    require_once 'Database.php';
    
    // Creating a class name user that is going to extends all the properties and fucntion from database class
    class User extends Database{

        protected $tableName = "users";


        // function to add users

        public function add($data){

            // If the fill data is not empty i have created a $fields variable with $placeholder and [] array that will help to stored my inital data
            if(!empty($data)){
                $fields=$placeholder=[];
                // all the initals data that have been entered is stored in array to excess all the enterd value from array i have use for each loop. I have passed
                // $data from above parameter that will cahnged to $field where that is equal to value variable
                foreach($data as $field =>$value){
                    // fields help tp store the content of the database table(i.e id, name, email, phone, image)
                    $fields[]=$field;
                    // placeholder variable helps to store the value that have been entered
                    $placeholder[]=":{$field}";
                }
            }

            // you have two method one is this and another is above one.
            // $sql= "INSERT INTO {$this->tableName} (pname,email,phone) VALUES (:pname,:email,:phone)";
// implode method helps to seprate the value with comma(,)
            $sql= "INSERT INTO {$this->tableName} (". implode(',',$fields).") VALUES (". implode(',',$placeholder).")";


            // we have to use this steps and use of prepare method to avoid sql injection
            $stmt=$this->conn->prepare($sql);


            try{
                // beginTransaction function help to check if the value inserted or not then if it is inserted properly then only executed function will work 
                $this->conn->beginTransaction();
                $stmt->execute($data);
                $lastInsertedId=$this->conn->lastInsertId();
                // whatever changes will happen in database that will be commit with help of commit function
                $this->conn->commit();
                return $lastInsertedId;

            }catch(PDOException $e){
                echo "Error:".$e->getMessage();
                // rollback is used because whatever transcation if that is failed this should be rollback. This shouldn't change anything in database.
                // Rollback will not change anything in database and will execute the previous data
                $this->conn->rollback();

            }


        }



        // function to get rows
        public function getRows($start=0, $limit=10){
            $sql="SELECT * FROM {$this->tableName} ORDER BY DESC LIMIT {$start},{$limit}";

            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            // if my rowCount is greater than 0(i.e if i have more than 0 data in my database it will help me to fetch all the data from database with the help to fetchall function)
            if($stmt->rowCount()>0){
                $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $results=[];
            }
            return $results;
        }

        // function to get single row
        public function getRow($field, $value){
            $sql="SELECT * FROM {$this->tableName} WHERE 
            {$field}=:value";

            $stmt=$this->conn->prepare($sql);
            $stmt->execute([':value' => $value]);
            

            if($stmt->rowCount()>0){
                $result=$stmt->fetch(PDO::FETCH_ASSOC);
            }else{
                $result=[];
            }
            return $result;

        }
        

        // function to count number of rows

        public function getCount(){
            $sql="SELECT count(*) as pcount FROM 
            {$this->tableName}";

            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result['pcount'];

        }


        // function to upload photo

        public function uploadPhoto($file){
            if(!empty($file)){
                $fileTempPath=$file['tmp_name'];
                $fileName=$file['name'];
                $fileType=$file['type'];
                $fileNameCmps=explode('.',$fileName);
                $fileExtension=strtolower(end($fileNameCmps));
                $newFileName=md5(time().$fileName) . '.'.
                $fileExtension;
                $allowedExtn=["png","jpg","jpeg"];

                if(in_array($fileExtension,$allowedExtn)){
                    $uploadFileDir=getcwd().'/uploads/';
                    // Create the directory if it doesn't exist
                    if (!is_dir($uploadFileDir)) {
                        mkdir($uploadFileDir, 0777, true);
                    }
                    $destFiLePath=$uploadFileDir . $newFileName;

                    if(move_uploaded_file($fileTempPath, $destFiLePath)){
                        return $newFileName;
                    } else {
                        echo "Error: File upload failed.";
                    }
                }
            }

        }



        // function to update

        // function to delete


        // function for search user

    } 

?>