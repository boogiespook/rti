<!DOCTYPE html>
<html>
<head>
    <script src="js/Chart.bundle.js"></script>
    <script src="js/utils.js"></script>
    <script src="js/raphael-2.1.4.min.js"></script>
    <script src="js/justgage.js"></script>
    <link rel="stylesheet" type="text/css" href="https://overpass-30e2.kxcdn.com/overpass.css"/>
  	 <link rel="stylesheet" href="css/style.css">
    <title>Ready to Innovate Assessment</title>
<style media="all">

body {
    margin: 5px auto;
    width: 66.6%;
    font-family: 'overpass';
    font-size: 14px;
    color: #444;
    width: 90%;
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

#rh-logo img {
    position: absolute;
    top: 2px;
    right: 2px;
    float: right;
}

#content {
float: left;
width: 50%;
}

#docTitle {
    color:black;
    text-align:center;
    padding:5px;
  font-size: 6em;}

@media print {
    h1 {page-break-before: always;}
}

#rightcol {
float: right;
width: 50%;
vertical-align: middle;
}

footer {
clear:both;
height: 50px;
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



/*----------------------*/

.zebra td, .zebra th {
    padding: 10px;
    border-bottom: 1px solid #f2f2f2;    
}

.zebra tbody tr:nth-child(even) {
    background: #f5f5f5;
    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; 
    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        
}

.zebra th {
    text-align: left;
    text-shadow: 0 1px 0 rgba(255,255,255,.5); 
    border-bottom: 1px solid #ccc;
    background-color: #eee;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#f5f5f5), to(#eee));
    background-image: -webkit-linear-gradient(top, #f5f5f5, #eee);
    background-image:    -moz-linear-gradient(top, #f5f5f5, #eee);
    background-image:     -ms-linear-gradient(top, #f5f5f5, #eee);
    background-image:      -o-linear-gradient(top, #f5f5f5, #eee); 
    background-image:         linear-gradient(top, #f5f5f5, #eee);
}

.zebra th:first-child {
    -moz-border-radius: 6px 0 0 0;
    -webkit-border-radius: 6px 0 0 0;
    border-radius: 6px 0 0 0;  
}

.zebra th:last-child {
    -moz-border-radius: 0 6px 0 0;
    -webkit-border-radius: 0 6px 0 0;
    border-radius: 0 6px 0 0;
}

.zebra th:only-child{
    -moz-border-radius: 6px 6px 0 0;
    -webkit-border-radius: 6px 6px 0 0;
    border-radius: 6px 6px 0 0;
}

.zebra tfoot td {
    border-bottom: 0;
    border-top: 1px solid #fff;
    background-color: #f1f1f1;  
}

.zebra tfoot td:first-child {
    -moz-border-radius: 0 0 0 6px;
    -webkit-border-radius: 0 0 0 6px;
    border-radius: 0 0 0 6px;
}

.zebra tfoot td:last-child {
    -moz-border-radius: 0 0 6px 0;
    -webkit-border-radius: 0 0 6px 0;
    border-radius: 0 0 6px 0;
}

.zebra tfoot td:only-child{
    -moz-border-radius: 0 0 6px 6px;
    -webkit-border-radius: 0 0 6px 6px
    border-radius: 0 0 6px 6px
}
  
</style>


  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#analysis-dialog" ).dialog({
      autoOpen: true,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "drop",
        duration: 1000
      },
      minWidth: 1000
    });
 
    $( "#analysis-opener" ).on( "click", function() {
      $( "#analysis-dialog" ).dialog( "open" );
    });
  } );
  </script>

  <script>
  $( function() {
    $( "#workshop-dialog" ).dialog({
      autoOpen: true,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "drop",
        duration: 1000
      },
      minWidth: 400
    });
 
    $("#workshop-opener" ).on( "click", function() {
      $("#workshop-dialog" ).dialog( "open" );
    });

  } );
  </script>

  <script>
  $( function() {
    $( "#priorities-dialog" ).dialog({
      autoOpen: true,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "drop",
        duration: 1000
      },
      minWidth: 800
    });
 
    $("#priorities-opener" ).on( "click", function() {
      $("#priorities-dialog" ).dialog( "open" );
    });

  } );
  </script>

  <script>
  $( function() {
    $( "#average-dialog-dev" ).dialog({
      autoOpen: true,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "drop",
        duration: 1000
      },
      minWidth: 1000
    });
 
    $( "#average-opener-dev" ).on( "click", function() {
      $( "#average-dialog-dev" ).dialog( "open" );
    });
  } );
  </script>

  <script>
  $( function() {
    $( "#average-dialog-ops" ).dialog({
      autoOpen: true,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "drop",
        duration: 1000
      },
      minWidth: 1000
    });
 
    $( "#average-opener-ops" ).on( "click", function() {
      $( "#average-dialog-ops" ).dialog( "open" );
    });
  } );
  </script>

