<?php
session_start();
include('includes/config.php');
include('includes/header.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $name = $_POST['name'];
    $type = $_POST['type'];
    $salary = $_POST['salary'];
    $timings = $_POST['timings'];
    $joiningDate = $_POST['joining_date'];

    // You can store the employee data in a database or an array for simplicity
    $employee = [
        'name' => $name,
        'type' => $type,
        'salary' => $salary,
        'timings' => $timings,
        'joining_date' => $joiningDate,
    ];

    // Save the employee data (in this example, I'm storing it in a session variable)
    $_SESSION['employees'][] = $employee;


    // Redirect back to view_employees.php with success message
    header("Location: view_employees.php?success=1");
    exit();
} else {
    ?>


    <form method="post" action="?action=add"  class="container px-6 mx-auto grid">
        <h2
            class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
        >
            Add Employee
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
                    <span class="text-gray-700 dark:text-gray-400">Type:</span>
                    <input type="text"
                           class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                           name="type" required
                    />
                </label>
            </div>
            <div>
                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400">Salary:</span>
                    <input type="text"
                           class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                           name="salary" required
                    />
                </label>
            </div>
            <div>
                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400">Timings:</span>
                    <input type="text"
                           class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                           name="timings" required
                    />
                </label>
            </div>
            <div>
                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400">Joining Date:</span>
                    <input type="text"
                           class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                           name="joining_date" required
                    />
                </label>
            </div>

            <button type="submit"  class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
               Add</button>

        </div>
    </form>




<?php } ?>
