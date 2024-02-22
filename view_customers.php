<?php
session_start();
include('includes/header.php');

if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    // Delete customer based on index
    $index = $_GET['delete'];
    if (isset($_SESSION['home_delivery_customers'][$index])) {
        unset($_SESSION['home_delivery_customers'][$index]);
    }
}
?>


<main class="h-full overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <h3 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            View Home Delivery Customers
        </h3>
        <!-- CTA -->

        <div>
            <button
                class="px-4 py-2 text-sm text font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            > <a href="add_customer.php">
                    Add Customer
                </a></button>
        </div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">

                <table class="w-full whitespace-no-wrap">

                    <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Address</th>
                        <th class="px-4 py-3">Phone</th>
                        <th class="px-4 py-3">Products</th>
                        <th class="px-4 py-3">Amount</th>
                        <th class="px-4 py-3">Month</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <?php
                    if (isset($_SESSION['home_delivery_customers'])) {
                    foreach ($_SESSION['home_delivery_customers'] as $index => $customer) {
                        ?>
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        <?php echo $customer['name'];?>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <?php echo $customer['address'];?>
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                        <?php echo $customer['phone'];?>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <?php echo $customer['products'];?>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <?php echo  $customer['amount'] ;?>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <?php echo $customer['month'];?>
                                    </td>
                                    <td class="px-4 py-3">
                                            <button
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Delete"
                                            > <a href="view_customers.php?delete=<?php echo  $index ; ?>">

                                                    <svg
                                                        class="w-5 h-5"
                                                        aria-hidden="true"
                                                        fill="currentColor"
                                                        viewBox="0 0 20 20"
                                                    >
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"
                                                        ></path>
                                                    </svg>
                                                </a></button>
                                        </div>
                                    </td>
                                </tr>
                                <?php

                            }
                                }
                                ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</main>