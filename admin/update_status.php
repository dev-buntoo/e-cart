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


                <h4 class="mt-4">Update Admin</h3>
                    <hr>
                    <div class="container" style="padding: 70px;">
                        <form method="POST" enctype="multipart/form-data">
                            
                            
                            <div class="form-row">
                                
                                <div class="form-group col-md-6">
                                    <label>Status</label>
                                    <select class="form-control" name="status" required>
                                        <?php
                                        $status = $row['status'];
                                        if ($status == "Unapproved")
                                        {
                                        ?>
                                            <option value="Unapproved" selected>Unapproved</option>
                                            <option value="Approved">Approved</option>
                                            <option value="Blocked Due To Bad Reviews">Blocked Due To Bad Reviews</option>
                                        <?php
                                        }elseif($status == "Approved"){
                                        ?>
                                         <option value="Unapproved" >Unapproved</option>
                                            <option value="Approved" selected>Approved</option>
                                            <option value="Blocked Due To Bad Reviews">Blocked Due To Bad Reviews</option>
                                        <?php } elseif($status == "Blocked Due To Bad Reviews"){?>
                                            <option value="Unapproved" >Unapproved</option>
                                            <option value="Approved" >Approved</option>
                                            <option value="Blocked Due To Bad Reviews" selected>Blocked Due To Bad Reviews</option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                
                                    <label>Description</label>
                                    <textarea name="description" class="form-control"><?php echo htmlentities($row['status_description']) ?></textarea>
                                
                            </div>

                            <hr>

                            <div class="offset-5">
                                <button onclick="confirm('Are you sure ?');" class="btn btn-outline-success" name="update_status" value="<?php echo htmlentities($row['id']); ?>">Update Status</button>
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