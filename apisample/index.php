<!DOCTYPE html>
<html lang="en">
<head>
    <title>RanchNet</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>

.navbar {
    margin-bottom: 0;
    background-color: #F57B4A;
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 4px;
    border-radius: 0;
}

.navbar li a, .navbar .navbar-brand {
    color: #fff !important;
}

.navbar-nav li a:hover, .navbar-nav li.active a {
    color: #F57B4A !important;
    background-color: #fff !important;
}

.dropdown-toggle:active, .open .dropdown-toggle {
	color: #F57B4A !important;
    background-color: #fff !important;
}

.navbar-right .dropdown-menu {
	margin-bottom: 0;
    background-color: #F57B4A;
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 4px;
    border-radius: 0;
}

.navbar-default .navbar-toggle {
	border-color: bold;
    color: #fff !important;
}

.result {
	font: sans-serif;
}

</style>
<body>
 
<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
	    <div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navBar">
			    <span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span> 
			</button>
		    <a class="navbar-brand" href="home.php">RanchNet</a>
		</div>
		<div class="collapse navbar-collapse" id="navBar">
            <ul class="nav navbar-nav">
                <li><a href="cattle_manager.php">Cattle Manager</a></li>
		        <li><a href="pasture_manager.php">Pasture Manager</a></li>
		        <li><a href="reports.php">Reports</a></li>
		        <li><a href="settings.php">Settings</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
		        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Account
		            <span class="caret"></span></a>
		            <ul class="dropdown-menu">
			            <li><a href="edit_profile.php">Edit Profile</a></li>
			            <li><a href="sign_out.php">Sign Out</a></li>
		            </ul>
				</li>
	        </ul>
		</div>
	</div>
</nav>

<div class="container-fluid">
    <p><strong>Home features here!</strong></p>
</div>

<div class="container-fluid result">

<?php
    $BASE_URL = "http://query.yahooapis.com/v1/public/yql";
    $yql_query = 'select wind from weather.forecast where woeid in (select woeid from geo.places(1) where text="chicago, il")';
    $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
    
	// Make call with cURL
    $session = curl_init($yql_query_url);
    curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
    $json = curl_exec($session);
	
	// Convert JSON to PHP object
    $phpObj =  json_decode($json, true);
	  
    var_dump($phpObj);
	
	echo "<p>";
	
	$chill = $phpObj['query']
					['results']
						['channel']
							['wind']['chill'];
							
	echo "Chill is $chill";
?>

</div>

</body>
</html>
