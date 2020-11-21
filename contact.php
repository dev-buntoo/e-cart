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
    <div class="contact-clean mt-5">
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