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



    <main class="h-full overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <h3 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Invoices
            </h3>
            <!-- CTA -->

            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                        <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                        >
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Invocie Number</th>
                            <th class="px-4 py-3">Customer Name</th>
                            <th class="px-4 py-3">Customer Contact no.</th>
                            <th class="px-4 py-3">Payment Mode</th>
                            <th class="px-4 py-3">Invoice Gen. Date</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <?php
                        $rno=mt_rand(10000,99999);
                        $query=mysqli_query($con,"select distinct InvoiceNumber,CustomerName,CustomerContactNo,PaymentMode,InvoiceGenDate  from tblorders");
                        $cnt=1;
                        while($row=mysqli_fetch_array($query))
                        {
                            ?>
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <?php echo $cnt;?>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <?php echo $row['InvoiceNumber'];?>
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    <?php echo $row['CustomerName'];?>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <?php echo $row['CustomerContactNo'];?>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <?php echo $row['PaymentMode'];?>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <?php echo $row['InvoiceGenDate'];?>
                                </td>
                                <td class="px-4 py-3">
                                    <div>
                                        <button
                                                class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                        > <a href="view-invoice.php?invid=<?php echo base64_encode($row['InvoiceNumber'].$rno);?>" >
                                           View
                                            </a></button>

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
    </main>
<?php }?>