</head>

<body>
<?php
## Connect to the Database 
include 'dbconnect.php';
connectDB();
$hash = $_REQUEST['hash'];
$qq = "SELECT * FROM data WHERE hash='".mysqli_real_escape_string($db, $hash)."'";
$res = mysqli_query($db, $qq);
$data_array = mysqli_fetch_assoc($res);

$ops_arr = $dev_arr = array();

foreach( $data_array as $var => $value )
    {
    	if($var=='date') continue;
      if(substr($var[0],0,1) == "o") { $ops_arr[]=$value; };
      if(substr($var[0],0,1) == "d") { $dev_arr[]=$value;};
    }


function getRating($num) {
#$roundedNum = round($num,0);
$roundedNum = floor($num);
#print "Rounded: $roundedNum <br>";
switch ($roundedNum) {
	case "1":
		$rating = "Rudimentary";
		$ratingRank = "<b>Rudimentary</b>: ";
#		$ratingDescription = $ratingRank . "Governance practices are either non-existent or in the very early stages of development";
		break;
	case "2":
		$rating = "Developing";
		$ratingRank = "<b>Developing</b>: ";
#		$ratingDescription = $ratingRank . "Potential shortfalls in governance practices have been identified and initial steps have been taken to rectify them. There is significant room for improvement.";
		break;
	case "3":
		$rating = "Acceptable";
		$ratingRank = "<b>Acceptable</b>: ";
#		$ratingDescription = $ratingRank . "The minimum governance practices are in place. There is still room for improvement.";
		break;
	case "4":
		$rating = "Advanced";
		$ratingRank = "<b>Advanced</b>: ";
#		$ratingDescription = $ratingRank . "Governance practices are in place and exceed performance and compliance requirements. Only minor improvements are required to achieve and be recognised as leading practices.";
		break;
	case "5":
		$rating = "Leading";
		$ratingRank = "<b>Leading</b>: ";
#		$ratingDescription = $ratingRank .  "All processes and practices are recognised by others to be of the highest standard";
		break;
}
return $rating;
}
?>

<center>
<img src="images/docHeader.png" alt="">
<br><br><br>

<p class="bigText">Ready to Innovate</p>
<h2>Client Recommendations Document</h2>
<h3>Prepared for <?php echo $data_array['client']; ?></h3>
<h4>Date: <?php echo date('l jS \of F Y') ?></h4>

</center>
<p>Thank you very much for taking part in a Ready To Innovate assessment.  This document provides a high level overview of the assessment and some possible next steps for <?php echo $data_array['client']; ?>.
</p>

<h4>Originator</h4>

<p>Red Hat Pre-Sales and Services</p>

<h4>Disclaimer</h4>

<p>This document is not a quote, and does not represent an official Statement of Work.  If acceptable, a formal quote can be issued, which will include a contract with the scope of work, cost, and any Client requirements if necessary.</p>

<!-- start of table of contents -->
<div id="toc_container">
<p class="toc_title">Table of Contents</p>
<ul class="toc_list">
<li><a href="#Ready_to_Innovate_Overview">1. Ready to Innovate Overview</li>
<li><a href="#RTI_Output_Summary">2. RTI Output Summary</a>
<li><a href="#Breakdown_of_Assessment">3. Breakdown of Assessment</a></li>
<li><a href="#Overview_of_all_Levels">4. Overview of all Levels</a></li>
<li><a href="#Comments">5. Comments</a></li>
<li><a href="#Comparison_with_others">6. Comparison with others</a></li>
<ul>
<li><a href="#Development">6.1 Development</a></li>
<li><a href="#Operations">6.2 Operations</a></li>

</ul>
<li><a href="#Red_Hat_Universal_Discovery_Session">7. Red Hat Universal Discovery Session</a></li>
<li><a href="#Universal_Discovery_Workshop">8. Universal Discovery Workshop</a></li>
<ul>
<li><a href="#Agenda">8.1 Discovery Workshop Agenda</a></li>
</ul>
<li><a href="#Suggested_follow_up_discussion_topics">9. Suggested follow up discussion topics</a></li>
</ul>
</div>
<!-- end of table of contents -->

