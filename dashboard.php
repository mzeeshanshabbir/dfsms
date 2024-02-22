<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/header.php');
if (strlen($_SESSION['aid']==0)) {
    header('location:logout.php');
} else{ ?>


<main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2
                class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
        >
            Dashboard
        </h2>
        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <!-- Card -->
            <?php
            $query=mysqli_query($con,"select id from tblcategory");
            $listedcat=mysqli_num_rows($query);
            ?>
            <div
                    class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
            >
                <div
                        class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
                >
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                        ></path>
                    </svg>
                </div>
                <div>
                    <p
                            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                    >
                        Categories
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        <?php echo $listedcat;?>
                    </p>
                    <small class="d-block">Listed Categories</small>
                </div>
            </div>
            <!-- Card -->

            <?php
            $ret=mysqli_query($con,"select id from tblcompany");
            $listedcomp=mysqli_num_rows($ret);
            ?>
            <div
                    class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
            >
                <div
                        class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
                >
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                                fill-rule="evenodd"
                                d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                clip-rule="evenodd"
                        ></path>
                    </svg>
                </div>
                <div>
                    <p
                            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                    >
                        Companies
                    </p>
                    <p
                            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                    >
                        <?php echo $listedcomp;?>
                    </p>
                    <small class="d-block">Listed Companies</small>
                </div>
            </div>
            <!-- Card -->
            <?php
            $sql=mysqli_query($con,"select id from tblproducts");
            $listedproduct=mysqli_num_rows($sql);
            ?>
            <div
                    class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
            >
                <div
                        class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
                >
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                                d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"
                        ></path>
                    </svg>
                </div>
                <div>
                    <p
                            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                    >
                       Products
                    </p>
                    <p
                            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                    >
                        <?php echo $listedproduct;?>
                    </p>
                    <small class="d-block">Listed Products</small>
                </div>
            </div>
            <!-- Card -->
            <?php
            $query=mysqli_query($con,"select sum(tblorders.Quantity*tblproducts.ProductPrice) as tt  from tblorders join tblproducts on tblproducts.id=tblorders.ProductId ");
            $row=mysqli_fetch_array($query);
            ?>
            <div
                    class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
            >
                <div
                        class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
                >
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                                fill-rule="evenodd"
                                d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                clip-rule="evenodd"
                        ></path>
                    </svg>
                </div>
                <div>
                    <p
                            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                    >
                        Total Sales
                    </p>
                    <p
                            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                    >
                        <?php echo number_format($row['tt'],2);?>
                    </p>
                    <small class="d-block">Total sales till date</small>
                </div>
            </div>
            <?php
            $qury=mysqli_query($con,"select sum(tblorders.Quantity*tblproducts.ProductPrice) as tt  from tblorders join tblproducts on tblproducts.id=tblorders.ProductId where date(tblorders.InvoiceGenDate)>=(DATE(NOW()) - INTERVAL 7 DAY)");
            $row=mysqli_fetch_array($qury);
            ?>
            <div
                    class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
            >
                <div
                        class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
                >
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                                fill-rule="evenodd"
                                d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                clip-rule="evenodd"
                        ></path>
                    </svg>
                </div>
                <div>
                    <p
                            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                    >
                      Last 7 Days Sales
                    </p>
                    <p
                            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                    >
                        <?php echo number_format($row['tt'],2);?>
                    </p>
                    <small class="d-block">Last 7 Days Total Sales</small>
                </div>
        </div>

            <?php
            $qurys=mysqli_query($con,"select sum(tblorders.Quantity*tblproducts.ProductPrice) as tt  from tblorders join tblproducts on tblproducts.id=tblorders.ProductId where date(tblorders.InvoiceGenDate)=CURDATE()-1");
            $rw=mysqli_fetch_array($qurys);
            ?>
            <div
                    class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
            >
                <div
                        class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
                >
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                                fill-rule="evenodd"
                                d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                clip-rule="evenodd"
                        ></path>
                    </svg>
                </div>
                <div>
                    <p
                            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                    >
                        Yesterday Sales
                    </p>
                    <p
                            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                    >
                        <?php echo number_format($rw['tt'],2);?>
                    </p>
                    <small class="d-block">Yesterday Total Sales</small>
                </div>
            </div>

            <?php
            $quryss=mysqli_query($con,"select sum(tblorders.Quantity*tblproducts.ProductPrice) as tt  from tblorders join tblproducts on tblproducts.id=tblorders.ProductId where date(tblorders.InvoiceGenDate)=CURDATE()");
            $rws=mysqli_fetch_array($quryss);
            ?>
            <div
                    class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
            >
                <div
                        class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
                >
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                                fill-rule="evenodd"
                                d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                clip-rule="evenodd"
                        ></path>
                    </svg>
                </div>
                <div>
                    <p
                            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                    >
                        Today's Sales
                    </p>
                    <p
                            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                    >
                        <?php echo number_format($rws['tt'],2);?>
                    </p>
                    <small class="d-block">Today's Total Sales</small>
                </div>
            </div>
        </div>






        <form method="post" class="container px-6 mx-auto grid">
            <h2
                    class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
                Sales Overview
            </h2>

            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h5 class="mb-3">Daily Sales</h5>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Select Product:
                </span>
                    <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    >
                        <option value="">All Products</option>
                        <?php
                        $productQuery = mysqli_query($con, "SELECT DISTINCT ProductName FROM tblproducts");
                        while ($productRow = mysqli_fetch_assoc($productQuery)) {
                            $selected = ($_POST['dailyProduct'] == $productRow['ProductName']) ? 'selected' : '';
                            echo "<option value='{$productRow['ProductName']}' $selected>{$productRow['ProductName']}</option>";
                        }
                        ?>
                    </select>
                </label>

                <label class="block mt-4 text-sm">
                    Select Date:
                    <input type="date" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" id="dailyDate" name="dailyDate"
                           value="<?= $_POST['dailyDate'] ?? ''; ?>">
                </label>
                <button type="submit"  class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" name="submitDaily">Show Daily Sales</button>

            </div>
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

      <form method="post" class="container px-6 mx-auto grid">
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <h5 class="mb-3">Monthly Sales</h5>
                <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Select Product:
                </span>
                    <select
                            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    >
                        <option value="">All Products</option>
                        <?php
                        $productQuery = mysqli_query($con, "SELECT DISTINCT ProductName FROM tblproducts");
                        while ($productRow = mysqli_fetch_assoc($productQuery)) {
                            $selected = ($_POST['monthlyProduct'] == $productRow['ProductName']) ? 'selected' : '';
                            echo "<option value='{$productRow['ProductName']}' $selected>{$productRow['ProductName']}</option>";
                        }
                        ?>
                    </select>
                </label>

                <label class="block mt-4 text-sm">
                    Select Date:
                    <input type="month" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" id="dailyDate" name="monthlyMonth"
                           value="<?= $_POST['monthlyMonth'] ?? ''; ?>">
                </label>
                <button type="submit"  class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" name="submitMonthly">Show Monthly Sales</button>

            </div>

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


        <!-- Charts -->
        <h2
                class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
        >
            Sales Chart
        </h2>
        <div class="grid gap-6 mb-8 md:grid-cols-2">
            <div
                    class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
            >
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    Revenue
                </h4>
                <canvas id="pie"></canvas>
                <div
                        class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400"
                >
                    <!-- Chart legend -->
                    <div class="flex items-center">
                    <span
                            class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"
                    ></span>
                        <span>Milk</span>
                    </div>
                    <div class="flex items-center">
                    <span
                            class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"
                    ></span>
                        <span>Ghee</span>
                    </div>
                    <div class="flex items-center">
                    <span
                            class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"
                    ></span>
                        <span>Paneer</span>
                    </div>
                </div>
            </div>
            <div
                    class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
            >
                <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                    Sales
                </h4>
                <canvas id="line"></canvas>
                <div
                        class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400"
                >
                    <!-- Chart legend -->
                    <div class="flex items-center">
                    <span
                            class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"
                    ></span>
                        <span>Daily</span>
                    </div>
                    <div class="flex items-center">
                    <span
                            class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"
                    ></span>
                        <span>Monthly</span>
                    </div>
                </div>
            </div>
        </div>

</main>
<?php } ?>


