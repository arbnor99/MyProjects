<?php
include "lib/Request.php";
$Requests=new Request;

include "lib/Student.php";
$Students=new Student;

if(isset($_GET['id'])){
    $id=$_GET['id'];
    
    $requester=$Requests->getRequestById($id);
    
    $cid=$requester['cid'];
    $firstname=$requester['firstname'];
    $lastname=$requester['lastname'];
    $phone=$requester['phone'];
    $email=$requester['email'];
    $password=$requester['password'];

    $Students->addStudent($cid, $firstname, $lastname, $phone, $email, $password);
    $Requests->deleteRequest($id);

    header("Location: requests.php");
}

?>