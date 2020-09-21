<?php
    include("includes/db.php");
    include("includes/functions.php");
    include("includes/session.php");
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
    <header class="about-us" style="background-image: linear-gradient(rgba(14,14,14,0.66), rgba(14,14,14,0.66)),  url(&quot;assets/img/bg.png&quot;);">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h3 class="text-center">About Us</h3>
                        <p class="text-justify intro-text"><br><br><br>E-Cart is a multi-vendor web application (app) for sales and purchase of any item of any category
                            online. There can be three main users:
                            • Administrator (Admin)
                            • Seller
                            • Customer
                            User can view all the products. This application will provide options for payment: cash on delivery or
                            online payment through debit or credit card to its customers. The payments will be separate for every
                            store.
                            Seller will create his/her store and will add his/her items and categories. The application will allow
                            adding as many items and their associated categories as he/she wants to add. Seller will add his bank
                            account number on which the customers will be able to pay through their debit or credit card.
                            Admin will have the top authority in this hierarchy who can remove any user (customer or seller).
                            He/she will also have the authority to verify new stores.<br><br></p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php
    include("includes/footer.php");
    include("includes/script.php");
    ?>
</body>

</html>
