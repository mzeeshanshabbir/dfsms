<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
    header('location:logout.php');
} else{
  if (isset($_GET['id'])){
      $customer_id=$_GET['id'];
    $query_customer=mysqli_query($con,"select * from customers where id=".$customer_id);
      $query_orders=mysqli_query($con,"select * from customers_orders where date BETWEEN DATE_FORMAT(NOW(), '%Y-%m-01') AND LAST_DAY(NOW()) and customer_id=".$customer_id);
      $row_customer=mysqli_fetch_array($query_customer);
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Order details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


</head>
<body>
 <div class="container-fluid">
     <h3 class="my-4 text-center">Customer orders receipt</h3>
     <div class="row">
         <div class="col-md-10">
             <h5 class="my-3">Customer Id: <?= $row_customer['id'] ?></h5>
             <h5 class="my-3">Customer Name: <?= $row_customer['name'] ?></h5>
         </div>
         <div class="col-md-2">
             <button class="btn btn-primary mt-5" id="print-btn" onclick="print_screen()" style="float: right;">Print receipt</button>
         </div>
     </div>
     <table class="table table-hover table-striped my-4">
         <tr>
             <th>Order Id #</th>
             <th>Amount of milk</th>
<!--             <th>Price of milk</th>-->
             <th>Date</th>
         </tr>
         <?php
         $total_price=0;
         while ($row_orders=mysqli_fetch_array($query_orders)){
         ?>
         <tr>
             <td><?= $row_orders['id'] ?></td>
             <td><?= $row_orders['amount'].' kg' ?></td>
<!--             <td>--><?php //= $row_orders['price'] ?><!--</td>-->
             <td><?= $row_orders['date'] ?></td>
         </tr>
         <?php
            $total_price=$total_price+$row_orders['amount'];
         }
         if (mysqli_num_rows($query_orders) == 0) {
             echo '<tr ><td colspan="4" class="text-danger text-center" >No orders for this customer</td></tr>';
         }else{

         ?>
         <tr>
             <td colspan="4" class="text-center"><b class="text-success">Total price: Rs. <?= $total_price*200 ?>/-</b></td>

         </tr>
             <?php } ?>
     </table>
 </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    let print_btn=$('#print-btn');
    function print_screen(){
        print_btn.hide();
        window.print();
        print_btn.show();
    }

</script>
</html>

<?php } } ?>
