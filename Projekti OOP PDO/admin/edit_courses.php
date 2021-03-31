<?php
include "lib/Course.php";
include_once("inc/header.php");
$Courses=new Course();

if(isset($_POST['modify'])){
	$name=$_POST['name'];
	$description=$_POST['description'];
	$time=$_POST['time'];

	$Courses->updateCourse($_GET['id'], $name, $description, $time);
}
?>

<?php
if(isset($_GET['id'])){
	$course=$Courses->getCourseById($_GET['id']);
}
?>

<head>
	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta name="language" content="English">
  	<meta name="description" content="It is a website about education">
  	<meta name="keywords" content="blog,cms blog">
  	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
  	<link rel="stylesheet" href="../css/bootstrap.min.css">
  	<link rel="stylesheet" href="../css/style.css">
  	<title>Blog</title>
</head>

<section id="contact" class="py-5 h-100 bg-light" >
        <div class="container text-center">
            <h1 class="display-4 pb-1 border-bottom w-25 mx-auto pt-5">Edit Course</h1>
            <div class="row mx-auto">
                <div class="col-sm-12 col-md-6 col-lg-6 mx-auto">
                    <form class="p-5  my-5 bg-white" method="post">
                        <div class="form-group text-left">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $course['name']; ?>">
                        </div>
                        <div class="form-group text-left">
                            <label for="name">Description</label>
                            <input type="text" name="description" class="form-control" value="<?php echo $course['description']; ?>">
                        </div>
                        <div class="form-group text-left">
                            <label for="name">Time</label>
                            <input type="text" name="time" class="form-control" value="<?php echo $course['time']; ?>">
                        </div>
                        <button type="submit" class="btn btn-block btn-outline-secondary mt-5" name="modify">Edit</button>
                        
                    </form>
                </div>
            </div>
        </div>
</section>


<?php include_once("inc/footer.php");?>