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
                include("includes/nav.php")
                ?>

                <div class="container-fluid">
                    <!-- Page Content -->


                    <h4 class="mt-4">Add A New Product</h3>
                        <hr>
                        <div class="container" style="padding: 70px;">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-8  offset-md-2">
                                        <label>Select Product</label>
                                        <select class="form-control" name="product_id">
                                        <?php
                                        $sql = "SELECT * FROM product_tbl WHERE store_id ='$store_id' && promo = '0'";
                                        $fetch = mysqli_query($conn, $sql);
                                        foreach( $fetch as $pro){
                                        ?>
                                        <option value="<?php echo htmlentities($pro['id']); ?>"><?php echo htmlentities($pro['name'] . " [ Orignal Price : " . $pro['price'] . "$ ]"); ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-8  offset-md-2">
                                        <label>Enter Promo Price in USD ( $ )</label>
                                        <input type="number" class="form-control" name="promo_price" required>
                                    </div>
                                </div>
                               
                                <hr>

                                <div class="offset-5">
                                    <button onclick="confirm('Are you sure you want to add a Promotion');" type="submit" class="btn btn-outline-success" name="add_promo">Add Product</button>
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