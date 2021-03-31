<?php
include_once("Database.php");

class Student extends Database{

public function addStudent($cid, $firstname, $lastname, $phone, $email, $password){
	try{
		$sql="INSERT INTO students(cid, firstname, lastname, phone, email, password) VALUES(?,?,?,?,?,?)";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$cid, "$firstname", "$lastname", "$phone", "$email", "$password"]);

		echo "Student added successfully";
	}catch(Exception $e){
		echo "Student adding failed ".$e->getMessage();
	}
}

public function getAllStudents(){
	$sql="SELECT * FROM students";
	$stmt=$this->connect()->prepare($sql);
	$stmt->execute();

	return $stmt->fetchAll();
}

public function getStudentById($id){
	$sql="SELECT * FROM students WHERE id=?";
	$stmt=$this->connect()->prepare($sql);
	$stmt->execute([$id]);

	return $stmt->fetch();
}

public function updateStudent($id, $firstname, $lastname, $phone, $email){
	try{
		$sql="UPDATE students SET firstname=?, lastname=?, phone=?, email=?";
		$sql.=" WHERE id=?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute(["$firstname", "$lastname", "$phone", "$email", $id]);

		echo "Student update successfully";
	}catch(Exception $e){
		echo "Student updating failure ".$e->getMessage();
	}
}

public function deleteStudent($id){
	try{	
		$sql="DELETE FROM students WHERE id=?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$id]);

		echo "Student deleted successfully";
	}catch(Exception $e){
		echo "Student deletion failure ".$e->getMessage();
	}
}

}

?>