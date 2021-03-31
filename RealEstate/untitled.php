<?php
// $conn=mysqli_connect("localhost", "root", "", "ecom_store");
// if(!$conn){
//     die("Lidhja deshtoi: ".mysqli_connect_error());
// }


function getProducts(){
    global $conn;
    $sql="SELECT * FROM products";
    $run_prods=mysqli_query($conn, $sql);
    $products=array();

    while($row_prods=mysqli_fetch_assoc($run_prods)){
        $arr=array();
        $arr[]['id']=$row_prods['id'];
        $arr[]['title']=$row_prods['title'];
        $arr[]['price']=$row_prods['price'];
        $arr[]['description']=$row_prods['description'];
        $products[]=$arr;    
    }
    return $products;
}


$sql="SELECT * FROM categories";
$run_cat=mysqli_query($conn, $sql);

while($row_cat=mysqli_fetch_assoc($run_cat)){
    echo $row_cat['name']." - ".$row_cat['description']."<br>";
}



$per_page=6;
if(isset($_GET['page'])){
    $page=$_GET['page'];
}else{
    $page=1;
}
$start_from=($page-1)*$per_page;

$sql="SELECT * FROM products LIMIT $start_from,$per_page";
$runn_prod=mysqli_query($conn, $sql);
while($row_prod=mysqli_fetch_assoc($runn_prod)){
    // bla bla bla
}


$query="SELECT * FROM products";
$products=mysqli_query($conn, $query);

$nr_prods=mysqli_num_row($products);
$nr_pages=ceil($nr_prods/$per_page);

echo "<ul class='paginate'>";
    for($i=1;$i<=$nr_pages;$i++){
        echo "<li><a href='prods.php?page=$i'>$i</li>";
    }

echo "</ul>";


//CART
// GET VISITOR ID
function getRealIpUser(){
    switch(true){
        case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
        case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
        case(!empty($_SERVER['HTTP_X_FORWARDED'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
    
        default : return $_SERVER['REMOTE_ADDR'];
    }
}
//


// ADD CART

function addCart(){
    global $conn;
    if(isset($_POST['submit'])){
        $p_id=$_POST['p_id'];
        $qwty=$_POST['qwty'];
        $userID=getRealIpUser();

        $checkCart="SELECT * FROM cart where userID=$userID AND p_id=$p_id";
        $runCheck=mysqli($conn, $checkCart);
        if(mysqli_num_rows($runCheck)>0){
            echo "<script>alert('This product has already been added to your cart!')</script>";
            "echo <script>window.open('product.php?p_id=$p_id', '_self')</script>";
        }else{
            $query="INSERT INTO cart(p_id, qwty, userID) VALUES($p_id, $qwty, $userID)";
            $addCart=mysqli_query($conn, $query);
            echo "<script>alert('Product added successfully!')</script>";
        }
    }
}
//

// TOTAL PRICE
function totalPrice(){
    global $conn;
    $total=0;
    $userID=getRealIpUser();
    $query="SELECT * FROM cart WHERE userID='$userID'";
    $run_prods=mysqli_query($conn, $query);
    while($record=mysqli_fetch_asscoc($run_prods)){
        $p_id=$record['p_id'];
        $p_qwty=$record['p_qwty'];
        $query="SELECT * FROM products WHERE p_id='$p_id'";
        $run_price=mysqli_query($conn, $query);
        while($row_price=mysqli_fetch_assoc($run_price)){    
            $p_price=$row_price['p_price'];
        }
        $total+=$p_price*$p_qwty;
    }
    echo $total;

    // $query="SELECT SUM(p_price*p_qwty) as total FROM cart WHERE userID='$userID'";
    // $run_total=mysqli_query($conn, $query);
    // $total=$run_total['total'];
    // echo $total;
}
//
//

//MAIL
mail($receiver_email, $sender_name, $sender_subject, $sender_message, $sender_email);
//


// MOVE UPLODED FILE
if(isset($_POST['submit'])){
    $c_name=$_POST['name'];
    $image=$_FILES['foto']['name'];
    $image_tmp=$_FILES['foto']['tmp_name'];

    move_uploaded_file($image_tmp, "customer/fotot/$image");
    $query="INSERT INTO customer() VALUES()";
    $insert=mysqli_query($conn, $query);

    if($insert){
        echo "Registration success!";
    }
}
//


$c_email=$_SESSION['costumer_email'];
$sql="SELECT * FROM costumers WHERE c_email='$c_email'";
$run_customer=mysqli_query($conn, $sql);
$row_customer=mysqli_fetch_array($run_customer);

$c_name=$row_customer['name'];
$c_image=$row_costumer['image'];
//


if(isset($_SESSION['c_email'])){
    $c_email=$_SESSION['c_email'];

    $sql="SELECT * FROM customers WHERE email='$c_email'";
    $run_customer=mysqli_query($conn, $sql);
    $row_customer=mysqli_fetch_array($run_customer);

    $c_name=$row_customer['name'];
    $c_image=$row_customer['image'];
}

echo "<form>blablabla</form>";

if(isset($_POST['modify'])){
    $c_name=$_POST['name'];
    $c_image=$_FILES['foto']['name'];
    $c_image_tmp=$_FILES['foto']['tmp_name'];
    move_uploaded_file($c_image_tmp, "customer/fotot/$c_image");

    $sql="UPDATE customers SET name='$c_name', $image='$c_image' WHERE email='$c_email'";
    $run_modify($conn, $sql);
    if($run_modify){
        echo "Modified successfully";
    }else{
        echo "Modify error".mysqli_error($conn);
    }
}
//


if(isset($_POST['login'])){
    $a_email=mysqli_real_escape_string($conn, $_POST['email']);
    $a_pass=mysqli_real_escape_string($conn, $_POST['password']);

    $sql="SELECT * FROM admin WHERE admin_email='$a_email'";
    $run_adm=mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($run_adm)==1){
        $row_adm=mysqli_fetch_array($run_adm);
        $hash_pass=$row_adm['password'];
        if(password_verify($a_pass, $hash_pass)){
            $_SESSION['role']=="admin";
            $_SESSION['email']==$row_adm['email'];
        }else{
            echo "WRONG PASSWORD!";
        }
    }else{
        echo "WRONG EMAIL!";
    }
}
//

session_start();
session_destroy();

?>