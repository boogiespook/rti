<!DOCTYPE html>
<html>
<?php
date_default_timezone_set("Europe/London");
## Connect to the Database 
include 'dbconnect.php';
connectDB();

# Retrieve the data
$hash = $_REQUEST['hash'];
$qq = "SELECT * FROM data WHERE hash='".mysqli_real_escape_string($db, $hash)."'";
#print $qq;
$res = mysqli_query($db, $qq);
$data_array = mysqli_fetch_assoc($res);

#global $data_array;
#var_dump($data_array);
if (empty($data_array)) {
print "<h2> Results not found </h2>";
exit;
}
$ops_arr = $dev_arr = $opsRound_arr = $devRound_arr = array();
$share = $data_array['share'];
$lob = $data_array['lob'];

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

$string = file_get_contents("questionsV2.json");
$json = json_decode($string, true);

$string2 = file_get_contents("comments.json");
$comments = json_decode($string2, true);
?>
<head>
    <script src="js/Chart.bundle.js"></script>
    <script src="js/utils.js"></script>
    <script src="js/raphael-2.1.4.min.js"></script>
    <script src="js/justgage.js"></script>
    <title>Ready to Innovate Assessment</title>
<link rel="stylesheet" type="text/css" href="css/overpass.css"/>

    <link href="css/rhbar.css" media="screen" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    
	 <link rel="stylesheet" href="css/style.css">

   <script>
  $( function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "blind",
        duration: 1000
      }
    });
 
    $( "#opener" ).on( "click", function() {
      $( "#dialog" ).dialog( "open" );
    });
  } );
  </script>

  <script>
  $( function() {
    $( "#workshop-dialog" ).dialog({
      autoOpen: false,
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
      autoOpen: false,
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
      autoOpen: false,
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
    $( "#average-dialog-dev-lob" ).dialog({
      autoOpen: false,
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
 
    $( "#average-opener-dev-lob" ).on( "click", function() {
      $( "#average-dialog-dev-lob" ).dialog( "open" );
    });
  } );
  </script>

  <script>
  $( function() {
    $( "#average-dialog-ops-lob" ).dialog({
      autoOpen: false,
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
 
    $( "#average-opener-ops-lob" ).on( "click", function() {
      $( "#average-dialog-ops-lob" ).dialog( "open" );
    });
  } );
  </script>

  <script>
  $( function() {
    $( "#average-dialog-ops" ).dialog({
      autoOpen: false,
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

 

<script>
$(document).ready(function() {
  $(function() {
    console.log('false');
    $( "#dialog" ).dialog({
        autoOpen: false,
        title: 'Email PDF'
    });
  });

  $("button").click(function(){
    console.log("click");
//        $(this).hide();
        $( "#dialog" ).dialog('open');
    });
}); 
</script>
  <script>
  $( function() {
    $( "#dialog" ).dialog();
  } );
  </script>
  
    <script>
  $( function() {
    $( document ).tooltip();
  } );
  </script>
</head>

<body>
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
<?php  

#var_dump($data_array);

foreach( $data_array as $var => $value )
    {
    	if($var=='date') continue;
      if(substr($var[0],0,1) == "o") { $ops_arr[]=$value; $opsRound_arr[] = round($value);  };
      if(substr($var[0],0,1) == "d") { $dev_arr[]=$value; $devRound_arr[] = round($value);  };
    } 
     
 ?>
      <div id="wrapper">
      <header>

      <center>
      <h2>Ready to Innovate Assessment for <?php echo $data_array['client']; 
		if ($data_array['project'] != "") {
			print " (" . $data_array['project'] . ")";		
		}      
      ?></h2>
      </center>
      </header>
      
<div id="content">       
    <div style="width:90%">
        <canvas id="canvas"></canvas>
    </div>
        <script>

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

    var chartTitle = "DevOps Chart - " + customerName
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
    backgroundColor: 'green',
    data: [d1, d2, d3, d4, d5]
  }, {
    label: "Average",
    backgroundColor: "orange",
    data: <?php 
 #   $qq = "select avg(d1) as d1,avg(d2) as d2, avg(d3) as d3, avg(d4) as d4, avg(d5) as d5 from data;";    
    $qq = "select ROUND(avg(d1),2) as d1, ROUND(avg(d2),2) as d2, ROUND(avg(d3),2) as d3, ROUND(avg(d4),2) as d4, ROUND(avg(d5),2) as d5 from data where share ='on';";    
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

  }
});  		

var ctxLobDev = document.getElementById("myChartDevLob").getContext("2d");
var data = {
  labels: ["Automation", "Way of Working", "Architecture", "Vision and Leadership", "Environment"],
  datasets: [{
    label: customerName,
    backgroundColor: 'green',
    data: [d1, d2, d3, d4, d5]
  }, {
    label: "Average",
    backgroundColor: "orange",
    data: <?php 
    $qq = "select ROUND(avg(d1),2) as d1, ROUND(avg(d2),2) as d2, ROUND(avg(d3),2) as d3, ROUND(avg(d4),2) as d4, ROUND(avg(d5),2) as d5 from data where share ='on' and lob = '" . $lob . "';";    
    $res = mysqli_query($GLOBALS["___mysqli_ston"], $qq);
    $row = mysqli_fetch_array($res);
     echo "[" . $row[0] . "," . $row[1] . "," . $row[2] . "," . $row[3] . "," . $row[4] . "]"; 
     ?>
  },
  ]
};

var myBarChart = new Chart(ctxLobDev, {
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

  }
});  	

var ctxLobOps = document.getElementById("myChartDevOps").getContext("2d");
var data = {
  labels: ["Automation", "Way of Working", "Architecture", "Vision and Leadership", "Environment"],
  datasets: [{
    label: customerName,
    backgroundColor: 'green',
    data: [d1, d2, d3, d4, d5]
  }, {
    label: "Average",
    backgroundColor: "orange",
    data: <?php 
    $qq = "select ROUND(avg(o1),2) as o1, ROUND(avg(o2),2) as o2, ROUND(avg(o3),2) as o3, ROUND(avg(o4),2) as o4, ROUND(avg(o5),2) as o5 from data where share ='on' and lob = '" . $lob . "';";    
    $res = mysqli_query($GLOBALS["___mysqli_ston"], $qq);
    $row = mysqli_fetch_array($res);
     echo "[" . $row[0] . "," . $row[1] . "," . $row[2] . "," . $row[3] . "," . $row[4] . "]"; 
     ?>
  },
  ]
};

var myBarChart = new Chart(ctxLobOps, {
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

  }
});  	

var ctx2 = document.getElementById("myChartOps").getContext("2d");
var dataOps = {
  labels: ["Automation", "Way of Working", "Architecture", "Vision and Strategy", "Environment"],
  datasets: [{
    label: customerName,
    backgroundColor: 'green',
    data: [o1, o2, o3, o4, o5]
  }, {
    label: "Average",
    backgroundColor: "orange",
    data: <?php 
#    $qq = "select avg(o1) as d1,avg(o2) as d2, avg(o3) as d3, avg(o4) as d4, avg(o5) as d5 from data;";    
    $qq = "select ROUND(avg(o1),2) as o1, ROUND(avg(o2),2) as o2, ROUND(avg(o3),2) as o3, ROUND(avg(o4),2) as o4, ROUND(avg(o5),2) as o5 from data where share ='on';";    
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

  }
});  				
  		
};
             


    var colorNames = Object.keys(window.chartColors);
    </script>
<div class="centeredDiv">
<div class="w3-container">

</div>
</div>

<h4 class="centeredText">Overall Maturity Assessment</h4>


<?php
## Get an overall score by adding them all up
$totalScore = 0;

for($i = 1; $i < 6; $i++) {
$totalScore += $data_array["d$i"];
$totalScore += $data_array["o$i"];
}
print '<table class="zebra">
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

<?php print '<br>

<a target=_blank href=resultsOpen.php?hash=' . $hash . '><p class=centeredDiv>Detailed Version</p></a>'; ?>
</div>


<div id="rightcol">


<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Overview</a></li>
<!--     <li><a href="#tabs-2">Actions</a></li> -->
    <li><a href="#tabs-4">Notes</a></li>  
<li><a href="#tabs-5">Comparisons</a></li>
<li><a href="#tabs-3">Workshops</a></li>
      </ul>
      <div id="tabs-1">
  <table class="bordered">   
   <thead>
        <th>Area</th>        
        <th>Development Rating</th>
        <th>Operations Rating</th>
    </thead>
	<tbody> 
<tr><td></td><td></td></tr>
<?php
$areas = array(
	1 => "Automation",
	2 => "Way of working",
	3 => "Architecture",
	4 => "Vision and Leadership",
	5 => "Environment"
);

function getActions($areaName,$type,$num,$comments){
## For example getActions("Automation","operations",1)
$actionField = round($num) . "-action";
print $comments[$areaName][$type][$actionField];

## TODO: Need to get ops and dev together with <td> etc
}

function printGauge($areaName,$num,$chartName,$arr) {
print '<tr><td><b>' . $areaName . '</b></td><td>
<div id="' . $chartName . 'Dev" style="height:80px;margin-left: auto;margin-right: auto;"></div>
	<p class="' . strtolower(getRating($arr["d$num"])) . '">' . getRating($arr["d$num"]) . '</p>
</td>
<td><div id="' . $chartName . 'Ops" style="height:80px"></div>
	<p class=" ' . strtolower(getRating($arr["o$num"])) . '">' . getRating($arr["o$num"]) . '</p>
</td>
</tr>';
#print "<tr>
#<td>&nbsp</td>";
#print "<td><a href=\"#\" title=\"Actions for Dev " . $areaName . " Level " . floor($arr["d$num"]) . "\">Actions</a> 
#</td>
#	<td><a href=\"#\" title=\"Actions for Ops " . $areaName . " Level " . floor($arr["o$num"]) . "\">Actions</a>
#	</td>
print "</tr>";
#print '<div id="dialog" title="Basic dialog">
#  <p>This is an animated dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the x icon.</p>
#</div>
#  <p id="opener">Open Dialog</p>';
#print '<a href="#" title="That&apos;s what this widget is">Tooltips</a>';
}

printGauge("Automation","1","automation",$data_array);
printGauge("Way of Working","2","wow",$data_array);
printGauge("Architecture","3","arch",$data_array);
printGauge("Vision and Leadership","4","vision",$data_array);
printGauge("Environment","5","env",$data_array);



?>

</tbody>
</table>	

	<!-- End of Tab1 Div -->    
      </div>


     <div id="tabs-3">
<h4>Suggested Follow-up Workshops</h4>
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

      
      </div>

      <div id="tabs-4">

<?php

function putAreaComments($title, $area) {
$commentLabel = "comments_" . $area;
print "Looking for $commentLabel"; 
if ($data_array["$commentLabel"] != NULL) {
print "<h4>$title</h4>";
print '<p>' . $data_array["$commentLabel"] . "</p>";
}
}

if ($data_array['comments'] != "") {
print "<h4>General Comments</h4>";
print "<p>" . $data_array['comments'] . "</p>";
}

## Fudge here as can't seem to get it in a loop ... dodgy code alert!
if ($data_array['comments_automation'] != "") {
print "<h4>Automation</h4>";
print "<p>" . $data_array['comments_automation'] . "</p>";
}

if ($data_array['comments_wayOfWorking'] != "") {
print "<h4>Way of Working</h4>";
print "<p>" . $data_array['comments_wayOfWorking'] . "</p>";
}

if ($data_array['comments_architecture'] != "") {
print "<h4>Architecture</h4>";
print "<p>" . $data_array['comments_architecture'] . "</p>";
}

if ($data_array['comments_environment'] != "") {
print "<h4>Environment</h4>";
print "<p>" . $data_array['comments_environment'] . "</p>";
}

if ($data_array['comments_visionLeadership'] != "") {
print "<h4>Vision and Leadership</h4>";
print "<p>" . $data_array['comments_visionLeadership'] . "</p>";
}
?>      
	<!-- End of Tab4 Div -->    
      </div>

<!-- Start of comparisons -->
      <div id="tabs-5">

 <?php
if ($share == "on") {
print '<br>
<div id="average-dialog-dev" title="Average (Dev)">
<canvas id="myChartDev" width="400" height="200"></canvas>
</div>
<button id="average-opener-dev" class="ui-button ui-widget ui-corner-all">Average (Dev)</button>

<div id="average-dialog-ops" title="Average (Ops)">
<canvas id="myChartOps" width="400" height="200"></canvas>
</div>
<button id="average-opener-ops" class="ui-button ui-widget ui-corner-all">Average (Ops)</button>
<br><br>
<div id="average-dialog-dev-lob" title="Average for ' . $lob . ' (Dev)">
<canvas id="myChartDevLob" width="400" height="200"></canvas>
</div>
<button id="average-opener-dev-lob" class="ui-button ui-widget ui-corner-all">Average (Dev) for ' . $lob . '</button>

<div id="average-dialog-ops-lob" title="Average for ' . $lob . ' (Ops)">
<canvas id="myChartDevOps" width="400" height="200"></canvas>
</div>
<button id="average-opener-ops-lob" class="ui-button ui-widget ui-corner-all">Average (Ops) for ' . $lob . '</button>
<br><br>
';
} else {
print "<h4>Comparisons not available for this customer</h4>";
}
?>     
	<!-- End of comparisons -->    
      </div>


</div>

</div>
<!-- end of main content div -->
<!-- end of wrapper div -->


</div>


<script id="jsbin-javascript">
$(document).ready(function(){
  
  var mc = {
    '0-25'     : 'red',
    '26-50'    : 'orange',
    '51-100'   : 'green'
  };
  
function between(x, min, max) {
  return x >= min && x <= max;
}
  

  
  var dc;
  var first; 
  var second;
  var th;
  
  $('p').each(function(index){
    
    th = $(this);
    
    dc = parseInt($(this).attr('data-color'),10);
    
    
      $.each(mc, function(name, value){
        
        
        first = parseInt(name.split('-')[0],10);
        second = parseInt(name.split('-')[1],10);

        
        if( between(dc, first, second) ){
          th.addClass(value);
        }
      });
    
  });
});
</script>
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
        gaugeWidthScale: 1.0,
        levelColors: ["#FFDA6B","#FFDA6B", "#ffa500", "#33C7FF", "#90ee90", "00ff00"],
        counter: true,
        levelColorsGradient: false    
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
        gaugeWidthScale: 1.0,
        levelColors: ["#FFDA6B","#FFDA6B", "#ffa500", "#33C7FF", "#90ee90", "00ff00"],
        counter: true,
        levelColorsGradient: false        
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
        gaugeWidthScale: 1.0,
        levelColors: ["#FFDA6B","#FFDA6B", "#ffa500", "#33C7FF", "#90ee90", "00ff00"],
        counter: true,
        levelColorsGradient: false    
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
        gaugeWidthScale: 1.0,
        levelColors: ["#FFDA6B","#FFDA6B", "#ffa500", "#33C7FF", "#90ee90", "00ff00"],
        counter: true,
        levelColorsGradient: false        
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
        gaugeWidthScale: 1.0,
        levelColors: ["#FFDA6B","#FFDA6B", "#ffa500", "#33C7FF", "#90ee90", "00ff00"],
        counter: true,
        levelColorsGradient: false        
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
        gaugeWidthScale: 1.0,
        levelColors: ["#FFDA6B","#FFDA6B", "#ffa500", "#33C7FF", "#90ee90", "00ff00"],
        counter: true,
        levelColorsGradient: false        
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
        gaugeWidthScale: 1.0,
        levelColors: ["#FFDA6B","#FFDA6B", "#ffa500", "#33C7FF", "#90ee90", "00ff00"],
        counter: true,
        levelColorsGradient: false        
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
        gaugeWidthScale: 1.0,
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
        gaugeWidthScale: 1.0,
        levelColors: ["#FFDA6B","#FFDA6B", "#ffa500", "#33C7FF", "#90ee90", "00ff00"],
        counter: true    
  });
</script>
</body>
</html>
