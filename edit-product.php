<?php
session_start();
//error_reporting(0);
include('includes/config.php');
include('includes/header.php');
if (strlen($_SESSION['aid']==0)) {
    header('location:logout.php');
} else{
// Edit product Code
if(isset($_POST['update']))
{
    $pid=substr(base64_decode($_GET['pid']),0,-5);
//Getting Post Values
    $catname=$_POST['category'];
    $company=$_POST['company'];
    $pname=$_POST['productname'];
    $pprice=$_POST['productprice'];
    $query=mysqli_query($con,"update tblproducts set CategoryName='$catname',CompanyName='$company',ProductName='$pname',ProductPrice='$pprice' where id='$pid'");
    echo "<script>alert('Product updated successfully.');</script>";
    echo "<script>window.location.href='manage-products.php'</script>";

}

?>
<form method="post" class="container px-6 mx-auto grid">
    <?php
    $pid=substr(base64_decode($_GET['pid']),0,-5);
    $query=mysqli_query($con,"select * from tblproducts where id='$pid'");
    while($result=mysqli_fetch_array($query))
    {
    ?>
    <h2
            class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
       Edit Product
    </h2>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                Category
                </span>
            <select
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="category" required
            >
                <option value="<?php echo $result['CategoryName'];?>"><?php echo $catname=$result['CategoryName'];?></option>
                <?php
                $ret=mysqli_query($con,"select CategoryName from tblcategory");
                while($row=mysqli_fetch_array($ret))
                {?>
                    <option value="<?php echo $row['CategoryName'];?>"><?php echo $row['CategoryName'];?></option>
                <?php } ?>
            </select>
        </label>


        <label class="block mt-4 text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">
                Company
                </span>
            <select
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="company" required
            >
                <option value="<?php echo $result['CompanyName'];?>"><?php echo $result['CompanyName'];?></option>
                <?php
                $ret=mysqli_query($con,"select CompanyName from tblcompany");
                while($rw=mysqli_fetch_array($ret))
                {?>
                    <option value="<?php echo $rw['CompanyName'];?>"><?php echo $rw['CompanyName'];?></option>
                <?php } ?>
            </select>

        </label>

        <label class="block text-sm mt-4">
            <span class="text-gray-700 dark:text-gray-400">Product Name</span>
            <input type="text"
                   class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                   placeholder="Product Name" name="productname" value="<?php echo $result['ProductName'];?>" required
            />
        </label>

        <label class="block text-sm mt-4">
            <span class="text-gray-700 dark:text-gray-400">Product Price</span>
            <input type="text"
                   class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                   placeholder="Product Price" name="productprice" value="<?php echo $result['ProductPrice'];?>" required
            />
        </label>
<?php } ?>
        <button type="submit" name="update" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
           Update</button>


    </div>
</form>
<?php } ?>
