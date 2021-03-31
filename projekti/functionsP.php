<?php
	$con;
	connection();
	session_start();
	
	function connection(){
		global $con;
		$con=mysqli_connect('localhost', 'root', '', 'dbtick');
		if(!$con){
			die("Lidhja deshtoi".mysqli_connect_error());
		}
	}
	
	function merrAnetaret(){
		global $con;
		$sql="SELECT anetariID, emri, mbiemri, email, password, telefoni FROM anetaret";
		$anetaret=mysqli_query($con,$sql);
		return $anetaret;
	}
	
	function merrAnetariID($aid){
		global $con;
		$sql="SELECT anetariID, emri,mbiemri,email,password,telefoni FROM anetaret WHERE anetariID=$aid";
		$result=mysqli_query($con,$sql);
		$anetari=mysqli_fetch_assoc($result);
		return $anetari;
	}
	
	function shtoAnetar($emri,$mbiemri,$email,$password,$telefoni){
		global $con;
		$sql="INSERT INTO anetaret(emri, mbiemri, email, password, telefoni)";
		$sql.="VALUES('$emri', '$mbiemri', '$email', '$password', '$telefoni')";
		$result=mysqli_query($con,$sql);
		
		if($result){
				echo "Anetari u shtua me sukses";
			}else{
				echo "Deshtoi".mysqli_error($con);
			}
	}
	
	function modifikoAnetar($anetariID,$emri,$mbiemri,$email,$password,$telefoni){
			global $con;
			
			$sql="UPDATE anetaret SET emri='$emri', mbiemri='$mbiemri',
			email='$email', password='$password', telefoni='$telefoni' WHERE anetariID=$anetariID";
			$result=mysqli_query($con,$sql);
			
			if($result){
				header("Location: modifikoanetarP.php?aid=$anetariID");
				echo "Anetari u modifikua me sukses";
			}
			else{
				die("Modifikimi deshtoi".mysqli_error($con));
			}
		
	}
	
	function fshijAnetar($anetariID){
			global $con;
			$sql="DELETE FROM anetaret WHERE anetariID=$anetariID";
			$result=mysqli_query($con,$sql);
			
			header("Location: anetaretP.php");
	}
	

	function merrPunet($anetariID=""){
		global $con;
     
		$sql="SELECT p.punaID, a.emri, p.data, p.pershkrimi, a.artikulliID, p.anetariID FROM punet p INNER JOIN artikujt a ON p.artikulliID=a.artikulliID";
		if(!empty($anetariID) && $_SESSION['anetari']['roli']==0){
			$sql.=" WHERE p.anetariID=$anetariID";
		}
		$punet=mysqli_query($con,$sql);
		return $punet;  
	}
	
	function merrPuneId($punaID){
		global $con;
     
		$sql="SELECT p.punaID, a.artikulliID ,a.emri, p.data, p.pershkrimi FROM punet p
		INNER JOIN artikujt a ON p.artikulliID=a.artikulliID WHERE p.punaID=$punaID";
		$punet=mysqli_query($con,$sql);
		$result=mysqli_fetch_assoc($punet);
		return $result;  
	}
	function shtoPune($anetariID,$artikulliID,$pershkrimi,$data){
		global $con;
	
		$sql="INSERT INTO punet(anetariID,artikulliID,pershkrimi,data)";
		$sql.=" VALUES ('$anetariID','$artikulliID', '$pershkrimi','$data')";
		$pune=mysqli_query($con,$sql);
    
		if($pune){
			echo "Puna u shtua me sukses";
		}else{
			die("Deshtoi regjistrimi i punes" . mysqli_error($con));
		}
	}
	
	function modifikoPune($punaID,$emriArtikullit,$pershkrimi,$data){
		global $con;
		
		$sql="UPDATE punet SET  pershkrimi='$pershkrimi', data='$data'  WHERE punaid=$punaID ;";
		$sql.="UPDATE artikujt SET emri= '$emriArtikullit' WHERE artikulliID IN( SELECT artikulliID FROM punet WHERE punaID=$punaID);"; 
		$pune=mysqli_multi_query($con,$sql);
    
		if($pune){
			echo "Puna u modifiku me sukses";
		}else{
			die("Deshtoi modifikimi i punes" . mysqli_error($con));
		}
	}
	function fshijPune($punaID){
		global $con;
		$sql="DELETE FROM punet WHERE punaID=$punaID";
     
		$pune=mysqli_query($con,$sql);
     
		header("Location: artikujtP.php");
	}
	
	function merrArtikujt(){
		global $con;
		
		$sql="SELECT * FROM artikujt";
		$result=mysqli_query($con,$sql);
		return $result;
	}
	
	function merrArtikullID($artikulliID){
		global $con;
		
		$sql="SELECT * FROM artikujt WHERE artikulliID=$artikulliID";
		$result=mysqli_query($con,$sql);
		$artikulli=mysqli_fetch_assoc($result);
		return $artikulli;
	}
	
	function login($email, $password){
		global $con;
		
		$sql="SELECT anetariID, emri, mbiemri, email, roli FROM anetaret WHERE email='$email' AND password='$password'";
		$result=mysqli_query($con, $sql);
		$anetari=array();
		if(mysqli_num_rows($result)==1){
			$anetari_data=mysqli_fetch_assoc($result);
			$anetari['anetariID']=$anetari_data['anetariID'];
			$anetari['emri']=$anetari_data['emri'];
			$anetari['mbiemri']=$anetari_data['mbiemri'];
			$anetari['email']=$anetari_data['email'];
			$anetari['roli']=$anetari_data['roli'];
			$anetari['roli']=$anetari_data['roli'];
			$_SESSION['anetari']=$anetari;
			header("Location: artikujtP.php");
		}
		else{
			echo "Nuk keni qasje ne sistem";
		}
	}
	
	function shtoKoment($anetariID, $artikulliID, $komenti){
		global $con;
		
		$sql="INSERT INTO komentet(anetariID, artikulliID, komenti)";
		$sql.="VALUES($anetariID, $artikulliID, '$komenti')";
		$result=mysqli_query($con, $sql);	
	}
	
	function merrKomentet($artikulliID){
		global $con;
		
		$sql="SELECT * FROM komentet WHERE artikulliID=$artikulliID";
		$result=mysqli_query($con, $sql);
		return $result;
	}
	
	function anetariQeKomentoi($komentiID){
		global $con;
		
		$sql="SELECT an.emri FROM anetaret an INNER JOIN komentet k ON an.anetariID=k.anetariID WHERE k.komentiID=$komentiID";
		$result=mysqli_query($con, $sql);
		$emri=mysqli_fetch_assoc($result);
		return $emri;
	}
	
	function fshijKoment($komentiID){
		global $con;
		
		$sql="DELETE FROM komentet WHERE komentiID=$komentiID";
		$result=mysqli_query($con, $sql);
		
		// header("Location: komentoP.php?pid=$pid");
	}
	
	function regjistrohu($emri,$mbiemri,$datelindja,$email,$password,$telefoni){
		global $con;
		
		$sql="INSERT INTO anetaret(emri, mbiemri, datelindja, email, password, telefoni, roli)";
		$sql.="VALUES($emri,$mbiemri,$datelindja,$email,$password,$telefoni, 0)";
		
		$result=mysqli_query($con, $sql);
		
	}
	
	/*function merrEmailet(){
		global $con;
		
		$sql="SELECT email FROM anetaret";
		$result=mysqli_query($con, $sql);
		return $result;
	}*/
?>