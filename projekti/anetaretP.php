<html>
<head>
	<title></title>
</head>
<body>

	<?php include "headerP.php"; ?>
		
		<div class="univ"  style="height:300px;">
		<table class="tabela">
			<tr>
				<th>Emri</th>
				<th>Mbiemri</th>
				<th>Email</th>
				<th>Passwordi</th>
				<th>Telefoni</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
				<?php 
				$anetaret=merrAnetaret();
				while($anetari=mysqli_fetch_assoc($anetaret)){
					$aid=$anetari["anetariID"];
					echo "<tr>";
					echo "<td>".$anetari['emri']."</td>";
					echo "<td>".$anetari["mbiemri"]."</td>";
					echo "<td>".$anetari["email"]."</td>";
					echo "<td>".$anetari["password"]."</td>";
					echo "<td>".$anetari["telefoni"]."</td>";
					echo "<td><a href='modifikoanetarP.php?aid={$aid}'>Edit</a></td>";
					echo "<td><a href='fshijanetarP.php?aid={$aid}'>Delete</a></td>";
					echo "</tr>";
				}
				
				?>
		</table>
		
		<form class="forma" action="" style="width:30%; float:left;" method="post">
			<legend>Forma per regjistrim</legend>
			<label for="emri">Emri: </label>
			<input type="text" name="emri">
			<label for="mbiemri">Mbiemri: </label>
			<input type="text" name="mbiemri">
			<label for="email">E-mail: </label>
			<input type="text" name="email">
			<label for="password">Passwordi:</label>
			<input type="password" name="password">
			<label for="telefoni">Telefoni: </label>
			<input type="text" name="telefoni">
			<input type="submit" name="shto" value="Shto Anetar">
		</form>
		
		<?php
		if(isset($_POST["shto"])){
			$emri=$_POST["emri"];
			$mbiemri=$_POST["mbiemri"];
			$email=$_POST["email"];
			$password=$_POST["password"];
			$telefoni=$_POST["telefoni"];
			
			shtoAnetar($emri,$mbiemri,$email,$password,$telefoni);
		}
		?>
		
	</div>
	<?php include "footerP.php"; ?>
	
</div>
</body>
</html>