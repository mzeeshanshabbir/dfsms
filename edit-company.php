<?php
session_start();
//error_reporting(0);
include('includes/config.php');
include('includes/header.php');
if (strlen($_SESSION['aid']==0)) {
    header('location:logout.php');
} else{
// Edit Company Code
if(isset($_POST['update']))
{
    $cmpid=substr(base64_decode($_GET['compid']),0,-5);
//Getting Post Values
    $cname=$_POST['companyname'];
    $query=mysqli_query($con,"update  tblcompany set  CompanyName='$cname' where id='$cmpid'");
    echo "<script>alert('Company update successfully.');</script>";
    echo "<script>window.location.href='manage-companies.php'</script>";
}

?>
<form method="post" class="container px-6 mx-auto grid">
    <?php
    $cmpid=substr(base64_decode($_GET['compid']),0,-5);
    $query=mysqli_query($con,"select * from tblcompany where id='$cmpid' ");
    $cnt=1;
    while($row=mysqli_fetch_array($query))
    {
    ?>
    <h2
            class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
        Edit Company
    </h2>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">


        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Company Name</span>
            <input type="text"
                   class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                   placeholder="Company Name" name="companyname" value="<?php echo $row['CompanyName'];?>"  required
            />
        </label>
<?php } ?>
        <button type="submit"  name="update" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Update</button>


    </div>
</form>
<?php } ?>
