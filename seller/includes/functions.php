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
   $status_desc = "Greeting, Dear customer, We are glad to know the your are intrested in doing business with us. We have recived your request for opening store with us. Currently it is under review. You can Start your business after your store is approved";

      $sql = "INSERT INTO store_tbl (name, phone, email, user_id, address, description,status, status_description)
   VALUES ('$name', '$phone', '$email', '$user_id', '$address', '$description', '$status', '$status_desc')";
   
   if ($conn->query($sql) === TRUE) {
     echo "<script> window.alert('Congragulations $login_session_name !. Your store is Now Registered with us and is now under review. Keep Visiting your panel for further information. Thanks');</script>
     <script type='text/javascript'>window.open('index.php','_self')</script>
     ";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   

   }


   //This function add new Category
if(isset($_POST['add_category'])){
   $name = $_POST['name'];

      $sql = "INSERT INTO category_tbl (name, store_id)
   VALUES ('$name', '$store_id')";
   
   if ($conn->query($sql) === TRUE) {
     echo "
     <script type='text/javascript'>window.open('categories.php','_self')</script>
     ";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   

   }

      //This function Update Existing Category
if(isset($_POST['update_cat'])){
   $name = $_POST['name'];
   $cat_id = $_POST['update_cat'];
      $sql = "UPDATE category_tbl SET
      name = '$name'
      WHERE id = $cat_id ";
   
   if ($conn->query($sql) === TRUE) {
     echo "
     <script type='text/javascript'>window.open('categories.php','_self')</script>
     ";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   

   }

       //This function Delete Existing Category
if(isset($_POST['delete_cat'])){
   $name = $_POST['name'];
   $cat_id = $_POST['delete_cat'];
      $sql = "DELETE FROM category_tbl WHERE id = $cat_id ";
   
   if ($conn->query($sql) === TRUE) {
     echo "
     <script type='text/javascript'>window.open('categories.php','_self')</script>
     ";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   

   }
?>