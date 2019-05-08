<?php
	$data = $_GET["data"];
	$myfile = fopen("tradeDB.json","w");
	fwrite($myfile, $data);
	fclose($myfile);
	echo "complete";
?>