<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cattle = [
        'animal_type' => $_POST['animal_type'],
        'color' => $_POST['color'],
        'milk_given' => $_POST['milk_given'],
        'date' => $_POST['date'],
    ];

    // Add cattle to the session array
    $_SESSION['cattles'][] = $cattle;

    // Redirect back to view_cattles.php with success message
    header("Location: view_cattles.php?success=1");
    exit();
}
?>

<!-- Add Cattle Form -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Cattle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<form action="" method="post">
    <h2>Add Cattle</h2>
    <label for="animal_type">Animal Type:</label>
    <input type="text" id="animal_type" name="animal_type" required>

    <label for="color">Color:</label>
    <input type="text" id="color" name="color" required>

    <label for="milk_given">Milk Given:</label>
    <input type="text" id="milk_given" name="milk_given" required>

    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required>

    <button type="submit">Add Cattle</button>
</form>

</body>

</html>
