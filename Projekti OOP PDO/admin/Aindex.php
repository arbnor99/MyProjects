<?php 

include "lib/User.php";
$Users=new User;

include "lib/Course.php";
$Courses=new Course;

include "lib/Student.php";
$Students=new Student;

include "lib/Request.php";
$Requests=new Request;

include "Session.php";
$Session=new Session;

?>

<html>
<head>
	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<meta name="language" content="English">
  	<meta name="description" content="It is a website about education">
  	<meta name="keywords" content="blog,cms blog">
  	<!-- <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	 -->
  	<link rel="stylesheet" href="../css/bootstrap.min.css">
  	<link rel="stylesheet" href="../css/style.css">
  	<title>Blog</title>
</head>

<header class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php"><h1>Coding Academy</h1></a>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <!--  -->
        </form>

        <!-- Requests-->
        <a href="requests.php"><button type="button" class="btn btn-info"><?php echo $Requests->countRequests()['nr_req'];?> New Requests</button></a>
        
        <!-- User -->
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"><i><?php echo $_SESSION['fullname']; ?></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="../logout.php">Logout</a>
        </div>

    </nav>
    <div id="layoutSidenav_content">
    <div class="container-fluid">
        <h2 class="mt-4">Administration</h2>
    </div>
</div>
</header>


<body>
<br><br>  
            
<div class="card mb-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i>Users list</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table " id="usersTable" width="100%" cellspacing="0">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th> 
                    <th>Phone</th> 
                    <th>E-mail</th> 
                    <th>Modify</th>
                    <th>Delete</th>
                </tr>
                <?php foreach($Users->getAllUsers() as $user): ?>
                <tr>
                    <?php $id=$user['id']; ?>
                    <td><?php echo $user['firstname']; ?></td>
                    <td><?php echo $user['lastname']; ?></td>
                    <td><?php echo $user['phone']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><a href='edit_users.php?id=<?php echo $id; ?>'><button type="button" class="btn btn-primary">Edit</button></a></td>
                    <?php  if($user['role']!="admin"): ?>
                    <td><a href='delete_users.php?id=<?php echo $id; ?>'><button type="button" class="btn btn-danger" onclick='alert("User deleted!")'>Delete</button></a></td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i>Courses list</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="coursesTable" width="100%" cellspacing="0">
                <tr>
                    <th>Name</th>
                    <th>Description</th> 
                    <th>Time</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php foreach($Courses->getAllCourses() as $course): ?>
                <tr>
                    <?php $cid=$course['id']; ?>
                    <td><?php echo $course['name']; ?></td>
                    <td><?php echo $course['description']; ?></td>
                    <td><?php echo $course['time']; ?></td>
                    <td><a href="edit_courses.php?id=<?php echo $cid; ?>"><button type="button" class="btn btn-primary">Edit</button></a></td>
                    <td><a href="delete_courses.php?id=<?php echo $cid; ?>"><button type="button" class="btn btn-danger" onclick='alert("Course deleted!")'>Delete</button></a></td>
                </tr>
                <?php endforeach; ?>
            </table>
                <a href="create_course.php"><button class="btn btn-outline-primary w-25" type="submit" name="modify">Add Course</button></a>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i>Students list</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="studentsTable" width="100%" cellspacing="0">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th> 
                    <th>Phone</th> 
                    <th>E-mail</th>
                    <th>Course</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php foreach($Students->getAllStudents() as $student): ?>
                <tr>
                    <?php $sid=$student['id']; 
                          $cid=$student['cid'];?>
                    <td><?php echo $student['firstname']; ?></td>
                    <td><?php echo $student['lastname']; ?></td>
                    <td><?php echo $student['phone']; ?></td>
                    <td><?php echo $student['email']; ?></td>
                    <td><?php echo $Courses->getCourseById($cid)['name']; ?></td>
                    <td><a href="edit_students.php?id=<?php echo $sid; ?>"><button type="button" class="btn btn-primary">Edit</button></a></td>
                    <td><a href="delete_students.php?id=<?php echo $sid; ?>"><button type="button" class="btn btn-danger" onclick='alert("Student deleted!")'>Delete</button></a></td>

                </tr>
                <?php endforeach; ?>
            </table>
        <a href="create_student.php"><button class="btn btn-outline-primary w-25" type="submit" name="modify">Add Student</button></a>
        </div>
    </div>
</div>


<?php  include "inc/footer.php"?>

</body>
</html>