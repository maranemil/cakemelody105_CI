<?php
/*
session_start();

if(!isset($_GET["language"])) $language = 1;

if(isset($_POST["language"])){
	$_SESSION["language"] = $_POST["language"];
}

if(isset($_SESSION["language"])){
	$language = $_SESSION["language"];
}
else{
	$language = 1;
}
echo $language;
*/
?>
<?php

if (!function_exists('labels_app')) {
   function labels_app($language) {
	  //global $language;
	  $LBL = array();
	  if ($language == 1) {
		 // general labels
		 $LBL["general"]["Welcome"] = "Hi";
	  }
	  else {
		 // general labels
		 $LBL["general"]["Welcome"] = "Hallo";
	  }
	  return $LBL;
   }
}
?>