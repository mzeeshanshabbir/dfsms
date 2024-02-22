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
    $query=mysqli_query($con,"delete from tblcompany where id='$cmpid'");
    echo "<script>alert('Company record deleted.');</script>";
    echo "<script>window.location.href='manage-companies.php'</script>";
}

?>

<main class="h-full overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <h3
                class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
        >
            Companies
        </h3>
        <!-- CTA -->


        <div>
            <button
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            > <a href="add-company.php">
                    Add Company
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
                        <th class="px-4 py-3">Company Name</th>
                        <th class="px-4 py-3">Posting Date</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                    </thead>

                    <tbody
                            class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                    >
                    <?php
                    $rno=mt_rand(10000,99999);
                    $query=mysqli_query($con,"select * from tblcompany");
                    $cnt=1;
                    while($row=mysqli_fetch_array($query))
                    {
                        ?>
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <?php echo $cnt;?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo $row['CompanyName'];?>
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <?php echo $row['PostingDate'];?>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit"
                                    ><a href="edit-company.php?compid=<?php echo base64_encode($row['id'].$rno);?>" class="mr-25" data-toggle="tooltip" data-original-title="Edit">
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
                                        </a> </button>
                                    <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete"
                                    ><a href="manage-companies.php?del=<?php echo base64_encode($row['id'].$rno);?>" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Do you really want to delete?');">
                                        <svg
                                                class="w-5 h-5"
                                                aria-hidden="true"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                        >
                                            <path
                                                    fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"
                                            ></path>
                                        </svg>
                                        </a> </button>
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
<?php } ?>
