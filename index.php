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
<link rel="stylesheet" href="css/style.css" />
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
<?php # include_once("analyticstracking.php") ?>  
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
				<?php if (isset($_SESSION['usr_id'])) { ?>
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

<?php
if(isset($_SESSION['usr_id'])) {
include 'dbconnect.php';
$userId = $_SESSION['usr_id'];

?>
    <div class="container">

      </div>


    </div> <!-- /container -->
<?php    }
####  End of Logged on bit ######
?>
 


</body>
</html>

