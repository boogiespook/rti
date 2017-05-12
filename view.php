<!DOCTYPE html>
<html>
<?php
if ( (!isset($_GET['key'])) || ($_GET['key'] != "90794183b1d497180")) {
exit("Unable to connect to site");
}

?>
<head>
    <script src="Chart.bundle.js"></script>
    <script src="utils.js"></script>
    <script src="raphael-2.1.4.min.js"></script>
    <script src="justgage.js"></script>
    <title>View - Ready to Innovate Assessments</title>
<style>
body {
    margin: 15px,15px, auto;
    font-family: 'trebuchet MS', 'Lucida sans', Arial;
    font-size: 13px;
    color: #444;
}

#wrapper {
width: 90%;
background-color: #FFF;
margin-left:auto;
margin-right:auto;
}

header {
height: 30px;
border-bottom: thin solid #000000;
}

able {
    *border-collapse: collapse; /* IE7 and lower */
    border-spacing: 0;
    width: 100%;    
}

.bordered {
    border: solid #ccc 1px;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: 0 1px 1px #ccc; 
    -moz-box-shadow: 0 1px 1px #ccc; 
    box-shadow: 0 1px 1px #ccc;         
    margin-left:auto; 
    margin-right:auto;
    }

.bordered tr:hover {
    background: #fbf8e9;
    -o-transition: all 0.1s ease-in-out;
    -webkit-transition: all 0.1s ease-in-out;
    -moz-transition: all 0.1s ease-in-out;
    -ms-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;     
}    
    
.bordered td, .bordered th {
    border-left: 1px solid #ccc;
    border-top: 1px solid #ccc;
    padding: 10px;
    text-align: left;    
}

.bordered th {
    background-color: #dce9f9;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#ebf3fc), to(#dce9f9));
    background-image: -webkit-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:    -moz-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:     -ms-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:      -o-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:         linear-gradient(top, #ebf3fc, #dce9f9);
    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; 
    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        
    border-top: none;
    text-shadow: 0 1px 0 rgba(255,255,255,.5); 
}

.bordered td:first-child, .bordered th:first-child {
    border-left: none;
}

.bordered th:first-child {
    -moz-border-radius: 6px 0 0 0;
    -webkit-border-radius: 6px 0 0 0;
    border-radius: 6px 0 0 0;
}

.bordered th:last-child {
    -moz-border-radius: 0 6px 0 0;
    -webkit-border-radius: 0 6px 0 0;
    border-radius: 0 6px 0 0;
}

.bordered th:only-child{
    -moz-border-radius: 6px 6px 0 0;
    -webkit-border-radius: 6px 6px 0 0;
    border-radius: 6px 6px 0 0;
}

.bordered tr:last-child td:first-child {
    -moz-border-radius: 0 0 0 6px;
    -webkit-border-radius: 0 0 0 6px;
    border-radius: 0 0 0 6px;
}

.bordered tr:last-child td:last-child {
    -moz-border-radius: 0 0 6px 0;
    -webkit-border-radius: 0 0 6px 0;
    border-radius: 0 0 6px 0;
}

#new {
  background-color: #CCFFCC;
  color: black;
  font-weight: bold;
}
</style>
</head>

<body>
<?php
## Database stuff
include 'dbconnect.php';
connectDB();
?>
                   <table class="bordered">
    <thead>
    <tr>
        <th>Client Name</th>        
        <th>Automation<br>(Dev)</th>
        <th>Automation<br>(Ops)</th>
        <th>Methodology<br>(Dev)</th>
        <th>Methodology<br>(Ops)</th>
        <th>Architecture<br>(Dev)</th>
        <th>Architecture<br>(Ops)</th>
        <th>Strategy<br>(Dev)</th>
        <th>Strategy<br>(Ops)</th>
        <th>Resources<br>(Dev)</th>
        <th>Resources<br>(Ops)</th>
        <th>Timestamp</th>
        <th>Charts</th>
    </tr>
    </thead>
    <tbody>
<?php

function checkScores($oldScore,$newScore,$oldClient,$newClient) {
if ($newScore != $oldScore && $oldClient == $newClient) {
	$str = "<font color=red><b>$newScore</b></font>";
	} else {
	$str = "$newScore";
	}
return $str;
}
$qq = "SELECT * FROM data ORDER BY client,date DESC";
$result = mysqli_query($GLOBALS["___mysqli_ston"], $qq);
$prevClient = "QQQQQQQQQQQQQQQQQ";
$oldRowD1 = $oldRowD2 = $oldRowD3 = $oldRowD4 = $oldRowD5 = $oldRowO1 = $oldRowO2 = $oldRowO3 = $oldRowO4 = $oldRowO5 = "X";
while ($row = mysqli_fetch_assoc($result)) {
	$hash = $row['hash'];
	if ($row['client'] != $prevClient) { 
		$col = "id=new";
		$comment = "(Most Recent)";
	} else {
		$col = "";
		$comment = "";
}
echo "<tr $col><td> $row[client] $comment</td>
<td>" . checkScores($oldRowD1,$row['d1'],$prevClient,$row['client']) . "</td>
<td>" . checkScores($oldRowO1,$row['o1'],$prevClient,$row['client']) . "</td>
<td>" . checkScores($oldRowD2,$row['d2'],$prevClient,$row['client']) . "</td>
<td>" . checkScores($oldRowO2,$row['o2'],$prevClient,$row['client']) . "</td>
<td>" . checkScores($oldRowD3,$row['d3'],$prevClient,$row['client']) . "</td>
<td>" . checkScores($oldRowO3,$row['o3'],$prevClient,$row['client']) . "</td>
<td>" . checkScores($oldRowD4,$row['d4'],$prevClient,$row['client']) . "</td>
<td>" . checkScores($oldRowO4,$row['o4'],$prevClient,$row['client']) . "</td>
<td>" . checkScores($oldRowD5,$row['d5'],$prevClient,$row['client']) . "</td>
<td>" . checkScores($oldRowO5,$row['o5'],$prevClient,$row['client']) . "</td>
<td>$row[date]</td>
<td align=center><a target=_blank href='results.php?hash=$hash'><img src=icon.png></a></td>
</tr>";
$prevClient = $row['client'];

$oldRowD1 = $row['d1'];
$oldRowD2 = $row['d2'];
$oldRowD3 = $row['d3'];
$oldRowD4 = $row['d4'];
$oldRowD5 = $row['d5'];

$oldRowO1 = $row['o1'];
$oldRowO2 = $row['o2'];
$oldRowO3 = $row['o3'];
$oldRowO4 = $row['o4'];
$oldRowO5 = $row['o5'];
#}

}
 
?>    
    
    
    </tbody>
    </table>




</body>
</html>
