<?php
include("includes/db.php");
include("includes/session.php");
$get_id = $_GET['id'];
$get_order_sql = "SELECT * FROM order_tbl WHERE id = '$get_id'";
$row_order= mysqli_fetch_array(mysqli_query($conn, $get_order_sql));
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

    <?php
    include("includes/store_checker.php");
    if ($store_counter == 1 && $store_status == "Approved") {

    ?>
        <div class="d-flex" id="wrapper">
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


                    <h4 class="mt-4">Update Order</h3>
                        <hr>
                        <div class="container" style="padding: 70px;">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-6 offset-md-3">
                                        <label>Order Status</label>
                                        <select class="form-control" name="status">
                                        <option value="canceled">Canceled</option>
                                        <option value="delivery under progress">Delivery Under Progress</option>
                                        <option value="confirmed">Confirmed</option>
                                        <option value="delivered">Delivered</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>

                                <div class="offset-5">
                                    <button value="<?php echo htmlentities($row_order['id'])?>"  type="submit" class="btn btn-outline-success" name="update_order">Update Category</button>
                                </div>
                            </form>
                        </div>


                        <!-- /Page Content -->
                </div>
            </div>
            <!-- /#page-content-wrapper -->
        </div>
        <!-- /#wrapper -->
    <?php } else {
        header("location: index.php");
    }
    include("includes/script.php");
    include("includes/functions.php");
    ?>
</body>

</html>