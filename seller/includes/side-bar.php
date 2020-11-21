<div class=" bg-dark border-right text-white" id="sidebar-wrapper">
    <b>
    <div class="sidebar-heading">E - Cart</div>
    <hr>
    <div class="sidebar-heading">
        <?php echo htmlentities($store_name); ?>
         </div>
    <hr>
</b>
    <div class="list-group list-group-flush">
        <a href="index.php" class=" bg-dark-50 text-white-50 list-group-item list-group-item-action ">Dashboard</a>
        
        <a href="messages.php" class=" bg-dark-50 text-white-50 list-group-item list-group-item-action ">Messages</a>


        <a href="#orders" data-toggle="collapse" aria-expanded="false" class=" bg-dark-50 text-white-50 dropdown-toggle list-group-item list-group-item-action ">Orders</a>
        <ul class="collapse list-unstyled list-group-item list-group-item-action " id="orders">
            <li>
                <a class="list-group-item list-group-item-action text-white-50" href="orders.php">All Orders</a>
            </li>
            <li>
                <a class="list-group-item list-group-item-action text-white-50" href="uncon_orders.php">Unconfirmed Orders</a>
            </li>
            <li>
                <a class="list-group-item list-group-item-action text-white-50" href="inprogress_orders.php">Inprogress Orders</a>
            </li>
            <li>
                <a class="list-group-item list-group-item-action  text-white-50" href="completed_orders.php">Completed Orders</a>
            </li>
            <li>
                <a class="list-group-item list-group-item-action text-white-50" href="cancel_orders.php">Canceled Orders</a>
            </li>
        </ul>


        <a href="#category_list" data-toggle="collapse" aria-expanded="false" class="bg-dark-50 text-white-50 dropdown-toggle list-group-item list-group-item-action ">Category</a>
        <ul class="collapse list-unstyled list-group-item list-group-item-action" id="category_list">
            <li>
                <a class="list-group-item list-group-item-action  text-white-50" href="categories.php">All categories</a>
            </li>
            <li>
                <a class="list-group-item list-group-item-action  text-white-50" href="add_category.php">Add category</a>
            </li>
        </ul>

        <a href="#product_list" data-toggle="collapse" aria-expanded="false" class="bg-dark-50 text-white-50 dropdown-toggle list-group-item list-group-item-action ">Products</a>
        <ul class="collapse list-unstyled list-group-item list-group-item-action " id="product_list">
            <li>
                <a class="list-group-item list-group-item-action  text-white-50" href="products.php">All Products</a>
            </li>
            <li>
                <a class="list-group-item list-group-item-action  text-white-50" href="add_product.php">Add Product</a>
            </li>
        </ul>

      



        <a href="#customer_list" data-toggle="collapse" aria-expanded="false" class="bg-dark-50 text-white-50 dropdown-toggle list-group-item list-group-item-action ">Customers</a>
        <ul class="collapse list-unstyled list-group-item list-group-item-action " id="customer_list">
            <li>
                <a class="list-group-item list-group-item-action  text-white-50" href="customers.php">All Customers</a>
            </li>
            <li>
                <a class="list-group-item list-group-item-action  text-white-50" href="add_customer.php">Add Customer</a>
            </li>
        </ul>


        <a href="#helper" data-toggle="collapse" aria-expanded="false" class="bg-dark-50 text-white-50 dropdown-toggle list-group-item list-group-item-action ">Helpers</a>
        <ul class="collapse list-unstyled list-group-item list-group-item-action " id="helper">
            <li>
                <a class="list-group-item list-group-item-action  text-white-50" href="helpers.php">All Helper</a>
            </li>
            <li>
                <a class="list-group-item list-group-item-action  text-white-50" href="add_helper.php">Add Helper</a>
            </li>
        </ul>



        <a href="#promoSubmenu" data-toggle="collapse" aria-expanded="false" class="bg-dark-50 text-white-50 dropdown-toggle list-group-item list-group-item-action ">Promotions</a>
        <ul class="collapse list-unstyled list-group-item list-group-item-action " id="promoSubmenu">
            <li>
                <a class="list-group-item list-group-item-action  text-white-50" href="promos.php">Active Promotion</a>
            </li>
            <li>
                <a class="list-group-item list-group-item-action  text-white-50" href="add_promo.php">Add Promotion</a>
            </li>
        </ul>
    </div>
</div>