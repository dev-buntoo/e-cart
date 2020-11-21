<?php
    include("includes/db.php");
    include("includes/functions.php");
    include("includes/session.php");
    if( !isset($_SESSION['e-cart-customer'])){
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

<header class="contact-us-top" style="background-image: linear-gradient(rgba(14,14,14,0.66), rgba(14,14,14,0.66)),  url(&quot;assets/img/bg.png&quot;);">
        <div class="contact-us-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h3 class="text-center">Profile</h3>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="contact-clean">
        <form method="post">
            <h2 class="text-center">Profile</h2>
            <div class="form-group"><input value= "<?php echo htmlentities($user_row['name']) ?>" class="form-control form-control-input" type="text" name="name" placeholder="Name" required></div>
            <div class="form-group"><input value= "<?php echo htmlentities($user_row['phone']) ?>" class="form-control form-control-input" type="number" name="phone" placeholder="Phone" required></div>
            <div class="form-group"><input disabled value= "<?php echo htmlentities($user_row['email']) ?>" class="form-control form-control-input" type="email" name="email" placeholder="Email" required></div>
            <div class="form-group"><input value= "<?php echo htmlentities($user_row['city']) ?>" class="form-control form-control-input" type="city" name="city" placeholder="City" required></div>
            <div class="form-group">
                                    <select class="form-control form-control-input" name="state"  required>
                                    <?php
                                        $state = $user_row['state'];
                                        if ($state == "Punjab") {
                                        ?>
                                            <option value="Punjab" selected>Punjab</option>
                                            <option value="Sindh">Sindh</option>
                                            <option value="Bolochistan">Bolochistan</option>
                                            <option value="K P K">K P K</option>
                                        <?php
                                        }elseif($state == "Sindh"){
                                        ?>
                                        <option value="Punjab">Punjab</option>
                                            <option value="Sindh" selected>Sindh</option>
                                            <option value="Bolochistan">Bolochistan</option>
                                            <option value="K P K">K P K</option>
                                        <?php
                                        }elseif($state == "Bolochistan"){
                                        ?>
                                        <option value="Punjab">Punjab</option>
                                            <option value="Sindh">Sindh</option>
                                            <option value="Bolochistan" selected>Bolochistan</option>
                                            <option value="K P K">K P K</option>
                                        <?php
                                        }elseif($state == "K P K"){
                                        ?>
                                        <option value="Punjab">Punjab</option>
                                            <option value="Sindh">Sindh</option>
                                            <option value="Bolochistan">Bolochistan</option>
                                            <option value="K P K" selected>K P K</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
            <div
                class="form-group"><textarea class="form-control form-control-input" name="address" rows="14" placeholder="Address" required><?php echo htmlentities($user_row['address']) ?></textarea></div><button class="btn btn-primary btn-block btn-cus" type="submit" style="background-color: rgba(217,220,225,0);" name="update_pro" value= "<?php echo htmlentities($user_row['id']) ?>">Update</button></form>
                <form method="post">
            <h2 class="text-center">Password</h2>
            <div class="form-group"><input class="form-control form-control-input" type="password" name="password" placeholder="New Password" required></div>
                                 <button class="btn btn-primary btn-block btn-cus" type="submit" style="background-color: rgba(217,220,225,0);" name="update_pas" value= "<?php echo htmlentities($user_row['id']) ?>">Update Password</button></form>
                                 <form method="post">
            <h2 class="text-center text-warning">Delete Account</h2>
                                 <button class="btn btn-danger btn-block btn-cus" type="submit" onclick="confirm('Are You sure You want to delete your Account permanently')" style="background-color: red" name="del_account" value= "<?php echo htmlentities($user_row['id']) ?>">Delete Your Account</button></form>
    </div>

   
    <?php
    include("includes/footer.php");
    include("includes/script.php");
    ?>
</body>

</html>