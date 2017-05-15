<!DOCTYPE html>
<html>
<head>
    <script src="Chart.bundle.js"></script>
    <script src="utils.js"></script>
    <script src="raphael-2.1.4.min.js"></script>
    <script src="justgage.js"></script>
    <script type="text/javascript" src="js/canvasjs.min.js"></script>
    <title>Ready to Innovate Assessment</title>
    <link href="http://static.jboss.org/css/rhbar.css" media="screen" rel="stylesheet">
<style>

body {

    margin: 5px auto;
    font-family: 'trebuchet MS', 'Lucida sans', Arial;
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
height: 30px;
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

.column-left{ float: left; width: 33%; }
.column-right{ float: right; width: 33%; }
.column-center{ display: inline-block; width: 33%; }

table {
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
}

td {
	border-right: 1px solid #C1DAD7;
	border-bottom: 1px solid #C1DAD7;
	background: #fff;
	padding: 6px 6px 6px 12px;
	color: #6D929B;
}

.big-number { font-size: 100px;}
  
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


</head>

<body>
<?php
if ( (!isset($_GET['key'])) || ($_GET['key'] != "98be2fd910")) {
exit("Unable to connect to site");
include_once("analyticstracking.php");
}
?>

<?php  
date_default_timezone_set("Europe/London");
## Connect to the Database 
include 'dbconnect.php';
connectDB();

# Retrieve the data
$qq = "SELECT avg(d1) as d1, avg(d2) as d2, avg(d3) as d3, avg(d4) as d4, avg(d5) as d5, avg(o1) as o1,avg(o2) as o2, avg(o3) as o3, avg(o4) as o4, avg(o5) as o5 FROM data";
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

       <div id="wrapper">
      <header>

      <center>
      <h2>Ready to Innovate Dashboard</h2>
      </center>
      </header>
      
<div class="column-left">
<h3>Average Assessments</h3>
<div style="position:absolute; top:60px; left:10px; width:500px; height:500px;">
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

   $.getJSON("getTimelineData.php", function (result) {
    var timelineChart = new CanvasJS.Chart("timeline",
    {
      title:{
        text: "RTI Assessment Timeline"
    },
    axisX:{
        title: "Time",
        gridThickness: 2,
        intervalType: "month",

    },
    axisY: {
        title: "# Assessments"
    },
    data: [
    {                     
       type: "line",
       xValueType: "dateTime",
        dataPoints: result
        
    }
    ]
});
    timelineChart.render();        

        });

   $.getJSON("getCountryData.php", function (result2) {    
	var countries = new CanvasJS.Chart("geoChart",
	{
		title:{
		},
                animationEnabled: true,
		legend:{
			verticalAlign: "center",
			horizontalAlign: "left",
			fontSize: 20,
			fontFamily: "Helvetica"        
		},
		theme: "theme2",
		data: [
		{        
			type: "pie",       
			indexLabelFontSize: 10,
			indexLabel: "{label} {y}%",
			startAngle:-20,      
			showInLegend: true,
			dataPoints: result2
		}
		]
	});    
    countries.render();
 });
        
};
             
    var colorNames = Object.keys(window.chartColors);
</script>

 
</div>

<div class="column-center">       
<h3>Assessments to Date</h3>
<p class="big-number">
<?php
$res = mysqli_query($db, 'SELECT count(*) as total from data');
$data_array = mysqli_fetch_assoc($res);
print $data_array['total'];
?>
</p></p>
</div>

<div class="column-right">       


<div id="geoChart" style="height: 300px; width: 100%;"></div>




</div>

<div id="footer">

<div id="timeline" style="height: 300px; width: 100%;">
</div>
</div>

</body>
</html>
