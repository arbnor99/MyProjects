<?php
include ("admin/lib/Course.php");
include ("admin/lib/User.php");
include ("admin/Session.php");
include ("admin/lib/Article.php");

$Courses=new Course;
$Users=new User;
$Session=new Session;
$Articles=new Article;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta name="language" content="English">
  	<meta name="description" content="It is a website about education">
  	<meta name="keywords" content="blog,cms blog">
  	<link rel="stylesheet" href="admin/font-awesome-4.5.0/css/font-awesome.css">	
  	<link rel="stylesheet" href="css/bootstrap.min.css">
  	<link rel="stylesheet" href="css/style.css">
	  <title>Blog</title>
	  
	<style>
		body {
			background-image: url("images/BALLINA.jpg");
			background-repeat:no-repeat;
			background-size: cover;
			opacity:0.92;
		}
	</style>

</head>
<body>
	<!-- START HERE -->
	<br><br>
	
	<nav class="navbar navbar-expand-sm bg-warning navbar-dark fixed-top" style="height:90px;">
		<div class="container" >
		<a href="index.php" class="navbar-brand"><h2>Coding Academy</h2> </a>			
			<div class="navbar-collapse collapse" id="mainNav">
				<ul class="navbar-nav ml-auto">
					<?php if($_SESSION['id']==0): ?>
					<li class="nav-item" style="margin-right: 15px">
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#register">Register</button>
					</li>
					<?php endif; ?>

					<li class="nav-item" style="margin-right: 15px;">
						<?php if($_SESSION['id']==0): ?>
							<a href="login.php"><button type="button" class="btn btn-primary">Log In</button></a>
						<?php endif; ?>
					</li>

					<?php if($_SESSION['id']!=0): ?>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false"><i><?php echo $_SESSION['fullname']; ?></i></a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
							<?php if($_SESSION['role']=='admin'): ?>
							<a class="dropdown-item" href="admin/Aindex.php">Administration</a>
							<?php endif; ?>
							<a class="dropdown-item" href="logout.php">Logout</a>
						</div>
					</li>
					<?php endif; ?>

				</ul>
			</div>
		</div>
	</nav>

	<!-- REGISTER -->
	<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content text-left">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Create Account</h5>
					<button type="button" class="close w-25 h-100" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" class="p-5 mb-5" id="modifiko_te_dhenat">
						<div class="form-group">
							<label for="firstname">First Name</label>
							<input type="text" class="form-control" name="firstname" style="width: 100%" aria-describedby="emailHelpId" placeholder="" >
						</div>
						<div class="form-group">
							<label for="lastname">Last Name</label>
							<input type="text" class="form-control" name="lastname"  style="width: 100%" aria-describedby="emailHelpId" placeholder="" >
						</div>
							<div class="form-group">
							<label for="phone">Phone</label>
							<input type="text" class="form-control" name="phone" style="width: 100%" aria-describedby="emailHelpId" placeholder="" >
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control" name="email" style="width: 100%" aria-describedby="emailHelpId" placeholder="" >
						</div>
						<div class="form-group pb-4">
							<label for="password">Password</label>
							<input type="password" class="form-control" name="password" style="width: 100%" aria-describedby="emailHelpId" placeholder="">
						</div>
						<button class="btn btn-outline-primary btn-block" type="submit" name="register">Register</button>
					</form>
				</div>
			</div>
		</div>
	</div>

            <?php 
            if(isset($_POST['register'])){
            	$firstname=$_POST['firstname'];
            	$lastname=$_POST['lastname'];
            	$phone=$_POST['phone'];
            	$email=$_POST['email'];
            	$password=$_POST['password'];

            	$Users->createUser($firstname, $lastname, $phone, $email, $password);
            }
            ?>




	<!-- SLIDER WITH CAPTIONS -->
	<section class="container mt-5 border-0">
		<section class="row">
			<section class="col-md-12 slider-images border-0">
			<div id="slider" class="carousel slide mt-3  mb-1 border-0" data-ride="carousel">
			<ol class="carousel-indicators">
				<?php for($i=0;$i<$Courses->countCourse()['COUNT(id)'];$i++){
					echo '<li data-target="#slider" data-slide-to="'.$i.'"></li>';
				}?>
			</ol>
				<div class="carousel-inner">

					<?php $i=0; 
					foreach($Courses->getAllCourses() as $course): 
						if($i==0){
							echo '<div class="carousel-item active">'; 
							}else{
								echo '<div class="carousel-item">';
							}
							$i++;
							?>
							<img id="<?php echo $i; ?>" class="img-fluid" src="images/<?php echo $course['image']; ?>" style="width:100%; height:300px; margin-left: 0%;" >
							<div class="carousel-caption">
								<h3><?php echo $course['name']; ?></h3>
							</div>
						</div>
					<?php endforeach;?>
				</div>
				<a href="#slider" class="carousel-control-prev" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
				</a>
				<a href="#slider" class="carousel-control-next" data-slide="next">
					<span class="carousel-control-next-icon"></span>
				</a>
			</div>
			</section>
		</section>
	</section>
    <main class="container">
		<section class="row">
			<section class="col-md-8 bg- posts border-cover">
				
				<?php foreach($Courses->getAllCourses() as $course): ?>
				<article class="media border-bottom border-white my-1">
					<a class="align-self-center" href="#">
						<img class="img-fluid justify-content-center img-post mr-3" 
						src="images/<?php echo $course['image']; ?>" style="width: 250px; height:150px;"/>
					</a>
					<div class="media-body">
						<h4><a href=""><?php echo $course['name']; ?></a></h4>
						<h6>Time: <?php echo $course['time']; ?></h6>
						<p>
							<?php echo $course['description']; ?>						
						</p>
						<?php if($_SESSION['id']==0): ?>
							<a href='apply.php?cid=<?php echo $course['id'];?>' ><button type="button" class="btn btn-success btn-sm w-25">Apply</button></a>
						<?php endif; ?>
					</div>
				</article>
				<?php endforeach;?>
				
			</section>
			<aside class="col-md-4 sidebar">
				<article class="categories ml-1">
				</div>
				<div class="samesidebar clear">
					<h4>
						Latest articles
						<?php if($_SESSION['id']!=0 && ($_SESSION['role']=="admin" || $_SESSION['role']=="member")){
							echo '<a href="add_article.php"><button style="float:right" type="button" class="btn btn-primary">Add new</button></a>';
						}
						?>
					</h4>
					<?php foreach($Articles->getAllArticles() as $article): ?>
					<div class="media border-bottom border-white">
						
						<a class="align-self-center" href="#">
							<img class="img-post-small mr-2" src="images/<?php echo $article['image']; ?>" style="height:80px; width:150px;" alt="post image"/></a>
						<div class="media-body">
							<h5><a href="ArticleView.php?aid=<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a></h5>
							<h6>Autori: <?php echo $Users->getUserById($article['uid'])['firstname']." ".$Users->getUserById($article['uid'])['lastname']; ?> </h6>
						</div>
	
					</div>
					<?php endforeach; ?>
						
				</div>
			</aside>	
		</section>
		
	</main>
	<section class="bg-warning container">
		<footer class="py-3 border-top border-white">	
			<p>&copy; Copyright by Probit Academy Training Center <a href="">Probit Academy</a>.</p>
		</footer>

	</section>
	<script src="admin/js/jquery-3.3.1.slim.min.js"></script>
	<script src="admin/js/popper.min.js"></script>
	<script src="admin/js/bootstrap.min.js"></script>
</body>
</html>