<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
    header('location:logout.php');
} else{ ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Dashboard</title>
        <link href="vendors/vectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" type="text/css" />
        <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
        <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
        <link href="vendors/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
        <link href="dist/css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>


    <!-- HK Wrapper -->
    <div class="hk-wrapper hk-vertical-nav">

        <?php include_once('includes/navbar.php');
         include_once ('includes/sidebar-bakk.php');
        ?>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->
        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Container -->
            <div class="container-fluid mt-xl-50 mt-sm-30 mt-15">
                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hk-row">

                            <?php
                            $query=mysqli_query($con,"select id from tblcategory");
                            $listedcat=mysqli_num_rows($query);
                            ?>

                            <div class="col-lg-3 col-md-6">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-5">
                                            <div>
                                                <span class="d-block font-15 text-dark font-weight-500">Categories</span>
                                            </div>
                                            <div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <span class="d-block display-4 text-dark mb-5"><?php echo $listedcat;?></span>
                                            <small class="d-block">Listed Categories</small>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <?php
                            $ret=mysqli_query($con,"select id from tblcompany");
                            $listedcomp=mysqli_num_rows($ret);
                            ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-5">
                                            <div>
                                                <span class="d-block font-15 text-dark font-weight-500">Companies</span>
                                            </div>
                                            <div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <span class="d-block display-4 text-dark mb-5"><span class="counter-anim"><?php echo $listedcomp;?></span></span>
                                            <small class="d-block">Listed Companies</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            $sql=mysqli_query($con,"select id from tblproducts");
                            $listedproduct=mysqli_num_rows($sql);
                            ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-5">
                                            <div>
                                                <span class="d-block font-15 text-dark font-weight-500">Products</span>
                                            </div>
                                            <div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <span class="d-block display-4 text-dark mb-5"><?php echo $listedproduct;?></span>
                                            <small class="d-block">Listed Products</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $query=mysqli_query($con,"select sum(tblorders.Quantity*tblproducts.ProductPrice) as tt  from tblorders join tblproducts on tblproducts.id=tblorders.ProductId ");
                            $row=mysqli_fetch_array($query);
                            ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-5">
                                            <div>
                                                <span class="d-block font-15 text-dark font-weight-500">Total Sales</span>
                                            </div>
                                            <div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <span class="d-block display-4 text-dark mb-5"><?php echo number_format($row['tt'],2);?></span>
                                            <small class="d-block">Total sales till date</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            $qury=mysqli_query($con,"select sum(tblorders.Quantity*tblproducts.ProductPrice) as tt  from tblorders join tblproducts on tblproducts.id=tblorders.ProductId where date(tblorders.InvoiceGenDate)>=(DATE(NOW()) - INTERVAL 7 DAY)");
                            $row=mysqli_fetch_array($qury);
                            ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-5">
                                            <div>
                                                <span class="d-block font-15 text-dark font-weight-500">Last 7 Days Sales</span>
                                            </div>
                                            <div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <span class="d-block display-4 text-dark mb-5"><?php echo number_format($row['tt'],2);?></span>
                                            <small class="d-block">Last 7 Days Total Sales</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            $qurys=mysqli_query($con,"select sum(tblorders.Quantity*tblproducts.ProductPrice) as tt  from tblorders join tblproducts on tblproducts.id=tblorders.ProductId where date(tblorders.InvoiceGenDate)=CURDATE()-1");
                            $rw=mysqli_fetch_array($qurys);
                            ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-5">
                                            <div>
                                                <span class="d-block font-15 text-dark font-weight-500">Yesterday Sales</span>
                                            </div>
                                            <div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <span class="d-block display-4 text-dark mb-5"><?php echo number_format($rw['tt'],2);?></span>
                                            <small class="d-block">Yesterday Total Sales</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            $quryss=mysqli_query($con,"select sum(tblorders.Quantity*tblproducts.ProductPrice) as tt  from tblorders join tblproducts on tblproducts.id=tblorders.ProductId where date(tblorders.InvoiceGenDate)=CURDATE()");
                            $rws=mysqli_fetch_array($quryss);
                            ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-5">
                                            <div>
                                                <span class="d-block font-15 text-dark font-weight-500">Today's Sales</span>
                                            </div>
                                            <div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <span class="d-block display-4 text-dark mb-5"><?php echo number_format($rws['tt'],2);?></span>
                                            <small class="d-block">Today's Total Sales</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Section for Sales -->
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Sales Overview</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Daily Sales -->
                                                <h5 class="mb-3">Daily Sales</h5>
                                                <form action="" method="post">
                                                    <div class="form-group">
                                                        <label for="dailyProduct">Select Product:</label>
                                                        <select class="form-control" id="dailyProduct" name="dailyProduct">
                                                            <option value="">All Products</option>
                                                            <?php
                                                            $productQuery = mysqli_query($con, "SELECT DISTINCT ProductName FROM tblproducts");
                                                            while ($productRow = mysqli_fetch_assoc($productQuery)) {
                                                                $selected = ($_POST['dailyProduct'] == $productRow['ProductName']) ? 'selected' : '';
                                                                echo "<option value='{$productRow['ProductName']}' $selected>{$productRow['ProductName']}</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dailyDate">Select Date:</label>
                                                        <input type="date" class="form-control" id="dailyDate" name="dailyDate"
                                                               value="<?= $_POST['dailyDate'] ?? ''; ?>">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary" name="submitDaily">Show Daily Sales</button>
                                                </form>
                                                <?php
                                                if (isset($_POST['submitDaily'])) {
                                                    $productFilter = ($_POST['dailyProduct'] != '') ? "AND p.ProductName = '{$_POST['dailyProduct']}'" : "";
                                                    $dateFilter = ($_POST['dailyDate'] != '') ? "AND DATE_FORMAT(o.InvoiceGenDate, '%Y-%m-%d') = '{$_POST['dailyDate']}'" : "";
                                                    $dailySalesQuery = mysqli_query($con, "SELECT DATE_FORMAT(o.InvoiceGenDate, '%Y-%m-%d') AS sale_day, p.ProductName, SUM(o.Quantity) AS daily_sales_kg 
                        FROM tblorders o 
                        INNER JOIN tblproducts p ON o.ProductId = p.id 
                        WHERE 1 {$productFilter} {$dateFilter}
                        GROUP BY sale_day, p.ProductName 
                        ORDER BY sale_day DESC LIMIT 7");

                                                    while ($dailySalesRow = mysqli_fetch_assoc($dailySalesQuery)) {
                                                        echo "<p>{$dailySalesRow['sale_day']}: {$dailySalesRow['ProductName']} - {$dailySalesRow['daily_sales_kg']} KG</p>";
                                                    }
                                                }
                                                ?>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Monthly Sales -->
                                                <h5 class="mb-3">Monthly Sales</h5>
                                                <form action="" method="post">
                                                    <div class="form-group">
                                                        <label for="monthlyProduct">Select Product:</label>
                                                        <select class="form-control" id="monthlyProduct" name="monthlyProduct">
                                                            <option value="">All Products</option>
                                                            <?php
                                                            $productQuery = mysqli_query($con, "SELECT DISTINCT ProductName FROM tblproducts");
                                                            while ($productRow = mysqli_fetch_assoc($productQuery)) {
                                                                $selected = ($_POST['monthlyProduct'] == $productRow['ProductName']) ? 'selected' : '';
                                                                echo "<option value='{$productRow['ProductName']}' $selected>{$productRow['ProductName']}</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="monthlyMonth">Select Month:</label>
                                                        <input type="month" class="form-control" id="monthlyMonth" name="monthlyMonth"
                                                               value="<?= $_POST['monthlyMonth'] ?? ''; ?>">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary" name="submitMonthly">Show Monthly Sales</button>
                                                </form>
                                                <?php
                                                if (isset($_POST['submitMonthly'])) {
                                                    $productFilter = ($_POST['monthlyProduct'] != '') ? "AND p.ProductName = '{$_POST['monthlyProduct']}'" : "";
                                                    $monthFilter = ($_POST['monthlyMonth'] != '') ? "AND DATE_FORMAT(o.InvoiceGenDate, '%Y-%m') = '{$_POST['monthlyMonth']}'" : "";
                                                    $monthlySalesQuery = mysqli_query($con, "SELECT DATE_FORMAT(o.InvoiceGenDate, '%Y-%m') AS sale_month, p.ProductName, SUM(o.Quantity) AS monthly_sales_kg 
                        FROM tblorders o 
                        INNER JOIN tblproducts p ON o.ProductId = p.id 
                        WHERE 1 {$productFilter} {$monthFilter}
                        GROUP BY sale_month, p.ProductName 
                        ORDER BY sale_month DESC LIMIT 12");

                                                    while ($monthlySalesRow = mysqli_fetch_assoc($monthlySalesQuery)) {
                                                        echo "<p>{$monthlySalesRow['sale_month']}: {$monthlySalesRow['ProductName']} - {$monthlySalesRow['monthly_sales_kg']} KG</p>";
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Sales Section -->
                            <!-- Daily Sales Chart -->
                            <div id="dailySalesChart" class="mt-4"></div>

                            <!-- Daily Sales Chart Script -->
                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    // Fetch data for the daily sales chart
                                    fetchDailySalesData();

                                    // Function to fetch daily sales data
                                    function fetchDailySalesData() {
                                        fetch('fetch_daily_sales_data.php') // Create a new PHP file to fetch data from the server
                                            .then(response => response.json())
                                            .then(data => renderDailySalesChart(data))
                                            .catch(error => console.error('Error fetching daily sales data:', error));
                                    }

                                    // Function to render daily sales chart
                                    function renderDailySalesChart(data) {
                                        const options = {
                                            chart: {
                                                type: 'line',
                                                height: 500,
                                                width: 1000, // Increase the width to accommodate more days
                                                stacked: false,
                                            },
                                            series: [{
                                                name: 'Daily Sales (KG)',
                                                data: data.dailySales,
                                            }],
                                            xaxis: {
                                                categories: data.dates,
                                            },
                                            yaxis: {
                                                title: {
                                                    text: 'Sales (KG)',
                                                },
                                            },
                                            legend: {
                                                position: 'top',
                                            },
                                        };

                                        const chart = new ApexCharts(document.querySelector("#dailySalesChart"), options);
                                        chart.render();
                                    }
                                });
                            </script>





                        </div>

                    </div>
                    <!-- /Container -->

                    <!-- Footer -->
                    <?php include_once('includes/footer.php');?>
                    <!-- /Footer -->
                </div>
                <!-- /Main Content -->

            </div>
            <!-- /HK Wrapper -->

            <!-- jQuery -->
            <script src="vendors/jquery/dist/jquery.min.js"></script>
            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="dist/js/jquery.slimscroll.js"></script>
            <script src="dist/js/dropdown-bootstrap-extended.js"></script>
            <script src="dist/js/feather.min.js"></script>
            <script src="vendors/jquery-toggles/toggles.min.js"></script>
            <script src="dist/js/toggle-data.js"></script>
            <script src="vendors/waypoints/lib/jquery.waypoints.min.js"></script>
            <script src="vendors/jquery.counterup/jquery.counterup.min.js"></script>
            <script src="vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
            <script src="vendors/vectormap/jquery-jvectormap-2.0.3.min.js"></script>
            <script src="vendors/vectormap/jquery-jvectormap-world-mill-en.js"></script>
            <script src="dist/js/vectormap-data.js"></script>
            <script src="vendors/owl.carousel/dist/owl.carousel.min.js"></script>
            <script src="vendors/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
            <script src="vendors/apexcharts/dist/apexcharts.min.js"></script>
            <script src="dist/js/irregular-data-series.js"></script>
            <script src="dist/js/init.js"></script>

    </body>

    </html>
<?php } ?>

















