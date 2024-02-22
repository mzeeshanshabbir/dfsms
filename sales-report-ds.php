<?php
session_start();
//error_reporting(0);
include('includes/config.php');
include('includes/header.php');

if (strlen($_SESSION['aid']==0)) {
    header('location:logout.php');
} else{
// Add company Code
    if(isset($_POST['submit']))
    {
//Getting Post Values
        $cname=$_POST['companyname'];
        $query=mysqli_query($con,"insert into tblcompany(CompanyName) values('$cname')");
        if($query){
            echo "<script>alert('Company added successfully.');</script>";
            echo "<script>window.location.href='add-company.php'</script>";
        } else{
            echo "<script>alert('Something went wrong. Please try again.');</script>";
            echo "<script>window.location.href='add-company.php'</script>";
        }
    }

    ?>

    <form method="post" class="container px-6 mx-auto grid" action="sales-report-details.php" novalidate>
        <h2
                class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
        >
            Sales Report Date Selection
        </h2>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">


            <label class="block mt-4 text-sm">
                From Date
                <input type="date" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                       name="fromdate" required >
            </label>

            <label class="block mt-4 text-sm">
                To Date
                <input type="date" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                       name="todate" required >
            </label>



            <button type="submit" name="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Submit</button>

        </div>
    </form>


<?php } ?>