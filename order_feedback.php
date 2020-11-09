<?php
    include("includes/db.php");
    include("includes/session.php");
    if(!isset($_SESSION['super-store-customer'])){
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
            <h1 class="text-center">Orders Feedback</h1>
            <?php
            $order_id = $_GET['order_id'];
                $sql = "SELECT
                order_tbl.id AS order_id,
                order_tbl.store_id AS store_id,
                store_tbl.name AS store_name
            FROM
                order_tbl
            INNER JOIN store_tbl ON order_tbl.store_id   = store_tbl.id
            WHERE
                order_tbl.status != 'unchecked' AND order_tbl.user_id = $login_session_id AND order_tbl.id = $order_id ORDER BY order_tbl.id DESC";
                $fetch = mysqli_query($conn, $sql);
                if (mysqli_num_rows($fetch)>0){
                  $order = mysqli_fetch_array($fetch);
                  
            ?>

            <div class="cart-listing border-danger"><strong>Order ID: <?php echo $order['order_id']; ?> [<strong>Store Name :</strong> <?php echo $order['store_name']; ?>]</strong>
                <div class="row item-cart">
                    <div class="col-4"><strong>Items</strong></div>
                    <div class="col-8"><strong>Feedback</strong></div>
                </div>
                <?php
                        $sql = "SELECT
                        product_tbl.name AS pro_name,
                        cart_tbl.pro_id AS pro_id
                    FROM
                        cart_tbl
                    INNER JOIN product_tbl ON cart_tbl.pro_id = product_tbl.id
                    WHERE
                        cart_tbl.order_id = $order_id";
                        $get_items = mysqli_query($conn, $sql);
                        foreach($get_items as $item){
                    ?>
                    <div class="row mt-3">
                    <div class="col-4"><?php echo $item['pro_name']; ?></div>
                    <?php
                    $sql1 = "SELECT * FROM feedback_tbl WHERE order_id = $order_id AND pro_id =" . $item['pro_id'];
                    $fetch = mysqli_query($conn, $sql1);
                  
                    if (mysqli_num_rows($fetch) > 0){
                    $run = mysqli_fetch_array($fetch);
                    ?>
                    <div class="col-8"> <?php echo $run['feedback'] ?></div>

                </div>

                        <?php  }else{?>
                            <div class="col-8"> 
                              <a href="add_feedback.php?order=<?php echo $order_id;?>&store=<?php echo $order['store_id'];?>&pro=<?php echo $item['pro_id'];?>" class= "btn btn-warning">Add Feedback</a>    
                            </div>
                            </div>
                        <?php  } ?>
                <?php  } ?>


            </div>


                <?php
                }
            
                else{
    echo "No Record Found";
  }?>




        </div>
    </section>
    <?php
    include("includes/footer.php");
    include("includes/script.php");
    include("includes/functions.php");
    ?>
</body>

</html>
