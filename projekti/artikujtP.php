 <html>
<head>
	<title></title>
</head>
<body>
	
	<?php include "headerP.php";?>
<div class="univ" style="height:380px;">
	<table class="tabela">
	<tr>
		<th>Emri</th>
		<th>Pershkrimi</th>
		<th>Data</th>
		<th>Edit</th>
		<th>Delete</th>
		<th>Coment</th>
	</tr>
	
	<?php
		$punet=merrPunet();
		while($puna=mysqli_fetch_assoc($punet)){
			$pid=$puna['punaID'];
			$aid=$puna['anetariID'];
			
			echo "<tr>";
			echo "<td>".$puna['emri']."</td>";
			echo "<td>".$puna['pershkrimi']."</td>";
			echo "<td>".$puna['data']."</td>";
				if($_SESSION['anetari']['anetariID']==$aid || $_SESSION['anetari']['anetariID']==1){
				echo "<td><a href='modifikopuneP.php?pid={$pid}'>Edit</a></td>";
				}else {echo "<td></td>";}
				
				if($_SESSION['anetari']['anetariID']==$aid || $_SESSION['anetari']['anetariID']==1){
				echo "<td><a href='fshijpuneP.php?pid={$pid}'>Delete</a></td>";
				}else {echo "<td></td>";}
				
			echo "<td><a href='komentoP.php?pid={$pid}'>Comment</a></td>";
				
			echo "</tr>";		
			}
	?>
	
	<tr >
		<td colspan="5" style="background-color:white;"></td><td class="shto"><a href="shtopuneP.php">Shto pune</a></td>
	</tr>
	</table>
</div>

	<?php include "footerP.php"; ?>
	

</body>
</html>
 <?php
               