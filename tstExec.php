<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<?php
date_default_timezone_set('Europe/London');	
#phpinfo();

$query = htmlentities($_SERVER['QUERY_STRING']);
$url = "http://localhost/innovate/resultsOpen.php?$query";

print "phantomjs-2.1.1-linux-x86_64/bin/phantomjs  phantomjs-2.1.1-linux-x86_64/bin/rasterize.js '" . $url . "' oo.pdf";
?>
<br>
<button type="button" onclick="printPDF()">Click Me</button>

<script>
 function printPDF () {
      $.ajax({
        url:"printPDF.php?" , //the page containing php script
        type: "POST", //request type
        success:function(result){
			window.open('printPDF.php', '_blank');
//         alert(result);
       }
     });
 }
</script>

</html>