<?php
    include("includes/db.php");
    include("includes/session.php");
    include("includes/functions.php");
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
            <h1 class="text-center">Cart</h1>
            <h6 class="text-center text-primary"><span style="text-decoration: underline;">NOTE:BILING FOR EVERY STORE IS SEPERATE</span></h6>
            <?php
                $sql = "SELECT
                order_tbl.id AS order_id,
                order_tbl.store_id AS store_id,
                store_tbl.name AS store_name
            FROM
                order_tbl
            INNER JOIN store_tbl ON order_tbl.store_id   = store_tbl.id
            WHERE
                order_tbl.status = 'unchecked' AND order_tbl.user_id = $login_session_id";
                $fetch = mysqli_query($conn, $sql);
                if (mysqli_num_rows($fetch)>0){
                    foreach($fetch as $order){
                        $order_id = $order['order_id'];
                        $pro_sql = "SELECT
                        product_tbl.name AS pro_name,
                        product_tbl.price AS pro_price,
                        cart_tbl.quantity AS pro_quantity,
                        product_tbl.image AS pro_img,
                        cart_tbl.id AS cart_id,
                        product_tbl.promo AS promo,
                        product_tbl.id AS pro_id

                    FROM
                        cart_tbl
                    INNER JOIN product_tbl ON cart_tbl.pro_id = product_tbl.id
                    WHERE
                        cart_tbl.order_id = $order_id";
                        $fetch_pro = mysqli_query($conn, $pro_sql);
                        if(mysqli_num_rows($fetch_pro) > 0){
                            
            ?>
            
            
            <div class="cart-listing"><strong><?php echo $order['store_name'] ;?></strong>
            <?php foreach ($fetch_pro as $item){
                if($item['promo'] == 1){
                $sql = "SELECT promo_price FROM promos_tbl WHERE pro_id = '" . $item['pro_id'] ."' ";
                $get_price = mysqli_fetch_array(mysqli_query($conn, $sql));
                $item['pro_price'] = $get_price['promo_price'];
                }
                ?>


                <div class="row item-cart">
                    <div class="col-2 text-center">
                    <p><?php echo $item['pro_name']; ?></p>
                    <img class="pro-img-cart" src="products-images/<?php echo$item['pro_img']; ?>">
                    </div>
                    <div class="col-3 text-center"><strong>Peice 1pcs</strong>
                    
                        <div class="price-per"><strong><?php echo $item['pro_price']; ?></strong></div>
                    </div>
                    <div class="col-3 text-center"><strong>Quantity</strong>
                        <div class="price-per">
                            <form class="d-inline-flex flex-row" method="post" enctype="multipart/form-data">
                                <input class="form-control" type="number" name="pro_quantity"  value="<?php echo $item['pro_quantity']; ?>">
                                <button value =" <?php echo $item['cart_id']; ?>" name="update_quantity" class="btn btn-primary">OK</button></form>
                        </div>
                    </div>
                    <div class="col-2 text-center">
                    <strong>Quantity</strong>
                        <div>
                            <?php echo $item['pro_price']*$item['pro_quantity'] ?>
                        </div>
                    </div>
                    <div class="col-2 text-center"><strong>Remove</strong>
                        <div class="price-per">
                            <form method="POST" enctype="multipart/form-data"><button value="<?php echo $item['cart_id']; ?>" class="btn btn-danger" name="remove_from_cart"><i class="fa fa-close"></i></button></form>
                        </div>
                    </div>
                </div>
            <?php } ?>
               
                <div class="row checkout-row"><a class="btn btn-warning offset-8 checkout-btn" role="button" href="checkout.php?order_id=<?php echo $order_id ?>">Check out From this store</a></div>
            </div>


                <?php 
                }
                
                 }
                }
                else{
    echo "Please Add Items to cart";
  }?>




        </div>
    </section>
    <?php
    include("includes/footer.php");
    include("includes/script.php");
    ?>
</body>

</html>