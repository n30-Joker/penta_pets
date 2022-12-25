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
	<title>Penta-Pets: Home-Outside</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
						  <ul class="list-group list-group-flush">
							<li class="list-group-item">
								<h6 id="petName"><?php echo $pet?></h6>
							</li>
							<li class="list-group-item">
								<div class="progress">
								  <div class="progress-bar progress-bar-striped" data-toggle="tooltip" data-placement="bottom" title="Hunger, lose energy faster when it reaches 100." id="hungerbar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
								</div>
							</li>
							<li class="list-group-item">
								<div class="progress">
								  <div class="progress-bar progress-bar-striped bg-success" data-toggle="tooltip" data-placement="bottom" title="Energy, pet dies at 0." id="energybar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
								</div>
							</li>
							<li class="list-group-item">
								<div class="progress">
								  <div class="progress-bar progress-bar-striped bg-warning" data-toggle="tooltip" data-placement="bottom" title="Happiness, the higher the better." id="happybar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
								</div>
							</li>
						  </ul>
						  <img id="background" src="Pictures/background.png" class="card-img-bottom" alt="..." style="height: 440px;">
						  <a href="home-page-games.php" id="raidLink">
						  <img id="raid" src="Pictures/raid.png" data-toggle="tooltip" data-placement="top" title="Take challenge" class="card-img-bottom" alt="..." style="position: absolute; top: 337px; left: 0px; height: 150px; width: 650px;"></a>
						  <a href="home-page.php" id="doorLink" class="enabled">
						  <img src="Pictures/door.png" data-toggle="tooltip" data-placement="right" title="Go inside" class="card-img-bottom" alt="..." style="position: absolute; width: 100px; height: 210px; top: 410px; left: -7px;"></a>
						  <a href="store-page.php" id="storeLink" class="enabled">
						  <img id="store" src="Pictures/store.png" data-toggle="tooltip" data-placement="bottom" title="Store" class="card-img-bottom" alt="..." style="position: absolute; top: 343px; right: 320px; width: 150px; height: 150px;"></a>
						  <a href="pet-details-page.php" id="petLink" class="enabled">
						  <img id="PetPic" src="Pictures/Chomusuke.png" data-toggle="tooltip" data-placement="left" title="Pet details" class="card-img-bottom" alt="..." style="position: absolute; top: 316px; right: 430px; width: 480px; height: 320px;"></a>
						  <button type="button" class="btn btn-success" style="position: absolute; opacity: 0.1; top: 250px; right: 50px;" onclick="instantDeath()"></button>
						</div>
					</div>
				</div>
				<div class="col-sm">
					<button type="button" class="btn btn-primary" id="cakeButton" data-toggle="tooltip" data-placement="top" title="Feed cake" onclick="feedCake()">Cake</button>
					<button type="button" class="btn btn-primary" id="fruitButton" data-toggle="tooltip" data-placement="top" title="Feed fruit" onclick="feedFruit()">Fruit</button>
					<button type="button" class="btn btn-primary" id="vegFoodButton" data-toggle="tooltip" data-placement="top" title="Feed vegetarian pet food" onclick="feedVeg()">Vegetarian Pet Food</button>
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
	<div class="toast" id="notification" role="alert" aria-live="polite" aria-atomic="false" data-delay="1000" style="position: absolute; top: 0px; right: 0px; width: 300px;">
		<div role="alert" aria-live="polite" aria-atomic="false">
			<div class="toast-header">
				<strong class="mr-auto" id="notificationTitle"></strong>
				<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="toast-body" id="notificationDetails"></div>
		</div>
	</div>
	<div class="toast" id="selection" role="alert" aria-live="polite" aria-atomic="true" data-delay="1000000000" style="position: absolute; top: 300px; right: 600px; width: 300px;">
		<div role="alert" aria-live="polite" aria-atomic="true">
			<div class="toast-header">
				<strong class="mr-auto"><h5>Pet</h5></strong>
				<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="toast-body"><p style="font-size:200%;">Change pet?</p><br>
			<button type="button" class="btn btn-secondary" data-dismiss="toast">No</button>
			<button type="button" id="confirm" class="btn btn-primary" onclick="changePet()" disabled>Yes</button>
			</div>
		</div>
	</div>
</body>

