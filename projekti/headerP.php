<?php
	include "functionsP.php";
?>
<head>
	<link rel="stylesheet" href="styleP.css">
	<link rel="stylesheet" href="styleP2.css">
</head>
<header class="univ header">
	<img src="Images/ticklogo.png">
	<aside id="top">
		<ul>
			<li><a href="">Shqip</a></li>
			<li><a href="">English</a></li>
		</ul>
		<input type="search">
		<ul>
	</aside>
	<nav id="navbar">
		<ul>	
			<li><a href="TICKP.php">ballina</a></li>
			
			<?php if(!empty($_SESSION['anetari']['anetariID'])){ ?>
			<li><a href="artikujtP.php">Artikujt</a></li>
			<?php } if(!empty($_SESSION['anetari']['anetariID']) && $_SESSION['anetari']['roli']==1) {?>
			<li><a href="anetaretP.php">Anetaret</a></li>
			<?php }?>
			<?php if(empty($_SESSION['anetari']['anetariID'])){ ?>
			<li><a href="regjistrohuP.php">Regjistrohu</a></li>
			<?php } ?>
			<li><a href="">kontakti</a></li>
		</ul>
	</nav><br>
	<?php 
	if(empty($_SESSION['anetari']['anetariID'])){
	?>
	<a href="loginP.php"><aside style="position:absolute; right:200px; top:100px;
	width:auto; background-color:lightblue; color:white; border-radius:5px;
	padding:10px;">Log In</aside></a>
	<?php } else{ ?>
		<a href="logoutP.php"><aside style="position:absolute; right:200px; top:100px;
	width:auto; background-color:lightblue; color:white; border-radius:5px;
	padding:10px;"><?php echo $_SESSION['anetari']['emri']." ".$_SESSION['anetari']['mbiemri']." - "; ?>Log Out</aside></a>
	<?php } ?>
	
	
</header>
