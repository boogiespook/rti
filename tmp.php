<?php
#phpinfo();
parse_str($_SERVER["QUERY_STRING"]);
$redirect="results.php?name=" . str_replace(array('&','<','>','/','\\','"',"'",'?','+'), '',htmlentities($customerName)) . "&country=$country&rhEmail=$rhEmail&d1=$d1&o1=$o1&d2=$d2&o2=$o2&d3=$d3&o3=$o3&d4=$d4&o4=$o4&d5=$d5&o5=$o5&id=$userId&status=Completed";
print "<meta http-equiv='refresh' content='0; url=" . $redirect . "' />";

?>
