<!DOCTYPE html>
<html>
<head>
    <script src="Chart.bundle.js"></script>
    <script src="utils.js"></script>
    <script src="raphael-2.1.4.min.js"></script>
    <script src="justgage.js"></script>
    <script type="text/javascript" src="js/canvasjs.min.js"></script>
    <script src="js/randomColor.js"></script>
    <title>Ready to Innovate Assessment</title>
    <link href="http://static.jboss.org/css/rhbar.css" media="screen" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="http://overpass-30e2.kxcdn.com/overpass.css"/>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style>
.scrollit {
    overflow:scroll;
    height:100px;
}
body {

    margin: 5px auto;
    font-family: overpass;
    font-size: 14px;
    color: #444;
}

#wrapper {
width: 95%;
background-color: #FFF;
margin-left:auto;
margin-right:auto;
}

header {
height: 40px;
border-bottom: thin solid #000000;
}

#footer {
   position:fixed;

   bottom:100px;
   height:200px;
   width:90%;
   background:#fff;
}


#content {
width: 50%;
align-content: center;
}

.column-left{ float: left; width: 30%; display: inline-block;}
.column-right{ float: right; width: 40%; }
.column-center{ display: inline-block; width: 30%; }


.bordered {
    border: solid #ccc 1px;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: 0 1px 1px #ccc; 
    -moz-box-shadow: 0 1px 1px #ccc; 
    box-shadow: 0 1px 1px #ccc;         
}

td {
	border-right: 1px solid #C1DAD7;
	border-bottom: 1px solid #C1DAD7;
	background: #fff;
	padding: 6px 6px 6px 12px;
	color: #6D929B;
}

.big-number { 
	font-size: 30px;
	font: overpass,	
	margin: 0px;
	width: 60px;
-webkit-appearance: none;
-moz-box-shadow: -5px -5px 5px #888;
-webkit-box-shadow: -5px -5px 5px #888;
box-shadow: -5px -5px 5px #888;
}

.lob_button {
    background: none repeat scroll 0 0 #075482;
    border: medium none;
    color: #FFFFFF;
    cursor: pointer;
    margin-bottom: 26px;
    padding: 2px;
}
	}
  
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


</head>

<body>
<?php
if ( (!isset($_GET['key'])) || ($_GET['key'] != "XXXXXXXXXXXXXX")) {
exit("Unable to connect to site");
#include_once("analyticstracking.php");
}
$country = "";
$lob = "";


$searchSet="N";
#phpinfo();
if (isset($_GET['lob'])) {
	$lob = $_GET['lob'];
	$view = "  - $lob";
	$searchSet="Y";
} 

if (isset($_GET['country'])) {
	$country = $_GET['country'];
	$view = "  - $country";
	$searchSet="Y";
} 

if ($searchSet == "N") {
	$view = "";
	$country="";
	$lob="";
}


?>

       <div id="wrapper">
       <a class="w3-small w3-button w3-white w3-border w3-border-red w3-round-large" href="dashboard.php?key=XXXXXXXXXXX">Reset</a>
              <a target=_blank class="w3-small w3-button w3-green w3-border w3-border-teal w3-round-large" href="view.php?key=XXXXXXXXXX">View Results</a>
      <header>
      <center>
      <h2>Ready to Innovate Dashboard <?php echo $view;?></h2>
      </center>
      </header>

<?php  

date_default_timezone_set("Europe/London");
## Connect to the Database 
include 'dbconnect.php';
connectDB();
$addVar = "N";

# Retrieve the data
$qq = "SELECT avg(d1) as d1, avg(d2) as d2, avg(d3) as d3, avg(d4) as d4, avg(d5) as d5, avg(o1) as o1,avg(o2) as o2, avg(o3) as o3, avg(o4) as o4, avg(o5) as o5 FROM data";

## Check the vars
if (isset($country) && $country != "") {
$qq .= " WHERE country = '$country'";
$addVar = "Y";
}

## Check the vars
if (isset($lob) && $lob != "") {
	if ($addVar == "N") {
		$qq .= " WHERE lob = '$lob'";
	} else {
		$qq .= " AND lob = '$lob'";
	}
}


$res = mysqli_query($db, $qq);
$data_array = mysqli_fetch_assoc($res);

$ops_arr = $dev_arr = array();

foreach( $data_array as $var => $value )
    {
    	if($var=='date') continue;
      if(substr($var[0],0,1) == "o") { $ops_arr[]=$value; };
      if(substr($var[0],0,1) == "d") { $dev_arr[]=$value;};
    }
    
 ?>


<?php

function currentUrl() {
    $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === FALSE ? 'http' : 'https';
    $host     = $_SERVER['HTTP_HOST'];
    $script   = $_SERVER['SCRIPT_NAME'];
    $params   = $_SERVER['QUERY_STRING'];

    return $protocol . '://' . $host . $script . '?' . $params;
}

