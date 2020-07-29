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


                    <h4 class="mt-4">Update Product</h3>
                        <?php
                         $pro_id = $_GET['id'];
                         $sql = "SELECT
                                     product_tbl.id AS pro_id,
                                     product_tbl.name AS pro_name,
                                     product_tbl.price AS pro_price,
                                     product_tbl.image AS pro_image,
                                     product_tbl.description AS pro_description,
                                     category_tbl.name AS cat_name
                                 FROM
                                     product_tbl
                                 INNER JOIN category_tbl ON product_tbl.cat_id = category_tbl.id
                                 WHERE
                                             product_tbl.id = '$pro_id'";
                        $row_pro = mysqli_fetch_array(mysqli_query($conn, $sql));
                        ?>
                        <hr>
                        <div class="d-flex flex-row-reverse">
                        <a href="products.php" class="btn btn-outline-primary"><- Back</a>
                    </div>
                        <div class="container" style="padding: 70px;">
                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <br><br>
                                <img src="../products-images/<?php echo htmlentities($row_pro['pro_image']); ?>" alt="" width="400px" height="400px">
                                        </div>
                                    <div class="form-group col-md-6">
                                        <label>Product Name</label>
                                        <input value="<?php echo htmlentities($row_pro['pro_name']) ?>" type="text" class="form-control" name="name" disabled>
                                        <br>
                                        <label>Category</label>
                                        <input value="<?php echo htmlentities($row_pro['cat_name']) ?>" class="form-control" name="category" disabled>
                                        <br>
                                        <label>Price in USD ( $ )</label>
                                        <input value="<?php echo htmlentities($row_pro['pro_price']) ?>" type="number" class="form-control" name="price" disabled>
                                        <br>
                                        <label>Product Description</label>
                                    <textarea type="text" class="form-control" name="description" disabled rows="5"><?php echo htmlentities($row_pro['pro_description']) ?></textarea>
                                    </div>
                                    
                                </div>
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