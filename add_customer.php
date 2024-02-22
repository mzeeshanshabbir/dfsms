<?php
session_start();
include('includes/header.php');
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

<form method="post" class="container px-6 mx-auto grid">
    <h2
        class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
        Add Customer
    </h2>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">


        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Name:</span>
            <input type="text"
                   class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                   name="name" required
            />
        </label>
        <div>
            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Address:</span>
              <textarea  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                         name="address" required></textarea>
            </label>
        </div>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">phone:</span>
            <input type="text"
                   class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                   name="phone" required
            />
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Product:</span>
            <input type="text"
                   class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                   name="products" required
            />
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Amount in Kgs:</span>
            <input type="text"
                   class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                   name="amount" required
            />
        </label>

        <label class="block mt-4 text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">
                Month:
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


        <button type="submit"  class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Submit</button>

    </div>
</form>
