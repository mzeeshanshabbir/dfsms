<?php
session_start();
//error_reporting(0);
include('includes/config.php');
include('includes/header.php');
if (strlen($_SESSION['aid']==0)) {
    header('location:logout.php');
} else{
// Add Category Code
    if(isset($_POST['submit']) && isset($_GET['id']))
    {
        $name=$_POST['name'];
        $address=$_POST['address'];
        $number=$_POST['number'];
        $customer_id=$_GET['id'];
        $query=mysqli_query($con,"update customers set name='".$name."', address='".$address."',number=".$number." where id=".$customer_id);
        if($query){
            echo "<script>alert('Customer Update successfully.');</script>";
            echo "<script>window.location.href='edit-customer.php?id=".$customer_id."'</script>";

        } else{
            echo "<script>alert('Something went wrong. Please try again.');</script>";
            echo "<script>window.location.href='edit-customer.php?id=".$customer_id."'</script>";
        }
    }

    ?>




<?php
if (isset($_GET['id'])) {
    $query = mysqli_query($con, "select * from customers where id=".$_GET['id']);
    $row = mysqli_fetch_array($query);
//                             echo $row['name'];
//                                 die();
    ?>
<form method="post" class="container px-6 mx-auto grid">
    <h2
            class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
        Edit Customer
    </h2>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">


        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Customer Name :</span>
            <input type="text"
                   class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                   value="<?= $row['name'] ?>" name="name" required
            />
        </label>
        <div>
            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Adress :</span>
                <input type="text"
                       class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                       value="<?= $row['address'] ?>" name="address" required
                />
            </label>
        </div>

        <div>
            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Phone No :</span>
                <input type="number"
                       class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                       value="<?= $row['number'] ?>" name="number" required
                />
            </label>
        </div>

        <button type="submit" name="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Save</button>

    </div>
</form>
<?php } }  ?>
