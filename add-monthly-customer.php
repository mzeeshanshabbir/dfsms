<?php
include('includes/header.php');
$invoiceNumber = sprintf("%04d", rand(1, 9999));
$customerName = '';
$month = '';
$products = [];
$amounts = [];
$prices = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerName = isset($_POST['customer_name']) ? $_POST['customer_name'] : '';
    $month = isset($_POST['month']) ? $_POST['month'] : '';
    $products = isset($_POST['product']) ? $_POST['product'] : [];
    $amounts = isset($_POST['amount']) ? $_POST['amount'] : [];
    $prices = isset($_POST['price']) ? $_POST['price'] : [];

    if (!empty($products) && !empty($amounts) && !empty($prices)) {
        echo "<div class='receipt'>";
        echo "<h2>Receipt #$invoiceNumber</h2>";
        echo "<p><strong>Customer Name:</strong> $customerName</p>";
        echo "<p><strong>Month:</strong> $month</p>";

        echo "<table>";
        echo "<tr><th>Product</th><th>Amount (kg)</th><th>Price</th></tr>";

        $totalPrice = 0;

        for ($i = 0; $i < count($products); $i++) {
            $product = $products[$i];
            $amount = $amounts[$i];
            $price = $prices[$i];

            echo "<tr><td>$product</td><td>$amount</td><td>$price</td></tr>";

            $totalPrice += $amount * $price;
        }

        echo "</table>";

        echo "<p class='total'>Total Price: $totalPrice</p>";

        echo "</div>";
    }
}
?>

<form method="post" class="container px-6 mx-auto grid">
    <h1
        class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
        Monthly CUSTOMER INVOICE
    </h1>



    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Customer Name :</span>
            <input type="text"
                   class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                   name="customer_name" value="<?php echo htmlspecialchars($customerName); ?>" required
            />
        </label>

        <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
             Month :
                </span>
            <select
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                name="month" required
            >
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
            </select>
        </label>



        <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
             Product :
                </span>
            <select
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="product[]" required
            >
                <option value="milk">Milk</option>
                <option value="yogurt">Yogurt</option>
                <option value="ghee">Ghee</option>
                <option value="other">Other</option>

            </select>
        </label>


        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Amount (kg):</span>
            <input type="text"
                   class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                   name="amount[]" required
            />
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Price :</span>
            <input type="text"
                   class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                   name="price[]" required
            />
        </label>

        <div>
            <button type="button" onclick="addProduct()" class="px-5 py-3 mt-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Add Product</button>

            <button type="submit" name="submit" class="px-5 py-3 mt-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                ENTER DATA</button>

            <button type="button" onclick="printReceipt()" class="px-5 py-3 mt-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Print Receipt Only</button>
        </div>

    </div>
</form>

<script>
    function addProduct() {
        // Clone the product fields and append to the products container
        var productFields = document.querySelector('.product-fields');
        var clone = productFields.cloneNode(true);
        document.getElementById('products-container').appendChild(clone);
    }

    function printReceipt() {
        var receipt = document.querySelector('.receipt');
        var content = receipt.innerHTML;
        var newWindow = window.open('', '_blank');
        newWindow.document.write('<html><head><title>Print Receipt</title></head><body>' + content + '</body></html>');
        newWindow.document.close();
        newWindow.print();
    }
</script>