<!-- Start of RTI overview stuff -->
<h1 id="Ready_to_Innovate_Overview">Ready to Innovate - Overview</h1>
<p>
Before embarking on a digital transformation initiative, customers need to know where they currently stand before deciding where they want to be.
</p>
<p>
Ready to Innivate is a 45 minute assessment answering questions to evaluate the current maturity of an organization around 5 key areas.  These areas are: 
</p>
<table class="wideTable">
	<tr>
		<td>
		<img src="images/automation.png" alt="automation">		
		</td>
		<td>
		<img src="images/wayOfWorking.png" alt="way of working">				
		</td>		
		<td>
		<img src="images/architecture.png" alt="architecture">						
		</td>		
		<td>
		<img src="images/visionLeadership.png" alt="visionLeadership">				
		</td>		
		<td>
		<img src="images/environment2.png" alt="environment">						
		</td>
	</tr>		
	<tr>
		<td class="centeredBoldText">
		Automation		
		</td>
		<td class="centeredBoldText">
		Way of Working		
		</td>
		<td class="centeredBoldText">
		Architecture		
		</td>
		<td class="centeredBoldText">
		Vision and Leadership		
		</td>	
		<td class="centeredBoldText">
		Environment		
		</td>		
	</tr>
	<tr>
		<td class="leftText">
		Change is the new constant and agile business practices are key to remaining competitive. Automation includes looking at how you do software configuration management (SCM), test, deployment and configuration. Automation is a deciding factor in delivering ever more from less.
		</td>
		<td class="leftText">
		In today’s market, large organizations must rely on more than just technology and tools. Way of Working refers to the way in which you are running your IT projects.
		</td>
		<td class="leftText">
		As systems expand, you need to effectively manage your IT environment so all the parts work together to get the quickest return on investment (ROI). This covers the long term architectural motivations, aims, and advances to your current state architecture.
		</td>
		<td class="leftText">
		Defining a vision and a strategy is one of the most challenging areas for an organization. Often, the ability to interpret and translate business ideas to solutions can be complex and involves input from leadership at all levels.
		</td>
		<td class="leftText">
		Environment is defined as the mixture of staff, culture, training, and skill level within an organisation.
		</td>
		
	</tr>

</table>
<p>
The output in this document shows the current maturity level, along with recommendations and next steps for <?php echo $data_array['client']; ?>.
</p>


<!-- End of RTI overview stuff -->




<h1 id="RTI_Output_Summary">RTI Output Summary</h1>
<p>The spider chart below shows the levels attained by <?php echo $data_array['client']; ?> during the Ready To Innovate Assessment:


<?php  
date_default_timezone_set("Europe/London");
 ?>

    <div style="width:50%;">
    <center>
        <canvas id="canvas"></canvas>
        </center>
    </div>
        <script>
        
function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return decodeURI(pair[1]);}
       }
       return(false);
}    

    var customerName = '<?php echo $data_array['client'] ?>'
    var customerNameNoSpaces = customerName.replace(/\s+/, "");


