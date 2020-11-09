<div class="bg-light border-right" id="sidebar-wrapper">
    <b>
    <div class="sidebar-heading">The Online Super Store </div>
    <hr>
    <div class="sidebar-heading">
        <?php echo htmlentities($store_name); ?>
        <br>Seller Panel </div>
    <hr>
</b>
    <div class="list-group list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>


        <a href="#orders" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle list-group-item list-group-item-action bg-light">Orders</a>
        <ul class="collapse list-unstyled list-group-item list-group-item-action bg-light" id="orders">
            <li>
                <a class="list-group-item list-group-item-action bg-light" href="orders.php">All Orders</a>
            </li>
            <li>
                <a class="list-group-item list-group-item-action bg-light" href="uncon_orders.php">Unconfirmed Orders</a>
            </li>
            <li>
                <a class="list-group-item list-group-item-action bg-light" href="inprogress_orders.php">Inprogress Orders</a>
            </li>
            <li>
                <a class="list-group-item list-group-item-action bg-light" href="completed_orders.php">Completed Orders</a>
            </li>
            <li>
                <a class="list-group-item list-group-item-action bg-light" href="cancel_orders.php">Canceled Orders</a>
            </li>
        </ul>


        <a href="#category_list" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle list-group-item list-group-item-action bg-light">Category</a>
        <ul class="collapse list-unstyled list-group-item list-group-item-action bg-light" id="category_list">
            <li>
                <a class="list-group-item list-group-item-action bg-light" href="categories.php">All categories</a>
            </li>
            <li>
                <a class="list-group-item list-group-item-action bg-light" href="add_category.php">Add category</a>
            </li>
        </ul>

        <a href="#product_list" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle list-group-item list-group-item-action bg-light">Products</a>
        <ul class="collapse list-unstyled list-group-item list-group-item-action bg-light" id="product_list">
            <li>
                <a class="list-group-item list-group-item-action bg-light" href="products.php">All Products</a>
            </li>
            <li>
                <a class="list-group-item list-group-item-action bg-light" href="add_product.php">Add Product</a>
            </li>
        </ul>

      



        <a href="#customer_list" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle list-group-item list-group-item-action bg-light">Customers</a>
        <ul class="collapse list-unstyled list-group-item list-group-item-action bg-light" id="customer_list">
            <li>
                <a class="list-group-item list-group-item-action bg-light" href="customers.php">All Customers</a>
            </li>
            <li>
                <a class="list-group-item list-group-item-action bg-light" href="add_customer.php">Add Customer</a>
            </li>
        </ul>


        <a href="#helper" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle list-group-item list-group-item-action bg-light">Helpers</a>
        <ul class="collapse list-unstyled list-group-item list-group-item-action bg-light" id="helper">
            <li>
                <a class="list-group-item list-group-item-action bg-light" href="helpers.php">All Helper</a>
            </li>
            <li>
                <a class="list-group-item list-group-item-action bg-light" href="add_helper.php">Add Helper</a>
            </li>
        </ul>



        <a href="#promoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle list-group-item list-group-item-action bg-light">Promotions</a>
        <ul class="collapse list-unstyled list-group-item list-group-item-action bg-light" id="promoSubmenu">
            <li>
                <a class="list-group-item list-group-item-action bg-light" href="promos.php">Active Promotion</a>
            </li>
            <li>
                <a class="list-group-item list-group-item-action bg-light" href="add_promo.php">Add Promotion</a>
            </li>
        </ul>



        <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>

    </div>
</div>