<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ready to Innovate?</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css"/>
	<link rel="stylesheet" type="text/css" href="http://overpass-30e2.kxcdn.com/overpass.css"/>

<!--	<script src="js/jquery-1.10.2.js"></script>-->
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
  
    <script>
  $( function() {
    $( "input" ).checkboxradio();
  } );
  </script>
  
  <style>
      #locationField, #controls {
        position: relative;
        width: 480px;
      }
      #autocomplete {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 99%;
      }
      .label {
        text-align: right;
        font-weight: bold;

        color: #303030;
      }
      #address {
        border: 1px solid #000090;
        background-color: #f0f0ff;
        width: 480px;
        padding-right: 2px;
      }
      #address td {
        font-size: 10pt;
      }
      .field {
        width: 99%;
      }
      .slimField {
        width: 80px;
      }
      .wideField {
        width: 200px;
      }
      #locationField {
        height: 20px;
        margin-bottom: 2px;
      }
      .page { position: absolute; 
      	top: 10; 
      	left: 100; 
      	visibility: hidden; 
      	} 
      	
legend {

}

p { font-family: 'overpass', sans-serif; line-height: 28px; margin-bottom: 15px; color: #666; }



label {

    display:inline-block;
}
input {
  border-radius: 15px;
  margin: 10px;
} 	

h3 { color: #7c795d; font-family: 'overpass', sans-serif; font-size: 28px; font-weight: 400; line-height: 32px; margin: 0 0 24px; }



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
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['usr_id'])) { ?>
				<li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
				<li><a href="logout.php">Log Out</a></li>
				<li><a href="blog">Blog</a></li>
				<?php } else { ?>
				<li><a href="login.php">Login</a></li>
				<li><a href="blog">Blog</a></li>

				<?php } ?>

			</ul>
		</div>
	</div>
</nav>

