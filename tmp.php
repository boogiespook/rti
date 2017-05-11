<?php
include_once 'dbconnect.php';
connectDB();

parse_str($_SERVER["QUERY_STRING"], $data);
$data['client'] = $data['customerName']; // FIXME hack

$chars = '23456789ABCDEFGHJKLMNPQRSTUVWXYZ';
$data['hash'] = substr(str_shuffle($chars), 0, 5);

$fields = array('client','rhEmail','country','o1','o2','o3','o4','o5','d1','d2','d3','d4','d5','hash');
foreach ($fields as $field) {
	$$field = mysqli_real_escape_string($db, $data[$field]);
}
$qq = "INSERT INTO data (" . implode(',', $fields).") VALUES ('$client','$rhEmail','$country',$o1,$o2,$o3,$o4,$o5,$d1,$d2,$d3,$d4,$d5,'$hash')";
$result = mysqli_query($db, $qq);

// TODO check $result

header("Location: results.php?hash=$hash");
