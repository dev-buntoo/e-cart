<?php
include("includes/db.php");
include("includes/session.php");
$get_id = $_GET['id'];
$get_cat_sql = "SELECT * FROM category_tbl WHERE id = '$get_id'";
$row_category= mysqli_fetch_array(mysqli_query($conn, $get_cat_sql));
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


                    <h4 class="mt-4">Update Category</h3>
                        <hr>
                        <div class="container" style="padding: 70px;">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-6 offset-md-3">
                                        <label>Category Name</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo htmlentities($row_category['name'])?>" required>
                                    </div>
                                </div>
                                <hr>

                                <div class="offset-5">
                                    <button value="<?php echo htmlentities($row_category['id'])?>"  type="submit" class="btn btn-outline-success" name="update_cat">Update Category</button>
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