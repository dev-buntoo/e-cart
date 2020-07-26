<?php
    include("includes/db.php");
    include("includes/functions.php");
    include("includes/session.php");
    //Getting Id From the address
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM customer_tbl WHERE id = '$id'";
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


                <h4 class="mt-4">Customer Details</h3>
                    <hr>
                    <div class="d-flex flex-row-reverse">
                        <a href="customers.php" class="btn btn-outline-primary"><- Back</a>
                    </div>
                    <div class="container" style="padding: 10px 70px;">
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <input class="form-control" value="<?php echo htmlentities($row['name']); ?>" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label >Phone</label>
                                    <input class="form-control" value="<?php echo htmlentities($row['phone']); ?>" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input class="form-control" value="<?php echo htmlentities($row['email']); ?>" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Password</label>
                                    <input class="form-control" value="<?php echo htmlentities($row['password']); ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" value="<?php echo htmlentities($row['address']); ?>" disabled>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>City</label>
                                    <input class="form-control" value="<?php echo htmlentities($row['city']); ?>" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>State/Provence</label>
                                    <input class="form-control" value="<?php echo htmlentities($row['state']); ?>" disabled>
                                </div>
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