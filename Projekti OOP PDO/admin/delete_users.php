<?php
include "lib/User.php";
$Users=new User;

if(isset($_GET['id'])){
	$Users->deleteUser($_GET['id']);
	header("Location: Aindex.php");
}

?>