<?php
    include("includes/db.php");
    include("includes/session.php");
    include("includes/functions.php");
    if(!isset($_SESSION['e-cart-customer'])){
        header("Location: index.php");
    }
    ?>
<!DOCTYPE html>
<html>

<head>
<!-- Including Head -->
<?php
    include("includes/head.php");
    ?>
</head>

<body id="page-top">

<?php
    include("includes/nav.php");
    ?>
    <section class="cart-sec">
        <div class="container cart-box">
            <h1 class="text-center">Orders</h1>
            <?php
                $sql = "SELECT
                order_tbl.id AS order_id,
                order_tbl.store_id AS store_id,
                store_tbl.name AS store_name,
                order_tbl.total_price AS order_price,
                order_tbl.status AS order_status,
                order_tbl.payment_type AS order_payment
            FROM
                order_tbl
            INNER JOIN store_tbl ON order_tbl.store_id   = store_tbl.id
            WHERE
                order_tbl.status != 'unchecked' AND order_tbl.user_id = $login_session_id ORDER BY order_tbl.id DESC";
                $fetch = mysqli_query($conn, $sql);
                if (mysqli_num_rows($fetch)>0){
                    foreach($fetch as $order){
            ?>

            <div class="cart-listing border-danger"><strong>Order ID: <?php echo $order['order_id']; ?></strong>
                <div class="row item-cart">
                    <div class="col-2 "><strong>Store Name :</strong> <br> <?php echo $order['store_name']; ?></div>

                    <div class="col-3 "><strong>Items : </strong>
                    <ol>
                    <?php
                        $order_id = $order['order_id'];
                        $sql = "SELECT
                        cart_tbl.id AS cart_id,
                        product_tbl.name AS pro_name,
                        cart_tbl.quantity AS pro_quantity

                    FROM
                        cart_tbl
                    INNER JOIN product_tbl ON cart_tbl.pro_id = product_tbl.id
                    WHERE
                        cart_tbl.order_id = $order_id";
                        $get_items = mysqli_query($conn, $sql);
                        foreach($get_items as $item){
                    ?>
                    <li><?php echo $item['pro_name'] ?> ( x <?php echo $item['pro_quantity'] ?> )</li>
                        <?php }?>
                        </ol>
                    </div>
                    <div class="col-1 "><strong>Total Price</strong>
                   <br>
                   <?php echo $order['order_price'] ?> $

                    </div>
                    <div class="col-2"><strong>Status</strong>
                   <br>
                   <?php echo $order['order_status'] ?>

                    </div>
                    <div class="col-2"><strong>Payment Type</strong>
                   <br>
                   <?php echo $order['order_payment'] ?>

                    </div>

                    <div class="col-2"><strong>Feedback</strong>
                   <br>
                   <?php
                   if($order['order_status'] == "delivered"){
                        ?>
                   <a class="btn btn-success" href="order_feedback.php?order_id=<?php echo $order['order_id']; ?>">Feedback</a>
                        <?php } ?>
                    </div>

                </div>

            </div>


                <?php
                }
            }
                else{
    echo "No Record Found";
  }?>




        </div>
    </section>
    <?php
    include("includes/footer.php");
    include("includes/script.php");
    ?>
</body>

</html>
