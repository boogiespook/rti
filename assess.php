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
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css"> 
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
    $( "#region" ).selectmenu();
  } );
  </script>

<script>
function validateForm() {
    var x = document.forms["myForm"]["rhEmail"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    var re = /\S+@redhat.com/;

    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
//    if (! x.match(re) ) {
        alert("Not a valid e-mail address");
        return false;
    }
}
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

body {
font-family: 'overpass'
}


p { font-family: 'overpass', sans-serif; line-height: 28px; margin-bottom: 15px; color: #666; }



input {
  border-radius: 15px;
  margin: 10px;
} 	

    fieldset {
      border: 0;
    }

    .overflow {
      height: 200px;
    }

h3 { color: #7c795d; font-family: 'Source Sans Pro', sans-serif; font-size: 20px; font-weight: 400; line-height: 32px; margin: 0 0 14px; }

input[type=submit] {
    padding:0px 10px;
    width: 135px;
 height: 205x;
    font-size:20px; 
    background:#EE6363; 
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px; 
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
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['usr_id'])) { ?>
				<li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
				<li><a href="logout.php">Log Out</a></li>
				<li><a href="blog">Blog</a></li>
				<?php } else { ?>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Sign Up</a></li>
				<?php } ?>

			</ul>
		</div>
	</div>
</nav>

<?php
if(isset($_SESSION['usr_id'])) {
include 'dbconnect.php';
$userId = $_SESSION['usr_id'];
#phpinfo();
?>

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
<!--      <div class="jumbotron"> -->
<form name="myForm" id="innovate-form" action="tmp.php"  class="w3-container">

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Introduction</a></li>
    <li><a href="#tabs-2">Details</a></li>
    <li><a href="#tabs-3">Automation</a></li>
    <li><a href="#tabs-4">Methodology</a></li>
    <li><a href="#tabs-5">Architecture</a></li>
    <li><a href="#tabs-6">Strategy</a></li>
    <li><a href="#tabs-7">Environment</a></li>
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
<p>To complete the assessment, please use the tabs and check the comment which better suits your environment.  Once complete, click "Submit" from the Submit Tab.</p>
  </div>
  <div id="tabs-2">
    
<label class="w3-label w3-validate">Client Name</label>
<input class="w3-input" name="customerName" type="text" required>

    <br>
<label class="w3-label w3-validate" >Email Address</label>    
<input onfocusout="validateForm()" class="w3-input" name="rhEmail"  type="text" required>
    <br>
<input type="hidden" name="userId" value="<?php echo $_SESSION['usr_id']; ?>">

  <fieldset>
    <label for="country">Country</label>
    <select name="country" id="country">
<option value="United Kingdom">United Kingdom</option>
<option value="United States of America">United States of America</option>
<option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Erimates">United Arab Emirates</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>    </select>
    </fieldset>
    
  </p>
  <fieldset>
    <label for="lob">Line of Business</label>
    <select name="lob" id="lob">
<option value="Agriculture">Agriculture</option>
<option value="Business Services">Business Services</option>
<option value="Construction & Real Estate">Construction & Real Estate</option>
<option value="Education">Education</option>
<option value="Energy, Raw Materials & Utilities">Energy, Raw Materials & Utilities</option>
<option value="Finance">Finance</option>
<option value="Government">Government</option>
<option value="Healthcare">Healthcare</option>
<option value="IT">IT</option>
<option value="Leisure & Hospitality">Leisure & Hospitality</option>
<option value="Libraries">Libraries</option>
<option value="Manufacturing">Manufacturing</option>
<option value="Media & Internet">Media & Internet</option>
<option value="Non-Profit & Professional Orgs.">Non-Profit & Professional Orgs.</option>
<option value="Retail">Retail</option>
<option value="Software">Software</option>
<option value="Telecommunications">Telecommunications</option>
<option value="Transportation">Transportation</option>

</select>
</fieldset>   
    
  </div>
  <div id="tabs-3">

<div class="widget"> 
  <fieldset>
    <legend>Development</legend>
<input class="w3-radio" type="radio" name="d1" id="radio-1" value="0" checked> <label>Ad-hoc tool selection</label><br>
<input class="w3-radio" type="radio" name="d1" id="radio-1" value="1"> <label>Manual deployment (App + OS)</label><br>
<input class="w3-radio" type="radio" name="d1" id="radio-1" value="2"> <label>CI/CD for non-production</label><br>
<input class="w3-radio" type="radio" name="d1" id="radio-1" value="3"> <label>CD Pipelines capable of pushing to production</label><br>
<input class="w3-radio" type="radio" name="d1" id="radio-1" value="4"> <label>> 90% of projects developed using agile development techniques</label><br>

  </fieldset>
 
  <fieldset>
    <legend>Operations</legend>
<input class="w3-radio" type="radio" name="o1" id="radio-1" value="0" checked> <label>Core build for OS only Basic (manual) provisioning</label><br>
<input class="w3-radio" type="radio" name="o1" id="radio-1" value="1"> <label>Patch & Release management (OS)</label><br>
<input class="w3-radio" type="radio" name="o1" id="radio-1" value="2"> <label>QA staging process SOE</label><br>
<input class="w3-radio" type="radio" name="o1" id="radio-1" value="3"> <label>Automated OS Builds</label><br>
<input class="w3-radio" type="radio" name="o1" id="radio-1" value="4"> <label>> 90% of infrastructure is automatically provisioned and managed</label><br>
  </fieldset> 
 
</div>    
    </p>
  </div>
  <div id="tabs-4">
  <fieldset>
    <legend>Development</legend>
<input class="w3-radio" type="radio" name="d2" id="radio-2" value="0" checked> <label>No defined methodology</label><br>
<input class="w3-radio" type="radio" name="d2" id="radio-2" value="1"> <label>Defined waterfall approach</label><br>
<input class="w3-radio" type="radio" name="d2" id="radio-2" value="2"> <label>Limited agile development on new projects (not including operations)</label><br>
<input class="w3-radio" type="radio" name="d2" id="radio-2" value="3"> <label>Agile development through to production & ops</label><br>
<input class="w3-radio" type="radio" name="d2" id="radio-2" value="4"> <label>Full DevOps culture</label><br>

  </fieldset>
 
  <fieldset>
    <legend>Operations</legend>
<input class="w3-radio" type="radio" name="o2" id="radio-2" value="0" checked> <label>Hosting/Mgmt Only</label><br>
<input class="w3-radio" type="radio" name="o2" id="radio-2" value="1"> <label>Defined SLAs + ITIL</label><br>
<input class="w3-radio" type="radio" name="o2" id="radio-2" value="2"> <label>Compliance & Security Auditing</label><br>
<input class="w3-radio" type="radio" name="o2" id="radio-2" value="3"> <label>SOE</label><br>
<input class="w3-radio" type="radio" name="o2" id="radio-2" value="4"> <label>Full DevOps culture</label><br>
  </fieldset> 

  </div>
  <div id="tabs-5">
  <fieldset>
    <legend>Development</legend>
<input class="w3-radio" type="radio" name="d3" id="radio-3" value="0" checked> <label>Ad-hoc choice of application dev tools. Very limited understand of new architectures and approaches to application deployment</label><br>
<input class="w3-radio" type="radio" name="d3" id="radio-3" value="1"> <label>Selected vendor tech roadmap. Initial understanding of new architectures and designs</label><br>
<input class="w3-radio" type="radio" name="d3" id="radio-3" value="2"> <label>Iterative development of existing applications Limited legacy strategy and beginnings of new development architectures</label><br>
<input class="w3-radio" type="radio" name="d3" id="radio-3" value="3"> <label>Focus on new platforms & limited legacy platforms. Well defined architecture for new development projects and operating models</label><br>
<input class="w3-radio" type="radio" name="d3" id="radio-3" value="4"> <label>Holistic & defined overall development strategy. Good designs and architectures in place and under regular review</label><br>
  </fieldset>
 
  <fieldset>
    <legend>Operations</legend>
<input class="w3-radio" type="radio" name="o3" id="radio-3" value="0" checked> <label>Ad-hoc choice of future platforms</label><br>
<input class="w3-radio" type="radio" name="o3" id="radio-3" value="1"> <label>Selected vendor tech roadmap</label><br>
<input class="w3-radio" type="radio" name="o3" id="radio-3" value="2"> <label>Focus on maintaining existing infrastructure</label><br>
<input class="w3-radio" type="radio" name="o3" id="radio-3" value="3"> <label>Primary focus on new applications</label><br>
<input class="w3-radio" type="radio" name="o3" id="radio-3" value="4"> <label>Defined strategy for existing and new architectures</label><br>

  </fieldset> 


  </div>
  <div id="tabs-6">
  <fieldset>
    <legend>Development</legend>
<input class="w3-radio" type="radio" name="d4" id="radio-4" value="0" checked> <label>The business dictates requirements, strategy and deliverables</label><br>
<input class="w3-radio" type="radio" name="d4" id="radio-4" value="1"> <label>Mature requirements gathering approach (e.g. Agile user stories)</label><br>
<input class="w3-radio" type="radio" name="d4" id="radio-4" value="2"> <label>Minimal Viable Product approach</label><br>
<input class="w3-radio" type="radio" name="d4" id="radio-4" value="3"> <label>Multiple projects against business needs</label><br>
<input class="w3-radio" type="radio" name="d4" id="radio-4" value="4"> <label>IT driven business innovation. IT working directly with business requirements.</label><br>
  </fieldset>
 
  <fieldset>
    <legend>Operations</legend>
<input class="w3-radio" type="radio" name="o4" id="radio-4" value="0" checked> <label>Instances of negative business impact</label><br>
<input class="w3-radio" type="radio" name="o4" id="radio-4" value="1"> <label>Good functioning service operations (i.e few unscheduled outage but slow to deploy)</label><br>
<input class="w3-radio" type="radio" name="o4" id="radio-4" value="2"> <label>Project based service offerings (i.e no unscheduled outages and rapid deployment)</label><br>
<input class="w3-radio" type="radio" name="o4" id="radio-4" value="3"> <label>Self sevice operations for development & the business</label><br>
<input class="w3-radio" type="radio" name="o4" id="radio-4" value="4"> <label>Transparent integration with project IT</label><br>
  </fieldset> 
  </div>
  <div id="tabs-7">
  <fieldset>
    <legend>Development</legend>
<input class="w3-radio" type="radio" name="d5" id="radio-5" value="0" checked> <label>Traditional programming techniques with No agreed tools</label><br>
<input class="w3-radio" type="radio" name="d5" id="radio-5" value="1"> <label>Initial agile adoption with 1 backlog per team</label><br>
<input class="w3-radio" type="radio" name="d5" id="radio-5" value="2"> <label>Extended team collaboration. Common DevOps skills</label><br>
<input class="w3-radio" type="radio" name="d5" id="radio-5" value="3"> <label>Continous cross-team improvement and collaboration</label><br>
<input class="w3-radio" type="radio" name="d5" id="radio-5" value="4"> <label>100% DevOps projects with Full cross-functional teams</label><br>

  </fieldset>
 
  <fieldset>
    <legend>Operations</legend>
<input class="w3-radio" type="radio" name="o5" id="radio-5" value="0" checked> <label>Standard Unix-like skills & no scripting skills</label><br>
<input class="w3-radio" type="radio" name="o5" id="radio-5" value="1"> <label>Direct VM interaction but limited scripting and manual interaction.</label><br>
<input class="w3-radio" type="radio" name="o5" id="radio-5" value="2"> <label>Dynamic templated images</label><br>
<input class="w3-radio" type="radio" name="o5" id="radio-5" value="3"> <label>Fully automated & deployment skills</label><br>
<input class="w3-radio" type="radio" name="o5" id="radio-5" value="4"> <label>100% DevOps engineers</label><br>
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

