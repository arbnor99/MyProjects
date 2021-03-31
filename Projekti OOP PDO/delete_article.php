<?php
include ("admin/lib/Article.php");
$Articles=new Article;

if(isset($_GET['aid'])){
    $Articles->deleteArticle($_GET['aid']);

    header("Location: index.php");
}
?>