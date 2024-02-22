<?php

session_start();
//error_reporting(0);
include('includes/config.php');
include('includes/header.php');
if (strlen($_SESSION['aid']==0)) {
    header('location:logout.php');
} else{

if (isset($_GET['del_id'])){

    //    echo $_GET['del_id'];
    $query=mysqli_query($con,"DELETE FROM customers WHERE id=".$_GET['del_id'].";");
    if ($query){
        echo "<script>alert('Customer deleted successfully');</script>";
        echo "window.location.href='customers.php';";
    } else {
        echo "<script>alert('Customer cannot be deleted.');</script>";
        echo "<script>document.location='customers.php';</script>";
    }

}

if (isset($_POST['submit'])){
    $customer_id=$_POST['customer_id'];
    $amount=$_POST['amount'];
    $price=$_POST['price'];
    $date=$_POST['date'];
    $query=mysqli_query($con,"insert into customers_orders (customer_id,amount,price,date) values($customer_id,'$amount','$price','$date')");
    if($query){
        echo "<script>alert('Category added successfully.');</script>";
        echo "<script>window.location.href='customers.php'</script>";

    } else{
        echo "<script>alert('Something went wrong. Please try again.');</script>";
        echo "<script>window.location.href='customers.php'</script>";
    }
}
?>







<div class="container grid px-6 mx-auto">
    <h3 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Customers
    </h3>
    <!-- CTA -->

    <div>
        <button
                class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            <a href="add-customers.php">
                Add Customer
            </a></button>
    </div>

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">

                <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                >
                    <th class="px-4 py-3">Id</th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Address</th>
                    <th class="px-4 py-3">Number</th>
                    <th class="px-4 py-3">Order Actions</th>
                    <th class="px-4 py-3">Customer Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $query=mysqli_query($con,"select * from customers");
                while($row=mysqli_fetch_array($query)){
                    ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <?= $row['id'] ?>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <?= $row['name'] ?>
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <?= $row['address'] ?>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <?= $row['number'] ?>
                        </td>


                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <button
                                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                        data-bs-toggle="modal" onclick="customer_id(<?= $row['id'] ?>)" data-bs-target="#add-order-Modal">

                                        Add orders
                                    </button>


                                <button
                                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    <a href="order-detail.php?id=<?= $row['id'] ?>">
                                        Orders receipt
                                    </a></button>
                            </div>
                        </td>




                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <button
                                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    <a href="edit-customer.php?id=<?= $row['id'] ?>">
                                        Edit Customer
                                    </a></button>


                                <button
                                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    <a href="?del_id=<?= $row['id'] ?>">
                                    Delete Customer
                                    </a></button>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>

    </div>
</div>
    <script>
        function customer_id(id) {
            $('#user-id').val(id);
        }
    </script>
<?php } ?>