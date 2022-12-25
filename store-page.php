<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>Penta-Pets: Multiplayer</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<style>
        body{ font: 10px sans-serif; text-align: center; }
		
		#comingSoon {
		  min-width: 1250px;
		  background-color: #333;
		  color: #ffffff;
		  padding: 213px;
		  position: absolute;
		  top: auto;
		  height: 100%;
		  pointer-events: none;
		  text-align: center;
		  font-size: 100px;
		}
	</style>
</head>

<body>
	<br>
	<div class="container-md">
		<div class="row">
		<nav>
		  <div class="nav nav-tabs" id="nav-tab" role="tablist">
			<a class="nav-link" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" onclick="document.location='home-page.php'" aria-controls="nav-home" aria-selected="false"><i class="fas fa-home"></i> Home</a>
			<a class="nav-link" id="nav-pet-details-tab" data-bs-toggle="tab" data-bs-target="#nav-pet-details" type="button" role="tab" onclick="document.location='pet-details-page.php'" aria-controls="nav-pet-details" aria-selected="false"><i class="fas fa-pet-details"></i> Pet Details</a>
			<a class="nav-link" id="nav-multiplayer-tab" data-bs-toggle="tab" data-bs-target="#nav-rankings" type="button" role="tab" onclick="document.location='multiplayer-page.php'" aria-controls="nav-multiplayer" aria-selected="false"><i class="fas fa-multiplayer"></i> Multiplayer</a>
			<a class="nav-link" id="nav-info-tab" data-bs-toggle="tab" data-bs-target="#nav-info" type="button" role="tab" onclick="document.location='info-page.php'"aria-controls="nav-info" aria-selected="false"><i class="fas fa-information"></i> Info</a>
			<a class="nav-link active" id="nav-store-tab" data-bs-toggle="tab" data-bs-target="#nav-store" type="button" role="tab" onclick="document.location='store-page.php'"aria-controls="nav-info" aria-selected="true"><i class="fas fa-store"></i> Store</a>
			<a class="nav-link" id="nav-settings-tab" data-bs-toggle="tab" data-bs-target="#nav-settings" type="button" role="tab" onclick="document.location='settings-page.php'"aria-controls="nav-settings" aria-selected="false"><i class="fas fa-settings"></i> Settings</a>
		  </div>
		</nav>
		<div class="tab-content" id="nav-tabContent">
		  <div class="tab-pane fade show active" id="nav-multiplayer-tab" role="tabpanel" aria-labelledby="nav-multiplayer-tab">
		  <br>
		  <div class="row">
				<div class="d-flex col-sm justify-content-center">
					<div class="card" style="width: 1250px; top: -20px; right: 50px; height: 550px">
						<div id="comingSoon">Coming Soon!</div>
					</div>
				</div>
		  </div>
		  <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><br>Home</div>
		  <div class="tab-pane fade" id="nav-pet-details" role="tabpanel" aria-labelledby="nav-pet-details-tab"><br>Pet Details</div>
		  <div class="tab-pane fade" id="nav-multiplayer" role="tabpanel" aria-labelledby="nav-multiplayer-tab"><br>Multiplayer</div>
		  <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab"><br>Info</div>
		  <div class="tab-pane fade" id="nav-settings" role="tabpanel" aria-labelledby="nav-settings-tab"><br>Settings</div>
		  </div>
		</div>
		</div>
	</div>
</body>

<script>
</script>
</html>