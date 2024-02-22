<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Sales Overview</h4>
        </div>
        <div class="card-body">
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
        </div>
    </div>
</div>
