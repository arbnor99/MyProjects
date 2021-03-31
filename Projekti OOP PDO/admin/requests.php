<?php
include "lib/Student.php";
$Students=new Student;

include "lib/Course.php";
$Courses=new Course;

include "lib/Request.php";
$Requests=new Request;
?>

<html>
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

<header class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php"><h1>Coding Academy</h1></a>
        <!-- Navbar Search-->
    </nav>
<div id="layoutSidenav_content">
    <div class="container-fluid">
        <a class="navbar-brand" href="Aindex.php"><h2 class="mt-4">Administration</h2></a>
    </div>
</div>
</header>

<body>

<div class="card mb-4">
    <div class="card-header"><h4>Requests list</h4></div>
    <div class="card-body">
        <div class="table-responsive">
            <?php if($Requests->countRequests()['nr_req']>0): ?>
            <table class="table t" id="" width="100%" cellspacing="0">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th> 
                    <th>Phone</th> 
                    <th>E-mail</th>
                    <th>Course</th> 
                    <th>Accept</th>
                    <th>Decline</th>
                </tr>
                <?php foreach($Requests->getAllRequests() as $request): ?>
                <tr>
                    <?php $id=$request['id']; 
                          $cid=$request['cid']; ?>
                    <td><?php echo $request['firstname']; ?></td>
                    <td><?php echo $request['lastname']; ?></td>
                    <td><?php echo $request['phone']; ?></td>
                    <td><?php echo $request['email']; ?></td>
                    <td><?php echo $Courses->getCourseById($cid)['name']; ?>
                    <td><a href='accept_request.php?id=<?php echo $id; ?>'><button type="button" class="btn btn-primary" onclick='alert("Request accepted!")'>Accept</button></a></td>
                    <td><a href='decline_request.php?id=<?php echo $id; ?>'><button type="button" class="btn btn-danger" onclick='alert("Request declined!")'>Decline</button></a></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php endif; 
                if($Requests->countRequests()['nr_req']==0){
                    echo "No new requests";
                }
            ?>
        </div>
    </div>
</div>

</body>
</html>