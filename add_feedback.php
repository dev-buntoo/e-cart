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
    $order_id = $_GET['order'];
    $store_id = $_GET['store'];
    $pro_id = $_GET['pro'];
    
    ?>
     <section class="cart-sec">
        <div class="container cart-box">
            <h1 class="text-center">Add Feedback</h1>
            <form class="col-md-6 offset-md-3" method="POST" enctype="multipart/form-data">
            <div class=" form-group">
                    <textarea required rows="6" name="feedback" class="form-control" placeholder="ADD FEEDBACK"></textarea>
                </div>
                <div class="text-center form-group">
                    <button name="add_feedback" type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
            
        </div>
    </section>
    <?php
    include("includes/footer.php");
    include("includes/script.php");
    include("includes/functions.php");
    ?>
</body>

</html>
