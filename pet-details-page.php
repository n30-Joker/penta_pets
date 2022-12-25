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
	
	<title>Penta-Pets: Pet-Details</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<style>
        body{ font: 10px sans-serif; text-align: center; }
	</style>
</head>

<body>
	<br>
	<div class="container-md">
		<div class="row">
		<nav>
		  <div class="nav nav-tabs" id="nav-tab" role="tablist">
			<a class="nav-link" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" onclick="document.location='home-page.php'" aria-controls="nav-home" aria-selected="false"><i class="fas fa-home"></i> Home</a>
			<a class="nav-link active" id="nav-pet-details-tab" data-bs-toggle="tab" data-bs-target="#nav-pet-details" type="button" role="tab" onclick="document.location='pet-details-page.php'" aria-controls="nav-pet-details" aria-selected="true"><i class="fas fa-pet-details"></i> Pet Details</a>
			<a class="nav-link" id="nav-multiplayer-tab" data-bs-toggle="tab" data-bs-target="#nav-rankings" type="button" role="tab" onclick="document.location='multiplayer-page.php'" aria-controls="nav-multiplayer" aria-selected="false"><i class="fas fa-multiplayer"></i> Multiplayer</a>
			<a class="nav-link" id="nav-info-tab" data-bs-toggle="tab" data-bs-target="#nav-info" type="button" role="tab" onclick="document.location='info-page.php'"aria-controls="nav-info" aria-selected="false"><i class="fas fa-information"></i> Info</a>
			<a class="nav-link" id="nav-store-tab" data-bs-toggle="tab" data-bs-target="#nav-store" type="button" role="tab" onclick="document.location='store-page.php'"aria-controls="nav-info" aria-selected="false"><i class="fas fa-store"></i> Store</a>
			<a class="nav-link" id="nav-settings-tab" data-bs-toggle="tab" data-bs-target="#nav-settings" type="button" role="tab" onclick="document.location='settings-page.php'"aria-controls="nav-settings" aria-selected="false"><i class="fas fa-settings"></i> Settings</a>
		  </div>
		</nav>
		<div class="tab-content" id="nav-tabContent">
		  <div class="tab-pane fade show active" id="nav-pet-details-tab" role="tabpanel" aria-labelledby="nav-pet-details-tab">
		  <br>
		  <div class="row">
				<div class="d-flex col-sm justify-content-center">
					<div class="card" style="width: 1250px; top: -20px; right: 50px;">
						<div class="row">
							<div class="card border-light mb-3" id="PetPos" style="left: 15px;">
								<img id="PetPic" src="Pictures/Chomusuke.png" class="card-img" alt="..." style="width: 480px; height: 320px;">
							</div>
							<div class="card">
							<div class="card-body">
							<h5 class="card-title" id="petName" style="font-size:500%;"></h5>
							<h6 class="card-subtitle mb-2 text-muted" id="petLevel" style="font-size:350%;"></h6>
							<p class="card-text" id="values" style="font-size:200%;"></p>
							<div class="card-footer text-muted" id="nextLvl" style="font-size:200%;"></div>
							</div>
							</div>
						</div>
					</div>
				</div>
		  </div>
		  <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><br>Home</div>
		  <div class="tab-pane fade" id="nav-multiplayer" role="tabpanel" aria-labelledby="nav-multiplayer-tab"><br>Multiplayer</div>
		  <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab"><br>Info</div>
		  <div class="tab-pane fade" id="nav-store" role="tabpanel" aria-labelledby="nav-store-tab"><br>Store</div>
		  <div class="tab-pane fade" id="nav-settings" role="tabpanel" aria-labelledby="nav-settings-tab"><br>Settings</div>
		  </div>
		</div>
		</div>
	</div>
</body>


<script>
	var petName = sessionStorage.getItem("petName");
	var lp = parseInt(sessionStorage.getItem("lp"));
	var attack = parseInt(sessionStorage.getItem("attack"));
	var defence = parseInt(sessionStorage.getItem("defence"));
	var special = parseInt(sessionStorage.getItem("special"));
	var exp = parseInt(sessionStorage.getItem("exp"));
	var level = parseInt(sessionStorage.getItem("level"));
	var nextLvl = 0;
	
	if (Number.isNaN(exp) == true) {exp=0;};
	if (Number.isNaN(level) == true) {level=1;};
	nextLvl = Math.pow(10, level) - exp;
	document.getElementById("petName").innerHTML = petName;
	document.getElementById("petLevel").innerHTML = "Level: " + level;
	document.getElementById("nextLvl").innerHTML = "Experience required for level " + (level+1) + ": " + nextLvl;
	document.getElementById("values").innerHTML = "Life Points: " + lp + "<br> Attack: " + attack + "<br> Defence: " + defence + "<br> Special: " + special;

	if (petName=="Kuro") {
		document.getElementById("PetPic").src = "Pictures/kuro.png";
		document.getElementById("PetPic").style = "width: 234px; height: 312px;";
	};
	if (petName=="Nibble") {
		document.getElementById("PetPic").src = "Pictures/Nibble.png";
		document.getElementById("PetPic").style = "width: 480px; height: 360px;";
	};
	if (petName=="Doge") {
		document.getElementById("PetPic").src = "Pictures/Doge.png";
		document.getElementById("PetPic").style = "width: 390px; height: 260px;";
	};
	if (petName=="Hamster") {
		document.getElementById("PetPic").src = "Pictures/Hamster.png";
		document.getElementById("PetPic").style = "width: 200px; height: 230px;";
	};
	
	if (petName=="Axolotl") {
		document.getElementById("PetPic").src = "Pictures/Axolotl.png";
		document.getElementById("PetPic").style = "width: 200px; height: 200px;";
	};
	
	if (petName=="Cthulhu") {
		document.getElementById("PetPic").src = "Pictures/Cthulhu.png";
		document.getElementById("PetPic").style = "width: 426px; height: 300px;";
	};
	
	if (petName=="Parrot") {
		document.getElementById("PetPic").src = "Pictures/Parrot.png";
		document.getElementById("PetPic").style = "width: 201px; height: 310px;";
	};
	
	if (petName=="T-Rex") {
		document.getElementById("PetPic").src = "Pictures/Trex.png";
		document.getElementById("PetPic").style = "width: 310px; height: 380px;";
	};

sessionStorage.setItem("petName", petName);
sessionStorage.setItem("lp", lp);
sessionStorage.setItem("attack", attack);
sessionStorage.setItem("defence", defence);
sessionStorage.setItem("special", special);
sessionStorage.setItem("exp", exp);
sessionStorage.setItem("level", level);
</script>
</html>