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


                <h1 class="mt-4">Admin Panel</h1>
                <p> Page Content Goes Here</p>



                <!-- /Page Content -->
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php
        include("includes/script.php")
        ?>
</body>

</html>