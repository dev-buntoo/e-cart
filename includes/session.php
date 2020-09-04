<?php
       session_start();
      if(isset($_SESSION['super-store-customer'])){
        
      $user_check = $_SESSION['super-store-customer'];
      $query = "SELECT * FROM customer_tbl WHERE id = '$user_check' ";
      $ses_sql = mysqli_query($conn,$query);
      $user_row = mysqli_fetch_array($ses_sql);
      $login_session_id = $user_row['id'];
      $login_session_email = $user_row['email'];
      $login_session_name = $user_row['name'];
      }

?>