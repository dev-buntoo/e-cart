<?php
//This file contians all the php functions for admin side. Function contains "CURD".

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