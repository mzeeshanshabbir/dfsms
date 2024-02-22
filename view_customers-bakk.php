<?php
session_start();

if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    // Delete customer based on index
    $index = $_GET['delete'];
    if (isset($_SESSION['home_delivery_customers'][$index])) {
        unset($_SESSION['home_delivery_customers'][$index]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Home Delivery Customers</title>
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
            max-width: 800px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #007bff;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<header>
    <h2>View Home Delivery Customers</h2>
</header>

<section>
    <table>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Products</th>
            <th>Amount</th>
            <th>Month</th>
            <th>Action</th>
        </tr>

        <?php
        if (isset($_SESSION['home_delivery_customers'])) {
            foreach ($_SESSION['home_delivery_customers'] as $index => $customer) {
                echo '<tr>';
                echo '<td>' . $customer['name'] . '</td>';
                echo '<td>' . $customer['address'] . '</td>';
                echo '<td>' . $customer['phone'] . '</td>';
                echo '<td>' . $customer['products'] . '</td>';
                echo '<td>' . $customer['amount'] . '</td>';
                echo '<td>' . $customer['month'] . '</td>';
                echo '<td><a href="view_customers.php?delete=' . $index . '">Delete</a></td>';
                echo '</tr>';
            }
        }
        ?>
    </table>
</section>
</body>
</html>
