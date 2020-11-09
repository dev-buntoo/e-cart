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


                <h4 class="mt-4">All Feedbacks</h3>
                    <hr>
                    <div class="container" style="padding: 70px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Store Name</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Order Id</th>
                                    <th scope="col">Feedback</th>
                                    <th scope="col">Warning</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $sql = "SELECT * from feedback_tbl";
                                $fetch = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($fetch) > 0)
                                {
                                foreach( $fetch as $row){
                                ?>
                            
                                <tr>
                                    <th scope="row"><?php echo htmlentities($i); ?></th>
                                    <td><?php 
                                    $store_sql = "SELECT * FROM store_tbl WHERE id = " . $row['store_id'];
                                    $get_store = mysqli_fetch_array(mysqli_query($conn, $store_sql));
                                    echo $get_store['name'];
                                    ?></td>
                                    <td><?php
                                    $product_sql = "SELECT * FROM product_tbl WHERE store_id = " . $row['store_id'];
                                    $get_pro = mysqli_fetch_array(mysqli_query($conn, $product_sql));
                                    echo $get_pro['name'];
                                    ?></td>
                                    <td><?php echo htmlentities($row['order_id']); ?></td>
                                    <td><?php echo htmlentities($row['feedback']); ?></td>
                                    
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                            <?php
                                $sql = "SELECT * from warning_tbl where feedback_id =" . $row['id'];
                                $count = mysqli_num_rows(mysqli_query($conn, $sql));
                                if($count == 0){
                            ?>
                                                <a class="btn btn-outline-warning" href="generate_warning.php?f_id=<?php echo htmlentities($row['id']); ?>">Generate Warning</a>
                                <?php  }
                                else{
                                    $message = mysqli_fetch_array(mysqli_query($conn, $sql));
                                    echo $message['message'];
                                }
                                ?>
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