<?php
    include("includes/db.php");
    include("includes/session_2.php");
    include("includes/functions.php");
    
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
        
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <!-- Including Top Nav -->
            <?php
            include("includes/nav.php");
            ?>

            <div class="container-fluid">
                <!-- Page Content -->


                <h4 class="mt-4">Add You Store Details</h3>
                    <hr>
                    <div class="container" style="padding: 70px;">
                        <form method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Store Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label >Store Phone</label>
                                    <input type="number" class="form-control" name="phone" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Store Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Store Owner</label>
                                    <input type="text" class="form-control" name="user_id" value="<?php echo htmlentities($login_session_name);?>" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Store Address</label>
                                <input type="text" class="form-control" name="address" placeholder="1234 Main St" required>
                            </div>
                            

                            <div class="form-row">
                                    <label>Store Description</label>
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