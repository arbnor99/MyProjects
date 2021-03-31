<?php
include "lib/Student.php";
$Students=new Student;

if(isset($_GET['id'])){
	$Students->deleteStudent($_GET['id']);
	header("Location: Aindex.php");
}

?>