function checkVal(inNo) {
	if (inNo == "0") {
		var outNo = "0.01";
	} else {
	   var outNo = inNo;	
	}
	return outNo
}

    var d1 = checkVal(<?php echo $data_array['d1']; ?>)
    var d2 = checkVal(<?php echo $data_array['d2']; ?>)
    var d3 = checkVal(<?php echo $data_array['d3']; ?>)
    var d4 = checkVal(<?php echo $data_array['d4']; ?>)
    var d5 = checkVal(<?php echo $data_array['d5']; ?>)
    
    var totalDev = d1 + d2 + d3 + d4 + d5

    var o1 = checkVal(<?php echo $data_array['o1']; ?>)
    var o2 = checkVal(<?php echo $data_array['o2']; ?>)
    var o3 = checkVal(<?php echo $data_array['o3']; ?>)
    var o4 = checkVal(<?php echo $data_array['o4']; ?>)
    var o5 = checkVal(<?php echo $data_array['o5']; ?>)

    var totalOps = o1 + o2 + o3 + o4 + o5

    var chartTitle = "DevOps Chart - " + customerName

    
    var randomScalingFactor = function() {
        return Math.round(Math.random() * 4);
    };

    var color = Chart.helpers.color;
    var config = {
        type: 'radar',
        data: {
            labels: ["Automation", "Way of Working", "Architecture", "Vision and Leadership", "Environment"],
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

            },]
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
                max: 5,
                min: 0
              }
            },

    }
 }
    window.onload = function() {
        window.myRadar = new Chart(document.getElementById("canvas"), config);

var ctx = document.getElementById("myChartDev").getContext("2d");
var data = {
  labels: ["Automation", "Way of Working", "Architecture", "Vision and Leadership", "Environment"],
  datasets: [{
    label: customerName,
    backgroundColor: "rgba(53, 177, 94, 1)",
    data: [d1, d2, d3, d4, d5]
  }, {
    label: "Average",
    backgroundColor: "rgba(177, 177, 53, 1)",
    data: <?php 
    $qq = "select ROUND(avg(d1),2) as d1, ROUND(avg(d2),2) as d2, ROUND(avg(d3),2) as d3, ROUND(avg(d4),2) as d4, ROUND(avg(d5),2) as d5 from data;";    
    $res = mysqli_query($GLOBALS["___mysqli_ston"], $qq);
    $row = mysqli_fetch_array($res);
     echo "[" . $row[0] . "," . $row[1] . "," . $row[2] . "," . $row[3] . "," . $row[4] . "]"; 
     ?>
  },
  ]
};

var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: data,
  options: {
    barValueSpacing: 20,
    scales: {
      yAxes: [{
        ticks: {
          min: 0,
          max: 5
        }
      }]
    },
 
                title: {
            display: true,
            text: 'Comparison to Others (Development)'
        }
  }
});  		

var ctx2 = document.getElementById("myChartOps").getContext("2d");
var dataOps = {
  labels: ["Automation", "Way of Working", "Architecture", "Vision and Leadership", "Environment"],
  datasets: [{
    label: customerName,
    backgroundColor: "rgba(53, 177, 94, 1)",
    data: [o1, o2, o3, o4, o5]
  }, {
    label: "Average",
    backgroundColor: "rgba(177, 177, 53, 1)",
    data: <?php 
    #$qq = "select avg(o1) as d1,avg(o2) as d2, avg(o3) as d3, avg(o4) as d4, avg(o5) as d5 from data;";    
    #$qq = "select ROUND(avg(o1),2) as o1, ROUND(avg(o2),2) as o2, ROUND(avg(o3),2) as o3, ROUND(avg(o4),2) as o4, ROUND(avg(o5),2) as o5 from data;";    
    $res = mysqli_query($GLOBALS["___mysqli_ston"], $qq);
    $row = mysqli_fetch_array($res);    
     echo "[" . $row[0] . "," . $row[1] . "," . $row[2] . "," . $row[3] . "," . $row[4] . "]"; 
     ?>
  },
  ]
};

var myBarChart2 = new Chart(ctx2, {
  type: 'bar',
  data: dataOps,
  options: {
    barValueSpacing: 20,
    scales: {
      yAxes: [{
        ticks: {
          min: 0,
          max: 5
        }
      }]
    },

                        title: {
            display: true,
            text: 'Comparison to Others (Operations)'
        }

  }
});  				
  		
};
             


    var colorNames = Object.keys(window.chartColors);
    </script>

</div>
<br><br>
<h3 class="centeredText">Overall Maturity Assessment</h3>


<?php
## Get an overall score by adding them all up
$totalScore = 0;

for($i = 1; $i < 6; $i++) {
$totalScore += $data_array["d$i"];
$totalScore += $data_array["o$i"];
}
print '<table class="bordered">
<thead>
<th>Rating</th>
<th>Level</th>
</thead>
<tbody>
<tr><td><b>' . $totalScore/10 . ' out of 5</b></td><td class="' . strtolower(getRating($totalScore/10)) . '">' . getRating($totalScore/10) . '</td>
</tr>
</tbody>
</table>';
#print "Total score: " . $totalScore/10;
?>
<!-- Start of gauges -->
<h1 id="Breakdown_of_Assessment">Breakdown of Assessment</h1>
<p>
From completing the assessment question, the maturity of the development and operations teams is indicated by a score out of 5 for each area: Automation, Way of Working, Architecture, Vision and Leadership and Environment.
</p>
The levels for each topic are:

<table class="bordered">
<thead>
<th class="leftText">
Rating
</th>
<th class="leftText">
Level
</th>
</thead>
<tbody>
<tr>
	<td>
	1
	</td>
	<td class="rudimentary">
	Rudimentary
	</td>
