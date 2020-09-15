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

     $_SESSION['super-store-customer'] = $row['id'];
 
     header("location: index.php");
  }else {
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

//This function Add message
if(isset($_POST['send_msg'])){
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  

     $sql = "INSERT INTO message_tbl (name, phone, email, message)
  VALUES ('$name', '$phone', '$email', '$message')";
  
  if ($conn->query($sql) === TRUE) {
    echo "
    <script> window.alert('Thank You For Contacting Us. We Will Reach You As Soon As Posible');</script>
    <script type='text/javascript'>window.open('index.php','_self')</script>
    ";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  

  }



  //This function add new Seller
  if(isset($_POST['seller-reg'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $type = 1;
  
       $h_store_id = 0;
       $sql = "INSERT INTO seller_tbl (name, phone, email, password, address, city, state, zip, type, h_store_id)
    VALUES ('$name', '$phone', '$email', '$password', '$address', '$city', '$state', '$zip','$type', '$h_store_id')";
    
    if ($conn->query($sql) === TRUE) {
      echo "<script> window.alert('Dear Seller! Thank You Registoring With Us. Please Login at localhot/ecart/seller For Completing Registration Application.');</script>
      <script type='text/javascript'>window.open('seller/','_self')</script>
      ";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
  
    }


//This function add item to fav list
if(isset($_POST['add_to_fav'])){
  $pro_id = $_POST['add_to_fav'];
  $sql = "INSERT INTO fav_tbl (pro_id, user_id) VALUES ('$pro_id', '$login_session_id')";
  if($conn->query($sql) === TRUE){
    echo "<script> window.alert('Item Added to Fav List');</script>
      <script type='text/javascript'>window.open('','_self')</script>
      ";
  }
  else{
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}


//This function remove item from fav list
if(isset($_POST['remove_fav'])){
  $pro_id = $_POST['remove_fav'];
  $sql = "DELETE FROM fav_tbl WHERE pro_id = '$pro_id' && user_id = '$login_session_id'";
  if($conn->query($sql) === TRUE){
    echo "<script> window.alert('Item Removed from Fav List');</script>
      <script type='text/javascript'>window.open('','_self')</script>
      ";
  }
  else{
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

//This function add item to cart

if(isset($_POST['add_to_cart'])){
  $pro_id = $_POST['add_to_cart'];

  //geting store id of inserting product
  $get_store_id_sql = "SELECT store_id FROM product_tbl WHERE id = '$pro_id'";
  $run_to_get_store_id = mysqli_fetch_array(mysqli_query($conn, $get_store_id_sql));
  $store_id = $run_to_get_store_id['store_id'];

  //logged in session id
  $user_id = $login_session_id;

  /*
  check if the unchecked order is present for the current user and product store
  */
  $check_for_unchecked_order = "SELECT * FROM order_tbl WHERE user_id = '$user_id' && store_id = '$store_id' && status = 'unchecked'";
  $run_to_check_uncheck_order = mysqli_query($conn, $check_for_unchecked_order);
  $order_tbl_row = mysqli_fetch_array($run_to_check_uncheck_order);
  $order_tbl_check_count = mysqli_num_rows($run_to_check_uncheck_order);
  if($order_tbl_check_count == 1){
   //echo "<script> window.alert('order found');</script>";
   //if found check if the item is already in cart
   $order_id = $order_tbl_row['id'];
   $check_item_sql = "SELECT * FROM cart_tbl WHERE pro_id = '$pro_id' && order_id = '$order_id'";
   $check_item_run = mysqli_num_rows(mysqli_query($conn, $check_item_sql));
   if($check_item_run == 0){
    //echo "<script> window.alert('Item not found');</script>";
     //Adding item to cart
     $add_item_to_cart_sql = "INSERT INTO cart_tbl (order_id, pro_id) VALUES ('$order_id', '$pro_id')";


     if($conn -> query($add_item_to_cart_sql) === TRUE){
       //if success
       echo "<script> window.alert('Item Added to Cart');</script>
       <script type='text/javascript'>window.open('','_self')</script>";
     }
     else{
 
       //show error if add to cart failed
       echo "Error: " . $add_item_to_cart_sql . "<br>" . $conn->error;
     }
   }
   else{
    echo "<script> window.alert('Item Already In Cart');</script>";
   }
   


  }
  else{
   // echo "<script> window.alert('order not found');</script>";


   //order not found so adding a new order
   $add_new_order_sql = "INSERT INTO order_tbl (user_id, store_id, status, status_description) VALUES ('$user_id', '$store_id', 'unchecked', 'Proced to check out.')";
   if( $conn -> query($add_new_order_sql) === TRUE ){


     //If new order created successfuly then get the new order id
    $new_order_id = mysqli_insert_id($conn);



    //Adding item to cart
    $add_item_to_cart_sql = "INSERT INTO cart_tbl (order_id, pro_id) VALUES ('$new_order_id', '$pro_id')";


    if($conn -> query($add_item_to_cart_sql) === TRUE){
      //if success
      echo "<script> window.alert('Item Added to Cart');</script>
      <script type='text/javascript'>window.open('','_self')</script>";
    }
    else{

      //show error if add to cart failed
      echo "Error: " . $add_item_to_cart_sql . "<br>" . $conn->error;
    }




   }
   else{
     //show error if creating order failed
    echo "Error: " . $add_new_order_sql . "<br>" . $conn->error;
   }

  }


}







//This function update quantity of producy
if(isset($_POST['update_quantity'])){
  $cart_id = $_POST['update_quantity'];
  $quntity = $_POST['pro_quantity'];
  $sql = "UPDATE cart_tbl SET quantity = '$quntity' WHERE id = '$cart_id'";
  

  if($conn->query($sql) === TRUE){
    echo "
      <script type='text/javascript'>window.open('','_self')</script>
      ";
  }
  else{
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

if(isset($_POST['remove_from_cart'])){
  $cart_id = $_POST['remove_from_cart'];
  $sql = "DELETE FROM cart_tbl WHERE id = '$cart_id'";
  

  if($conn->query($sql) === TRUE){
    echo "
      <script type='text/javascript'>window.open('','_self')</script>
      ";
  }
  else{
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}






if(isset($_POST['place_order'])){
  $name = $_POST['name'];
  $phone =$_POST['phone'];
  $province = $_POST['province'];
  $city =$_POST['city'];
  $address =$_POST['address'];
  $payment =$_POST['payment_type'];
  if($payment == 'Online'){
  $c_no =$_POST['c_no'];
  $c_p =$_POST['c_pas'];
    if ( $c_no == '0' || $c_p == '0' ){
       echo "<script> window.alert('insert card number and pasword');</script>";
      die();
  }
  }else{
    $c_no = '';
    $c_p ='';
  }
  $sql = "UPDATE order_tbl set
  r_name = '$name',
  r_phone = '$phone',
  r_province = '$province',
  r_city = '$city',
  r_address = '$address',
  payment_type = '$payment',
  card_no = '$c_no',
  card_password = '$c_p',
  status = 'unconfirmed',
  total_price = $total_price,
  status_description = 'Your Order has been places succesfuly and is under review by seller store. Please wait your order will be confirmed soon'
  WHERE id = $order_id
  ";
  if($conn -> query($sql) === TRUE )
  {
    echo "<script> window.alert('Order Placed Succesfully');</script>
    <script type='text/javascript'>window.open('orders.php','_self')</script>";

  }
}
?>