<?php
       session_start();
      if(isset($_SESSION['super-store-seller'])){
        
      $user_check = $_SESSION['super-store-seller'];
      $query = "SELECT * FROM seller_tbl WHERE id = '$user_check' ";
      $ses_sql = mysqli_query($conn,$query);
      $user_row = mysqli_fetch_array($ses_sql);
      $login_session_id = $user_row['id'];
      $login_session_email = $user_row['email'];
      $login_session_name = $user_row['name'];
      $check_store_sql= "SELECT * FROM store_tbl WHERE user_id = '$login_session_id'";
      $store_counter = mysqli_num_rows(mysqli_query($conn, $check_store_sql));
      $check_row = mysqli_fetch_array(mysqli_query($conn, $check_store_sql));
      $store_id = $check_row['id'];
      $store_name = $check_row['name'];
      $store_status = $check_row['status'];
      if($store_counter == 1){
        echo"working";
      }
      else{
        header("location: add_store.php");
      }
      }
      else
      {
        header("location: login.php");
     }
?>