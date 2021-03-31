<?php
include "lib/Course.php";
$Courses= new Course;

if(isset($_GET['id'])){
	$Courses->deleteCourse($_GET['id']);
	header("Location: Aindex.php");
}

?>