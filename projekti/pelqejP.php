<html>
<head>
	<title></title>
</head>
<body>
	<?php include "headerP.php"; ?>
	
	<?php 
		if(isset($_GET['pid'])){
			like($_GET['pid']);
		}
	?>
	
	
	
	<?php include "footerP.php"; ?>
</body>
</html>