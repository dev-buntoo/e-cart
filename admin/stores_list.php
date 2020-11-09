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


                <h4 class="mt-4">All Stores List</h3>
                    <hr>
                    <div class="container" style="padding: 70px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Owner</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $sql = "SELECT
                                store_tbl.id AS store_id, store_tbl.name AS store_name, store_tbl.phone AS store_no, store_tbl.email AS store_email, store_tbl.status AS store_status, seller_tbl.name AS store_owner
                            FROM
                                store_tbl
                            INNER JOIN seller_tbl ON store_tbl.user_id = seller_tbl.id";
                                $fetch = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($fetch) > 0)
                                {
                                foreach( $fetch as $row){
                                ?>
                            
                                <tr>
                                    <th scope="row"><?php echo htmlentities($i); ?></th>
                                    <td><?php echo htmlentities($row['store_name']); ?></td>
                                    <td><?php echo htmlentities($row['store_no']); ?></td>
                                    <td><?php echo htmlentities($row['store_email']); ?></td>
                                    <td><?php echo htmlentities($row['store_owner']); ?></td>
                                    <td class="text-center">
                                        <?php echo htmlentities($row['store_status']); ?>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <a class="btn btn-outline-success" href="view_store_report.php?id=<?php echo htmlentities($row['store_id']); ?>">View Report</a>
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

    <!-- including script -->
    <?php
    include("includes/script.php");
    ?>
</body>

</html>