<?php
session_start();
//error_reporting(0);
include('includes/config.php');
include_once('includes/header.php');
if (strlen($_SESSION['aid']==0)) {
    header('location:logout.php');
} else{

    ?>


    <main class="h-full overflow-y-auto">
        <div class="container grid px-6 mx-auto">
            <h3
                    class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
                Products
            </h3>
            <!-- CTA -->

            <div>
                <button
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                > <a href="add-product.php">
                        Add product
                    </a></button>
            </div>

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
                            <th class="px-4 py-3">Posting Date</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                        </thead>
                        <tbody
                                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                        >
                        <?php
                        $rno=mt_rand(10000,99999);
                        $query=mysqli_query($con,"select * from tblproducts");
                        $cnt=1;
                        while($row=mysqli_fetch_array($query))
                        {
                            ?>
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
                                <td class="px-4 py-3 text-sm">
                                    <?php echo $row['PostingDate'];?>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <button
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Edit"
                                        ><a href="edit-product.php?pid=<?php echo base64_encode($row['id'].$rno);?>" class="mr-25" data-toggle="tooltip" data-original-title="Edit">
                                            <svg
                                                    class="w-5 h-5"
                                                    aria-hidden="true"
                                                    fill="currentColor"
                                                    viewBox="0 0 20 20"
                                            >
                                                <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                                ></path>
                                            </svg>
                                            </a></button>

                                    </div>
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
