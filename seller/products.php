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


                    <h4 class="mt-4">All Categories</h3>
                        <hr>
                        <div class="container" style="padding: 70px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $sql = "SELECT
                                            product_tbl.id AS pro_id,
                                            product_tbl.name AS pro_name,
                                            product_tbl.price AS pro_price,
                                            product_tbl.image AS pro_image,
                                            category_tbl.name AS cat_name
                                        FROM
                                            product_tbl
                                        INNER JOIN category_tbl ON product_tbl.cat_id = category_tbl.id
                                        WHERE
                                            product_tbl.store_id = '$store_id'";
                                $fetch = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($fetch) > 0)
                                {
                                foreach( $fetch as $row){
                                ?>
                            
                                <tr>
                                    <th scope="row"><?php echo htmlentities($i); ?></th>
                                    <td class="text-center">
                                        <img src="../products-images/<?php echo htmlentities($row['pro_image']); ?>" alt="" width="60px" height="60px">
                                    </td>
                                    <td><?php echo htmlentities($row['pro_name']); ?></td>
                                    <td><?php echo htmlentities($row['cat_name']); ?></td>
                                    <td><?php echo htmlentities($row['pro_price']); ?></td>
                                    <td>
                                        <div class="row">
                                        <div class="col">
                                                <a class="btn btn-outline-info" href="view_pro.php?id=<?php echo htmlentities($row['pro_id']); ?>">View</a>
                                            </div>
                                            <div class="col">
                                                <a class="btn btn-outline-warning" href="edt_pro.php?id=<?php echo htmlentities($row['pro_id']); ?>">Edit</a>
                                            </div>
                                            <div class="col">
                                            <form method="POST" enctype="multipart/form-data">
                                                <button class="btn btn-outline-danger" value="<?php echo htmlentities($row['pro_id']); ?>" name="delete_pro">Delete</button>
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