<nav class="hk-nav hk-nav-light">
    <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
    <div class="nicescroll-bar">
        <div class="navbar-nav-wrap">
            <ul class="navbar-nav flex-column">

                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">
                        <i class="ion ion-ios-keypad"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#cats_drp">
                        <i class="ion ion-ios-copy"></i>
                        <span class="nav-link-text">Category</span></a>
                    <ul id="cats_drp" class="nav flex-column collapse collapse-level-1">
                        <li class="nav-item">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="add-category.php">Add</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="manage-categories.php">Manage</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#company_drp">
                        <i class="ion ion-ios-copy"></i>
                        <span class="nav-link-text">Company</span></a>
                    <ul id="company_drp" class="nav flex-column collapse collapse-level-1">
                        <li class="nav-item">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="add-company.php">Add</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="manage-companies.php">Manage</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#product_drp">
                        <i class="ion ion-ios-list-box"></i>
                        <span class="nav-link-text">Product</span></a>
                    <ul id="product_drp" class="nav flex-column collapse collapse-level-1">
                        <li class="nav-item">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="add-product.php">Add</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="manage-products.php">Manage</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="search-product.php">
                        <i class="glyphicon glyphicon-search"></i>
                        <span class="nav-link-text">Search Product</span>
                    </a>
                </li>




                <li class="nav-item">
                    <a class="nav-link" href="invoices.php">
                        <i class="ion ion-ios-list-box"></i>
                        <span class="nav-link-text">Invoices</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#reports_drp">
                        <i class="ion ion-ios-today"></i>
                        <span class="nav-link-text">Reports</span></a>
                    <ul id="reports_drp" class="nav flex-column collapse collapse-level-1">
                        <li class="nav-item">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="bwdate-report-ds.php">B/w Dates</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="sales-report-ds.php">Sales</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>



                <!-- Cattle Option -->
                <ul class="navbar-nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#cattle_drp">
                            <i class="ion ion-md-paw"></i>
                            <span class="nav-link-text">Cattle</span>
                        </a>
                        <ul id="cattle_drp" class="nav flex-column collapse collapse-level-1">
                            <li class="nav-item">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="add_cattle.php">
                                            <i class="ion ion-md-add"></i>
                                            <span class="nav-link-text">Add Cattle</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="view_cattles.php">
                                            <i class="ion ion-md-eye"></i>
                                            <span class="nav-link-text">View Cattle</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>


                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#customer_drp">
                        <i class="ion ion-ios-people"></i>
                        <span class="nav-link-text">Point of sales</span>
                    </a>
                    <ul id="customer_drp" class="nav flex-column collapse collapse-level-1">
                        <li class="nav-item">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="add-walkin-customer.php">Walk-in Customer Invoice</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="add-monthly-customer.php">Monthly Customer Invoice</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- Farm Products Section in Sidebar -->
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#farm_products_drp">
                        <i class="ion ion-md-leaf"></i>
                        <span class="nav-link-text">Available Farm Products</span>
                    </a>
                    <ul id="farm_products_drp" class="nav flex-column collapse collapse-level-1">
                        <li class="nav-item">
                            <a class="nav-link" href="manage-products.php">
                                <i class="ion ion-md-add"></i>
                                <span class="nav-link-text">Edit Farm Product</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <ul class="navbar-nav flex-column">
                    <!-- Existing menu items -->

                    <!-- Add Sales Records section to sidebar -->
                    <li class="nav-item">
                        <a class="nav-link" href="sales-records.php">
                            <i class="ion ion-ios-list-box"></i>
                            <span class="nav-link-text">Sales Records</span>
                        </a>
                    </li>

                </ul>
            </ul>

            <!-- Home Delivery Section in Sidebar -->
            <ul class="navbar-nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#home_delivery">
                        <i class="ion ion-md-paw"></i>
                        <span class="nav-link-text">Home Delivery Customer</span>
                    </a>
                    <ul id="home_delivery" class="nav flex-column collapse collapse-level-1">
                        <li class="nav-item">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="view_customers.php">
                                        <i class="ion ion-md-add"></i>
                                        <span class="nav-link-text">Add </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="view_customers.php">
                                        <i class="ion ion-md-eye"></i>
                                        <span class="nav-link-text">Show Record</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>


            <ul class="navbar-nav flex-column">
                <!-- Existing menu items -->

                <!-- Add Employee Section -->
                <li class="nav-item">
                    <a class="nav-link" href="add_employee.php">
                        <i class="ion ion-ios-people"></i>
                        <span class="nav-link-text">Add Employee</span>
                    </a>
                </li>
            </ul>


            </ul>
            </ul>
            <ul class="navbar-nav flex-column">
                <!-- Existing menu items -->

                <!-- Add VIEW EMPLOYEE section to sidebar -->
                <li class="nav-item">
                    <a class="nav-link" href="view_employees.php">
                        <i class="ion ion-ios-people"></i>
                        <span class="nav-link-text">View Employee</span>
                    </a>
                </li>

            </ul>
            </ul>


            <ul class="navbar-nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#customers">
                        <i class="ion ion-md-paw"></i>
                        <span class="nav-link-text">Manage Customers</span>
                    </a>
                    <ul id="customers" class="nav flex-column collapse collapse-level-1">
                        <li class="nav-item">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="add-customers.php">
                                        <i class="ion ion-md-add"></i>
                                        <span class="nav-link-text">Add </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="customers.php">
                                        <i class="ion ion-md-eye"></i>
                                        <span class="nav-link-text">Show Record</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>

            <!--</ul>-->






            <hr class="nav-separator">

        </div>
    </div>
</nav>