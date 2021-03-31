<?php
include ("admin/lib/Like.php");
$Likes=new Like;

include ("admin/Session.php");
$Session=new Session;

if(isset($_GET['aid'])){
    $aid=$_GET['aid'];
    $Likes->unlike($aid, $_SESSION['id']);

    header("Location: ArticleView.php?aid=$aid");
}

?>