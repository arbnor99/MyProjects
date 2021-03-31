<?php
include_once("admin/Session.php");

$Session = new Session;

$Session->logout();
header("Location: index.php");
?>