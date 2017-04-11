<?php

date_default_timezone_set('Europe/London');	
$data = $_SERVER['HTTP_REFERER'];
#$url = "http://localhost/innovate/resultsOpen.php?" . substr($data, strpos($data, "?") + 1);	
$url = "http://ready-to-innovate.com/resultsOpen.php?" . substr($data, strpos($data, "?") + 1);	
$oFile = "charts/" . uniqid() . ".pdf";
#$execCmd = "./phantomjs-2.1.1-linux-x86_64/bin/phantomjs ./phantomjs-2.1.1-linux-x86_64/bin/rasterize.js '" . $url . "' " . $oFile; 
$execCmd = "./phantomjs ./rasterize.js '" . $url . "' " . $oFile; 

print "Url: $url <br>";
print "Chart at: $oFile";

#exec($execCmd,$out,$ret);
#header('Content-type: application/pdf');
#header('Content-Transfer-Encoding: binary');
#header('Accept-Ranges: bytes');
#echo file_get_contents($oFile);
?>