<?php
include("includes/db.php");

include("includes/session.php");

//Getting Id From the address
$f_id = $_GET['f_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Including Head -->
    <?php
    include("includes/head.php");
    ?>


</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <?php
        include("includes/side-bar.php");
        ?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <!-- Including Top Nav -->
            <?php
            include("includes/nav.php");
            ?>

            <div class="container-fluid">
                <!-- Page Content -->


                <h4 class="mt-4">Add Warning to Store</h3>
                    <hr>
                    <div class="container" style="padding: 70px;">
                    <form method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                    <label>Warning Message</label>
                                    <textarea type="number" class="form-control" name="message"  required></textarea>
                            </div>

                            <hr>

                            <div class="offset-5">
                            <button onclick="confirm('Are you sure you?');" type="submit" class="btn btn-outline-danger" name="add_warning">Confirm</button>

                            </div>
                        </form>
                    </div>


                    <!-- /Page Content -->
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- including script -->
    <?php
    include("includes/script.php");
    include("includes/functions.php");
    ?>
</body>

</html>