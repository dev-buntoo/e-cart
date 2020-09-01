<?php
include("includes/db.php");
include("includes/session.php");
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

    <?php
    include("includes/store_checker.php");
    if ($store_counter == 1 && $store_status == "Approved") {

    ?>
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


                    <h4 class="mt-4">Update Helper Seller</h3>
                        <hr>
                        <?php 
                        //Getting Id From the address
$id = $_GET['id'];
$sql = "SELECT * FROM seller_tbl WHERE id = '$id' && h_store_id = '$store_id' && type = '2'";
$row = mysqli_fetch_array(mysqli_query($conn, $sql));
?>
                        <div class="container" style="padding: 70px;">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" required value="<?php echo htmlentities($row['name']); ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Phone</label>
                                    <input type="number" class="form-control" name="phone" required value="<?php echo htmlentities($row['phone']); ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" required value="<?php echo htmlentities($row['email']); ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Password</label>
                                    <input type="text" class="form-control" name="password" required value="<?php echo htmlentities($row['password']); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" placeholder="1234 Main St" required value="<?php echo htmlentities($row['address']); ?>">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="city" required value="<?php echo htmlentities($row['city']); ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>State/Provence</label>
                                    <select class="form-control" name="state" required>
                                        <?php
                                        $state = $row['state'];
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
                            </div>

                            

                            <hr>

                            <div class="offset-5">
                                <button onclick="confirm('Are you sure ?');" class="btn btn-outline-success" name="update_helper" value="<?php echo htmlentities($row['id']); ?>">Update Seller </button>
                            </div>
                        </form>
                        </div>


                        <!-- /Page Content -->
                </div>
            </div>
            <!-- /#page-content-wrapper -->
        </div>
        <!-- /#wrapper -->
    <?php } else {
        header("location: index.php");
    }
    include("includes/script.php");
    include("includes/functions.php");
    ?>
</body>

</html>