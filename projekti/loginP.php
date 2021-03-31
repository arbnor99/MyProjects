<html>
<head>
	<title></title>
</head>
<body>
	<?php include "headerP.php"; ?>
	
	<div class="univ" style="height:200px;">
	<?php 
		if(isset($_POST['login'])){
			login($_POST['email'],$_POST['password']);
		}
	?>
	
	<form class="forma" action="" method="post">
        <legend>Forma per Login</legend>
        <label for="email">Email: </label>
		<input type="email" name="email">
        <label for="password">Password: </label>
        <input type="password" name="password">
        <input type="submit" name="login" value="login">
    </form>
	</div>
	
	<?php include "footerP.php"; ?>
</body>
</html>