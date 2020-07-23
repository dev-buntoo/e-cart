<?php
    include("includes/db.php");
    include("includes/functions.php");
    include("includes/session.php");
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


                <h4 class="mt-4">Add New Store</h3>
                    <hr>
                    <div class="container" style="padding: 70px;">
                        <form method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label >Phone</label>
                                    <input type="number" class="form-control" name="phone" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Store Owner</label>
                                    <select class="form-control" name="user_id" required>
                                        <?php
                                        $sql = "SELECT t1.id, t1.name 
                                        FROM seller_tbl t1 
                                        LEFT JOIN store_tbl t2 ON t2.user_id = t1.id 
                                        WHERE t2.user_id IS NULL";
                                        $fetch_sellers = mysqli_query($conn, $sql);
                                        foreach( $fetch_sellers as $seller){
                                        ?>
                                        <option value="<?php echo htmlentities($seller['id']); ?>"><?php echo htmlentities($seller['name']); ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" placeholder="1234 Main St" required>
                            </div>
                            

                            <div class="form-row">
                                    <label>Description</label>
                                    <textarea type="number" class="form-control" name="description"  required></textarea>
                            </div>

                            <hr>

                            <div class="offset-5">
                            <button onclick="confirm('Are you sure you want to add a new Store');" type="submit" class="btn btn-outline-success" name="add_store">Add Store</button>
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