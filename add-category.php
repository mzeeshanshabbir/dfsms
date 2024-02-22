<?php
session_start();
//error_reporting(0);
include('includes/config.php');
include('includes/header.php');
if (strlen($_SESSION['aid']==0)) {
    header('location:logout.php');
} else{
// Add Category Code
    if(isset($_POST['submit']))
    {
//Getting Post Values
        $catname=$_POST['category'];
        $catcode=$_POST['categorycode'];
        $query=mysqli_query($con,"insert into tblcategory(CategoryName,CategoryCode) values('$catname','$catcode')");
        if($query){
            echo "<script>alert('Category added successfully.');</script>";
            echo "<script>window.location.href='manage-categories.php'</script>";
        } else{
            echo "<script>alert('Something went wrong. Please try again.');</script>";
            echo "<script>window.location.href='add-category.php'</script>";
        }
    }

    ?>
<form method="post" class="container px-6 mx-auto grid">
    <h2
        class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
        Add Category
    </h2>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">


        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Category</span>
            <input type="text"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Category" name="category" required
            />
        </label>
        <div>
        <label class="block text-sm mt-4">
            <span class="text-gray-700 dark:text-gray-400">Category Code</span>
            <input type="text"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Category Code" name="categorycode" required
            />
        </label>
        </div>

        <button type="submit" name="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Submit</button>

    </div>
</form>

<?php } ?>
