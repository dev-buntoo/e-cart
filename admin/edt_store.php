<?php
include("includes/db.php");
include("includes/functions.php");
include("includes/session.php");

//Getting Id From the address
$id = $_GET['id'];
$sql = "SELECT * FROM store_tbl WHERE id = '$id'";
$row = mysqli_fetch_array(mysqli_query($conn, $sql));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Including Head -->
    <?php
    include("includes/head.php");
    ?>


</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <?php
        include("includes/side-bar.php");
        ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <!-- Including Top Nav -->
            <?php
            include("includes/nav.php");
            ?>

            <div class="container-fluid">
                <!-- Page Content -->


                <h4 class="mt-4">Update Store</h3>
                    <hr>
                    <div class="container" style="padding: 70px;">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="<?php echo htmlentities($row['name']) ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label >Phone</label>
                                    <input type="number" class="form-control" name="phone" value="<?php echo htmlentities($row['phone']) ?>" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo htmlentities($row['email']) ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Store Owner</label>
                                    <select class="form-control" name="user_id" required>
                                        <?php
                                        $seller_id = $row['user_id'];
                                        $current_seller_sql = "SELECT id, name 
                                        FROM seller_tbl WHERE id = '$seller_id'";
                                        $current_seller_row = mysqli_fetch_array(mysqli_query($conn, $sql));
                                        ?>
                                        <option value="<?php echo htmlentities($current_seller_row['id']); ?>" selected><?php echo htmlentities($current_seller_row['name']); ?></option>
                                        <?php
                                        $free_seller_sql = "SELECT
                                        seller_tbl.name, seller_tbl.id
                                        FROM seller_tbl
                                        LEFT JOIN store_tbl ON store_tbl.user_id = seller_tbl.id
                                        WHERE store_tbl.user_id IS NULL";
                                        $fetch_free_seller = mysqli_query($conn, $free_seller_sql);
                                        foreach( $fetch_free_seller as $free_seller)
                                        {
                                        ?>
                                        <option value="<?php echo htmlentities($free_seller['id']); ?>"><?php echo htmlentities($free_seller['name']); ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" value="<?php echo htmlentities($row['address']) ?>" required>
                            </div>
                            

                            <div class="form-row">
                                    <label>Description</label>
                                    <textarea type="number" class="form-control" name="description"  required><?php echo htmlentities($row['description']) ?></textarea>
                            </div>

                            <hr>

                            <div class="offset-5">
                            <button value="<?php echo htmlentities($row['id']) ?>" onclick="confirm('Are you sure you?');" type="submit" class="btn btn-outline-success" name="update_store">Update Store</button>
                            </div>
                        </form>
                    </div>


                    <!-- /Page Content -->
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- including script -->
    <?php
    include("includes/script.php");
    ?>
</body>

</html>