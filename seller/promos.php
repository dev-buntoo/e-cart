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


                    <h4 class="mt-4">All Active Promos on Products</h3>
                        <hr>
                        <div class="container" style="padding: 70px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pro Name</th>
                                    <th scope="col">Orignal Price</th>
                                    <th scope="col">Promo Price</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $sql = "SELECT
                                product_tbl.name AS pro_name,
                                product_tbl.price AS old_price,
                                promos_tbl.promo_price AS new_price,
                                promos_tbl.id AS promo_id
                            FROM
                                product_tbl
                            INNER JOIN promos_tbl ON product_tbl.id = promos_tbl.pro_id
                            WHERE
                                product_tbl.store_id = '$store_id' && product_tbl.promo = '1'";
                                $fetch = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($fetch) > 0)
                                {
                                foreach( $fetch as $row){
                                ?>
                            
                                <tr>
                                    <th scope="row"><?php echo htmlentities($i); ?></th>
                                    <td><?php echo htmlentities($row['pro_name']); ?></td>
                                    <td><?php echo htmlentities($row['old_price'] . "$"); ?></td>
                                    <td><?php echo htmlentities($row['new_price'] . "$"); ?></td>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <a class="btn btn-outline-warning" href="edt_promo.php?id=<?php echo htmlentities($row['promo_id']); ?>">Edit</a>
                                            </div>
                                            <div class="col">
                                            <form method="POST" enctype="multipart/form-data">
                                                <button class="btn btn-outline-danger" value="<?php echo htmlentities($row['promo_id']); ?>" name="delete_promo">Delete</button>
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