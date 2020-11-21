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


                    <h4 class="mt-4">All Helpers</h3>
                        <hr>
                        <div class="container" style="padding: 70px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $sql = "SELECT * FROM seller_tbl WHERE type = '2' && h_store_id = '$store_id' ORDER BY id DESC";
                                $fetch = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($fetch) > 0)
                                {
                                foreach( $fetch as $row){
                                ?>
                            
                                <tr>
                                    <th scope="row"><?php echo htmlentities($i); ?></th>
                                    <td><?php echo htmlentities($row['name']); ?></td>
                                    <td><?php echo htmlentities($row['phone']); ?></td>
                                    <td><?php echo htmlentities($row['email']); ?></td>
                                    <td><?php echo htmlentities($row['city']); ?></td>
                                    <td><?php echo htmlentities("Seller"); ?></td>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <a class="btn btn-outline-success" href="view_helper.php?id=<?php echo htmlentities($row['id']); ?>">View</a>
                                            </div>
                                            <div class="col">
                                                <a class="btn btn-outline-warning" href="edt_helper.php?id=<?php echo htmlentities($row['id']); ?>">Edit</a>
                                            </div>
                                            <div class="col">
                                            <form method="POST" enctype="multipart/form-data">
                                                <button class="btn btn-outline-danger" value="<?php echo htmlentities($row['id']); ?>" name="delete_helper"> X </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                                }
                                
                             }
                                else {
                                    echo "Nothing to show";
                                }
                                ?>
                            </tbody>
                        </table>
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