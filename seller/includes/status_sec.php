 <!-- Page Content -->
 <div id="page-content-wrapper">

<!-- Including Top Nav -->
<?php
include("includes/nav.php")
?>

<div class="container-fluid text-center">
    <!-- Page Content -->


    <h1 class="mt-4"><?php echo htmlentities($store_name); ?></h1>
    <h4>Dear Seller! We regret to inform you that your store is currently
        <br>"<b class="text-danger"><?php echo htmlentities($store_status); ?></b>"<br>
        Keep visiting you panel or Contact Admin.</h4>
    <br><br>
    <div class=" col-md-6 offset-md-3"><h4 class="mt-4">Details</h4>
    <p class=" text-success">"<?php echo htmlentities($store_status_detail); ?>"</p>
</div>
    


    <!-- /Page Content -->
</div>
</div>