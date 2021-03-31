<?php 
include_once "Database.php";

class Article extends Database{
    public function getAllArticles(){
        $sql="SELECT * FROM articles ORDER BY(id) DESC";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function getArticleById($id){
        $sql="SELECT * FROM articles WHERE id=?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public function createArticle($uid, $title, $content, $image){
        try{
            $sql="INSERT INTO articles(uid, title, content, image) VALUES(?,?,?,?)";
            $stmt=$this->connect()->prepare($sql);
            $stmt->execute([$uid, "$title", "$content", "$image"]);

            echo "Article added successfully";
        }catch(Exception $e){
            echo "Article failed to be added ".$e->getMessage();
        }
    }

    public function deleteArticle($id){
        $sql="DELETE FROM articles WHERE id=?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

}


?>