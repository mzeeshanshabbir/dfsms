<?php
session_start();
include('includes/header.php');
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

<form method="post" class="container px-6 mx-auto grid">
    <h2
            class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
        Add Cattle
    </h2>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">


        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Animal Type :</span>
            <input type="text"
                   class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                   id="animal_type" name="animal_type" required
            />
        </label>
        <div>
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Color :</span>
                <input type="text"
                       class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                       id="color" name="color" required
                />
            </label>
        </div>

        <div>
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Milk given :</span>
                <input type="text"
                       class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                       id="milk_given" name="milk_given" required
                />
            </label>
        </div>

        <label class="block mt-4 text-sm">
             Date :
            <input type="date" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                   id="date" name="date" required>
        </label>


        <button type="submit" name="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Add Cattle</button>

    </div>
</form>
