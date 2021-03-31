<?php
include ("admin/lib/Course.php");
include ("admin/lib/Request.php");

$Courses=new Course;
$Requests=new Request;

if(isset($_GET['cid'])){
    $course=$Courses->getCourseById($_GET['cid']);
}

if(isset($_POST['apply'])){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $cid=$_GET['cid'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $Requests->addRequest($firstname, $lastname, $cid, $phone, $email, $password);
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
  
    <body class="bg">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><a href="index.php" class="navbar-brand"><h2>Coding Academy</h2> </a><br>Application for <?php echo $course['name']; ?></h3></div>
                                    <div class="card-body">
                                        
                                        <form method="post">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputFirstName">First Name</label><input name="firstname" class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter first name" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputLastName">Last Name</label><input name="lastname" class="form-control py-4" id="inputLastName" type="text" placeholder="Enter last name" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="small mb-1" for="inputPhone">Phone number</label><input name="phone" class="form-control py-4" id="inputPhone" type="text" placeholder="Enter phone number" /></div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputEmail">Email</label><input name="email" class="form-control py-4" id="inputEmail" type="email" placeholder="Enter email" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input name="password" class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0"><input name="apply" class="btn btn-primary btn-block" type="submit" value="Apply" ></div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2019</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