</tr>
<tr>
	<td>
	2
	</td>
	<td class="developing">
	Developing
	</td>
</tr>
<tr>
	<td>
	3
	</td>
	<td class="acceptable">
	Acceptable
	</td>
</tr>
<tr>
	<td>
	4
	</td>
	<td class="advanced">
	Advanced
	</td>
</tr>
<tr>
	<td>
	5
	</td>
	<td class="leading">
	Leading
	</td>
</tr>
</tbody>
</table>
  <table class="bordered">
    <thead>
    <tr>
        <th>Area</th>        
        <th>Development Rating</th>
        <th>Operations Rating</th>
    </tr>
    </thead>
	<tbody> 
	<br>
<?php


function printGauge($areaName,$num,$chartName,$arr) {
print '<tr><td><b>' . $areaName . '</b></td><td>
<div id="' . $chartName . 'Dev" style="height:80px; margin: auto;"></div>
	<p class="' . strtolower(getRating($arr["d$num"])) . '">' . getRating($arr["d$num"]) . '</p>
</td>
<td><div id="' . $chartName . 'Ops" style="height:80px; margin: auto;"></div>
	<p class=" ' . strtolower(getRating($arr["o$num"])) . '">' . getRating($arr["o$num"]) . '</p>
</td>
</tr>';
}

printGauge("Automation","1","automation",$data_array);
printGauge("Way of Working","2","wow",$data_array);
printGauge("Architecture","3","arch",$data_array);
printGauge("Vision and Leadership","4","vision",$data_array);
printGauge("Environment","5","env",$data_array);


?>

</tbody>
</table>	
<!-- end of gauges -->

<h1 class="Overview_of_all_Levels">Overview of all Levels</h1>
The 5 levels for each topic are shown below.
<br>
<?php
function printQuestions($title,$area) {
$string = file_get_contents("questionsV2.json");
$json = json_decode($string, true);
$i=1;
$qnum = $json[$area]['qnum'];
#print '<div class="floatingImage"></div>';
print '<img src="images/' . $area . '.png"><b class="bigCenteredBoldText">' . $title . '</b>';
while( $i < 6) {	
#	if($i % 2 == 0){
#	print '<div class="divTableCell">';	
#	} else {
#	print '<div class="dark">';	
#	}
   print '<br><b>Level ' . $i . '</b>'; 
#	print '<br><b>Overview</b>';
	print '<p>' . $json[$area][$i] . "</p>";
#	print '<b>Summary</b>';
#	print '<div class="smallDetails">';
#	print '<p>' . $json[$area]["$i-summary"] . "</p></div>";	

	print '<b>Details</b><br>';
#	print '<div>' . $json[$area]["$i-details"] . "</div>";	
	print strip_tags($json[$area]["$i-details"]);
	print "<hr>";	
#	print "</div>";
$i++;
}
#print '</div>
#</div>';
#print '</div><br>';

};
printQuestions("Automation","automation");
print "<h1>Overview of all Levels (Cont.)</h1>";
printQuestions("Way of Working","wayOfWorking"); 
print "<h1>Overview of all Levels (Cont.)</h1>";
printQuestions("Architecture","architecture");
print "<h1>Overview of all Levels (Cont.)</h1>";
printQuestions("Vision and Leadership","visionLeadership");
print "<h1>Overview of all Levels (Cont.)</h1>";
printQuestions("Environment","environment");
?>


<h1></h1>
<!-- Start of comments -->
<h2 id="Comments">Comments</h2>
<p>
If any comments were added during the assessment, they are shown below.
</p>
  <table class="bordered">
    <thead>
    <tr>
        <th>Area</th>        
        <th>Comments</th>
    </tr>
    </thead>
	<tbody> 
<?php

print "<tr><td>General Comments</td>";
print "<td>" . $data_array['comments'] . "</td></tr>";

## Fudge here as can't seem to get it in a loop ... dodgy code alert!
print "<tr><td>Automation</td>";
print "<td>" . $data_array['comments_automation'] . "</td></tr>";

print "<tr><td>Way of Working</td>";
print "<td>" . $data_array['comments_wayOfWorking'] . "</td></tr>";

print "<tr><td>Architecture</td>";
print "<td>" . $data_array['comments_architecture'] . "</td></tr>";

print "<tr><td>Environment</td>";
print "<td>" . $data_array['comments_environment'] . "</td></tr>";

