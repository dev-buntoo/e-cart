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



        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle list-group-item list-group-item-action bg-light">Home</a>
        <ul class="collapse list-unstyled list-group-item list-group-item-action bg-light" id="homeSubmenu">
            <li>
                <a class="list-group-item list-group-item-action bg-light" href="">Home 1</a>
            </li>
        </ul>
        <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>

    </div>
</div>