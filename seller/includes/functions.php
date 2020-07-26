<?php
//This file contians all the php functions for seller side. Function contains "CURD".

// This Function Logouts seller
if(isset($_POST['logout'])){
    session_start();
   
    unset($_SESSION["super-store-seller"]);
       header("Location: login.php");
}


//This Function login the seller
if(isset($_POST['login'])){
 // username and password sent from form 

 $myusername = $_POST['email'];
 $mypassword = $_POST['password']; 
 
 $sql = "SELECT * FROM seller_tbl WHERE email = '$myusername' AND password = '$mypassword'";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_array($result);
 
 $count = mysqli_num_rows($result);
 

 if($count == 1) {

    $_SESSION['super-store-seller'] = $row['id'];

    header("location: index.php");
 }else {
    $error = "Your Email or Password is invalid";
 }
}


?>