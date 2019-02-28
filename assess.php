<?php
session_start();
include('functionPutFieldsets.php');
#phpinfo();
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="https://overpass-30e2.kxcdn.com/overpass.css"/>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="css/bootstrap-slider.css" type="text/css" />
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/jquery.qtip.css" />
<link rel="stylesheet" href="css/style.css" />


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>$.fn.slider = null</script>
<script src="js/jquery.qtip.min.js"></script>
<script src="js/bootstrap-slider.js"></script>  
  
<script type="text/javascript" >
  $( function() {
$("#input").slider({
    ticks: [0, 0.5, 1, 1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5],
    ticks_labels: ['0', '0.5', '1', '1.5', '2', '2.5', '3', '3.5', '4', '4.5', '5'],
    step: "0.5",
    min: 0,
    max: 6,
    value: 0,
    tooltip: "show",
});
  } );
</script>

</head>
<body>

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php"><img src="images/innovate.png">  Ready to Innovate?</a>
			<div id="smallVersion">v2.0</div>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
								<li><a href="#">Signed in as Chris Jenkins</a></li>
				<li><a href="passwd.php">Change Password</a></li>
				<li><a href="logout.php">Log Out</a></li>
				<li><a href="blog">Blog</a></li>
				
			</ul>
		</div>
	</div>
</nav>
    <div class="container">
    

<form id="regForm" action="tmp.php">
  <h1>Ready To Innovate</h1>
  <!-- One "tab" for each step in the form: -->
  <div class="tab">
  <h3>Welcome to the "Ready to Innovate?" Assessment.</h3>

<p class="mainText">
By the end of this assessment you will:
<ul>
<li  class="mainText">    Understand the wider issues around Digital Transformation, Platform-As-a-Service and DevOps adoption in parallel with technical PoCs or pilots.
    <li class="mainText">Understand the maturity of your organization across five outlined areas of interest:
    <ul>
        <li class="mainText">Automation
        <li class="mainText">Methodology
        <li class="mainText">Architecture
        <li class="mainText">Strategy
        <li class="mainText">Environment
        </ul>
    <li class="mainText">Walk away with next steps and recommended follow-up sessions from Red Hat Consulting to dive deep into the challenges and opportunities that face your business.
    </ul>
<br>
  </div>
  <div class="tab"><h4>Customer Details</h4>
    <p><input placeholder="Client Name" oninput="this.className = ''" name="customerName" ></p>
    <p><input placeholder="Email Address" oninput="this.className = ''" name="rhEmail"  ></p>
<?php putCountries();?>

<?php putLoBs();?>
    
  </p>
<br> 
 
  </div>
  
<?php
function printQuestionsOps($type,$number,$area) {
$string = file_get_contents("questions-new.json");
$json = json_decode($string, true);
$i=1;
$initial = $type[0];

print '<div class="divTable">   <h4>' . ucfirst($type) . '</h4>

<div class="divTableBody">
<div class="divTableRow">';

while( $i < 6) {

	print '<div class="divTableCell"><p class="mainText"><b>' . $i . ') </b>' . $json[$type][$area][$i]['question'] . "</p>";
	if ($json[$type][$area][$i]['description'] != "XXX") {
		print '<a href="#" title="' . $json[$type][$area][$i]['description'] . '">More Detail</a>';
	}
	print "</div>";
$i++;
}
print '</div>
</div>';
print '</div>';
print '<input class="slider" type="range" data-slider-value="1"  name="' . $initial . $number . '" type="text" />';
}



?>  
  
  <div class="tab">
  <h2>Automation</h2>
  <h4> Change is the new constant and agile business practices are key to remaining competitive. Automation is often the space most influenced by our technology and methodology. </h4>
<!--  <h3>Development</h3>-->
<?php printQuestionsOps("development",1,"automation");  ?>
<!--  <h3>Operations</h3>-->
<?php printQuestionsOps("operations",1,"automation");  ?>
  </div>

  <div class="tab">
  <h2>Methodology</h2>
  <h4> In today’s market, large organizations must rely on more than just technology and tools. In this section, methodology refers to the way in which you are running your IT projects</h4>
<!--  <h3>Development</h3>-->
<?php printQuestionsOps("development",2,"methodology");  ?>
<!--  <h3>Operations</h3>-->
<?php printQuestionsOps("operations",2,"methodology");  ?>
  </div>

  <div class="tab">
  <h2>Architecture</h2>
  <h4> As systems expand, you need to effectively manage your IT environment so all the parts work together to get the quickest return on investment (ROI). The following questions cover the long term architectural motivations, aims, and advances to your current state architecture</h4>
<!--  <h3>Development</h3>-->
<?php printQuestionsOps("development",3,"architecture");  ?>
<!--  <h3>Operations</h3>-->
<?php printQuestionsOps("operations",3,"architecture");  ?>
  </div>

  <div class="tab">
  <h2>Strategy</h2>
  <h4> Defining a strategy is one of the most challenging areas for an organization. Often, the ability to interpret and translate business ideas to solutions can be complex</h4>
<!--  <h3>Development</h3>-->
<?php printQuestionsOps("development",4,"strategy");  ?>
<!--  <h3>Operations</h3>-->
<?php printQuestionsOps("operations",4,"strategy");  ?>
  </div>

  <div class="tab">
  <h2>Environment</h2>
  <h4> In this section, environment is defined as the mixture of staff, culture, training, and skill level within each area</h4>
<!--  <h3>Development</h3>-->
<?php printQuestionsOps("development",5,"environment");  ?>
<!--  <h3>Operations</h3>-->
<?php printQuestionsOps("operations",5,"environment");  ?>
  </div>


  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtnCJ" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>    
    <span class="step"></span>     
     </div>
</form>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtnCJ").style.display = "none";
  } else {
    document.getElementById("prevBtnCJ").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = true;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
<script type="text/javascript" >
var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
  });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>




  <script>
$(".slider").slider({
    step: 0.5,
    min: 1,
    max: 5,
    value: 1,
    ticks: [1, 1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5],

    slide: function(event, ui) {
//        $("input[name=" + $(this).attr("id")).val(ui.value);
        $("input[name=" + $(this).attr("id")).val((ui.value / 10) - 0.1 + 1);
    }
});

  </script>
<div>
<script type="text/javascript" >
 $(document).ready(function()
 {
     // Show tooltip on all <a/> elements with title attributes, but only when
     // clicked. Clicking anywhere else on the document will hide the tooltip
     $('a[title]').qtip({
         show: 'click',
         hide: 'unfocus'
     });
 });
</script>  
  <script>
  $( function() {
    $( "#country" )
      .selectmenu()
      .selectmenu( "menuWidget" )
        .addClass( "overflow" );

    $( "#lob" )
      .selectmenu()
      .selectmenu( "menuWidget" )
        .addClass( "overflow" );

  } );
  </script>
</body>
</html>
