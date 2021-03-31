<html>
<head>
	<title></title>
</head>
<body>
	<div class="univ" style="height:400px;">
	
	<?php include "headerP.php"; ?>
	
	<?php
		if(isset($_POST['regjistrohu'])){
		$emri=$_POST['emri'];
		$mbiemri=$_POST['mbiemri'];
		$datelindja=$_POST['datelindja'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$telefoni=$_POST['telefoni'];
		
		/*$result=merrEmailet();
		while($emailat=mysqli_fetch_assoc($result)){
			if $email=
		}*/
		
			regjistrohu($emri,$mbiemri,$datelindja,$email,$password,$telefoni);
		}
	?>
	
	
	<form class="forma" action="" method="post">
        <legend>Forma per Login</legend>
		<label for="emri">Emri: </label>
		<input type="text" name="emri">
		<label for="mbiemri">Mbiemri: </label>
		<input type="text" name="emri">
        <label for="email">Email: </label>
		<input type="email" name="email">
        <label for="password">Password: </label>
        <input type="password" name="password">
        <input type="submit" name="regjistrohu" value="Regjistrohu">
    </form>
	
	</div>
	
</body>
<?php include "footerP.php"; ?>
</html>