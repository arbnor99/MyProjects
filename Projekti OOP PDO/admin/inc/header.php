<?php
include ("Session.php");
$Session=new Session;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Blog Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        
    </head>
    <header class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="../index.php"><h1>Coding Academy</h1></a>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">

            <?php if($_SESSION['id']!=0): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false"><i><?php echo $_SESSION['fullname']; ?></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <?php if($_SESSION['role']=='admin'): ?>
                        <a class="dropdown-item" href="Aindex.php">Administration</a>
                        <?php endif; ?>
                        <a class="dropdown-item" href="../logout.php">Logout</a>
                    </div>
                </li>
            <?php endif; ?>
            </ul>
        </nav>

        <div id="layoutSidenav_content">
            <div class="container-fluid">
                <a class="navbar-brand" href="Aindex.php"><h2 class="mt-4">Administration</h2></a>
            </div>
        </div>
    </header>