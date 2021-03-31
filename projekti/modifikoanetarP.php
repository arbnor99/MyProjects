<html>
<head>
	<title></title>
</head>
<body>
	<?php include "headerP.php"; ?>
	<div class="univ" style="height:300px;">
	
	<?php
	
	if(isset($_GET["aid"])){
		$anetari=merrAnetariID($_GET["aid"]);
		
		$anetariID=$anetari["anetariID"];
		$emri=$anetari["emri"];
		$mbiemri=$anetari["mbiemri"];
		$email=$anetari["email"];
		$password=$anetari["password"];
		$telefoni=$anetari["telefoni"];
	
	}
	
	?>
	
	<?php
		if(isset($_POST["mod"])){
			modifikoAnetar($anetariID,$_POST["emri"],$_POST["mbiemri"],$_POST["email"],$_POST["password"],$_POST["telefoni"]);
		}
	?>	
	
	
	<form class="forma" "action="" method="post">
			<legend>Anetari</legend>
			<label for="emri">Emri: </label>
			<input type="text" name="emri" value="<?php echo "$emri"; ?>">
			<label for="mbiemri">Mbiemri: </label>
			<input type="text" name="mbiemri" value="<?php echo"$mbiemri"; ?>">
			<label for="email">E-mail: </label>
			<input type="text" name="email" value="<?php echo"$email";?>">
			<label for="password">Passwordi:</label>
			<input type="password" name="password" value="<?php echo"$password";?>">
			<label for="telefoni">Telefoni: </label>
			<input type="text" name="telefoni" value="<?php echo"$telefoni";?>">
			<input type="submit" name="mod" value="Modifiko Anetar">
		</form>
		
	</div>
		
	<?php include "footerP.php"; ?>
</body>
</html>