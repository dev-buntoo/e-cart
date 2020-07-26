<?php
include("includes/db.php");
include("includes/session.php");
include("includes/functions.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Including Head -->
    <?php
    include("includes/head.php")
    ?>


</head>

<body>

    <div class="d-flex" id="wrapper">

        <?php
        $check_store_sql = "SELECT * FROM store_tbl WHERE user_id = '$login_session_id'";
        $store_counter = mysqli_num_rows(mysqli_query($conn, $check_store_sql));
        if($store_counter == 1){
        $check_row = mysqli_fetch_array(mysqli_query($conn, $check_store_sql));
        $store_id = $check_row['id'];
        $store_name = $check_row['name'];
        $store_status = $check_row['status'];
        $store_status_detail = $check_row['status_description'];
        if ($store_status == "Approved") {


        ?>
            <!-- Sidebar -->
            <?php
            include("includes/side-bar.php")
            ?>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">

                <!-- Including Top Nav -->
                <?php
                include("includes/nav.php")
                ?>

                <div class="container-fluid">
                    <!-- Page Content -->


                    <h1 class="mt-4">Seller's Panel</h1>
                    <p> Page Content Goes Here</p>



                    <!-- /Page Content -->
                </div>
            </div>
            <!-- /#page-content-wrapper -->
        <?php } else { ?>


            <!-- Page Content -->
            <div id="page-content-wrapper">

                <!-- Including Top Nav -->
                <?php
                include("includes/nav.php")
                ?>

                <div class="container-fluid text-center">
                    <!-- Page Content -->


                    <h1 class="mt-4"><?php echo htmlentities($store_name); ?></h1>
                    <h4>Dear Seller! We regret to inform you that your store is currently
                        <br>"<b><?php echo htmlentities($store_status); ?></b>"<br>
                        Keep visiting you panel or Contact Admin.</h4>
                    <br><br>
                    <h4 class="mt-4">Details</h4>
                    <p>"<?php echo htmlentities($store_status_detail); ?>"</p>


                    <!-- /Page Content -->
                </div>
            </div>
        <?php }}
        else{ ?>
         <!-- Page Content -->
         <div id="page-content-wrapper">

<!-- Including Top Nav -->
<?php
include("includes/nav.php");
?>

<div class="container-fluid">
    <!-- Page Content -->


    <h4 class="mt-4">Add You Store Details</h3>
        <hr>
        <div class="container" style="padding: 70px;">
            <form method="POST" enctype="multipart/form-data">
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Store Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label >Store Phone</label>
                        <input type="number" class="form-control" name="phone" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Store Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Store Owner</label>
                        <input type="text" class="form-control" name="user_id" value="<?php echo htmlentities($login_session_name);?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label>Store Address</label>
                    <input type="text" class="form-control" name="address" placeholder="1234 Main St" required>
                </div>
                

                <div class="form-row">
                        <label>Store Description</label>
                        <textarea type="number" class="form-control" name="description"  required></textarea>
                </div>

                <hr>

                <div class="offset-5">
                <button onclick="confirm('Are you sure you want to add a new Store');" type="submit" class="btn btn-outline-success" name="add_store">Add Store</button>
                </div>
            </form>
        </div>


        <!-- /Page Content -->
</div>
</div>
<!-- /#page-content-wrapper -->
        <?php }?>
    </div>
    <!-- /#wrapper -->
    <?php
    include("includes/script.php")
    ?>
</body>

</html>