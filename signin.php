<?php
session_start();
$error = '';
    include("includes/db.php");
    include("includes/functions.php");
    if(isset($_SESSION['e-cart-customer'])){
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
    <div class="contact-clean mt-5">
        <form method="post">

            <h2 class="text-center">Sign IN</h2>
            <div class="form-group"><input class="form-control form-control-input" type="email" name="email" placeholder="Email" required></div>
            <div class="form-group"><input class="form-control form-control-input" type="password" name="password" placeholder="Password" required></div>
            <label class="text-danger"><?php echo $error; ?></label>            
            <button class="btn btn-primary btn-block btn-cus" type="submit" style="background-color: rgba(217,220,225,0);" name="signin">Sign In</button>
        </form>
    </div>
   
    <?php
    include("includes/footer.php");
    include("includes/script.php");
    ?>
</body>

</html>