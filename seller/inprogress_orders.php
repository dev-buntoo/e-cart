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


                    <h4 class="mt-4">All Orders</h3>
                        <hr>
                        <div class="container" style="padding: 70px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Items</th>
                                    <th scope="col">User</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Payment Type</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT
                                order_tbl.id AS order_id,
                                order_tbl.total_price AS order_price,
                                order_tbl.status AS order_status,
                                order_tbl.payment_type AS order_payment,
                                order_tbl.r_city AS city,
                                order_tbl.user_id As user_id
                            FROM
                                order_tbl
                            INNER JOIN store_tbl ON order_tbl.store_id   = store_tbl.id
                            WHERE
                                order_tbl.status = 'delivery under progress' AND order_tbl.store_id = $store_id ORDER BY order_tbl.id DESC";
                                $fetch = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($fetch) > 0)
                                {
                                foreach( $fetch as $row){
                                ?>
                            
                                <tr>
                                    <th scope="row"><?php echo htmlentities($row['order_id']); ?></th>
                                    <td>
                                    <ol>
                                    <?php
                                        $order_id = $row['order_id'];
                                        $get_items = "SELECT
                                        product_tbl.name AS name
                                        FROM
                                            product_tbl
                                        INNER JOIN cart_tbl ON product_tbl.id = cart_tbl.pro_id
                                        WHERE
                                            cart_tbl.order_id = $order_id";
                                            $items = mysqli_query($conn, $get_items);
                                            foreach($items AS $item){
                                                ?>
                                                <li><?php echo htmlentities($item['name']); ?></li>
                                            
                                            <?php
                                            }
                                            ?>
                                    
                                    </ol>
                                    </td>
                                    <td>
                                    <?php
                                        $user_id = $row['user_id'];
                                    $get_user = "SELECT name FROM `customer_tbl` WHERE `id` = $user_id";
                                    $user = mysqli_fetch_array(mysqli_query($conn, $get_user));
                                    echo htmlentities($user['name']);
                                    ?>
                                    </td>
                                    <td><?php echo htmlentities($row['city']); ?></td>
                                    <td><?php echo htmlentities($row['order_price']); ?></td>
                                    <td><?php echo htmlentities($row['order_payment']); ?></td>
                                    <td>
                                    <?php
                                     echo htmlentities($row['order_status']);?>
                                     <a class="btn btn-outline-warning" href="update_order_status.php?id=<?php echo htmlentities($row['order_id']); ?>">Update</a>
                                     </td>
                                    
                                </tr>
                                <?php
                                
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