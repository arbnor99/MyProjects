 <html>
<head>
	<title></title>
</head>
<body>
	<?php include "headerP.php"; ?>
	
	<?php
	
		if(isset($_GET["aid"])){
			fshijAnetar($_GET["aid"]);
		}
	?>
	
	<?php include "footerP.php"; ?>
</body>
</html>