<?php
session_start();
error_reporting(0);
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
        <h4 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            View Invoice
        </h4>

        <h3 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            DFSMS
        </h3>



        <!-- CTA -->

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">

                <table class="w-full whitespace-no-wrap">


                    <div class="row">
                        <div class="col-xl-12">


                            <section class="hk-sec-wrapper hk-invoice-wrap pa-35">
                                <div class="invoice-from-wrap">
                                    <div class="row">
                                        <div class="col-md-7 mb-20">
                                            <h3 class="mb-35 font-weight-600">     DFSMS </h3>
                                            <h6 class="mb-5">Dairy Farm Shop Management System</h6>

                                        </div>

                                        <?php
                                        //Consumer Details
                                        $inid=substr(base64_decode($_GET['invid']),0,-5);
                                        $query=mysqli_query($con,"select distinct InvoiceNumber,CustomerName,CustomerContactNo,PaymentMode,InvoiceGenDate  from tblorders  where InvoiceNumber='$inid'");
                                        $cnt=1;
                                        while($row=mysqli_fetch_array($query))
                                        {
                                        ?>
                                        <div class="col-md-5 mb-20">
                                            <h4 class="mb-35 font-weight-600">Invoice / Receipt</h4>
                                            <span class="d-block">Date:<span class="pl-10 text-dark"><?php echo $row['InvoiceGenDate'];?></span></span>
                                            <span class="d-block">Invoice / Receipt #<span class="pl-10 text-dark"><?php echo $row['InvoiceNumber'];?></span></span>
                                            <span class="d-block">Customer #<span class="pl-10 text-dark"><?php echo $row['CustomerName'];?></span></span>
                                            <span class="d-block">Customer Mobile No #<span class="pl-10 text-dark"><?php echo $row['CustomerContactNo'];?></span></span>
                                            <span class="d-block">Payment Mode #<span class="pl-10 text-dark"><?php echo $row['PaymentMode'];?></span></span>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>



                                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Product Name</th>
                        <th class="px-4 py-3">Category</th>
                        <th class="px-4 py-3">Company</th>
                        <th class="px-4 py-3">Quantity</th>
                        <th class="px-4 py-3">Unit Price</th>
                        <th class="px-4 py-3">Price</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <?php
                    //Product Details
                    $query=mysqli_query($con,"select tblproducts.CategoryName,tblproducts.ProductName,tblproducts.CompanyName,tblproducts.ProductPrice,tblorders.Quantity  from tblorders join tblproducts on tblproducts.id=tblorders.ProductId where tblorders.InvoiceNumber='$inid'");
                    $cnt=1;
                    while($row=mysqli_fetch_array($query))
                    {
                        ?>
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <?php echo $cnt;?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo $row['ProductName'];?>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <?php echo $row['CategoryName'];?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo $row['CompanyName'];?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo $qty=$row['Quantity'];?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo $ppu=$row['ProductPrice'];?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo $subtotal=number_format($ppu*$qty,2);?>
                            </td>
                        </tr>
                        <?php
                        $grandtotal+=$subtotal;
                        $cnt++;
                    } ?>
                    <tr>
                        <th class="px-4 py-3">Total</th>
                        <th class="px-4 py-3"><?php echo number_format($grandtotal,2);?></th>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

<?php } ?>
