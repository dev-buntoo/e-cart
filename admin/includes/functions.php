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
  <script type='text/javascript'>window.open('admins.php','_self')</script>
  ";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}


//This function Update Existing Admin
if(isset($_POST['update_admin'])){

   $update_id = $_POST['update_admin'];
   $name = $_POST['name'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $address = $_POST['address'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $zip = $_POST['zip'];
   $type = $_POST['type'];

   $sql = " UPDATE admin_tbl SET 
   name = '$name',
   phone = '$phone', 
   email = '$email',
   password = '$password', 
   address = '$address', 
   city = '$city', 
   state = '$state', 
   zip = '$zip', 
   type = '$type' 
   WHERE id = '$update_id' ";


   if ($conn->query($sql) === TRUE) { 
      echo "<script> window.alert('Record Updated Successfully');</script>
      <script type='text/javascript'>window.open('admins.php','_self')</script>
      ";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   
   }



   //This function Delete Existing Admin
if(isset($_POST['delete_admin'])){

   $admin_id = $_POST['delete_admin'];

   $sql = "DELETE FROM admin_tbl WHERE id = '$admin_id'";


   if ($conn->query($sql) === TRUE) { 
      echo "<script> window.alert('Record Deleted Successfully');</script>
      <script type='text/javascript'>window.open('admins.php','_self')</script>
      ";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   
   }





//This function add new Seller
if(isset($_POST['add_seller'])){
   $name = $_POST['name'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $address = $_POST['address'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $zip = $_POST['zip'];
   $type = $_POST['type'];

      $h_store_id = 0;
      $sql = "INSERT INTO seller_tbl (name, phone, email, password, address, city, state, zip, type, h_store_id)
   VALUES ('$name', '$phone', '$email', '$password', '$address', '$city', '$state', '$zip','$type', '$h_store_id')";
   
   if ($conn->query($sql) === TRUE) {
     echo "<script> window.alert('New record created successfully');</script>
     <script type='text/javascript'>window.open('sellers.php','_self')</script>
     ";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   

   }


//This function Update Existing Seller
if(isset($_POST['update_seller'])){
   $update_id = $_POST['update_seller'];
   $name = $_POST['name'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $address = $_POST['address'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $zip = $_POST['zip'];
   $type = $_POST['type'];

   $sql = " UPDATE seller_tbl SET 
   name = '$name',
   phone = '$phone', 
   email = '$email',
   password = '$password', 
   address = '$address', 
   city = '$city', 
   state = '$state', 
   zip = '$zip', 
   type = '$type' 
   WHERE id = '$update_id' ";


   if ($conn->query($sql) === TRUE) { 
      echo "<script> window.alert('Record Updated Successfully');</script>
      <script type='text/javascript'>window.open('sellers.php','_self')</script>
      ";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   }

   //This function Delete Existing Seller
   if(isset($_POST['delete_seller'])){

      $admin_id = $_POST['delete_seller'];
   
      $sql = "DELETE FROM seller_tbl WHERE id = '$admin_id'";
   
   
      if ($conn->query($sql) === TRUE) { 
         echo "<script> window.alert('Record Deleted Successfully');</script>
         <script type='text/javascript'>window.open('sellers.php','_self')</script>
         ";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      }


//This function add new Store
if(isset($_POST['add_store'])){
   $name = $_POST['name'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $user_id = $_POST['user_id'];
   $address = $_POST['address'];
   $description = $_POST['description'];
   $status = "Unapproved";
   $status_desc = "Greeting, Dear customer, We are glad to know the your are intrested in doing business with us. We have recived your request for opening store with us. Currently it is under review. You can Start your business after your store is approved";

      $sql = "INSERT INTO store_tbl (name, phone, email, user_id, address, description,status, status_detail)
   VALUES ('$name', '$phone', '$email', '$user_id', '$address', '$description', '$status', '$status_desc')";
   
   if ($conn->query($sql) === TRUE) {
     echo "<script> window.alert('New record created successfully');</script>
     <script type='text/javascript'>window.open('stores.php','_self')</script>
     ";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   

   }



   //This function updates existing Store
if(isset($_POST['update_store'])){
   $update_id = $_POST['update_store'];
   $name = $_POST['name'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $user_id = $_POST['user_id'];
   $address = $_POST['address'];
   $description = $_POST['description'];

      $sql = "UPDATE store_tbl SET 
      name = '$name',
      phone = '$phone',
      email = '$email',
      user_id = '$user_id',
      address = '$address',
      description = '$description'
      WHERE id = '$update_id' ";
   
   if ($conn->query($sql) === TRUE) {
     echo "<script> window.alert('Record Updated Successfully');</script>
     <script type='text/javascript'>window.open('stores.php','_self')</script>
     ";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   }


   
 //This function Delete Existing Seller
if(isset($_POST['delete_store'])){
   $store_id = $_POST['delete_store'];

   $sql = "DELETE FROM store_tbl WHERE id = '$store_id'";


   if ($conn->query($sql) === TRUE) { 
      echo "<script> window.alert('Record Deleted Successfully');</script>
      <script type='text/javascript'>window.open('stores.php','_self')</script>
      ";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   
   }


   //This function updates Store Status
   if(isset($_POST['update_status'])){
      $update_id = $_POST['update_status'];
      $status = $_POST['status'];
      $description = $_POST['description'];
      
   
         $sql = "UPDATE store_tbl SET 
         status = '$status',
         status_description = '$description'
         WHERE id = '$update_id' ";
      
      if ($conn->query($sql) === TRUE) {
        echo "<script> window.alert('Status Updated Successfully');</script>
        <script type='text/javascript'>window.open('stores.php','_self')</script>
        ";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      }



//This function add new Customer
if(isset($_POST['add_customer'])){
   $name = $_POST['name'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $address = $_POST['address'];
   $city = $_POST['city'];
   $state = $_POST['state'];

   
   $sql = "INSERT INTO customer_tbl (name, phone, email, password, address, city, state)
   VALUES ('$name', '$phone', '$email', '$password', '$address', '$city', '$state')";
   
   if ($conn->query($sql) === TRUE) {
     echo "<script> window.alert('New record created successfully');</script>
     <script type='text/javascript'>window.open('customer.php','_self')</script>
     ";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   }



//This function Update Existing Customer
if(isset($_POST['update_customer'])){

   $update_id = $_POST['update_customer'];
   $name = $_POST['name'];
   $phone = $_POST['phone'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $address = $_POST['address'];
   $city = $_POST['city'];
   $state = $_POST['state'];

   $sql = " UPDATE customer_tbl SET 
   name = '$name',
   phone = '$phone', 
   email = '$email',
   password = '$password', 
   address = '$address', 
   city = '$city', 
   state = '$state'
   WHERE id = '$update_id' ";


   if ($conn->query($sql) === TRUE) { 
      echo "<script> window.alert('Record Updated Successfully');</script>
      <script type='text/javascript'>window.open('customers.php','_self')</script>
      ";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   
   }



   //This function Delete Existing Customer
if(isset($_POST['delete_customer'])){

   $customer_id = $_POST['delete_customer'];

   $sql = "DELETE FROM customer_tbl WHERE id = '$customer_id'";


   if ($conn->query($sql) === TRUE) { 
      echo "<script> window.alert('Record Deleted Successfully');</script>
      <script type='text/javascript'>window.open('customers.php','_self')</script>
      ";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
   
   }



?>