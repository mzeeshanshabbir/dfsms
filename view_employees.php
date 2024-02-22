<?php
session_start();
include('includes/header.php');
$employees = isset($_SESSION['employees']) ? $_SESSION['employees'] : [];




    ?>

    <main class="h-full overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <h3 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
           Employees
        </h3>
        <!-- CTA -->
        <div>
            <button
                    class="px-4 py-2 text-sm text font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            > <a href="add_employee.php">
                    Add Employee
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
                    <th class="px-4 py-3">Type</th>
                    <th class="px-4 py-3">Salary</th>
                    <th class="px-4 py-3">Timings</th>
                    <th class="px-4 py-3">Joining Date</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
    <?php foreach ($employees as $key => $employee) { ?>
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        <?php echo  $employee['name'] ;?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <?php echo  $employee['type'];?>
                    </td>
                    <td class="px-4 py-3 text-xs">
                        <?php echo  $employee['salary'] ;?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <?php echo $employee['timings'] ;?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <?php echo $employee['joining_date']  ;?>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">

                            <form method="post" action="delete_employee.php">
                               <?php  "<input type='hidden' name='employee_key' value='' . $key . ''>" ?>
                                <button type="submit" style="background-color: #dc3545; color: #fff; border: none; padding: 5px 10px; cursor: pointer;">Delete</button>
                                </form>
                        </div>
                    </td>
                </tr>
    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
    </div>
</main>


