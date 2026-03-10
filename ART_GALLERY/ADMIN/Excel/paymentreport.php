<?php
include 'excel_controller.php';
$clinic = new DBController();
$productResult = $clinic->runQuery("SELECT u.Customername, p.initialamount, p.Paymentdate FROM tbl_payment p INNER JOIN tbl_request r ON r.request_id = p.requestid INNER JOIN tbl_user u ON u.Userid = r.customer_id");
    $filename = "Export_paymentexcel.xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $isPrintHeader = false;
    if (! empty($productResult)) {
        foreach ($productResult as $row) {
            if (! $isPrintHeader) {
                echo implode("\t", array_keys($row)) . "\n";
                $isPrintHeader = true;
            }
            echo implode("\t", array_values($row)) . "\n";
        }
    }
    exit();

?>