## Breakdown by Location
#$qq = "select distinct(country) as Country from data  order by country asc";
$qq = "select count(*)as Total, country as Country from data  group by country order by Total desc;";
	if ($lob != "") {
		$qq = "select count(*)as Total, country as Country from data where lob = '" . $lob . "' group by country order by Total asc";
	}

	if ($lob != "" && $country != "") {
		$qq = "select count(*)as Total, country as Country from data where lob = '" . $lob . "' and country = '". $country . "' group by country order by Total asc";
	}


$res = mysqli_query($db, $qq);
echo '<center><div class="w3-bar">';
while($row = mysqli_fetch_assoc($res)) {
		$htmlVersion = htmlentities($row['Country']);
echo "<a class='w3-button w3-lime' href=" . currentUrl() . "&country=" . rawurlencode($row['Country']) . ">" . $htmlVersion . " (" . $row['Total'] . ")</a>";
#echo "<a href=" . currentUrl() . "&country=" . rawurlencode($row['Country']) . "<button class='w3-button w3-lime'>" . $htmlVersion . " (" . $row['Total'] . ")</button></a>";
}
echo '</div>';

$qq1 = "select count(*) as Total, lob as LineOfBusiness from data group by lob order by Total desc";
## Breakdown by LoB
if ($country != "") {
	$qq1 = "select count(*) as Total, lob as LineOfBusiness from data where country = '" . $country . "' group by lob order by Total desc";
}

if ($lob != "") {
	$qq1 = "select count(*) as Total, lob as LineOfBusiness from data where lob = '" . $lob . "'  group by lob order by Total desc";
}


#print $qq1;

$res = mysqli_query($db, $qq1);
echo '<center>'; 

echo '<div class="w3-bar">';


while($row = mysqli_fetch_assoc($res)) {
	$htmlVersion = htmlentities($row['LineOfBusiness']);
echo "<a class='w3-button w3-teal' href=" . currentUrl() . "&lob=" . rawurlencode($row['LineOfBusiness']) . ">" . $htmlVersion . " (" . $row['Total'] . ")</a>";
}
echo '</div>';





echo '</center>';
?>
      
<div class="column-left">
<!-- <p>Average Assessments</p> -->
<div style="position:absolute; top:160px; left:10px; width:500px; height:500px;">
        <canvas id="canvas"></canvas>
        </div>
<script>

    var customerName = ''
    var customerNameNoSpaces = '';


function checkVal(inNo) {
	if (inNo == "0") {
		var outNo = "0.01";
	} else {
	   var outNo = inNo;	
	}
	return outNo
}

    var d1 = checkVal(<?php echo $data_array['d1'] ?>)
    var d2 = checkVal(<?php echo $data_array['d2'] ?>)
    var d3 = checkVal(<?php echo $data_array['d3'] ?>)
    var d4 = checkVal(<?php echo $data_array['d4'] ?>)
    var d5 = checkVal(<?php echo $data_array['d5'] ?>)
    
    var totalDev = d1 + d2 + d3 + d4 + d5

    var o1 = checkVal(<?php echo $data_array['o1'] ?>)
    var o2 = checkVal(<?php echo $data_array['o2'] ?>)
    var o3 = checkVal(<?php echo $data_array['o3'] ?>)
    var o4 = checkVal(<?php echo $data_array['o4'] ?>)
    var o5 = checkVal(<?php echo $data_array['o5'] ?>)

    var totalOps = o1 + o2 + o3 + o4 + o5

    var chartTitle = ""
    var overall1 = (d1+o1)/2;
    var overall2 = (d2+o2)/2;
    var overall3 = (d3+o3)/2;
    var overall4 = (d4+o4)/2;
    var overall5 = (d5+o5)/2;
    
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 4);
    };

    var color = Chart.helpers.color;
    var config = {
        type: 'radar',
        data: {
            labels: ["Automation", "Methodology", "Architecture", "Strategy", "Resources"],
            datasets: [{
                label: "Dev",
                backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
                borderColor: window.chartColors.red,
                pointBackgroundColor: window.chartColors.red,
                data: [d1,d2,d3,d4,d5]
            }, {
                label: "Ops",
                backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
                borderColor: window.chartColors.blue,
                pointBackgroundColor: window.chartColors.blue,
                data: [o1,o2,o3,o4,o5]

            }]
        },
        options: {
            legend: {
                position: 'bottom',
            },
            title: {
                display: true,
                text: chartTitle
            },
            scale: {
            
              ticks: {
                beginAtZero: true,
                max: 4,
                min: 0
              }
            },

    }
 }
 
 
 
    window.onload = function() {
        window.myRadar = new Chart(document.getElementById("canvas"), config);	

};
             
    var colorNames = Object.keys(window.chartColors);
    
    
    
</script>
       
 
 
</div>