<?php
if(isset($_SESSION['usr_id'])) {
include 'dbconnect.php';
$userId = $_SESSION['usr_id'];

?>
    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
<!--      <div class="jumbotron"> -->
<form id="innovate-form" action="tmp.php">

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Introduction</a></li>
    <li><a href="#tabs-2">Client Details</a></li>
    <li><a href="#tabs-3">Automation</a></li>
    <li><a href="#tabs-4">Methodology</a></li>
    <li><a href="#tabs-5">Architecture</a></li>
    <li><a href="#tabs-6">Strategy</a></li>
    <li><a href="#tabs-7">Resources</a></li>
    <li><input type="submit" value="Submit"></li>
  </ul>
  <div id="tabs-1">
  <h3>Welcome to the "Ready to Innovate?" Assessment.</h3>
  
    <p>
<b>AIM</b>: To understand the wider issues around PaaS / DevOps adoption; what will make it successful or why has it stalled.  In parallel with technical PoCs or pilots.
</p>

<p>
<b>AIM</b>: To understand the maturity of your organisation across 5 outlined areas of interest
</p>

<p><b>AIM</b>: To identify next steps, using follow-up sessions from Red Hat Consulting to do in depth studies</p>
<br>
<p>
To complete the assessment, please use the tabs and check the comment which better suits your environment.  Once complete, click "Submit" from the Submit Tab.
</p>
  </div>
  <div id="tabs-2">
    <p>
      <label class="w3-label w3-validate">Customer Name</label>
    <input type="text" name="customerName" size="20" >

    </p>
<label class="w3-label w3-validate">Region</label>
<select name="region">
<option value=DA>DA</option>
<option value=CH>CH</option>
<option value=Benelux>Benelux</option>
<option value=UKI>UKI</option>
<option value=Nordics>Nordics</option>
<option value=CEE>CEE</option>
<option value=CIS>CIS</option>
<option value=France>France</option>
<option value=ICG>ICG</option>
<option value=Italy>Italy</option>
<option value=Iberia>Iberia</option>
<option value=MENA>MENA</option>
<option value=Turkey>Turkey</option>
</select>
  </p>
<label  class="w3-label w3-validate">Domain</label>
<select name="domain">
<option value=Government>Government</option>
<option value=Finance>Finance</option>
<option value=Retail>Retail</option>
<option value=Manufacturing>Manufacturing</option>
<option value=Health>Health</option>
<option value=Media>Media</option>
<option value=Telecoms>Telecoms</option>
<option value=Energy>Energy</option>
</select>
  </p>
    
    
  </div>
  <div id="tabs-3">

<div class="widget"> 
  <fieldset>
    <legend>Development</legend>
<p><input class="w3-radio" type="radio" name="d1" id="radio-1" value="0" checked> <label>Ad-hoc tool selection</label></p>
<p><input class="w3-radio" type="radio" name="d1" id="radio-1" value="1"> <label>Manual deployment (App + OS)</label></p>
<p><input class="w3-radio" type="radio" name="d1" id="radio-1" value="2"> <label>CI/CD for non-production</label></p>
<p><input class="w3-radio" type="radio" name="d1" id="radio-1" value="3"> <label>CD Pipelines capable of pushing to production</label></p>
<p><input class="w3-radio" type="radio" name="d1" id="radio-1" value="4"> <label>> 90% of projects developed using agile development techniques</label></p>

  </fieldset>
 
  <fieldset>
    <legend>Operations</legend>
<p><input class="w3-radio" type="radio" name="o1" id="radio-1" value="0" checked> <label>Core build for OS only Basic (manual) provisioning</label></p>
<p><input class="w3-radio" type="radio" name="o1" id="radio-1" value="1"> <label>Patch & Release management (OS)</label></p>
<p><input class="w3-radio" type="radio" name="o1" id="radio-1" value="2"> <label>QA staging process SOE</label></p>
<p><input class="w3-radio" type="radio" name="o1" id="radio-1" value="3"> <label>Automated OS Builds</label></p>
<p><input class="w3-radio" type="radio" name="o1" id="radio-1" value="4"> <label>> 90% of infrastructure is automatically provisioned and managed</label></p>
  </fieldset> 
 
</div>    
    </p>
  </div>
  <div id="tabs-4">
  <fieldset>
    <legend>Development</legend>
<p><input class="w3-radio" type="radio" name="d2" id="radio-2" value="0" checked> <label>No defined methodology</label></p>
<p><input class="w3-radio" type="radio" name="d2" id="radio-2" value="1"> <label>Defined waterfall approach</label></p>
<p><input class="w3-radio" type="radio" name="d2" id="radio-2" value="2"> <label>Limited agile development on new projects (not including operations)</label></p>
<p><input class="w3-radio" type="radio" name="d2" id="radio-2" value="3"> <label>Agile development through to production & ops</label></p>
<p><input class="w3-radio" type="radio" name="d2" id="radio-2" value="4"> <label>Full DevOps culture</label></p>

  </fieldset>
 
  <fieldset>
    <legend>Operations</legend>
<p><input class="w3-radio" type="radio" name="o2" id="radio-2" value="0" checked> <label>Hosting/Mgmt Only</label></p>
<p><input class="w3-radio" type="radio" name="o2" id="radio-2" value="1"> <label>Defined SLAs + ITIL</label></p>
<p><input class="w3-radio" type="radio" name="o2" id="radio-2" value="2"> <label>Compliance & Security Auditing</label></p>
<p><input class="w3-radio" type="radio" name="o2" id="radio-2" value="3"> <label>SOE</label></p>
<p><input class="w3-radio" type="radio" name="o2" id="radio-2" value="4"> <label>Full DevOps culture</label></p>
  </fieldset> 

  </div>
  <div id="tabs-5">
  <fieldset>
    <legend>Development</legend>
<p><input class="w3-radio" type="radio" name="d3" id="radio-3" value="0" checked> <label>Ad-hoc choice of application dev tools. Very limited understand of new architectures and approaches to application deployment</label></p>
<p><input class="w3-radio" type="radio" name="d3" id="radio-3" value="1"> <label>Selected vendor tech roadmap. Initial understanding of new architectures and designs</label></p>
<p><input class="w3-radio" type="radio" name="d3" id="radio-3" value="2"> <label>Iterative development of existing applications Limited legacy strategy and beginnings of new development architectures</label></p>
<p><input class="w3-radio" type="radio" name="d3" id="radio-3" value="3"> <label>Focus on new platforms & limited legacy platforms. Well defined architecture for new development projects and operating models</label></p>
<p><input class="w3-radio" type="radio" name="d3" id="radio-3" value="4"> <label>Holistic & defined overall development strategy. Good designs and architectures in place and under regular review</label></p>
  </fieldset>
 
  <fieldset>
    <legend>Operations</legend>
<p><input class="w3-radio" type="radio" name="o3" id="radio-3" value="0" checked> <label>Ad-hoc choice of future platforms</label></p>
<p><input class="w3-radio" type="radio" name="o3" id="radio-3" value="1"> <label>Selected vendor tech roadmap</label></p>
<p><input class="w3-radio" type="radio" name="o3" id="radio-3" value="2"> <label>Focus on maintaining existing infrastructure</label></p>
<p><input class="w3-radio" type="radio" name="o3" id="radio-3" value="3"> <label>Primary focus on new applications</label></p>
<p><input class="w3-radio" type="radio" name="o3" id="radio-3" value="4"> <label>Defined strategy for existing and new architectures</label></p>

  </fieldset> 


  </div>
  <div id="tabs-6">
  <fieldset>
    <legend>Development</legend>
<p><input class="w3-radio" type="radio" name="d4" id="radio-4" value="0" checked> <label>The business dictates requirements, strategy and deliverables</label></p>
<p><input class="w3-radio" type="radio" name="d4" id="radio-4" value="1"> <label>Mature requirements gathering approach (e.g. Agile user stories)</label></p>
<p><input class="w3-radio" type="radio" name="d4" id="radio-4" value="2"> <label>Minimal Viable Product (MVP)) approach</label></p>
<p><input class="w3-radio" type="radio" name="d4" id="radio-4" value="3"> <label>Multiple projects against business needs</label></p>
<p><input class="w3-radio" type="radio" name="d4" id="radio-4" value="4"> <label>IT driven business innovation. IT working directly with business requirements.</label></p>
  </fieldset>
 
  <fieldset>
    <legend>Operations</legend>
