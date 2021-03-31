<?php
include_once("admin/lib/User.php");
include_once("admin/Session.php");

$Session = new Session;
$Users = new User;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/2112736a95.js"></script>
    <link rel="stylesheet" href="style.css">
    <title></title>
</head>

<body style="height: 100vh;">
    <section id="contact" class="py-5 h-100 bg-light">
        <div class="container text-center">
            <h1 class="display-4 pb-1 border-bottom w-25 mx-auto pt-5">Login</h1>
            <div class="row mx-auto">
                <div class="col-sm-12 col-md-6 col-lg-6 mx-auto">
                    
                    <form class="p-5  my-5 bg-white" method="post">
                        <div class="form-group text-left">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group text-left">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <button class="btn btn-outline-primary btn-block" type="submit" name="login">Log In</button>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <?php
    if (isset($_POST['login'])) {   
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $Users->checkUser($email, $password);
        
        if ($user) {
            $Session->login($user);
            header("Location: index.php");
        } else {
            echo '<script>alert("Përdoruesi ose fjalëkalimi juaj nuk është i saktë!");</script>';
        }
    } else {
        $email = "";
        $password = "";
    }
    ?>


</body>

</html>