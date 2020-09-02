<?php
include("includes/db.php");
include("includes/session.php");
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
                include("includes/nav.php");
                $promo_id = $_GET['id'];
                $sql = "SELECT
                product_tbl.name AS pro_name,
                product_tbl.price AS old_price,
                promos_tbl.promo_price AS new_price,
                promos_tbl.id AS promo_id
            FROM
                product_tbl
            INNER JOIN promos_tbl ON product_tbl.id = promos_tbl.pro_id
            WHERE
                product_tbl.store_id = '$store_id' && promos_tbl.id = '$promo_id'";
                                $row = mysqli_fetch_array(mysqli_query($conn, $sql));
                ?>

                <div class="container-fluid">
                    <!-- Page Content -->


                    <h4 class="mt-4">Update Promotion</h3>
                        <hr>
                        <div class="container" style="padding: 70px;">
                            <form method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                    <div class="form-group col-md-6 offset-md-3">
                                        <label>Product</label>
                                        <input type="text" class="form-control"  value="<?php echo htmlentities($row['pro_name'] . " [ Orignal Price : " . $row['old_price'] . "$ ]")?>" disabled>
                                    </div>
                                </div><div class="form-row">
                                    <div class="form-group col-md-6 offset-md-3">
                                        <label>Promo Price</label>
                                        <input type="text" class="form-control" name="promo_price" value="<?php echo htmlentities($row['new_price'])?>" required>
                                    </div>
                                </div>
                                <hr>

                                <div class="offset-5">
                                    <button value="<?php echo htmlentities($row['promo_id'])?>"  type="submit" class="btn btn-outline-success" name="update_promo">Update Promo</button>
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