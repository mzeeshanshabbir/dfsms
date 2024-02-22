<?php

session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
    header('location:logout.php');
} else{

    if (isset($_GET['del_id'])){

        //    echo $_GET['del_id'];
        $query=mysqli_query($con,"DELETE FROM customers WHERE id=".$_GET['del_id'].";");
        if ($query){
            echo "alert('Customer deleted successfully');";
            echo "window.location.href='customers.php';";
        } else {
            echo "alert('Customer cannot be deleted.');";
            echo "window.location.href='customers.php';";
        }

    }

    if (isset($_POST['submit'])){
        $customer_id=$_POST['customer_id'];
        $amount=$_POST['amount'];
        $price=$_POST['price'];
        $date=$_POST['date'];
        $query=mysqli_query($con,"insert into customers_orders (customer_id,amount,price,date) values($customer_id,'$amount','$price','$date')");
        if($query){
            echo "<script>alert('Category added successfully.');</script>";
            echo "<script>window.location.href='customers.php'</script>";

        } else{
            echo "<script>alert('Something went wrong. Please try again.');</script>";
            echo "<script>window.location.href='customers.php'</script>";
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Customers</title>
        <link href="vendors/vectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" type="text/css" />
        <link href="vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
        <link href="vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet" type="text/css">
        <link href="vendors/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
        <link href="dist/css/style.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>

    <body>
    <div class="hk-wrapper hk-vertical-nav">
        <?php
        include_once('includes/navbar.php');

        ?>
        <div class="modal fade" id="add-order-Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add orders</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">


                            <div class="form-row">
                                <div class="col-md-6 mb-10">
                                    <label for="validationCustom03">Amount in Litre</label>
                                    <input type="hidden" name="customer_id" id="user-id" value="">
                                    <input type="text" class="form-control" id="validationCustom03"   name="amount" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-10">
                                    <label for="validationCustom03">Milk price</label>
                                    <input type="text" class="form-control" id="validationCustom03"  name="price" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-10">
                                    <label for="validationCustom03">Order date</label>
                                    <input type="date" class="form-control" id="validationCustom03"  name="date" required>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->
        <div class="hk-pg-wrapper">
            <div class="container">

                <!-- Title -->
                <div class="hk-pg-header">
                    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg></span></span>Manage Customers</h4>
                </div>
                <!-- /Title -->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">
                        <section class="hk-sec-wrapper">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <table id="datable_1" class="table table-hover w-100 display pb-30">
                                            <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Number </th>
                                                <th>Order Actions</th>
                                                <th>Customer Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $query=mysqli_query($con,"select * from customers");
                                            while($row=mysqli_fetch_array($query)){
                                                ?>
                                                <tr>
                                                    <td><?= $row['id'] ?></td>
                                                    <td><?= $row['name'] ?></td>
                                                    <td><?= $row['address'] ?></td>
                                                    <td><?= $row['number'] ?></td>
                                                    <td>
                                                        <button class="mr-5 btn btn-primary" type="button" data-bs-toggle="modal" onclick="customer_id(<?= $row['id'] ?>)" data-bs-target="#add-order-Modal">Add orders</button>
                                                        <a href="order-detail.php?id=<?= $row['id'] ?>" class="mr-5 btn btn-warning" >Orders receipt </a>
                                                    </td>
                                                    <td>
                                                        <a href="edit-customer.php?id=<?= $row['id'] ?>" class="mr-5 btn btn-success" >Edit Customer</a>
                                                        <a href="?del_id=<?= $row['id'] ?>" class="mr-5 btn btn-danger" >Delete Customer</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
                <!-- /Row -->

            </div>
        </div>
    </div>

    </body>
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/jquery.slimscroll.js"></script>
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="dist/js/dataTables-data.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>
    <script src="vendors/jquery-toggles/toggles.min.js"></script>
    <script src="dist/js/toggle-data.js"></script>
    <script src="dist/js/init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        function customer_id(id) {
            $('#user-id').val(id);
        }
    </script>
    </html>
    <?php
}
?>
