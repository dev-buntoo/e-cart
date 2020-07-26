<?php
if($login_session_user_type == 1){
$check_store_sql = "SELECT * FROM store_tbl WHERE user_id = '$login_session_id'";
}
if($login_session_user_type == 2){
    $check_store_sql = "SELECT * FROM store_tbl WHERE id = '$login_session_h_seller_store'";
    }
$store_counter = mysqli_num_rows(mysqli_query($conn, $check_store_sql));
if($store_counter == 1){
    $check_row = mysqli_fetch_array(mysqli_query($conn, $check_store_sql));
        $store_id = $check_row['id'];
        $store_name = $check_row['name'];
        $store_status = $check_row['status'];
        $store_status_detail = $check_row['status_description'];
    
}
?>