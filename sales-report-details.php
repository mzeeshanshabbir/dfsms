<?php
session_start();
//error_reporting(0);
include('includes/config.php');
include('includes/header.php');
if (strlen($_SESSION['aid']==0)) {
    header('location:logout.php');
} else{
// Code for deletion
if(isset($_GET['del'])){
    $cmpid=substr(base64_decode($_GET['del']),0,-5);
    $query=mysqli_query($con,"delete from tblcategory where id='$cmpid'");
    echo "<script>alert('Category record deleted.');</script>";
    echo "<script>window.location.href='manage-categories.php'</script>";
}
?>
<div class="container grid px-6 mx-auto">

        <h2  class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"><span class="pg-title-icon">
<?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
?>

    <span class="feather-icon"><i data-feather="database"></i></span></span>Sales report from <?php echo $fdate?> to <?php echo $tdate?></h2>
    </div>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">

                <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                >
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Month / Year</th>
                    <th class="px-4 py-3">Sale Amount</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <?php
                $rno=mt_rand(10000,99999);
                $query=mysqli_query($con,"select month(tblorders.InvoiceGenDate) as mnth,year(tblorders.InvoiceGenDate) as yearr,sum(tblorders.Quantity*tblproducts.ProductPrice) as tt  from tblorders join tblproducts on tblproducts.id=tblorders.ProductId  where date(tblorders.InvoiceGenDate) between '$fdate' and '$tdate' group by mnth,yearr");
                $cnt=1;
                while($row=mysqli_fetch_array($query))
                {
                    ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <?php echo $cnt;?>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <?php echo $row['mnth']."/".$row['yearr'];?>
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <?php echo $row['tt'];?>
                        </td>
                    </tr>
                    <?php
                    $cnt++;
                }?>

                </tbody>
            </table>
        </div>

    </div>
</div>
<?php } ?>