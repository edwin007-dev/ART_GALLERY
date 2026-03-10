<?php
include_once('excel_controller.php');
$clinic = new DBController();
$productResult = $clinic->runQuery("SELECT * FROM `tbl_user`  u INNER join tbl_location l on l.location_id=u.Location_id INNER join tbl_district d on d.district_id=l.district_id");

  
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