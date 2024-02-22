<?php
include('includes/config.php');

$dailySalesData = [];
$dateLabels = [];

// Fetch data for the last 7 days
for ($i = 6; $i >= 0; $i--) {
    $date = date('Y-m-d', strtotime("-$i days"));
    $dailySalesQuery = mysqli_query($con, "SELECT COALESCE(SUM(o.Quantity), 0) AS daily_sales_kg 
        FROM tblorders o 
        WHERE DATE_FORMAT(o.InvoiceGenDate, '%Y-%m-%d') = '$date'");
    $dailySalesRow = mysqli_fetch_assoc($dailySalesQuery);
    $dailySalesData[] = $dailySalesRow['daily_sales_kg'];
    $dateLabels[] = date('M d', strtotime($date));
}

$response = [
    'dailySales' => $dailySalesData,
    'dates' => $dateLabels,
];

echo json_encode($response);
?>
