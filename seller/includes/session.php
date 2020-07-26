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
      $login_session_user_type = $user_row['type'];
      $login_session_h_seller_store = $user_row['h_store_id'];
      }
      else
      {
        header("location: login.php");
     }
?>