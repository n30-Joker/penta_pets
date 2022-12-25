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
	<title>Penta-Pets: Games</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<style>
        body{ font: 10px sans-serif; text-align: center; }

		/* The Modal (background) */
		.modal {
		  display: none; /* Hidden by default */
		  position: fixed; /* Stay in place */
		  z-index: 1; /* Sit on top */
		  left: 0;
		  top: 0;
		  width: 100%; /* Full width */
		  height: 100%; /* Full height */
		  overflow: auto; /* Enable scroll if needed */
		  background-color: rgb(0,0,0); /* Fallback color */
		  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
		}

		/* Modal Content (Image) */
		.modal-content {
		  margin: auto;
		  display: block;
		  width: 100%;
		  max-width: 100%;
		}
		
		/* Cancel button */
		#cancel {
		  z-index: 2;
		  position: absolute;
		  bottom: 15px;
		  left: 0px;
		  margin: auto;
		  display: block;
		  width: 50%;
		  text-align: center;
		  color: #ccc;
		  padding: 10px;
		  height: 150px;
		}

		/* Attack button */
		#attack {
		  z-index: 2;
		  position: absolute;
		  bottom: 15px;
		  right: 0px;
		  margin: auto;
		  display: block;
		  width: 50%;
		  text-align: center;
		  color: #ccc;
		  padding: 10px;
		  height: 150px;
		}

		/* Add Animation - Zoom in the Modal */
		.modal-content, #cancel, #attack {
		  animation-name: zoom;
		  animation-duration: 0.6s;
		}

		@keyframes zoom {
		  from {transform:scale(0)}
		  to {transform:scale(1)}
		}

		/* The Close Button */
		.close {
		  position: absolute;
		  z-index: 2;
		  top: 15px;
		  right: 35px;
		  color: #f1f1f1;
		  font-size: 40px;
		  font-weight: bold;
		  transition: 0.3s;
		}

		.close:hover,
		.close:focus {
		  color: #bbb;
		  text-decoration: none;
		  cursor: pointer;
		}

		/* 100% Image Width on Smaller Screens */
		@media only screen and (max-width: 700px){
		  .modal-content {
			width: 100%;
		  }
		}
		
    </style>
