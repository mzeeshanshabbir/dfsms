<?php
session_start();
include('includes/header.php');
$cattles = isset($_SESSION['cattles']) ? $_SESSION['cattles'] : [];

echo '<div style="text-align: center; padding: 15px; margin-bottom: 20px; border: 1px solid; border-radius: 4px; background-color: #fff;">';
echo '<h2 style="margin-bottom: 20px;">View Cattles</h2>';

// Check for success message
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo '<div style="color: #28a745; padding: 15px; border: 1px solid; border-radius: 4px; background-color: #d4edda;">';
    echo 'Cattle added successfully.';
    echo '</div>';
}

if (empty($cattles)) {
    echo '<div style="padding: 15px; border: 1px solid; border-radius: 4px; background-color: #d1ecf1; color: #0c5460;">';
    echo 'No cattles found.';
    echo '</div>';
} else {
    echo '<ul style="list-style-type: none; padding: 0; text-align: left; display: inline-block;">';
    foreach ($cattles as $key => $cattle) {
        echo '<li style="margin-bottom: 20px; padding: 15px; border: 1px solid #ddd; border-radius: 4px; background-color: #fff; text-align: left;">';
        echo '<strong>Animal Type:</strong> ' . $cattle['animal_type'] . '<br>';
        echo '<strong>Color:</strong> ' . $cattle['color'] . '<br>';
        echo '<strong>Milk Given:</strong> ' . $cattle['milk_given'] . '<br>';
        echo '<strong>Date:</strong> ' . $cattle['date'] . '<br>';
        echo '<form action="delete_cattle.php" method="post" style="margin-top: 10px;">';
        echo '<input type="hidden" name="cattle_key" value="' . $key . '">';
        echo '<button type="submit" style="background-color: #dc3545; color: #fff; padding: 5px 10px; border: none; border-radius: 4px; cursor: pointer;">Delete Cattle</button>';
        echo '</form>';
        echo '</li>';
    }
    echo '</ul>';
}

echo '</div>';
?>
