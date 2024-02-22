<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form submission
    $customer = [
        'name' => $_POST['name'],
        'address' => $_POST['address'],
        'phone' => $_POST['phone'],
        'products' => $_POST['products'],
        'amount' => $_POST['amount'],
        'month' => $_POST['month'],
    ];

    // Store customer in session
    $_SESSION['home_delivery_customers'][] = $customer;
    // Redirect back to view_ccustomers.php with success message
    header("Location: view_customers.php?success=1");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Home Delivery Customer</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #007bff;
            color: white;
            padding: 1em;
            text-align: center;
        }

        section {
            max-width: 600px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: grid;
            gap: 10px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #007bff;
        }

        input, textarea, select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
<header>
    <h2>Add Home Delivery Customer</h2>
</header>

<section>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="address">Address:</label>
        <textarea name="address" required></textarea>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" required>

        <label for="products">Required Products:</label>
        <input type="text" name="products" required>

        <label for="amount">Amount in kgs:</label>
        <input type="text" name="amount" required>

        <label for="month">Month:</label>
        <select name="month" required>
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
            <!-- Add other months as needed -->
        </select>

        <input type="submit" value="Add Customer">
    </form>
</section>
</body>
</html>
