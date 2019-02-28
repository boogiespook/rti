<!DOCTYPE html>
<html>
<head>
    <script src="Chart.bundle.js"></script>
    <script src="utils.js"></script>
    <script src="raphael-2.1.4.min.js"></script>
    <title>Ready to Innovate Assessment</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body>
<?php  date_default_timezone_set("Europe/London");
#phpinfo();
 ?>
<div style="width:50%;">
        <canvas id="canvas"></canvas>
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

    var customerName = getQueryVariable("name")


    var d1 = getQueryVariable("d1")
    var d2 = getQueryVariable("d2")
    var d3 = getQueryVariable("d3")
    var d4 = getQueryVariable("d4")
    var d5 = getQueryVariable("d5")
    var totalDev = d1 + d2 + d3 + d4 + d5

    var o1 = getQueryVariable("o1")
    var o2 = getQueryVariable("o2")
    var o3 = getQueryVariable("o3")
    var o4 = getQueryVariable("o4")
    var o5 = getQueryVariable("o5")
    var totalOps = o1 + o2 + o3 + o4 + o5

    var chartTitle = "DevOps Chart - " + customerName

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
                max: 4,
                min: 0
              }
            },
				animation:{
        			onComplete : function(){
					var dataURL = canvas.toDataURL("image/png",1.0);
					$.ajax({ 
				    	type: "POST", 
    					url: "chartSave.php",
    					data: "spider="+dataURL+"&customer="+customerName,
					});
        }
    }        }
    };

    window.onload = function() {
        	window.myRadar = new Chart(document.getElementById("canvas"), config);
            };
    
var colorNames = Object.keys(window.chartColors);



</script>

</html>
