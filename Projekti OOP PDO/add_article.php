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
</head>
<body>
	<!-- START HERE -->
	<nav class="navbar navbar-expand-sm bg-warning navbar-dark fixed-top" style="height:90px;">
		<div class="container" >
		<a href="index.php" class="navbar-brand"><h2>Coding Academy</h2> </a>			
			<div class="navbar-collapse collapse" id="mainNav">
				<ul class="navbar-nav ml-auto">

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

        <h2>Add new article</h2>
        <form enctype="multipart/form-data" method="post">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" rows="3"></textarea>
            </div>
            <label for="image">Image</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="image" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div><br><br>
            <div class="form-group">
                <input type="submit" class="form-control" name="add" value="Add Article">
            </div>
        </form>
		
	</main>
	<section class="bg-warning container">
		<footer class="py-3 border-top border-white">	
			<p>&copy; Copyright by Probit Academy Training Center <a href="">Probit Academy</a>.</p>
		</footer>

	</section>
</body>
</html>

<?php
    if(isset($_POST['add'])){
        $uid=$_SESSION['id'];
        $title=$_POST['title'];
        $content=$_POST['content'];
        $image=$_FILES['image']['name'];

        $Articles->createArticle($uid, $title, $content, $image);
    }
?>