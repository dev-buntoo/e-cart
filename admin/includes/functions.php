<?php
//This file contians all the php functions for admin side. Function contains "CURD".

// This Function Logouts Admin
if(isset($_POST['logout'])){
    session_start();
   
    unset($_SESSION["super-store-admin"]);
       header("Location: ../login.php");
}


//This Function login the admin
if(isset($_POST['login'])){
 // username and password sent from form 

 $myusername = $_POST['email'];
 $mypassword = $_POST['password']; 
 
 $sql = "SELECT * FROM admin_tbl WHERE email = '$myusername' AND password = '$mypassword'";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_array($result);
 
 $count = mysqli_num_rows($result);
 

 if($count == 1) {

    $_SESSION['super-store-admin'] = $row['id'];

    header("location: index.php");
 }else {
    $error = "Your Email or Password is invalid";
 }
}

//This function add new admin
if(isset($_POST['add_admin'])){
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$type = $_POST['type'];

$sql = "INSERT INTO admin_tbl (name, phone, email, password, address, city, state, zip, type)
VALUES ('$name', '$phone', '$email', '$password', '$address', '$city', '$state', '$zip','$type')";

if ($conn->query($sql) === TRUE) {
  echo "<script> window.alert('New record created successfully');</script>
  <script> window.open('add_admin.php', _self); </script> 
  ";
} else {
  echo "<script> window.alert(Error:  . $sql . || . $conn->error');</script>";
}
}

?>