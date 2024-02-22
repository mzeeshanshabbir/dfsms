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
                    $inid=$_SESSION['invoice'];
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

            <?php } ?>
