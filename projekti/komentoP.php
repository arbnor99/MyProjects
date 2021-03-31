<html>
<head>
	<title></title>
</head>
<body>
<?php include "headerP.php"; ?>
<div class="univ" >
	
	<?php
		if(isset($_GET['pid'])){
			echo "<h1> PID:".$_GET['pid']."</h1>";
			$punaID=$_GET['pid'];
			$pune=merrPuneID($punaID);
			$artikulliID=$pune['artikulliID'];
			$artikulli=merrArtikullID($artikulliID);
			$emriiartikullit=$artikulli['emri'];
		}
		
		if(isset($_POST['komento'])){
			
			$komenti=$_POST['komenti'];
			$anetariID=$_SESSION['anetari']['anetariID'];
			shtoKoment($anetariID, $artikulliID, $komenti);
		}
	?>
	
	
	<form class="forma" method="post" action="">
		<label for="emri">Emri i artikullit:</label> 
		<input type="text" name="emri" value="<?php echo $emriiartikullit; ?>" readonly>
		<label for="komenti">Komenti juaj:</label> 
		<input type="text" name="komenti">
		<input type="submit" name="komento" value="Comment">
	</form>
	
	<table>
		<tr>
			<th>Komentoi</th>
			<th>Komentet per <?php echo $emriiartikullit; ?></th>
			<th>Fshij</th>
		</tr>
		<?php 
		$result=merrKomentet($artikulliID);
		while($komentet=mysqli_fetch_assoc($result)){
			$komentiID=$komentet['komentiID'];
			$anetariQK=anetariQeKomentoi($komentiID);
			echo "<tr>";
			echo "<td>".$anetariQK['emri']."</td>";
			echo "<td>".$komentet['komenti']."</td>";
			echo "<td><a href='fshijkomentP.php?kid=$komentiID'>Fshije komentin</a> </td>";
			echo "</tr>";
		}
		?>
	</table>
</body>
</div>
<?php include "footerP.php"; ?>
</html>