print "<tr><td>Vision and Leadership</td>";
print "<td>" . $data_array['comments_visionLeadership'] . "</td></tr>";
#}
?>     
</tbody>
</table>
<!-- end of comments -->

<!-- Start of comparison -->
<h1 id="Comparison_with_others">Comparison with others</h1>
<p>
The charts below show how the development and operations teams at <?php echo $data_array['client']; ?> compare to other organisations who have taken the Ready To Innovate assessment
</p>
<h2 id="Development">Development</h2>
<canvas id="myChartDev"></canvas>
<h1></h1>
<h2 id="Operations">Operations</h2>
<canvas id="myChartOps"></canvas>
<!-- end of comparison -->


<!-- Start of Discovery Session stuff -->
<h1 id="Red_Hat_Universal_Discovery_Session">Red Hat Universal Discovery Session</h1>

<p>Red Hat Consulting follows a repeatable framework for defining and implementing solutions with high value for our clients. That framework outlines a series of phases that each contribute to a clearly defined Client business driven goal. Red Hat Consulting aims to provide focused Client value across the areas of people, process, and technology, whilst also providing a supporting role in establishing bigger picture IT Transformation initiatives. </p>
 
<p>Beginning with a Ready To Innovate Session, Red Hat helps you understand your As-Is IT Organisational State. The 5 axis of focus provide a way of outlining areas of accomplishment and improvement within the Operations and Development teams within your IT Organisation. The focus areas highlight the core foundations of Native Cloud platforms, Advanced Software Development techniques and most importantly Strategy and Culture. Used simply as a discussion point or more seriously as a means of highlighting future areas for investment, the RTI State graph represents a window into your Organisation. As part of the analysis Red Hat can guide and advise on follow up focus areas for investment and next steps. This short guide provides your custom next steps based on the wide base of Red Hat Consulting offerings available as part of our Service Delivery Framework. 
</p>
 
<p>Following the RTI session, the next steps are defined within the follow on focused Discover phase, which starts with a free, focused “Universal Discovery Session” aligned with defined topics provides an opportunity to drive into a defined area of investment in more detail, mapping business requirements, defining IT Organisational initiatives and engagement areas and assisting with strategy and approach. The Discovery Session is the starting point of a Red Hat Consulting engagement. This guide also proposes your custom Discovery Session next steps based on your RTI State graph and chosen areas of IT investment. 
</p>

<p>In the Design phase, we employ interactive workshops to rough out technologies, processes, and architectures; establish a strategy for your solution that integrates people, process, and technology; and build a backlog of tasks or use cases for prioritization. During the Deploy phase, we deliver 1 or more sprints or engagements to realize all or a portion of that strategy then deploy it within your environment.</p>

<center>
<img src="images/culture_process_tech2.png" alt="Delivery Framework">
</center>

<p>The Universal Discovery Session doesn't just focus on technology as we believe that digital transformation involves all areas of the organisation including aspects regarding people and processes.  We will run workshops to understand areas such as:
<ul>
<li>Business Drivers</li>
<li>Process Layers</li>
<li>Technology Layers</li>
<li>New Innovation</li>
<li>Cultural Change</li>
</ul>
</p>
<p>Example workshop objectives are shown below:</p>
<center>
<img src="images/universal_discovery_session1.png">
</center>
<p>If you are interested in arranging a Discovery Session, please reach out to any Red Hat associate who will be willing to work with you to progress your digital transformation journey.
</p>

<!-- End of Discovery Session stuff -->

<!-- Start of Universal Discovery Workshop -->
<h1 id="Universal_Discovery_Workshop">Universal Discovery Workshop</h1>
<h3 id="Agenda">Agenda</h3>
<p>Using the information provided during the RTI session, the following sessions are recommended for you. </p>
<table  class="bordered" >
	<thead>
	<tr>
		<th>Session</th>
		<th>Times</th>
		<th>Description</th>
	</tr>
</thead>
<tbody>
<tr>
	<td>Introduction</td>
	<td>9:00 - 9:15</td>
	<td>Introductions and overview of the agenda and goals for the day</td>
</tr>
<tr>
	<td>Client Business Overview</td>
	<td>9:15 - 10:00</td>
	<td>Client led overview of their current IT landscape, business objectives, Digital Transformation and  success criteria.</td>
</tr>
<tr>
	<td>Market Overview</td>
	<td>10:00 - 10:45</td>
	<td>Red Hat led interactive activities, highlighting the  following topics:
