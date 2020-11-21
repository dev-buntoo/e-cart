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
    <div class="product-listing">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h3>Fav Products In Sale</h3>
                </div>
            </div>
            
<?php
$sql = "SELECT
product_tbl.id AS pro_id,
product_tbl.name AS pro_name,
product_tbl.price AS old_price,
product_tbl.image AS pro_img,
promos_tbl.promo_price AS new_price
FROM
product_tbl
INNER JOIN promos_tbl ON product_tbl.id = promos_tbl.pro_id
INNER JOIN fav_tbl ON product_tbl.id = fav_tbl.pro_id 
WHERE
product_tbl.promo = '1' && fav_tbl.user_id = $login_session_id
ORDER BY fav_tbl.id DESC";
$fetch = mysqli_query($conn, $sql);
if (mysqli_num_rows($fetch)>0){?>
<div class="row listing-row">
<?php
    foreach($fetch as $product){
?>
                <div class="col-md-3 product-box">
                    
                        <div class="product">
                            <a href="promo_pro.php?product=<?php echo$product['pro_id']; ?>">
                            <div class="text-center"><img class="pro-img" src="products-images/<?php echo$product['pro_img']; ?>"></div>
                            <div class="text-center pro-desc">
                                <h5><small><?php echo$product['pro_name']; ?></small></h5>
                                    <p style="font-size:smaller">
                                        <strike class=" text-danger">Old Price:<?php echo$product['old_price'];?>$</strike>
                                        <b class="text-warning">New Price:<?php echo$product['new_price'];?>$</b>
                                    </p>
                                <?php
                                    $pro_id = $product['pro_id'];
                                    $r_sql = "SELECT id FROM feedback_tbl WHERE pro_id = '$pro_id'";
                                    $run = mysqli_query($conn, $r_sql);
                                    $count = mysqli_num_rows($run);
                                ?>
                                <small class="text-success">Feedbacks ( <?php echo$count; ?> )</small>
                                </a>
                                
                                <div class="row text-center">
                                <?php if(isset($_SESSION['e-cart-customer'])){ ?>

                                    <div class="col">
                                    <?php
                                    $pro_id = $product['pro_id'];
                                    $sql = "SELECT * FROM fav_tbl WHERE pro_id = '$pro_id' && user_id = '$login_session_id'";
                                    if(mysqli_num_rows(mysqli_query($conn, $sql)) == 0){
                                    ?>
                                        <form method="POST" enctype="multipart/form-data">
                                        <button name="add_to_fav" class="btn" type="submit" value="<?php echo$product['pro_id']; ?>"><i class="fa fa-heart-o"></i></button>
                                        </form>
                                    <?php } else{?>
                                        <form method="POST" enctype="multipart/form-data">
                                        <button name="remove_fav" class="btn" type="submit" value="<?php echo$product['pro_id']; ?>"><i class="fa fa-heart"></i></button>
                                        </form>
                                    <?php }?>
                                    </div>
                                    <div class="col">
                                        <form method="POST" enctype="multipart/form-data"><button class="btn" type="submit" name="add_to_cart" value="<?php echo$product['pro_id']; ?>"><i class="fa fa-cart"></i></button></form>
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

    <?php }?>
</div>
<div class="row offset-5" style="padding-bottom: 25px;"> <a href="products_in_promition.php" class="btn btn-outline-light"> Show All </a> </div>
<?php } else {
        echo 'Nothing to Show In Sale';} ?>
            
            <div class="row text-center">
                <div class="col-md-12">
                    <h3>Fav Products</h3>
                </div>
            </div>
            <div class="row listing-row">


<?php
$sql = "SELECT 
product_tbl.id AS pro_id,
product_tbl.name AS name,
product_tbl.price AS price,
product_tbl.image AS image
FROM product_tbl
INNER JOIN fav_tbl ON product_tbl.id = fav_tbl.pro_id 
WHERE
product_tbl.promo = '0' && fav_tbl.user_id = $login_session_id
ORDER BY fav_tbl.id DESC";
$fetch = mysqli_query($conn, $sql);
if (mysqli_num_rows($fetch)>0){
    foreach($fetch as $product){
?>
                <div class="col-md-3 product-box">
                    
                        <div class="product">
                        <a href="pro_detail.php?product=<?php echo$product['pro_id']; ?>">
                            <div class="text-center"><img class="pro-img" src="products-images/<?php echo$product['image']; ?>"></div>
                            <div class="text-center pro-desc">
                                <h5><small><?php echo$product['name']; ?></small></h5>
                                    <p style="font-size:small">
                                        <b class="text-warning">Price:<?php echo$product['price'];?>$</b>
                                    </p>
                                <?php
                                    $pro_id = $product['pro_id'];
                                    $r_sql = "SELECT id FROM feedback_tbl WHERE pro_id = '$pro_id'";
                                    $run = mysqli_query($conn, $r_sql);
                                    $count = mysqli_num_rows($run);
                                ?>
                                <small class="text-success">Feedbacks ( <?php echo$count; ?> )</small>
                                </a>

                                <div class="row text-center">
                                <?php if(isset($_SESSION['e-cart-customer'])){ ?>

                                    <div class="col">
                                        <form method="POST" enctype="multipart/form-data">
                                        <button name="remove_fav" class="btn" type="submit" value="<?php echo$product['pro_id']; ?>"><i class="fa fa-heart"></i></button>
                                        </form>
                                    </div>
                                    <div class="col">
                                        <form method="POST" enctype="multipart/form-data"><button class="btn" type="submit" name="add_to_cart" value="<?php echo$product['pro_id']; ?>"><i class="fa fa-cart-plus"></i></button></form>
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