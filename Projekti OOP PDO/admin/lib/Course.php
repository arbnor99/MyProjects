<?php
include_once("Database.php");

class Course extends Database{

public function createCourse($name, $description, $time, $image){
	try{
		$sql="INSERT INTO courses(name, description, time, image) VALUES(?,?,?,?)";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute(["$name", "$description", "$time", "$image"]);

		echo "Course added successfully";
	}catch(Exception $e){
		echo "Course adding failed ".$e->getMessage();
	}
}

public function getAllCourses(){
	$sql="SELECT * FROM courses";
	$stmt=$this->connect()->prepare($sql);
	$stmt->execute();

	return $stmt->fetchAll();
}

public function getCourseById($id){
	$sql="SELECT * FROM courses WHERE id=?";
	$stmt=$this->connect()->prepare($sql);
	$stmt->execute([$id]);

	return $stmt->fetch();
}

public function updateCourse($id, $name, $description, $time){
	try{
		$sql="UPDATE courses SET name=?, description=?, time=? WHERE id=?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute(["$name", "$description", "$time", $id]);

		echo "Course updated successfully";
	}catch(Exception $e){
		echo "Course updating failure ".$e->getMessage();
	}
}

public function deleteCourse($id){
	try{	
		$sql="DELETE FROM courses WHERE id=?";
		$stmt=$this->connect()->prepare($sql);
		$stmt->execute([$id]);

		echo "Course deleted successfully";
	}catch(Exception $e){
		echo "Course deletion failure ".$e->getMessage();
	}
}

public function countCourse(){
	$sql="SELECT COUNT(id) from courses";
	$stmt=$this->connect()->prepare($sql);
	$stmt->execute();

	return $stmt->fetch();
}

}

?>