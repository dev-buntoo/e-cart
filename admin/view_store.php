<?php
    include("includes/db.php");
    include("includes/functions.php");
    include("includes/session.php");
    //Getting Id From the address
    $id = $_GET['id'];
    
    $sql = "SELECT
    store_tbl.id AS store_id, store_tbl.name AS store_name, store_tbl.phone AS store_no, store_tbl.email AS store_email, store_tbl.address AS store_address, store_tbl.description AS store_description, seller_tbl.name AS store_owner
FROM
    store_tbl
INNER JOIN seller_tbl ON store_tbl.user_id = seller_tbl.id
WHERE store_tbl.id ='$id'";
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


                <h4 class="mt-4">Seller Details</h3>
                    <hr>
                    <div class="d-flex flex-row-reverse">
                        <a href="stores.php" class="btn btn-outline-primary"><- Back</a>
                    </div>
                    <div class="container" style="padding: 10px 70px;">
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <input class="form-control" value="<?php echo htmlentities($row['store_name']); ?>" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label >Phone</label>
                                    <input class="form-control" value="<?php echo htmlentities($row['store_no']); ?>" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input class="form-control" value="<?php echo htmlentities($row['store_email']); ?>" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Store Owner</label>
                                    <input class="form-control" value="<?php echo htmlentities($row['store_owner']); ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" value="<?php echo htmlentities($row['store_address']); ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" disabled><?php echo htmlentities($row['store_description']); ?></textarea>
                            </div>

                            
                            
                            <hr>

                          
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