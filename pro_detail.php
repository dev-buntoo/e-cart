<?php
    include("includes/db.php");
    include("includes/session.php");
    include("includes/functions.php");
    $id = $_GET['product'];

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
    <div class="product-listing">
        <div class="container mt-5">
            <div class="row listing-row">


<?php
$sql = "SELECT * FROM product_tbl WHERE id = $id  ORDER BY RAND()";
$fetch = mysqli_query($conn, $sql);
$product = mysqli_fetch_array($fetch);
?>
                <div class="col-md-12 product-box m-2">
                    
                        <div class="product">
                        
                            <div class="text-left"><img height = 350px width=100% src="products-images/<?php echo$product['image']; ?>"></div>
                            <div class="text-center pro-desc mt-5">
                                <h5><small><?php echo$product['name']; ?></small></h5>
                                <?php 
                                $store_id = $product['store_id'];
                                $r_sql = "SELECT * FROM store_tbl WHERE id = '$store_id'";
                                $store = mysqli_fetch_array(mysqli_query($conn, $r_sql));
                                ?>
                                <h5><small><?php echo htmlentities($store['name']);?></small></h5>
                                    <p style="font-size:small">
                                        <b class="text-warning">Price:<?php echo$product['price'];?>$</b>
                                    </p>
                                    <div class="text-left m-5">
                                    <h5>Feedbacks</h5>
                                    <ol>
                                <?php
                                    $pro_id = $product['id'];
                                    $r_sql = "SELECT * FROM feedback_tbl WHERE pro_id = '$pro_id'";
                                    $run = mysqli_query($conn, $r_sql);
                                    foreach($run as $feedback){
                                        echo "<li>" . $feedback['feedback'] . "</li>";
                                    }
                                ?>
                                </ol>
                                </div>
                                <div class="row text-center">
                                <?php if(isset($_SESSION['super-store-customer'])){ ?>

                                    <div class="col">
                                    <?php
                                    $pro_id = $product['id'];
                                    $sql = "SELECT * FROM fav_tbl WHERE pro_id = '$pro_id' && user_id = '$login_session_id'";
                                    if(mysqli_num_rows(mysqli_query($conn, $sql)) == 0){
                                    ?>
                                        <form method="POST" enctype="multipart/form-data">
                                        <button name="add_to_fav" class="btn" type="submit" value="<?php echo$product['id']; ?>"><i class="fa fa-heart-o"></i></button>
                                        </form>
                                    <?php } else{?>
                                        <form method="POST" enctype="multipart/form-data">
                                        <button name="remove_fav" class="btn" type="submit" value="<?php echo$product['id']; ?>"><i class="fa fa-heart"></i></button>
                                        </form>
                                    <?php }?>
                                    </div>
                                    <div class="col">
                                        <form method="POST" enctype="multipart/form-data"><button class="btn" type="submit" name="add_to_cart" value="<?php echo$product['id']; ?>"><i class="fa fa-cart-plus"></i></button></form>
                                    </div>
                                <?php } else { ?>
                                    <div class="col">
                                        <button class="btn" onclick="alert('Please Login First!')"><i class="fa fa-heart-o"></i></button>
                                    
                                    </div>
                                    <div class="col">
                                       <button class="btn" onclick="alert('Please Login First!')"><i class="fa fa-cart-plus"></i></button></form>
                                    </div>

                                <?php } ?>
                                </div>

                            </div>
                        </div> 
                </div>
            </div>
        </div>
    </div>
   
    <?php
    include("includes/footer.php");
    include("includes/script.php");
    ?>
</body>

</html>