<html>
<head>
	<title></title>
</head>
<body>
	<?php include "headerP.php"; ?>
	
	<div class="univ" style="height:250px;">
	<form class="forma" action="" method="post">
		<label for="anetariID">Emri i artikullit</label>
		<select name="artikulliID">
			<?php
				$result=merrArtikujt();
				while($artikulli=mysqli_fetch_assoc($result)){
					$aID=$artikulli['artikulliID'];
					$emri=$artikulli['emri'];
					echo "<option value='{$aID}'>$emri</option>";
				}
				
			?>
		</select>
		
		<label for="pershkrimi">Pershkrimi</label>
		<input type="text" name="pershkrimi">
		<label for="data">Data</label>
		<input type="date" name="data">
		<input type="submit" name="shto" value="Shto pune">
	</form>
	
	<?php
	if(isset($_POST['shto'])){
		shtoPune($_SESSION['anetari']['anetariID'] ,$_POST['artikulliID'],$_POST["pershkrimi"],$_POST["data"]);
	}
	?>
	</div>
	
	<?php include "footerP.php"; ?>
</body>
</html>