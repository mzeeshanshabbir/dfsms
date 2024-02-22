<?php
session_start();
$employees = isset($_SESSION['employees']) ? $_SESSION['employees'] : [];

echo '<div style="text-align: center; padding: 15px; margin-bottom: 20px; border: 1px solid; border-radius: 4px; background-color: #fff;">';
echo '<h2 style="margin-bottom: 20px; color: #333;">View Employees</h2>';

if (empty($employees)) {
    echo '<div style="padding: 15px; border: 1px solid; border-radius: 4px; background-color: #d1ecf1; color: #0c5460;">';
    echo 'No employees found.';
    echo '</div>';
} else {
    echo '<ul style="list-style-type: none; padding: 0; text-align: left; display: inline-block;">';
    foreach ($employees as $key => $employee) {
        echo '<li style="margin-bottom: 20px; padding: 15px; border: 1px solid #ddd; border-radius: 4px; background-color: #fff; text-align: left;">';
        echo '<strong style="color: #333;">Name:</strong> ' . $employee['name'] . '<br>';
        echo '<strong style="color: #333;">Type:</strong> ' . $employee['type'] . '<br>';
        echo '<strong style="color: #333;">Salary:</strong> ' . $employee['salary'] . '<br>';
        echo '<strong style="color: #333;">Timings:</strong> ' . $employee['timings'] . '<br>';
        echo '<strong style="color: #333;">Joining Date:</strong> ' . $employee['joining_date'] . '<br>';
        echo '<form method="post" action="delete_employee.php">';
        echo '<input type="hidden" name="employee_key" value="' . $key . '">';
        echo '<button type="submit" style="background-color: #dc3545; color: #fff; border: none; padding: 5px 10px; cursor: pointer;">Delete</button>';
        echo '</form>';
        echo '</li>';
    }
    echo '</ul>';
}

echo '</div>';
?>