</head>
<body>
	<br>
	<div class="container-md">
		<!-- The Modal -->
		<div id="myModal" class="modal">

		  <!-- The Close Button -->
		  <span class="close">&times;</span>

		  <!-- Modal Content (The Image) -->
		  <img class="modal-content" id="img01">

		  <!-- Cancel button -->
		  <button id="cancel" type="button" class="btn btn-warning"><h1>Cancel</h1></button>
		  
		  <!-- Attack button -->
		  <button id="attack" type="button" class="btn btn-danger"><h1>Attack</h1></button>
		</div>
		<div class="row">
		<nav>
		  <div class="nav nav-tabs" id="nav-tab" role="tablist">
			<a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" onclick="document.location='home-page.php'" aria-controls="nav-home" aria-selected="true"><i class="fas fa-home"></i> Home</a>
			<a class="nav-link" id="nav-pet-details-tab" data-bs-toggle="tab" data-bs-target="#nav-pet-details" type="button" role="tab" onclick="document.location='pet-details-page.php'" aria-controls="nav-pet-details" aria-selected="false"><i class="fas fa-pet-details"></i> Pet Details</a>
			<a class="nav-link" id="nav-multiplayer-tab" data-bs-toggle="tab" data-bs-target="#nav-rankings" type="button" role="tab" onclick="document.location='multiplayer-page.php'" aria-controls="nav-multiplayer" aria-selected="false"><i class="fas fa-multiplayer"></i> Multiplayer</a>
			<a class="nav-link" id="nav-info-tab" data-bs-toggle="tab" data-bs-target="#nav-info" type="button" role="tab" onclick="document.location='info-page.php'"aria-controls="nav-info" aria-selected="false"><i class="fas fa-information"></i> Info</a>
			<a class="nav-link" id="nav-store-tab" data-bs-toggle="tab" data-bs-target="#nav-store" type="button" role="tab" onclick="document.location='store-page.php'"aria-controls="nav-info" aria-selected="false"><i class="fas fa-store"></i> Store</a>
			<a class="nav-link" id="nav-settings-tab" data-bs-toggle="tab" data-bs-target="#nav-settings" type="button" role="tab" onclick="document.location='settings-page.php'"aria-controls="nav-settings" aria-selected="false"><i class="fas fa-settings"></i> Settings</a>
		  </div>
		</nav>
		<div class="tab-content" id="nav-tabContent">
		  <div class="tab-pane fade show active" id="nav-home-tab" role="tabpanel" aria-labelledby="nav-home-tab">
		  <br>
			<div class="row">
				<div class="d-flex col-sm justify-content-center">
					<div class="card-group">
						<div class="card" style="width: 1250px; top: -20px; right: 50px; height: 600px">
							<h3>Raid</h3>
							<div class="card-group">
								<div class="card bg-dark text-white" onclick="gamePage('Rodan')">
								  <img class="card-img" id="Rodan" src="Pictures/rodan.png" alt="Card image" style="height: 100%">
								  <div class="card-img-overlay">
									<h3 class="card-title">Rodan</h3>
									<p class="card-text">Fire demon.</p>
									<p class="card-text">Difficulty: Medium</p>
								  </div>
								</div>
								<div class="card bg-dark text-white" onclick="gamePage('Mechagodzilla')">
								  <img class="card-img" id="Mechagodzilla" src="Pictures/mechagodzilla.jpg" alt="Card image">
								  <div class="card-img-overlay">
									<h3 class="card-title">Mechagodzilla</h3>
									<p class="card-text">Terrifying robot.</p>
									<p class="card-text">Difficulty: Hard</p>
								  </div>
								</div>
							</div>
							<h3>Super Raid</h3>
							<div class="card bg-dark text-white" onclick="gamePage('King Ghidorah')">
							  <img class="card-img" id="King Ghidorah" src="Pictures/ghidorah.png" alt="Card image">
							  <div class="card-img-overlay">
								<h3 class="card-title" font="100%">King Ghidorah</h3>
								<p class="card-text">Challlenger from outer space.</p>
								<p class="card-text">Difficulty: Ultimate</p>
							  </div>
							</div>
							<div class="card bg-dark text-white" onclick="gamePage('Godzilla')">
							  <img class="card-img" id="Godzilla" src="Pictures/godzilla.png" alt="Card image">
							  <div class="card-img-overlay">
								<h3 class="card-title">Godzilla</h3>
								<p class="card-text" font>Long live the king.</p>
								<p class="card-text">Difficulty: Ultimate</p>
							  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		  </div>
		  <div class="tab-pane fade" id="nav-pet-details" role="tabpanel" aria-labelledby="nav-pet-details-tab"><br>Pet Details</div>
		  <div class="tab-pane fade" id="nav-multiplayer" role="tabpanel" aria-labelledby="nav-multiplayer-tab"><br>Multiplayer</div>
		  <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab"><br>Info</div>
		  <div class="tab-pane fade" id="nav-store" role="tabpanel" aria-labelledby="nav-store-tab"><br>Store</div>
		  <div class="tab-pane fade" id="nav-settings" role="tabpanel" aria-labelledby="nav-settings-tab"><br>Settings</div>
		</div>
		</div>
    </div>
</body>

<script>
	// Get the modal
	var modal = document.getElementById("myModal");
	
	function gamePage(BossName) {
		// Get the image and insert it inside the modal - use its "alt" text as a caption
		var img = document.getElementById(BossName);
		var modalImg = document.getElementById("img01");
	    modal.style.display = "block";
	    modalImg.src = img.src;

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];
		var cancel = document.getElementById("cancel");
		var start = document.getElementById("attack");

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		  modal.style.display = "none";
		};
		cancel.onclick = function() {
		  modal.style.display = "none";
		};
		start.onclick = function() {	
		  sessionStorage.setItem("BossName", BossName);
		  location.assign("raid.php");
		};
	};
	
</script>
</html>