<ul>
<li>Interactive session to confirm Business requirements</li>
<li>Review results from RTI</li>
<li>Focussed on <?php print $data_array['lob'];  ?> vertical </li>
</ul>
</td>
</tr>
<tr>
	<td><b>Break</b></td>
	<td>10:45 - 11:00</td>
	<td>&nbsp</td>
</tr>
<tr>
	<td>Topics Session 1</td>
	<td>11:00 - 13:00</td>
	<td>
	<ul>

<?php
$scores = array(
array ('area' => "automation",'title' => "Automation",'ops' => $data_array['o1'], 'dev' => $data_array['d1'], 'total' => $data_array['d1'] + $data_array['o1']), 
array ('area' => "wayOfWorking",'title' => "Way of Working", 'ops' => $data_array['o2'], 'dev' => $data_array['d2'], 'total' => $data_array['d2'] + $data_array['o2']), 
array ('area' => "architecture", 'title' => "Architecture", 'ops' => $data_array['o3'], 'dev' => $data_array['d3'], 'total' => $data_array['d3'] + $data_array['o3']), 
array ('area' => "visionLeadership",'title' => "Vision and Leadership", 'ops' => $data_array['o4'], 'dev' => $data_array['d4'], 'total' => $data_array['d4'] + $data_array['o4']), 
array ('area' => "environment",'title' => "Environment", 'ops' => $data_array['o5'], 'dev' => $data_array['d5'], 'total' => $data_array['d5'] + $data_array['o5'])
);

$total = array_column($scores, 'total');
$titles = array_column($scores, 'title');
$areasForFeatures = array_column($scores, 'area');
$dev = array_column($scores, 'dev');
$ops = array_column($scores, 'ops');
$string = file_get_contents("questionsV2.json");
$json = json_decode($string, true);

function printFeatures ($areaToPrint,$json) {
$line = $json[$areaToPrint]['features'];
return "$line ";
}

print "<li><b> " . $titles[0] . "</b> (RTI Score: " . $total[0]/2 . " out of 5)" . printFeatures($areasForFeatures[0],$json) . "</li>"; 
print "<li><b> " . $titles[1] . "</b> (RTI Score: " . $total[1]/2 . " out of 5)" . printFeatures($areasForFeatures[1],$json) . "</li>"; 
print "<li><b> " . $titles[2] . "</b> (RTI Score: " . $total[2]/2 . " out of 5)" . printFeatures($areasForFeatures[2],$json) . "</li>"; 
?>
</ul>

	</td>
</tr>
<tr>
	<td><b>Lunch</b></td>
	<td>13:00 - 13:30</td>
	<td>Working Lunch and networking</td>
</tr>

<!-- Now to work out the main session based on the results of the RTI   -->

<tr>
	<td>Topics Session 2</td>
	<td>13:30 - 16:00</td>

	<td>Topics to discuss include:
<ul>
<?php
print "<li><b> " . $titles[3] . " </b>(RTI Score: " . $total[3]/2 . " out of 5)" . printFeatures($areasForFeatures[3],$json) . "</li>"; 
print "<li><b> " . $titles[4] . " </b>(RTI Score: " . $total[4]/2 . " out of 5)" . printFeatures($areasForFeatures[4],$json) . "</li>"; 
?>
</ul>

	
	</td>
</tr>
<tr>
	<td>Q&A and Next Steps</td>
	<td>16:00 - 16:30</td>
	<td>Summary of what was covered  and identify next steps</td>
</tr>

</tbody>
</table>

<!-- End of Discovery Session Workshop  -->

<br>
<h1>&nbsp</h1>
<h3 id="Suggested_follow_up_discussion_topics">Suggested follow up discussion topics</h3>
<p>
Discussions from the Universal Discovery workshop can determine which workshops from the following catalogue Red Hat recommends to address your needs.
</p>
  <table class="bordered">
    <thead>
    <tr>
        <th>Area</th>        
        <th>Development</th>
        <th>Operations</th>
    </tr>
    </thead>
	<tbody> 
<!-- Read all the workshops from the json file, deduplicate then add per area -->
<?php
$allWorkshops = $devWorkshops = $opsWorkshops = array();
$string = file_get_contents("questionsV2.json");
$json = json_decode($string, true);

