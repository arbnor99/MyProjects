<?php
include_once ("Database.php");

class Request extends Database{
    
    public function addRequest($firstname, $lastname, $cid, $phone, $email, $password){
        try{    
            $sql="INSERT INTO requests(firstname, lastname, cid, phone, email, password) VALUES(?,?,?,?,?,?)";
            $stmt=$this->connect()->prepare($sql);
            $stmt->execute(["$firstname", "$lastname", $cid, "$phone", "$email", "$password"]);

            echo "Request added successfully.";
        }catch(Exception $e){
            echo "Request error: ".$e->getMessage();
        }
    }

    public function countRequests(){
        $sql="SELECT COUNT(*) AS nr_req FROM requests";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function getAllRequests(){
        $sql="SELECT * FROM requests";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getRequestById($id){
        $sql="SELECT * FROM requests WHERE id=?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public function deleteRequest($id){
        $sql="DELETE FROM requests WHERE id=?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

}

?>