<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cattle_key'])) {
    $cattleKey = $_POST['cattle_key'];

    // Remove the cattle from the session array
    if (isset($_SESSION['cattles'][$cattleKey])) {
        unset($_SESSION['cattles'][$cattleKey]);
        // Optionally, you can reindex the array
        $_SESSION['cattles'] = array_values($_SESSION['cattles']);

        // Redirect back to view_cattles.php with success message
        header("Location: view_cattles.php?success=1");
        exit();
    }
}

// Redirect back to view_cattles.php with error message if deletion fails
header("Location: view_cattles.php?error=1");
exit();
?>
