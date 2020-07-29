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


                    <h4 class="mt-4">View Product</h3>
                        <?php
                        $pro_id = $_GET['id'];
                        $sql = "SELECT * FROM  product_tbl WHERE id = '$pro_id'";
                        $row_pro = mysqli_fetch_array(mysqli_query($conn, $sql));
                        ?>
                        <hr>

                        <div class="container" style="padding: 70px;">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <br><br>
                                        <img id="blah" src="../products-images/<?php echo htmlentities($row_pro['image']); ?>" alt="" width="400px" height="400px">
                                        <div class="form-group">
                                            <label for="">Image</label>
                                            <input class=" form-control-file" type="file" name="image">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Product Name</label>
                                        <input value="<?php echo htmlentities($row_pro['name']) ?>" type="text" class="form-control" name="name" required>
                                        <br>
                                        <label>Category</label>
                                        <select class="form-control" name="category" required>
                                            <?php
                                            $get_cat_sql = "SELECT * FROM  category_tbl
                                            WHERE  store_id = '$store_id'";
                                            $cat_sql = mysqli_query($conn, $get_cat_sql);
                                            while ($cat_row = mysqli_fetch_array($cat_sql)) {
                                                if ($cat_row['id'] == $row_pro['cat_id']) {
                                            ?>
                                                    <option value="<?php echo htmlentities($cat_row['id']); ?>" selected><?php echo htmlentities($cat_row['name']); ?></option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="<?php echo htmlentities($cat_row['id']);?>">
                                                        <?php echo htmlentities($cat_row['name']); ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <br>
                                        <label>Price in USD ( $ )</label>
                                        <input value="<?php echo htmlentities($row_pro['price']) ?>" type="number" class="form-control" name="price" required>
                                        <br>
                                        <label>Product Description</label>
                                        <textarea type="text" class="form-control" name="description" required rows="5"><?php echo htmlentities($row_pro['description']) ?></textarea>
                                    </div>

                                </div>
                                <hr>

                                <div class="offset-5">
                                    <button onclick="confirm('Are you sure?');" type="submit" class="btn btn-outline-success" name="update_product">Udate Product</button>
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