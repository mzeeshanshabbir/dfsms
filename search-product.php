<?php
session_start();
//error_reporting(0);
include('includes/config.php');
include('includes/header.php');
if (strlen($_SESSION['aid']==0)) {
    header('location:logout.php');
} else{
//code for Cart
if(!empty($_GET["action"])) {
    switch($_GET["action"]) {

//code for adding product in cart
        case "add":
            if(!empty($_POST["quantity"])) {
                $pid=$_GET["pid"];
                $result=mysqli_query($con,"SELECT * FROM tblproducts WHERE id='$pid'");
                while($productByCode=mysqli_fetch_array($result)){
                    $itemArray = array($productByCode["id"]=>array('catname'=>$productByCode["CategoryName"], 'compname'=>$productByCode["CompanyName"], 'quantity'=>$_POST["quantity"], 'pname'=>$productByCode["ProductName"], 'price'=>$productByCode["ProductPrice"],'code'=>$productByCode["id"]));
                    if(!empty($_SESSION["cart_item"])) {
                        if(in_array($productByCode["id"],array_keys($_SESSION["cart_item"]))) {
                            foreach($_SESSION["cart_item"] as $k => $v) {
                                if($productByCode["id"] == $k) {
                                    if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                        $_SESSION["cart_item"][$k]["quantity"] = 0;
                                    }
                                    $_SESSION["cart_item"][$k]["quantity"] += (int)$_POST["quantity"];

                                }
                            }
                        } else {
                            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                        }
                    }  else {
                        $_SESSION["cart_item"] = $itemArray;
                    }
                }
            }
            break;

        // code for removing product from cart
        case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if(empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        // code for if cart is empty
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}

//Code for Checkout
if(isset($_POST['checkout'])){
    $invoiceno= mt_rand(100000000, 999999999);
    $pid=$_SESSION['productid'];
    $quantity=$_POST['quantity'];
    $cname=$_POST['customername'];
    $cmobileno=$_POST['mobileno'];
    $pmode=$_POST['paymentmode'];
    $value=array_combine($pid,$quantity);
    foreach($value as $pdid=> $qty){
        $query=mysqli_query($con,"insert into tblorders(ProductId,Quantity,InvoiceNumber,CustomerName,CustomerContactNo,PaymentMode) values('$pdid','$qty','$invoiceno','$cname','$cmobileno','$pmode')") ;
    }
    echo '<script>alert("Invoice genrated successfully. Invoice number is "+"'.$invoiceno.'")</script>';
    unset($_SESSION["cart_item"]);
    $_SESSION['invoice']=$invoiceno;
    echo "<script>window.location.href='invoice.php'</script>";

}

?>
<?php ?>
<form method="post" class="container px-6 mx-auto grid">
    <h2
            class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
    >
        Search Product
    </h2>

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">


        <div>
            <label for="validationCustom03" class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Product Name</span>
                <input type="text"
                       class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                       id="validationCustom03" placeholder="Product Name" name="productname" required
                />
            </label>
        </div>

        <button type="submit" name="search" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Search</button>

    </div>
</form>

    <?php if(isset($_POST['search'])){?>
    <div class="container grid px-6 mx-auto">

        <!-- CTA -->

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">

                    <thead>
                    <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Category</th>
                        <th class="px-4 py-3">Company</th>
                        <th class="px-4 py-3">Product</th>
                        <th class="px-4 py-3">Pricing</th>
                        <th class="px-4 py-3">Quantity</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <?php
                    $pname=$_POST['productname'];
                    $query=mysqli_query($con,"select * from tblproducts where ProductName like '%$pname%'");
                    $cnt=1;
                    while($row=mysqli_fetch_array($query))
                    {
                        ?>
                            <form method="post" class="container px-6 mx-auto grid" action="search-product.php?action=add&pid=<?php echo $row["id"]; ?>">
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <?php echo $cnt;?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo $row['CategoryName'];?>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <?php echo $row['CompanyName'];?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo $row['ProductName'];?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                            <?php echo $row['ProductPrice'];?>
                            </td>
                            <td><input type="text" class="product-quantity" name="quantity" value="1" size="2" /></td>
                            <td>
                                <input type="submit" value="Add to Cart" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" />
                            </td>
                        </tr>
                            </form>
                        <?php
                        $cnt++;
                    }?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <?php } ?>

    <form method="post" class="container px-6 mx-auto grid" novalidate>
    <div class="container grid px-6 mx-auto">
        <h3 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Shopping Cart
        </h3>
        <!-- CTA -->
    <div>
        <a id="btnEmpty" href="search-product.php?action=empty" >Empty Cart</a>
    </div>
    <?php
    if(isset($_SESSION["cart_item"])){
        $total_quantity = 0;
        $total_price = 0;
        ?>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                        <th class="px-4 py-3">Product Name</th>
                        <th class="px-4 py-3">Category</th>
                        <th class="px-4 py-3">Company</th>
                        <th class="px-4 py-3">Quantity</th>
                        <th class="px-4 py-3">Unit Price</th>
                        <th class="px-4 py-3">Price</th>
                        <th class="px-4 py-3">Remove</th>
                    </tr>

                    <?php
                    $productid=array();
                    foreach ($_SESSION["cart_item"] as $item){
                        $item_price = $item["quantity"]*$item["price"];
                        array_push($productid,$item['code']);

                        ?>

                    <input type="hidden" value="<?php echo $item['quantity']; ?>" name="quantity[<?php echo $item['code']; ?>]">

                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <?php echo $item["pname"]; ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo $item["catname"]; ?>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <?php echo $item["compname"]; ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo $item["quantity"]; ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo $item["price"]; ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo number_format($item_price,2); ?>
                            </td>

                            <td class="px-4 py-3 text-sm">
                                <a href="search-product.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="dist/img/remove.png" alt="Remove Item" /></a>
                            </td>

                        </tr>
                        <?php
                        $total_quantity += $item["quantity"];
                        $total_price += ($item["price"]*$item["quantity"]);
                    }
                    $_SESSION['productid']=$productid;
                    ?>

                    <tr>
                        <td colspan="3" align="right" class="px-4 py-3 text-sm">Total:</td>
                        <td colspan="2" class="px-4 py-3 text-sm"><?php echo $total_quantity; ?></td>
                        <td class="px-4 py-3 text-sm" colspan=><strong><?php echo number_format($total_price, 2); ?></strong></td>
                        <td></td>
                    </tr>

                    </tbody>
                </table>



                    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Customer Name</span>
                            <input type="text"
                                   class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                   id="validationCustom03" placeholder="Customer Name" name="customername" required
                            />
                        </label>

                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Customer Mobile Number</span>
                                <input type="text"
                                       class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                       id="validationCustom03" placeholder="Mobile Number" name="mobileno" required
                                />
                            </label>

                        <div class="mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                Payment Mode
                </span>
                            <div class="mt-2">
                                <label
                                        class="inline-flex items-center text-gray-600 dark:text-gray-400"
                                >
                                    <input
                                            type="radio"
                                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                            id="customControlValidation2" name="paymentmode" value="cash" required
                                    />
                                    <span class="ml-2">Cash</span>
                                </label>
                                <label
                                        class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400"
                                >
                                    <input
                                            type="radio"
                                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                            id="customControlValidation3" name="paymentmode" value="card" required
                                    />
                                    <span class="ml-2">Card</span>
                                </label>
                            </div>
                            <div class="col-md-6 mb-10">
                                <button  class="px-4 py-2 mt-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                         type="submit" name="checkout">Checkout</button>
                            </div>
                        </div>


                        </div>


                </form>
        <?php
    } else {
        ?>
        <div style="color:red" align="center">Your Cart is Empty</div>
        <?php
    }
    ?>

            </div>

        </div>
    </div>

    <style type="text/css">
        #btnEmpty {
            background-color: #ffffff;
            border: #d00000 1px solid;
            padding: 5px 10px;
            color: #d00000;
            float: right;
            text-decoration: none;
            border-radius: 3px;
            margin: 10px 0px;
        }

    </style>

<?php } ?>