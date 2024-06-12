<?php

/*//Get user IP address
$aps=$_SERVER['REMOTE_ADDR'];
//Using the API to get information about this IP
 $details = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=$aps"));
//Using the geoplugin to get the continent for this IP
    $continent=$details->geoplugin_continentCode;
//And for the country
    $country=$details->geoplugin_countryCode;
//If continent is Kenya or US
if($continent==="KE" ){
//Do action if country is UK or not from Europe

// Page is set to home (home.php) by default, so when the visitor visits that will be the page they see.
$page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'access-denied';
// Include and show the requested page
include $page . '.php';
} else {*/
//require_once 'includes/header.php'; 
    //Do action if country is in Europe , but its not UK     

    // Page is set to home (home.php) by default, so when the visitor visits that will be the page they see.
    $page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'home';
    // Include and show the requested page
    include $page . '.php'; 
/*}*/
?>