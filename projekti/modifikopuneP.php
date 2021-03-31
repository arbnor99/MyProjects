 <html>
<head>
	<title></title>
</head>
<body>
	<?php include "headerP.php"; ?>
	
	<div class="univ" style="height:300px;">
	
	<?php
		if(isset($_GET['pid'])){
			$punaID=$_GET['pid'];
			$puna=merrPuneID($punaID);
			$emri=$puna['emri'];
			$pershkrimi=$puna['pershkrimi'];
			$data=$puna['data'];
		}
	?>
	<?php
		if(isset($_POST['mod'])){
			modifikoPune($punaID,$_POST['emri'],$_POST['pershkrimi'],$_POST['data']);
		}
	?>
	
	<form class="forma" method="post" action="" id="login">
		<legend>Punet</legend>
		<input type="hidden" name="punaID" value="<?php echo $anetariID; ?>">
		
		<label for="emri">Emri i artikullit</label>
		<input type="text" name="emri" value="<?php echo $emri; ?>">
		<label for="pershkrimi">Pershkrimi</label>
		<input type="text" name="pershkrimi" value="<?php echo $pershkrimi; ?>">
		<label for="data">Data</label>
		<input type="date" name="data" value="<?php echo $data; ?>">
		<input type="submit" name="mod" value="Modifiko punen">
	</form>
	</div>
	
	<?php include "footerP.php"; ?>
</body>
</html>