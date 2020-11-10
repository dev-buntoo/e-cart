<?php
    include("includes/db.php");
    include("includes/session.php");
    include("includes/functions.php");
    $keyword = $_GET['keyword'];
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
            <div class="row text-center text-white-50">
                <div class="col-md-12">
                    <h1>Product Listings</h1>
                    <p>Showing Search Result of "<?php echo htmlentities($keyword) ?>"</p>
                </div>
            </div>
            <div class="row listing-row">


<?php
$sql = "SELECT * FROM product_tbl WHERE name LIKE '%" . $keyword .  "%' && promo ='no' ORDER BY id DESC";
$fetch = mysqli_query($conn, $sql);
if (mysqli_num_rows($fetch)>0){
    foreach($fetch as $product){
?>
                <div class="col-md-3 product-box">
                    
                        <div class="product">
                        <a style="color: white ;" href="pro_detail.php?product=<?php echo$product['id']; ?>">
                            <div class="text-center"><img class="pro-img" src="products-images/<?php echo$product['image']; ?>"></div>
                            <div class="text-center pro-desc">
                                <h5><small><?php echo$product['name']; ?></small></h5>
                                    <p style="font-size:small">
                                        <b class="text-warning">Price:<?php echo$product['price'];?>$</b>
                                    </p>
                                <?php
                                    $pro_id = $product['id'];
                                    $r_sql = "SELECT id FROM feedback_tbl WHERE pro_id = '$pro_id'";
                                    $run = mysqli_query($conn, $r_sql);
                                    $count = mysqli_num_rows($run);
                                ?>
                                <small class="text-success">Feedbacks ( <?php echo$count; ?> )</small>
                                </a>

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

    <?php }} else {
        echo 'Nothing to Show';}?>

            </div>
        </div>
    </div>
   
    <?php
    include("includes/footer.php");
    include("includes/script.php");
    ?>
</body>

</html>