<p><input class="w3-radio" type="radio" name="o4" id="radio-4" value="0" checked> <label>Instances of negative business impact</label></p>
<p><input class="w3-radio" type="radio" name="o4" id="radio-4" value="1"> <label>Good functioning service operations (i.e few unscheduled outage but slow to deploy)</label></p>
<p><input class="w3-radio" type="radio" name="o4" id="radio-4" value="2"> <label>Project based service offerings (i.e no unscheduled outages and rapid deployment)</label></p>
<p><input class="w3-radio" type="radio" name="o4" id="radio-4" value="3"> <label>Self sevice operations for development & the business</label></p>
<p><input class="w3-radio" type="radio" name="o4" id="radio-4" value="4"> <label>Transparent integration with project IT</label></p>
  </fieldset> 
  </div>
  <div id="tabs-7">
  <fieldset>
    <legend>Development</legend>
<p><input class="w3-radio" type="radio" name="d5" id="radio-5" value="0" checked> <label>Traditional programming techniques with No agreed tools</label></p>
<p><input class="w3-radio" type="radio" name="d5" id="radio-5" value="1"> <label>Initial agile adoption with 1 backlog per team</label></p>
<p><input class="w3-radio" type="radio" name="d5" id="radio-5" value="2"> <label>Extended team collaboration. Common DevOps skills</label></p>
<p><input class="w3-radio" type="radio" name="d5" id="radio-5" value="3"> <label>Continous cross-team improvement and collaboration</label></p>
<p><input class="w3-radio" type="radio" name="d5" id="radio-5" value="4"> <label>100% DevOps projects with Full cross-functional teams</label></p>

  </fieldset>
 
  <fieldset>
    <legend>Operations</legend>
<p><input class="w3-radio" type="radio" name="o5" id="radio-5" value="0" checked> <label>Standard Unix-like skills & no scripting skills</label></p>
<p><input class="w3-radio" type="radio" name="o5" id="radio-5" value="0"> <label>Direct VM interaction but limited scripting and manual interaction.</label></p>
<p><input class="w3-radio" type="radio" name="o5" id="radio-5" value="0"> <label>Dynamic templated images</label></p>
<p><input class="w3-radio" type="radio" name="o5" id="radio-5" value="0"> <label>Fully automated & deployment skills</label></p>
<p><input class="w3-radio" type="radio" name="o5" id="radio-5" value="0"> <label>100% DevOps engineers</label></p>
  </fieldset> 
  </div>
<!--  <div id="tabs-8">
    <p>  <input type="submit" value="Submit">
</p>
  </div>
-->
</div>

</form>

      </div>


    </div> <!-- /container -->
<?php    }
####  End of Logged on bit ######
?>
 


</body>
</html>

