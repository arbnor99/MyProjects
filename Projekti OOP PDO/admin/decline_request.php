<?php
include "lib/Request.php";
$Requests=new Request;

if(isset($_GET['id'])){
    $id=$_GET['id'];

    $Requests->deleteRequest($id);

    header("Location: requests.php");
}


?>