<script>
	var petName = sessionStorage.getItem("petName");
	var alive = parseInt(sessionStorage.getItem("alive"));
	var points = parseInt(sessionStorage.getItem("points"));
	var sessionExp = parseInt(sessionStorage.getItem("exp"));
	var sessionLevel = parseInt(sessionStorage.getItem("level"));
	var lp = parseInt(sessionStorage.getItem("lp"));
	var attack = parseInt(sessionStorage.getItem("attack"));
	var defence = parseInt(sessionStorage.getItem("defence"));
	var special = parseInt(sessionStorage.getItem("special"));
	var hunger = parseInt(sessionStorage.getItem("hunger"));
	var energy = parseInt(sessionStorage.getItem("energy"));
	var happiness = parseInt(sessionStorage.getItem("happiness"));
	var clicks = parseInt(sessionStorage.getItem("clicks"));
	var totems = parseInt(sessionStorage.getItem("totems"));
	var inventory = sessionStorage.getItem("inventory");
	
	document.getElementById("petName").innerHTML = petName;
	document.getElementById("hungerbar").style.width = hunger + "%";
	document.getElementById("hungerbar").innerHTML = "Hunger: " + hunger + "%";
	document.getElementById("energybar").style.width = energy + "%";
	document.getElementById("energybar").innerHTML = "Energy: " + energy + "%";
	document.getElementById("happybar").style.width = happiness + "%";
	document.getElementById("happybar").innerHTML = "Happiness: " + happiness + "%";

	if (petName=="Kuro") {
		document.getElementById("PetPic").src = "Pictures/kuro.png";
		document.getElementById("PetPic").style = "position: absolute; top: 302px; right: 455px; width: 234px; height: 312px;";
	};
	if (petName=="Nibble") {
		document.getElementById("PetPic").src = "Pictures/Nibble.png";
		document.getElementById("PetPic").style = "position: absolute; top: 257px; right: 455px; width: 480px; height: 360px;";
	};
	if (petName=="Doge") {
		document.getElementById("PetPic").src = "Pictures/Doge.png";
		document.getElementById("PetPic").style = "position: absolute; top: 355px; right: 455px; width: 390px; height: 260px;";
	};
	if (petName=="Hamster") {
		document.getElementById("PetPic").src = "Pictures/Hamster.png";
		document.getElementById("PetPic").style = "position: absolute; top: 385px; right: 460px; width: 200px; height: 230px;";
	};
	if (petName=="Axolotl") {
		document.getElementById("PetPic").src = "Pictures/Axolotl.png";
		document.getElementById("PetPic").style = "position: absolute; top: 420px; right: 455px; width: 320px; height: 200px;";
	};
	if (petName=="Cthulhu") {
		document.getElementById("PetPic").src = "Pictures/Cthulhu.png";
		document.getElementById("PetPic").style = "position: absolute; top: 315px; right: 420px; width: 516px; height: 300px;";
	};
	if (petName=="Parrot") {
		document.getElementById("PetPic").src = "Pictures/Parrot.png";
		document.getElementById("PetPic").style = "position: absolute; top: 304px; right: 465px; width: 201px; height: 310px;";
	}
	if (petName=="T-Rex") {
		document.getElementById("PetPic").src = "Pictures/Trex.png";
		document.getElementById("PetPic").style ="position: absolute; top: 215px; right: 455px; width: 327px; height: 400px;";
	};

	document.getElementById("fruitButton").style.display = "none";
	document.getElementById("vegFoodButton").style.display = "none";

	function hungry(){
		if (alive == 1) {
			if (hunger < 100){
				hunger = hunger + 1;
				if (hunger < 0){
					hunger = 0;
				}
				if (hunger > 50){
					energy--;
				}
				document.getElementById("hungerbar").style.width = hunger + "%";
				document.getElementById("hungerbar").innerHTML = "Hunger: " + hunger + "%";
			} else {
				hunger = 100;
				energy = energy - 2;
				document.getElementById("hungerbar").style.width = hunger + "%";
				document.getElementById("hungerbar").innerHTML = "Hunger: " + hunger + "%";
			}
		}
		sessionStorage.setItem("hunger", hunger);
	};
	function tired(){
		if (alive == 1) {
			if (energy > 0){
				energy = energy - 1;
				if (energy > 100){
					energy = 100;
				};
				document.getElementById("energybar").style.width = energy + "%";
				document.getElementById("energybar").innerHTML = "Energy: " + energy + "%";
				if (energy < 20) {
					dying();
				};
			} else {
				energy = 0;
				alive = 0;
				document.getElementById("energybar").style.width = energy + "%";
				document.getElementById("energybar").innerHTML = "Energy: " + energy + "%";
				deathAlert();
			};
		};
		sessionStorage.setItem("alive", alive);
		sessionStorage.setItem("energy", energy);
	};
	function happy(){
		if (alive == 1) {
			if (happiness > 0){
				happiness = happiness - 1;
				if (happiness > 100){
					happiness = 100;
				}
				document.getElementById("happybar").style.width = happiness + "%";
				document.getElementById("happybar").innerHTML = "Happiness: " + happiness + "%";
			} else {
				happiness = 0
				energy--
				document.getElementById("happybar").style.width = happiness + "%";
				document.getElementById("happybar").innerHTML = "Happiness: " + happiness + "%";
			}
		}
		sessionStorage.setItem("happiness", happiness);
	};

	class food {
		constructor (hungerDown, energyUp, happinessUp, clicksUp, expUp) {
			this.hungerDown = hungerDown;
			this.energyUp = energyUp;
			this.happinessUp = happinessUp;
			this.clicksUp = clicksUp;
			this.expUp = expUp;
		}
		increment () {
			if (alive == true) {
				hunger = hunger - this.hungerDown;
				energy = energy + this.energyUp;
				happiness = happiness + this.happinessUp;
				clicks = clicks + this.clicksUp;
				sessionExp = sessionExp + this.expUp;
			}
			return hunger;
			return energy;
			return happiness;
			return clicks;
			return sessionExp;
		}
	}

	let cake = new food(2, 8, 9, 1, 112);
	let fruit = new food(7, 11, 12, 1, 2850);
	let vegetarian = new food (5, 14, -5, 1, 45100);

	if (clicks >= 50) {
			document.getElementById("fruitButton").style.display = "inline";
		};
	if (clicks >= 100) {
			document.getElementById("vegFoodButton").style.display = "inline";
		}

	function feedCake() {
		cake.increment();
		experience();
		sessionStorage.setItem("clicks", clicks);
		if (clicks >= 50) {
			document.getElementById("fruitButton").style.display = "inline";
		};
		if (clicks >= 100) {
			document.getElementById("vegFoodButton").style.display = "inline";
		}
	};
	function feedFruit() {
		fruit.increment();
		experience();
		sessionStorage.setItem("clicks", clicks);
		if (clicks >= 100) {
			document.getElementById("vegFoodButton").style.display = "inline";
		}
	};
	function feedVeg() {
		vegetarian.increment();
		experience();
		sessionStorage.setItem("clicks", clicks);
	}
	
	function experience() {
		checkLevel = Math.trunc(Math.log10(sessionExp)) + 1;
		if (checkLevel < 1) {
			checkLevel = 1;
		};
		if (checkLevel > sessionLevel) {
			levelDiff = checkLevel - sessionLevel;
			lpUp = Math.trunc(lp * (1.05**levelDiff));
			attackUp = Math.trunc(attack * (1.05**levelDiff));
			defenceUp = Math.trunc(defence * (1.05**levelDiff));
			specialUp = Math.trunc(special * (1.05**levelDiff));
			document.getElementById("notificationTitle").innerHTML = "Level Up!"
			document.getElementById("notificationDetails").innerHTML = "Life points +"+(lpUp-lp)+"<br> Attack +"+(attackUp-attack)+"<br> Defence +"+(defenceUp-defence)+"<br> Special +"+(specialUp-special);
			$("#notification").toast('show');
			sessionStorage.setItem("lp", lpUp);
			sessionStorage.setItem("attack", attackUp);
			sessionStorage.setItem("defence", defenceUp);
			sessionStorage.setItem("special", specialUp);
		};
		sessionLevel = checkLevel;
		sessionStorage.setItem("exp", sessionExp);
		sessionStorage.setItem("level", sessionLevel);
	};

	function dying() {
		document.getElementById("notificationTitle").innerHTML = "Pet";
		document.getElementById("notificationDetails").innerHTML = petName + " is low on energy!";
		$("#notification").toast('show');
	};
	function deathAlert() {
		document.getElementById("notificationTitle").innerHTML = "Pet";
		document.getElementById("notificationDetails").innerHTML = petName + " died.";
		$("#notification").toast('show');
		document.getElementById("confirm").disabled = false;
		$.ajax({
			url:'update-death.php',
			method:'POST',
			data:{
				pet: petName,
				main: 1,
				alive: 0,
				energy: energy,
				hunger: hunger,
				happiness: happiness
			}
		});
		$("#selection").toast('show');
	};
	if (alive==0) {
		$("#selection").toast('show');
		sessionStorage.setItem("alive", alive);
		document.getElementById("confirm").disabled = false;
	} else {document.getElementById("confirm").disabled = true;};
	function changePet(){
		location.replace("after-death-selection.php");
	};
	function instantDeath() {
		energy = 0;
		document.getElementById("energybar").style.width = energy + "%";
		document.getElementById("energybar").innerHTML = "Energy: " + energy + "%";
		deathAlert();
		alive = 0;
	};

	window.setInterval(function(){
		hungry();
		tired();
		happy();
	}, 3000);
	$(function() {
		$('[data-toggle="tooltip"]').tooltip();
	});
	
	sessionStorage.setItem("petName", petName);
	sessionStorage.setItem("alive", alive);
	sessionStorage.setItem("points", points);
	sessionStorage.setItem("exp", sessionExp);
	sessionStorage.setItem("level", sessionLevel);
	sessionStorage.setItem("lp", lp);
	sessionStorage.setItem("attack", attack);
	sessionStorage.setItem("defence", defence);
	sessionStorage.setItem("special", special);
	sessionStorage.setItem("clicks", clicks);
	sessionStorage.setItem("totems", totems);
	sessionStorage.setItem("inventory", inventory);
</script>
</html>