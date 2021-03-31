<?php
include_once ("Database.php");

class Like extends Database{

    public function likee($aid, $uid){
        $sql="SELECT * FROM alikes WHERE aid=? AND uid=?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$aid, $uid]);
        $result=$stmt->fetch();
        
        if($result==NULL){
            $sql="INSERT INTO alikes(aid, uid, liked) VALUES(?,?,?)";
            $stmt=$this->connect()->prepare($sql);
            $stmt->execute([$aid, $uid, 1]);
        }else{
            $sql="UPDATE alikes SET liked=? WHERE aid=? AND uid=?";
            $stmt=$this->connect()->prepare($sql);
            $stmt->execute([1, $aid, $uid]);
        } 
    }

    public function unlike($aid, $uid){
        $sql="UPDATE alikes SET liked=? WHERE aid=? AND uid=?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([0, $aid, $uid]);
    }

    public function checkLike($aid, $uid){
        $sql="SELECT liked FROM alikes WHERE aid=? AND uid=?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$aid, $uid]);
        $result=$stmt->fetch();

        if($result['liked']==NULL){
            return false;
        }else{
            if($result['liked']==0){
                return false;
            }else{
                return true;
            }
        }
    }

    public function countlikes($aid){
        $sql="SELECT COUNT(aid) FROM alikes WHERE liked=? AND aid=?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([1, $aid]);

        return $stmt->fetch();
    }

}

?>