<?php
include_once('excel_controller.php');
$clinic = new DBController();
$productResult = $clinic->runQuery("SELECT count(*) as bookingcount,Category_name FROM tbl_category c inner join tbl_artwork a on a.category_id=c.Category_id  group by a.category_id");

  
    $filename = "Export_customerexcel.xls";
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