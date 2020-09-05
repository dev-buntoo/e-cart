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
<header class="contact-us-top" style="background-image: linear-gradient(rgba(14,14,14,0.66), rgba(14,14,14,0.66)),  url(&quot;assets/img/bg.png&quot;);">
        <div class="contact-us-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h3 class="text-center">Contact Us</h3>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="contact-clean">
        <form method="post" enctype="multipart/form-data">
            <h2 class="text-center">Contact us</h2>
            <div class="form-group">
                <input class="form-control form-control-input" type="text" name="name" placeholder="Name">
            </div>
            <div class="form-group">
                <input class="form-control form-control-input" type="text" name="phone" placeholder="Phone">
            </div>
            <div class="form-group">
                <input class="form-control form-control-input" type="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <textarea class="form-control form-control-input" name="message" placeholder="Message" rows="14"></textarea>
            </div>
            <button class="btn btn-primary btn-block form-control-input" name="send_msg">send </button>
        </form>
    </div>
    <?php
    include("includes/footer.php");
    include("includes/script.php");
    ?>
</body>

</html>