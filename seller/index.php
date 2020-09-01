<?php
include("includes/db.php");
include("includes/session.php");
include("includes/functions.php");

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

    <div class="d-flex" id="wrapper">

        <?php
        include("includes/store_checker.php");
        if($store_counter == 1 && $store_status == "Approved"){
  
        ?>
            <!-- Sidebar -->
            <?php
            include("includes/side-bar.php")
            ?>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">

                <!-- Including Top Nav -->
                <?php
                include("includes/nav.php")
                ?>

                <div class="container-fluid">
                    <!-- Page Content -->

                    <?php
                    if($login_session_user_type == 1)
                    {
                    ?>
                    <h1 class="mt-4">Seller's Panel</h1>
                    <?php
                    } else{
                    ?>
                    <h1 class="mt-4">Helper Seller's Panel</h1>
                    <?php
                    }
                    ?>
                    <p> Page Content Goes Here</p>



                    <!-- /Page Content -->
                </div>
            </div>
            <!-- /#page-content-wrapper -->
        <?php } elseif($store_counter == 1 && $store_status != "Approved") { 
            include("includes/status_sec.php");
        }  else{ 
            include("includes/store_reg.php");
        }?>
    </div>
    <!-- /#wrapper -->
    <?php
    include("includes/script.php")
    ?>
</body>

</html>