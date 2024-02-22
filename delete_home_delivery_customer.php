<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form is submitted for deleting a customer
    if (isset($_POST['customer_key'])) {
        $deleteKey = $_POST['customer_key'];

        // Assuming $_SESSION['home_delivery_customers'] is the array storing home delivery customers
        if (isset($_SESSION['home_delivery_customers'][$deleteKey])) {
            unset($_SESSION['home_delivery_customers'][$deleteKey]);
            echo "<script>alert('Customer deleted successfully.');</script>";
        } else {
            echo "<script>alert('Customer not found.');</script>";
        }
    }
}