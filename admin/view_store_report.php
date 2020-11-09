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


                <h4 class="mt-4"><?php echo htmlentities($row['name']); ?> Report</h3>
                    <hr>
                    <div class="container" style="padding: 70px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">Total Categories</th>
                                    <th scope="col">Total Products</th>
                                    <th scope="col">Total Orders</th>
                                    <th scope="col">Orders Completed</th>
                                    <th scope="col">Cancled Orders</th>
                                    <th scope="col">Total Amount Earned</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td class="text-center">
                                <?php
                                $sql = "select * from category_tbl where store_id = $id";
                                $result = mysqli_num_rows(mysqli_query($conn, $sql));
                                echo $result;
                                    ?>
                                
                                </td>
                                <td class="text-center">
                                <?php
                                $sql = "select * from product_tbl where store_id = $id";
                                $result = mysqli_num_rows(mysqli_query($conn, $sql));
                                echo $result;
                                    ?>
                                
                                </td>
                                <td class="text-center">
                                <?php
                                $sql = "select * from order_tbl where store_id = $id and status != 'unchecked'";
                                $result = mysqli_num_rows(mysqli_query($conn, $sql));
                                echo $result;
                                    ?>
                                
                                </td>
                                <td class="text-center">
                                <?php
                                $sql = "select * from order_tbl where store_id = $id and status = 'delivered'";
                                $result = mysqli_num_rows(mysqli_query($conn, $sql));
                                echo $result;
                                    ?>
                                
                                </td>
                                <td class="text-center">
                                <?php
                                $sql = "select * from order_tbl where store_id = $id and status = 'canceled'";
                                $result = mysqli_num_rows(mysqli_query($conn, $sql));
                                echo $result;
                                    ?>
                                
                                </td>
                                <td class="text-center">
                                <?php
                                $sql = "select total_price from order_tbl where store_id = $id and status = 'delivered'";
                                $row = mysqli_query($conn, $sql);
                                $result = 0;
                                foreach($row as $add)
                                {
                                    $result += $add['total_price'];
                                }
                                echo $result . ' $';
                                    ?>
                                
                                </td>
                                </tr>
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