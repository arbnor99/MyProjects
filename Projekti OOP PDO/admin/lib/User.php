<?php
include_once("Database.php");
class User extends Database{

public function createUser($firstname, $lastname, $phone, $email, $password){
	try{	
		// $hash=password_hash($password, PASSWORD_DEFAULT);
		$sql="INSERT INTO users(firstname, lastname, phone, email, password) VALUES(?,?,?,?,?)";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute(["$firstname","$lastname","$phone", "$email",$password]);

		echo "User created successfully";
	}catch(Exception $e){
		echo "User creation error ".$e->getMessage();
	}
}

public function getAllUsers(){
	$sql="SELECT * FROM users";
	$stmt=$this->connect()->prepare($sql);
	$stmt->execute();

	return $stmt->fetchAll();
}

public function getUserById($id){
	$sql="SELECT * FROM users WHERE id=?";
	$stmt=$this->connect()->prepare($sql);
	$stmt->execute([$id]);

	return $stmt->fetch();
}

public function updateUser($id, $firstname, $lastname, $phone, $email/*, $password*/){
	try{
		//$hash=$password_hash($password, PASSWORD_DEFAULT);
		$sql="UPDATE users SET firstname=?, lastname=?, phone=?, email=?/*, password=?*/ WHERE id=?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute(["$firstname", "$lastname","$phone", "$email", /*$hash,*/ $id]);

		echo "User modified successfully";
	}catch(Exception $e){
		echo "User modification error ".$e->getMessage();
	}

}

public function deleteUser($id){
	try{
		$sql="DELETE FROM users WHERE id=?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$id]);

		header("Location: users.php");
	}catch(Exception $e){
		echo "User deletion error ".$e->getMessage();
	}
}

public function checkUser($email, $password){
	$sql="SELECT * FROM users WHERE email=? && password=?";
	$stmt=$this->connect()->prepare($sql);
	$stmt->execute(["$email", $password]);

	return $stmt->fetch();

	// $sql="SELECT * FROM users WHERE email=?";
	// $stmt=$this->connect()->prepare($sql);
	// $stmt->execute(["$email"]);

	// $row=$stmt->fetch(PDO::FETCH_ASSOC);
	
	// if(is_array($row)){
	// 	if(password_verify($password, $row['password'])){
	// 		return $row;
	// 	}else{
	// 		echo '<script>alert("Email or password are not correct!");</script>';
	// 	}
	// }
}

}

?>