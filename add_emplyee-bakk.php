<?php
session_start();
include('includes/config.php');

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
    // Display the form
    echo '<div style="text-align: center; padding: 15px; margin-bottom: 20px; border: 1px solid; border-radius: 4px; background-color: #fff;">';
    echo '<h2 style="margin-bottom: 20px;">Add Employee</h2>';
    echo '<form method="post" action="?action=add">';
    echo '<div style="margin-bottom: 15px; text-align: left; display: inline-block;">';
    echo '<label for="name">Name:</label>';
    echo '<input type="text" style="width: 100%; padding: 10px; box-sizing: border-box;" name="name" required>';
    echo '</div>';
    echo '<div style="margin-bottom: 15px; text-align: left; display: inline-block;">';
    echo '<label for="type">Type:</label>';
    echo '<input type="text" style="width: 100%; padding: 10px; box-sizing: border-box;" name="type" required>';
    echo '</div>';
    echo '<div style="margin-bottom: 15px; text-align: left; display: inline-block;">';
    echo '<label for="salary">Salary:</label>';
    echo '<input type="text" style="width: 100%; padding: 10px; box-sizing: border-box;" name="salary" required>';
    echo '</div>';
    echo '<div style="margin-bottom: 15px; text-align: left; display: inline-block;">';
    echo '<label for="timings">Timings:</label>';
    echo '<input type="text" style="width: 100%; padding: 10px; box-sizing: border-box;" name="timings" required>';
    echo '</div>';
    echo '<div style="margin-bottom: 15px; text-align: left; display: inline-block;">';
    echo '<label for="joining_date">Joining Date:</label>';
    echo '<input type="text" style="width: 100%; padding: 10px; box-sizing: border-box;" name="joining_date" required>';
    echo '</div>';
    echo '<button type="submit" style="background-color: #000; color: #fff; border: 1px solid #000; border-radius: 4px; padding: 10px 15px; cursor: pointer;">Add Employee</button>';
    echo '</form>';
    echo '</div>';
}
?>
