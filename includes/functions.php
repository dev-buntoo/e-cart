<?php

// This Function sign out customer
if(isset($_POST['signout'])){
  session_start();
 
  unset($_SESSION["super-store-customer"]);
     header("Location: index.php");
}



//This Function Sign In the customer
if(isset($_POST['signin'])){
  // username and password sent from form 
 
  $myusername = $_POST['email'];
  $mypassword = $_POST['password']; 
  

  $sql = "SELECT * FROM customer_tbl WHERE email = '$myusername' AND password = '$mypassword'";
  $result = mysqli_query($conn, $sql);



  $row = mysqli_fetch_array($result);
  
  $count = mysqli_num_rows($result);
  
 
  if($count == 1) {

    echo "<script> window.alert('In If');</script>";
     $_SESSION['super-store-customer'] = $row['id'];
 
     header("location: index.php");
  }else {
    echo "<script> window.alert('in Else');</script>";
     $error = "Your Email or Password is invalid";
  }
 }
 

//This function add new User
if(isset($_POST['signup'])){
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
      echo "<script> window.alert('SignUp Successfully, Now SignIn Please');</script>
      <script type='text/javascript'>window.open('signin.php','_self')</script>
      ";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }



?>