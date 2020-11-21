<?php
session_start();
$error = "";
include("includes/db.php");
include("includes/functions.php");

if(isset($_SESSION['e-cart-seller'])){
    header("Location: index.php"); /* Redirect browser */
}
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

    <div class="col-md-4 offset-md-4 " style="margin-top: 56px ;" id="wrapper">

        <div style="padding: 25px; " class="border">
            <h3 class=" text-center display-4">Seller Login</h3>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label style="color: #D10202;"><?php echo "$error"; ?></label>
                </div>

                <button style=" border-radius: 25px;" type="submit" class="btn btn-outline-success btn-block" name="login">Submit</button>
            </form>

        </div>

    </div>
    <!-- /#wrapper -->
    <?php
    include("includes/script.php")
    ?>
</body>

</html>