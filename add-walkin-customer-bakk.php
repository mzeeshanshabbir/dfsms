<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Walk-in Customer Invoice</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Added styles for the big title */
        .form-title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        #products-container {
            margin-bottom: 20px;
        }

        .product-fields {
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        /* Changed button colors to black */
        button {
            background-color: #000;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        .receipt {
            display: none;
            margin-top: 20px;
            border: 2px solid #333;
            padding: 20px;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .total {
            font-weight: bold;
            margin-top: 10px;
        }

        /* Print styles */
        @media print {
            body * {
                visibility: visible;
            }

            .form-container, .form-container .receipt, .form-container *:not(.receipt) {
                visibility: visible;
            }

            .form-container {
                position: absolute;
                left: 0;
                top: 0;
            }

            .form-container form {
                display: none;
            }




        }
    </style>
</head>
<body>

<div class="form-container">
    <div class="form-title">WALK-IN CUSTOMER INVOICE</div>
    <?php
    $invoiceNumber = sprintf("%04d", rand(1, 9999));
    $customerName = '';
    $products = [];
    $amounts = [];
    $prices = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $customerName = isset($_POST['customer_name']) ? $_POST['customer_name'] : '';
        $products = isset($_POST['product']) ? $_POST['product'] : [];
        $amounts = isset($_POST['amount']) ? $_POST['amount'] : [];
        $prices = isset($_POST['price']) ? $_POST['price'] : [];

        if (!empty($products) && !empty($amounts) && !empty($prices)) {
            echo "<div class='receipt'>";
            echo "<h2>Receipt #$invoiceNumber</h2>";
            echo "<p><strong>Customer Name:</strong> $customerName</p>";

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

    <form method="post">
        <label for="customer_name">Customer Name:</label>
        <input type="text" name="customer_name" value="<?php echo htmlspecialchars($customerName); ?>" required><br>

        <div id="products-container">
            <!-- Initial product input fields -->
            <div class="product-fields">
                <label for="product">Product:</label>
                <select name="product[]">
                    <option value="milk">Milk</option>
                    <option value="butter">Butter</option>
                    <option value="yogurt">Yogurt</option>
                    <option value="other">Other</option>
                </select><br>

                <label for="amount">Amount (kg):</label>
                <input type="text" name="amount[]" required><br>

                <label for="price">Price:</label>
                <input type="text" name="price[]" required><br>
            </div>
        </div>

        <button type="button" onclick="addProduct()">Add Product</button>
        <button type="submit">ENTER DATA</button>
        <button type="button" onclick="printReceipt()">Print Receipt Only</button>
    </form>
</div>

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

</body>
</html>

