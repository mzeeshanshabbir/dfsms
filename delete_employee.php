<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['employee_key'])) {
    $employeeKey = $_POST['employee_key'];

    // Remove the employee from the session array
    if (isset($_SESSION['employees'][$employeeKey])) {
        unset($_SESSION['employees'][$employeeKey]);
        // Optionally, you can reindex the array
        $_SESSION['employees'] = array_values($_SESSION['employees']);

        // Redirect back to view_employees.php with success message
        header("Location: view_employees.php?success=1");
        exit();
    }
}

// Redirect back to view_employees.php with error message if deletion fails
header("Location: view_employees.php?error=1");
exit();
?>
