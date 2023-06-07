<?php
// Headers for download
$date = date("y-m-d");
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; Filename = ResidentsRecord".$date.".xls");

require 'dataExcel.php';
?>