<div class="column-center">       
<h3>
Line of Business
</h3>
<canvas id="lob-pie-chart" ></canvas>


<h3>Total Assessments:

<?php
$qq = "SELECT count(*) as total FROM data";
$newBit = "N";

## Check the vars
if (isset($country) && $country != "") {
$qq .= " WHERE country = '$country'";
$newBit = "Y";
}

## Check the vars
if (isset($lob) && $lob != "") {
	if ($newBit == "Y") {
		$qq .= " AND lob = '$lob'";
	} else {
		$qq .= " WHERE lob = '$lob'";
}
}
#print "Query: $qq";
$res = mysqli_query($db, $qq);
$row = mysqli_fetch_assoc($res);
print $row['total'];
?>
</h3>
</div>

<div class="column-right">       

<h3>
Location
</h3>
<canvas id="country-chart"></canvas>


<h4>Most Recent 5</h4>

<?php
## Check the vars
$qq = "select client,date,hash from data ";
if (isset($country) && $country != "") {
$qq .= " WHERE country = '$country'";
$addVar = "Y";
}

## Check the vars
if (isset($lob) && $lob != "") {
	if ($addVar == "N") {
		$qq .= " WHERE lob = '$lob'";
	} else {
		$qq .= " AND lob = '$lob'";
	}
}

$qq .= " order by date desc limit 5";

$res = mysqli_query($db, $qq);
echo "|";
while ($row = mysqli_fetch_assoc($res)) {
if ($row['client'] != "" ) {
	print "<a target=_blank href=results.php?hash=" . $row['hash'] . ">" . $row['client'] . "</a> | ";
}
}

?>
</div>

<div id="footer">
<canvas id="timeline" width=1500px height=200px></canvas>
</div>

<?php
$lobSearch = "getLoBData.php?searchSet=" . $searchSet . "&country=" . $country . "&lob=" . $lob; 
?>

<script>
$(function(){
  $.getJSON("<?php echo "$lobSearch"; ?>", function (result) {
    var labels = [],data=[], colors=[];
    for (var i = 0; i < result.length; i++) {
        //labels.push(result[i].Industry);
        labels.push(result[i].Industry + " (" + result[i].Total + ")");
        data.push(result[i].Total);
        colors.push(randomColor({ hue: 'blue'}));
    }
//console.log(labels);
//console.log(result);

    var buyerData = {
      labels : labels,
      datasets : [
        {
          fillColor : "rgba(24, 127, 110, 0.3)",
          strokeColor : "#f56954",
          pointColor : "#A62121",
          pointStrokeColor : "#741F1F",
          data : data,
          backgroundColor: colors
        }
      ]
    };
    var buyers = document.getElementById('lob-pie-chart').getContext('2d');
    
var chartInstance = new Chart(buyers, {
    type: 'pie',
    data: buyerData,
    options: {
       responsive: false
            }

});

  });
  });
</script>

<?php
$countrySearch = "getCountryData.php?searchSet=" . $searchSet . "&country=" . $country . "&lob=" . $lob; 
#echo $countrySearch;
?>

<script>
$(function(){
  $.getJSON("<?php echo "$countrySearch"; ?>", function (result) {
    var labels = [],data=[], colors=[];
    for (var i = 0; i < result.length; i++) {
        labels.push(result[i].country + " (" + result[i].total + ")");
        data.push(result[i].total);
        colors.push(randomColor({ hue: 'green'}));
    }
//console.log(labels);
//console.log(data);

    var buyerData = {
      labels : labels,
      datasets : [
        {
          fillColor : "rgba(24, 127, 110, 0.3)",
          strokeColor : "#f56954",
          pointColor : "#A62121",
          pointStrokeColor : "#741F1F",
          data : data,
          backgroundColor: colors
        }
      ]
    };
    var buyers = document.getElementById('country-chart').getContext('2d');
    
var chartInstance = new Chart(buyers, {
    type: 'doughnut',
    data: buyerData,
    options: {
       responsive: false
    }

});

  });
  });
</script>


<script>
$(function(){
  $.getJSON("getTimelineData.php", function (result) {
    var labels = [],data=[], colors=[];
    for (var i = 0; i < result.length; i++) {
        labels.push(result[i].year + "-" + result[i].month + "-" + result[i].day);
        data.push(result[i].total);

    }
//console.log(labels);
//console.log(data);

    var buyerData = {
      labels : labels,
      datasets : [
        {
          fillColor : "rgba(24, 127, 110, 0.3)",
          pointColor : "#A62121",
          pointStrokeColor : "#741F1F",
          data : data,
        }
      ]
    };
    var buyers = document.getElementById('timeline').getContext('2d');
    
var chartInstance = new Chart(buyers, {
    type: 'line',
    data: buyerData,
    options: {
    	       title: {
            display: true,
            text: 'RTI Assessment Timeline'
        },
       responsive: false
    }

});

  });
  });
</script>


</body>
</html>
