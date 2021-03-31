<?php
include ("admin/lib/Course.php");
include ("admin/lib/User.php");
include ("admin/Session.php");
include ("admin/lib/Article.php");
include ("admin/lib/Like.php");

$Courses=new Course;
$Users=new User;
$Session=new Session;
$Articles=new Article;
$Likes=new Like;
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
</head>
<body>
	<!-- START HERE -->
	<nav class="navbar navbar-expand-sm bg-warning navbar-dark fixed-top" style="height:90px;">
		<div class="container" >
		<a href="index.php" class="navbar-brand"><h2>Coding Academy</h2> </a>			
			<div class="navbar-collapse collapse" id="mainNav">
				<ul class="navbar-nav ml-auto">
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

    <main class="container" style="margin-top: 6rem !important">
		<section class="row">
			<section class="col-md-8 bg- posts border-cover">
				<div class="about">
					<h2><?php echo $Articles->getArticleById($_GET['aid'])['title']; ?></h2>
					<p> <?php echo $Articles->getArticleById($_GET['aid'])['content']; ?> </p>
					<br><p>
						<b>Autori: <?php echo $Users->getUserById($Articles->getArticleById($_GET['aid'])['uid'])['firstname']." ".$Users->getUserById($Articles->getArticleById($_GET['aid'])['uid'])['lastname']; ?></b>
						<i style="float:right"><?php echo $Likes->countLikes($_GET['aid'])['COUNT(aid)']; ?> Likes</i>
					</p>
					<div>
						<?php if($_SESSION['id']!=0 && ($_SESSION['role']=="admin" || $_SESSION['id']==$Articles->getArticleById($_GET['aid'])['uid'])): ?>
							<a style="float:left" href="delete_article.php?aid=<?php echo $_GET['aid']; ?>"><button type="button" class="btn btn-danger" onclick="alert('Article deleted!')" >Delete Article</button></a>
						<?php endif;?>
						
						<!-- LIKE -->
						<?php if($_SESSION['id']!=0): ?>
							<?php if($Likes->checkLike($_GET['aid'], $_SESSION['id'])): ?>
								<a style="float:right" href="unlike.php?aid=<?php echo $_GET['aid']; ?>"><button type="button" class="btn btn-primary" onclick="" >Liked</button></a>
							<?php endif; ?>
							<?php if(!($Likes->checkLike($_GET['aid'], $_SESSION['id']))): ?>
								<a style="float:right" href="like.php?aid=<?php echo $_GET['aid']; ?>"><button type="button" class="btn btn-outline-primary" onclick="" >Like</button></a>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				</div>
			</section>
			<aside class="col-md-4 sidebar">
				<article class="categories ml-1">
				<div class="samesidebar clear">
					<h4>Other articles</h4>
					<?php foreach($Articles->getAllArticles() as $article): ?>
						<?php if($article['id']!=$_GET['aid']): ?>
						<div class="media border-bottom border-white">
							<a class="align-self-center" href="#">
								<img class="img-post-small mr-2" src="images/<?php echo $article['image']; ?>" style="height:80px; width:150px;" alt="post image"/></a>
							<div class="media-body">
								<h5><a href="ArticleView.php?aid=<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a></h5>
								<h6>Autori: <?php echo $Users->getUserById($article['uid'])['firstname']." ".$Users->getUserById($article['uid'])['lastname']; ?> </h6>
							</div>
						</div>
						<?php endif; ?>
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