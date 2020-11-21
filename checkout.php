<?php
    include("includes/db.php");
    include("includes/session.php");
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







<section class="cart-sec" >
        <div class="container cart-box">
            <h1 class="text-center">Checkout</h1>

            <?php
            $order_id = $_GET['order_id'];
            $total_price = 0 ;
                $sql = "SELECT
                order_tbl.id AS order_id,
                order_tbl.store_id AS store_id,
                store_tbl.name AS store_name
            FROM
                order_tbl
            INNER JOIN store_tbl ON order_tbl.store_id   = store_tbl.id
            WHERE
                order_tbl.status = 'unchecked' AND order_tbl.user_id = $login_session_id AND order_tbl.id = $order_id";
                $fetch = mysqli_query($conn, $sql);
                $order = mysqli_fetch_array($fetch);
                
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


            <h6 class="text-center text-primary"><span style="text-decoration: underline;"><?php echo $order['store_name']?></span></h6>
            <div class="cart-listing"><strong>Order Number   [ <?php echo $order['order_id']?> ]</strong>


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
                    </div><div class="col-2 text-center">
                    <img class="pro-img-cart" src="products-images/<?php echo$item['pro_img']; ?>">
                    </div>
                    <div class="col-3 text-center"><strong>Price 1pcs</strong>
                    
                        <div class="price-per"><strong><?php echo $item['pro_price']; ?></strong></div>
                    </div>
                    <div class="col-3 text-center"><strong>Quantity</strong>
                        <div class="price-per">
                            <?php echo $item['pro_quantity']; ?>
                               
                        </div>
                    </div>
                    <div class="col-2 text-center">
                    <strong>Total</strong>
                        <div>
                            <?php echo $item['pro_price']*$item['pro_quantity'] ;
                            $total_price = $total_price + ($item['pro_price']*$item['pro_quantity']);
                            ?>
                        </div>
                    </div>
                    
                </div>
            <?php }?>


            <div class="row item-cart text-primary">
                <div class="col-3 offset-7 text-center"><strong>Total Amount</strong></div>
                <div class="col-2 text-center">
                <strong><?php echo $total_price; ?> $</strong>
                               
                        </div>
                </div>



                <div class="container reciver-info">
                    <h2>Reciver Info</h2>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group custom-group">
                                    <label>Name</label>
                                    <input name="name" class="form-control" type="text" required>
                                </div>
                                <div class="form-group custom-group">
                                    <label>Phone</label>
                                    <input class="form-control" type="number" name="phone" required>
                                </div>
                                <div class="form-group custom-group">
                                    <label>Address</label>
                                    <textarea class="form-control"  name="address" required></textarea>
                                </div>

                            </div>
                            <div class="col-md-6">
                               <div class="form-group custom-group">
                                   <label>City</label>
                                   <input class="form-control" type="text"  name="city" required>
                                </div>
                                <div class="form-group custom-group">
                                    <label>Provience</label>
                                    <select class="form-control" name="province"  required>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Sindh">Sindh</option>
                                        <option value="Bolochistan">Bolochistan</option>
                                        <option value="K P K">K P K</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div>
                                <h4>Payment Info</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group custom-group">
                                    <label>Payment Type</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="COD" name="payment_type" required>
                                        <label class="form-check-label" for="COD">Cash On Delivery</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Online"  name="payment_type" required>
                                        <label class="form-check-label" for="Online">Cradit / Debit Card</label></div>
                                </div>
                                <strong>Fill out these detail for online payment</strong>
                                <div class="form-group custom-group">
                                    <label>Card No</label>
                                    <input class="form-control" type="number" name="c_no" value="0">
                                </div>
                                <div class="form-group custom-group">
                                    <label>Password</label>
                                    <input class="form-control" type="number" name="c_pas" value="0">
                                </div>
                                <div class="row checkout-row">
                                    <button class="btn btn-warning offset-8 checkout-btn" name="place_order">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>


                <?php }?>
        </div>
    </section>












    <?php
    include("includes/footer.php");
    include("includes/script.php");
    
    include("includes/functions.php");
    ?>
</body>

</html>