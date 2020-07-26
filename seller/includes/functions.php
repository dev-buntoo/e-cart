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



//This function add new Store
if(isset($_POST['add_store'])){
   $name = $_POST['name'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $user_id = $login_session_id;
   $address = $_POST['address'];
   $description = $_POST['description'];
   $status = "Unapproved";

      $sql = "INSERT INTO store_tbl (name, phone, email, user_id, address, description,status)
   VALUES ('$name', '$phone', '$email', '$user_id', '$address', '$description', '$status')";
   
   if ($conn->query($sql) === TRUE) {
     echo "<script> window.alert('Congragulations $login_session_name !. Your store is Now Registered with us and is now under review. Keep Visiting your panel for further information. Thanks');</script>
     <script type='text/javascript'>window.open('index.php','_self')</script>
     ";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   

   }


?>