for($i = 0; $i < 5; $i++) {

print "<tr><td>" . $titles[$i] . "</td>";
foreach ($json[$areasForFeatures[$i]]['workshops'] as $w) {

$cellLine = "";
$nospan="";
if ($areasForFeatures[$i] == "visionLeadership" || $areasForFeatures[$i] == "environment" || $areasForFeatures[$i] == "wayOfWorking") {
print "<td colspan=2  style='text-align:center'><b>Relevant for both Dev and Ops</b><br>";
$nospan="Y";
} else {
print "<td>";
}
	foreach ($w as $ws)
	{
		if(!in_array($ws, $allWorkshops)){
   	     array_push($allWorkshops, $ws);
			  $cellLine .=  $ws  . "<br>";
		}
   }
print $cellLine . "</td>";
		if ($nospan == "Y") {
		break;		
		}

	}
print "</tr>";
}
?>
</tbody>
</table>
<!-- End of Universal Discovery Workshop -->

</div>
<!-- end of main content div -->
<!-- end of wrapper div -->

<script>
  var g = new JustGage({
    id: "automationDev",
    value: <?php print $data_array['d1'] . "\n"; ?>,
    min: 0,
    max: 5,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.0,
        levelColors: ["#FFDA6B","#FFDA6B", "#ffa500", "#33C7FF", "#90ee90", "00ff00"],
        counter: true,
        levelColorsGradient: false
    
  });
</script>
<script>
  var g = new JustGage({
    id: "automationOps",
    value: <?php print $data_array['o1'] . "\n"; ?>,
    min: 0,
    max: 5,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        levelColors: ["#FFDA6B","#FFDA6B", "#ffa500", "#33C7FF", "#90ee90", "00ff00"],
        counter: true    
  });
</script>
<script>
  var g = new JustGage({
    id: "wowOps",
    value: <?php print $data_array['o2'] . "\n"; ?>,
    min: 0,
    max: 5,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        levelColors: ["#FFDA6B","#FFDA6B", "#ffa500", "#33C7FF", "#90ee90", "00ff00"],
        counter: true    
  });
</script>
<script>
  var g = new JustGage({
    id: "wowDev",
    value: <?php print $data_array['d2'] . "\n"; ?>,
    min: 0,
    max: 5,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        levelColors: ["#FFDA6B","#FFDA6B", "#ffa500", "#33C7FF", "#90ee90", "00ff00"],
        counter: true    
  });
</script>


<script>
  var g = new JustGage({
    id: "archOps",
    value: <?php print $data_array['o3'] . "\n"; ?>,
    min: 0,
    max: 5,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        levelColors: ["#FFDA6B","#FFDA6B", "#ffa500", "#33C7FF", "#90ee90", "00ff00"],
        counter: true    
  });
</script>
<script>
  var g = new JustGage({
    id: "archDev",
    value: <?php print $data_array['d3'] . "\n"; ?>,
    min: 0,
    max: 5,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        levelColors: ["#FFDA6B","#FFDA6B", "#ffa500", "#33C7FF", "#90ee90", "00ff00"],
        counter: true    
  });
</script>

<script>
  var g = new JustGage({
    id: "visionDev",
    value: <?php print $data_array['d4'] . "\n"; ?>,
    min: 0,
    max: 5,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        levelColors: ["#FFDA6B","#FFDA6B", "#ffa500", "#33C7FF", "#90ee90", "00ff00"],
        counter: true    
  });
</script>
<script>
  var g = new JustGage({
    id: "visionOps",
    value: <?php print $data_array['o4'] . "\n"; ?>,
    min: 0,
    max: 5,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        levelColors: ["#FFDA6B","#FFDA6B", "#ffa500", "#33C7FF", "#90ee90", "00ff00"],
        counter: true    
  });
</script>
<script>
  var g = new JustGage({
    id: "envOps",
    value: <?php print $data_array['o5'] . "\n"; ?>,
    min: 0,
    max: 5,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        levelColors: ["#FFDA6B","#FFDA6B", "#ffa500", "#33C7FF", "#90ee90", "00ff00"],
        counter: true    
  });
</script>
<script>
  var g = new JustGage({
    id: "envDev",
    value: <?php print $data_array['d5'] . "\n"; ?>,
    min: 0,
    max: 5,
    decimals: 2,
        humanFriendly : true,
        gaugeWidthScale: 1.3,
        levelColors: ["#FFDA6B","#FFDA6B", "#ffa500", "#33C7FF", "#90ee90", "00ff00"],
        counter: true    
  });
</script>
</body>
</html>
