<?php
session_start();
if(!isset($_SESSION['usr_name'])) {
header("Location: login.php");
}

include('functionPutFieldsets.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="https://overpass-30e2.kxcdn.com/overpass.css"/>
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/jquery.qtip.css" />
<link rel="stylesheet" href="css/bootstrap-slider.css" type="text/css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
<link href="css/bootstrap-toggle.min.css" rel="stylesheet">


<script src="js/jquery-1.12.4.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/jquery.qtip.min.js"></script>
<script>$.fn.slider = null</script>  
<script src="js/bootstrap-slider.js"></script>  
<script src="js/bootstrap-toggle.min.js"></script>


<script type="text/javascript" >
  $( function() {
$("#input").slider({
    ticks: [0, 0.5, 1, 1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5],
    ticks_labels: ['0', '0.5', '1', '1.5', '2', '2.5', '3', '3.5', '4', '4.5', '5'],
    step: "0.5",
    id: 'sliderCol',
    min: 0,
    max: 6,
    value: 0,
    tooltip: "show",
    rangeHighlights: [{ "start": 0, "end": 2, "class": "category1"},
                      { "start": 2, "end": 3.5, "class": "category2"},
                      { "start": 3.5, "end": 5, "class": "category3"}
							]});
});
</script>
  <script>
//  $( function() {
//    $( "input" ).checkboxradio();
//  } );
  </script>

  <script>
  $( function() {
    $( document ).tooltip();
  } );
  </script>
  <style>
  label {
    display: inline-block;
    width: 5em;
  }
  </style>

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
			<div class="smallVersion">v2.0</div>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['usr_id'])) { ?>
				<li><a href="assess.php">Run Assessment</a></li>
				<li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
				<li><a href="logout.php">Log Out</a></li>
				<li><a href="blog">Blog</a></li>
				<?php } else { ?>
				<li><a href="register.php">Register</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="blog">Blog</a></li>

				<?php } ?>

			</ul>
		</div>
	</div>
</nav>
    <div class="container-fluid">
    

<form id="regForm" action="tmp.php">

  <!-- One "tab" for each step in the form: -->
  <div class="tab">
  <h3>Welcome to the "Ready to Innovate?" Assessment</h3>

<p class="blackWelcomeText">
Ready to Innovate is a web based tool to get an understanding of the current state of your development and operational teams' capabilities that contribute towards software delivery performance and your organisation's strategic goals and objectives.</p>

<p class="blackWelcomeText">
The assessment considers levels of capability that fall within five areas of interest:
</p>
 <ul>
<li>
	Automation
</li>
<li>
	Way of Working
</li>
<li>
Architecture
</li>
<li>
Vision and Leadership
</li>
<li>
Environment
</li>
</ul>
<!-- <div class="leftTable">
<table>
<tr><td><img src="images/automation.png"></td><td>Automation</td></tr>
<tr><td><img src="images/wayOfWorking.png"></td><td>Way of Working</td></tr>
<tr><td><img src="images/architecture.png"></td><td>Architecture</td></tr>
<tr><td><img src="images/visionLeadership.png"></td><td>Vision and Leadership</td></tr>
<tr><td><img src="images/environment2.png"></td><td>Environment</td></tr>
</table>
</div>
 --><br>
<p class="blackWelcomeText">
Following completion of the assessment, you will be provided with a set of next steps and recommendations that support more in-depth follow up workshops into the challenges and opportunities that face your business.</p>
<p class="blackWelcomeText">

<p class="blackWelcomeText">
The assessment is mainly based on the integration, processes and methods used by both development and operations teams. To provide a more holistic overview, include members of other teams such as security, testing and business owners.</p>
</p>
  </div>
  <div class="tab"><h4>Customer Details</h4>
    <p><input placeholder="Client Name" oninput="this.className = ''" name="customerName" ></p>
    <p><input placeholder="Email Address" oninput="this.className = ''" name="rhEmail"  ></p>
    <p><input placeholder="Project/Team" oninput="this.className = ''" name="project"  ></p>
<!-- <label class="checkbox-inline">
  <input type="checkbox" class="shareBox" name="share" id="share" checked> Do you agree that the anonymous results can be used for comparative purposes?

 </label>
 --><p>Do you agree that the anonymous results can be used for comparative purposes?</p>

<input type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" name="share" id="share" data-size="normal" data-onstyle="success"  data-offstyle="danger" checked>
    <p class="mainTextItalic">Note: comparisons are only available if you opt-in to share data</p>
<p>Please select Country and Line of Business using the drop down lists</p>
<?php putCountries();?>

<?php putLoBs();?>
    
  </div>
  
<?php

function printQuestions($title,$area) {
$string = file_get_contents("questionsV2.json");
$json = json_decode($string, true);
$i=1;
$qnum = $json[$area]['qnum'];
print '<div class="floatingImage"><img src="images/' . $area . '.png"></div>';
#print '<div  id="accordion"><img src="images/' . $area . '.png"></div>';
print '   <h2>' . $title . '</h2><b>' . $json[$area]['overview'] . '</b>
<br><br><p>Click on a text block below to show more information</p>
<div class="divTable" id="zebra">
<div class="divTableBody">
<div class="divTableRow">';

while( $i < 6) {
	
	if($i % 2 == 0){
	print '<div class="divTableCell">';	
	} else {
	print '<div class="dark">';	
	}
#	$sum = $i . '-details';
	$sum = $i . '-summary';
print '<b>Level ' . $i . ' </b>'; 
print "<details>";
print '<summary>' . $json[$area][$i] . "</summary>";
print '<div class="detailsPane">' . $json[$area]["$sum"] . '</div>';
print "</details>";
print "</div>";
$i++;
}


print '</div>
</div>';
print '</div>';
print "<hr><h4 class='headerCentered'>Development</h4>";
print '<input data-slider-id="sliderCol" class="slider" type="range" data-slider-value="1"  name="d' . $qnum . '" type="text" data-slider-rangeHighlights=[{ "start": 0, "end": 2, "class": "category1" }, { "start": 2, "end": 3.5, "class": "category2" }, { "start": 3.5, "end": 5, "class": "category3" }] />';
print "
<h4 class='headerCentered'>Operations</h4>";
print '<input data-slider-id="sliderCol" class="slider" type="range" data-slider-value="1"  name="o' . $qnum . '" type="text" data-slider-rangeHighlights=[{ "start": 0, "end": 2, "class": "category1" }, { "start": 2, "end": 3.5, "class": "category2" }, { "start": 3.5, "end": 5, "class": "category3" }] />';
print "<br>";
print "<h4>Notes</h4>";
print '<textarea form=regForm name="comments_' . $area . '" id="comments_' . $area . ' wrap="soft" rows="2"></textarea>';
};

?>  
  
  <div class="tab">
<?php printQuestions("Automation","automation");  ?>
  </div>

  <div class="tab">
<?php printQuestions("Way of Working","wayOfWorking");  ?>
  </div>

  <div class="tab">
<?php printQuestions("Architecture","architecture");  ?>
  </div>

  <div class="tab">
<?php printQuestions("Vision and Leadership","visionLeadership");  ?>
  </div>

  <div class="tab">
<?php printQuestions("Environment","environment");  ?>
  </div>



  <div class="tab">
<h2>Discussion Points</h2>
  <h4> Please add any discussion points or other information here</h4>
<br>
<textarea form=regForm name="comments" id="comments" wrap="soft" rows="20"></textarea>
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
  //console.log(y);

  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    // Project name isn't mandatory so skip that one
    if (y[i].value == "" && i != 2) {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
//      valid = true;
      valid = false;
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
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>  
  
</body>
</html>
