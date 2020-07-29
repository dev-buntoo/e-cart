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
                                    <div class="form-group col-md-6">
                                        <label>Product Name</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Category</label>
                                        <select class="form-control" name="category">
                                        <?php
                                        $sql = "SELECT * FROM category_tbl WHERE store_id ='$store_id'";
                                        $fetch_cat = mysqli_query($conn, $sql);
                                        foreach( $fetch_cat as $cat){
                                        ?>
                                        <option value="<?php echo htmlentities($cat['id']); ?>"><?php echo htmlentities($cat['name']); ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Price in USD ( $ )</label>
                                        <input type="number" class="form-control" name="price" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Image</label>
                                        <input type="file" class="form-control-file" name="image" accept="image/*" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                        <label>Product Description</label>
                                        <textarea type="text" class="form-control" name="description" required rows="5"></textarea>
                                    
                                </div>
                                <hr>

                                <div class="offset-5">
                                    <button onclick="confirm('Are you sure you want to add a new Product');" type="submit" class="btn btn-outline-success" name="add_product">Add Product</button>
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