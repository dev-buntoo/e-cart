<nav class="navbar navbar-light navbar-expand-lg navbar navbar-expand-lg fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">
            <img class="brand-img" src="assets/img/superstore.png">
        </a>
        <button data-toggle="collapse" class="navbar-toggler navbar-toggler-right" data-target="#navbarResponsive" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" value="Menu">
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item nav-link js-scroll-trigger" role="presentation" style="padding-top: 16px;">
                    <div class="nav-item dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">categories</a>
                        <div class="dropdown-menu" role="menu">
                            <?php 
                                $sql = "SELECT * FROM category_tbl ORDER BY id DESC";
                                $fetch = mysqli_query($conn, $sql);
                                foreach( $fetch as $category){
                            ?>
                            <a class="dropdown-item text-dark" role="presentation" href="products_in_category.php?category=<?php echo $category['id'] ?>"><?php echo $category['name'] ?></a>
                                <?php } ?>
                        </div>
                    </div>
                </li>
                <li class="nav-item nav-link js-scroll-trigger" role="presentation"><a class="nav-link js-scroll-trigger" href="about.php">About</a></li>
                <li class="nav-item nav-link js-scroll-trigger" role="presentation"><a class="nav-link js-scroll-trigger" href="contact.php">Contact Us</a></li>
            </ul>


<!-- show on the base of session -->

            <ul class="nav navbar-nav ml-auto">
                <?php
    if(isset($_SESSION['super-store-customer'])){
?>
                <li class="nav-item nav-link js-scroll-trigger" role="presentation">
                    <a class="nav-link js-scroll-trigger" href="">
                        <i class="fa fa-opencart"></i>
                    </a>
                </li>
                <li class="nav-item nav-link js-scroll-trigger" role="presentation" style="padding-top: 16px;">
                    <div class="nav-item dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><?php echo $login_session_name ?></a>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" role="presentation" href="#" style="color: rgb(0,0,0);">Profile</a>
                            <form method="post">
                                <button name="signout" class="dropdown-item" role="presentation"  style="color: rgb(0,0,0);">SIGN OUT</button>
                            </form>
                    </div>
                    </div>
                </li>
    <?php } else {?>
                <li class="nav-item nav-link js-scroll-trigger" role="presentation">
                    <a class="nav-link js-scroll-trigger" href="signin.php"><u>Sign IN</u></a>
                </li>
                <li class="nav-item nav-link js-scroll-trigger" role="presentation">
                    <a class="nav-link js-scroll-trigger" href="signup.php"><u>Sign Up</u></a>
                </li>

    <?php } ?>
            </ul>



        </div>
    </div>
</nav>