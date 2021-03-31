<?php
include_once("inc/header.php");
include "lib/User.php";
$Users=new User;
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
            <h1 class="display-4 pb-1 border-bottom w-25 mx-auto pt-5">Create User</h1>
            <div class="row mx-auto">
                <div class="col-sm-12 col-md-6 col-lg-6 mx-auto">
                    <form class="p-5  my-5 bg-white" method="post">
                        <div class="form-group text-left">
                            <label for="name">First name</label>
                            <input type="text" name="firstname" class="form-control">
                        </div>
                        <div class="form-group text-left">
                            <label for="name">Last name</label>
                            <input type="text" name="lastname" class="form-control">
                        </div>
                        <div class="form-group text-left">
                            <label for="name">Phone</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
 						<div class="form-group text-left">
                            <label for="name">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-block btn-outline-secondary mt-5" name="register">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php
/*if(isset($_POST['register'])){
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];

	$Users->*/


?>



<?php include_once("inc/footer.php");?>