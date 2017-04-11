<?php
date_default_timezone_set('Europe/London');	
$data = $_POST['data'];
$customer = $_POST['customer'];
$dataType = $_POST['dataType'];
file_put_contents("charts/".$customer."-".$dataType.".html", $data);
die;
?>


