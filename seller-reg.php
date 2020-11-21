<?php
    include("includes/db.php");
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
    <div class="contact-clean">
        <form method="post">
            <h2 class="text-center">Seller Registration Form</h2>
            <div class="form-group"><input class="form-control form-control-input" type="text" name="name" placeholder="Name" required></div>
            <div class="form-group"><input class="form-control form-control-input" type="number" name="phone" placeholder="Phone" required></div>
            <div class="form-group"><input class="form-control form-control-input" type="email" name="email" placeholder="Email" required></div>
            <div class="form-group"><input class="form-control form-control-input" type="password" name="password" placeholder="Password" required></div>
            <div class="form-group"><input class="form-control form-control-input" type="text" name="city" placeholder="City" required></div>
            <div class="form-group"><input class="form-control form-control-input" type="number" name="zip" placeholder="Zip" required></div>
            <div class="form-group">
                                    <select class="form-control form-control-input" name="state"  required>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Sindh">Sindh</option>
                                        <option value="Bolochistan">Bolochistan</option>
                                        <option value="K P K">K P K</option>
                                    </select>
                                </div>
            <div
                class="form-group"><textarea class="form-control form-control-input" name="address" rows="14" placeholder="Address" required></textarea></div>
                <button class="btn btn-primary btn-block btn-cus" type="submit" style="background-color: rgba(217,220,225,0);" name="seller-reg">Confirm</button></form>
    </div>
   
    <?php
    include("includes/footer.php");
    include("includes/script.php");
    ?>
</body>

</html>