<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Include config file
require_once "config.php";

// Prepare a select statement
$sql ="SELECT Pet, Alive, Points, Level, Exp, LP, Attack, Defence, Special, Energy, Hunger, Happiness FROM pet_details WHERE Username = :username AND Main = 1";
if($stmt = $pdo->prepare($sql)){
	// Bind variables to the prepared statement as parameters
	$stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
	
	// Set parameters - constants
	$param_username = $_SESSION["username"];
	
	$stmt -> execute();
	if($row = $stmt->fetch()){
		$pet = $row["Pet"];
		$alive = $row["Alive"];
		$points = $row["Points"];
		$level = $row["Level"];
		$exp = $row["Exp"];
		$lp = $row["LP"];
		$attack = $row["Attack"];
		$defence = $row["Defence"];
		$special = $row["Special"];
		$energy = $row["Energy"];
		$hunger = $row["Hunger"];
		$happiness = $row["Happiness"];
		// Store data in session variables
		$_SESSION["main"] = 1;
	}
	// Close statement
	unset($stmt);
}

$sql ="SELECT Clicks, Totems, Inventory FROM other WHERE Username = :username";
if($stmt = $pdo->prepare($sql)){
	// Bind variables to the prepared statement as parameters
	$stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
	
	// Set parameters - constants
	$param_username = $_SESSION["username"];
	
	$stmt -> execute();
	if($row2 = $stmt->fetch()){
		$clicks = $row2["Clicks"];
		$totems = $row2["Totems"];
		$inventory = $row2["Inventory"];
	}
	// Close statement
	unset($stmt);
}
// Close connection
unset($pdo);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Penta-Pets: Home</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<style>
        body{ font: 10px sans-serif; text-align: center; }
		
		#lights {
		  visibility: hidden;
		  min-width: 1250px;
		  background-color: #333;
		  padding: 213px;
		  position: absolute;
		  top: 173px;
		  opacity: 0.8;
		  pointer-events: none;
		}
		
		#lights.off {
		  visibility: visible;
		}
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
							  <div class="row">
								    <div class="card border-light mb-3" id="PetPos" data-toggle="tooltip" data-placement="right" title="Pet details" style="left: 400px; top: 101px;">
										<a href="pet-details-page.php" id="petLink" class="enabled">
										<img id="PetPic" src="Pictures/Chomusuke.png" class="card-img-bottom" alt="..." style="width: 480px; height: 320px;"></a>
								    </div>
							  </div>
							  <div class="row">
								  <div class="card border-light mb-3" id="DoorPos" data-toggle="tooltip" data-placement="left" title="Go outside" style="left: 1061px; bottom: 338px;">
									<a href="home-page-outside.php" id="doorLink" class="enabled">
									<img src="Pictures/door.png" class="card-img-bottom" alt="..." style="width: 200px; height: 421px;"></a>
								  </div>
							  </div>
							  <div class="row">
								  <div class="card border-light mb-3" id="LampPos" data-toggle="tooltip" data-placement="bottom" title="Switch On/Off" style="left: 550px; bottom: 777px;">
									<img id="LampPic" onclick="lightSwitch()" value="On" src="Pictures/lampOn.png" class="card-img-bottom" alt="..." style="width: 100px; height: 100px;">
								  </div>
							  </div>
							  <div id="lights" class=""></div>
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
	<div class="toast" id="notification" role="alert" aria-live="polite" aria-atomic="false" data-delay="10000" style="position: absolute; top: 0px; right: 0px; width: 300px;">
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
	<div class="toast" id="selection" role="alert" aria-live="polite" aria-atomic="true" data-delay="30000" style="position: absolute; top: 300px; right: 600px; width: 300px;">
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
	var petName = document.getElementById("petName").innerHTML;
	var alive = <?php echo $alive?>;
	var points = <?php echo $points?>;
	var exp = <?php echo $exp?>;
	var sessionExp = parseInt(sessionStorage.getItem("exp"));
	var level = <?php echo $level?>;
	var sessionLevel = parseInt(sessionStorage.getItem("level"));
	var lp = <?php echo $lp?>;
	var attack = <?php echo $attack?>;
	var defence = <?php echo $defence?>;
	var special = <?php echo $special?>;
	var hunger = <?php echo $hunger?>;
	var energy = <?php echo $energy?>;
	var happiness = <?php echo $happiness?>;
	var clicks = <?php echo $clicks?>;
	var totems = <?php echo $totems?>;
	var inventory = <?php echo $inventory?>;
	
	if (Number.isNaN(exp) == true) {exp=0;};
	if (Number.isNaN(level) == true) {level=1;};
	if (exp>sessionExp) {sessionExp = exp;};
	if (level>sessionLevel) {sessionLevel = level;};
	
	if (Number.isNaN(parseInt(sessionStorage.getItem("hunger"))) != true) {hunger = parseInt(sessionStorage.getItem("hunger"))};
	if (Number.isNaN(parseInt(sessionStorage.getItem("energy"))) != true) {energy = parseInt(sessionStorage.getItem("energy"))};
	if (Number.isNaN(parseInt(sessionStorage.getItem("happiness"))) != true) {happiness = parseInt(sessionStorage.getItem("happiness"))};
	document.getElementById("hungerbar").style.width = hunger + "%";
	document.getElementById("hungerbar").innerHTML = "Hunger: " + hunger + "%";
	document.getElementById("energybar").style.width = energy + "%";
	document.getElementById("energybar").innerHTML = "Energy: " + energy + "%";
	document.getElementById("happybar").style.width = happiness + "%";
	document.getElementById("happybar").innerHTML = "Happiness: " + happiness + "%";
	
	if (petName=="Kuro") {
		document.getElementById("PetPic").src = "Pictures/kuro.png";
		document.getElementById("PetPic").style = "width: 234px; height: 312px;";
		document.getElementById("PetPos").style = "left: 430px; top: 109px;";
		document.getElementById("DoorPos").style = "left: 1061px; bottom: 330px;";
		document.getElementById("LampPos").style = "left: 550px; bottom: 769px;";
	};
	
	if (petName=="Nibble") {
		document.getElementById("PetPic").src = "Pictures/Nibble.png";
		document.getElementById("PetPic").style = "width: 480px; height: 360px;";
		document.getElementById("PetPos").style = "left: 400px; top: 61px;";
		document.getElementById("DoorPos").style = "left: 1061px; bottom: 378px;";
		document.getElementById("LampPos").style = "left: 550px; bottom: 817px;";
	};
	
	if (petName=="Doge") {
		document.getElementById("PetPic").src = "Pictures/Doge.png";
		document.getElementById("PetPic").style = "width: 390px; height: 260px;";
		document.getElementById("PetPos").style = "left: 400px; top: 161px;";
		document.getElementById("DoorPos").style = "left: 1061px; bottom: 278px;";
		document.getElementById("LampPos").style = "left: 550px; bottom: 717px;";
	};
	
	if (petName=="Hamster") {
		document.getElementById("PetPic").src = "Pictures/Hamster.png";
		document.getElementById("PetPic").style = "width: 200px; height: 230px;";
		document.getElementById("PetPos").style = "left: 475px; top: 191px;";
		document.getElementById("DoorPos").style = "left: 1061px; bottom: 248px;";
		document.getElementById("LampPos").style = "left: 550px; bottom: 687px;";
	};
	
	if (petName=="Axolotl") {
		document.getElementById("PetPic").src = "Pictures/Axolotl.png";
		document.getElementById("PetPic").style = "width: 200px; height: 200px;";
		document.getElementById("PetPos").style = "left: 485px; top: 221px;";
		document.getElementById("DoorPos").style = "left: 1061px; bottom: 218px;";
		document.getElementById("LampPos").style = "left: 550px; bottom: 657px;";
	};
	
	if (petName=="Cthulhu") {
		document.getElementById("PetPic").src = "Pictures/Cthulhu.png";
		document.getElementById("PetPic").style = "width: 426px; height: 300px;";
		document.getElementById("PetPos").style = "left: 400px; top: 122px;";
		document.getElementById("DoorPos").style = "left: 1061px; bottom: 318px;";
		document.getElementById("LampPos").style = "left: 550px; bottom: 757px;";
	};
	
	if (petName=="Parrot") {
		document.getElementById("PetPic").src = "Pictures/Parrot.png";
		document.getElementById("PetPic").style = "width: 201px; height: 310px;";
		document.getElementById("PetPos").style = "left: 500px; top: 112px;";
		document.getElementById("DoorPos").style = "left: 1061px; bottom: 328px;";
		document.getElementById("LampPos").style = "left: 550px; bottom: 767px;";
	};
	
	if (petName=="T-Rex") {
		document.getElementById("PetPic").src = "Pictures/Trex.png";
		document.getElementById("PetPic").style = "width: 310px; height: 380px;";
		document.getElementById("PetPos").style = "left: 515px; top: 41px;";
		document.getElementById("DoorPos").style = "left: 1061px; bottom: 398px;";
		document.getElementById("LampPos").style = "left: 550px; bottom: 837px;";
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
	
	var active = false;
	
	function lightSwitch() {
		if (document.getElementById("LampPic").value=="On") {
			document.getElementById("lights").className = "off";
			document.getElementById("LampPic").value = "Off";
			document.getElementById("LampPic").src = "Pictures/lampOff.png";
			document.getElementById("cakeButton").disabled = true;
			document.getElementById("fruitButton").disabled = true;
			document.getElementById("vegFoodButton").disabled = true;
			document.getElementById("petLink").className = "disabled";
			document.getElementById("doorLink").className = "disabled";
			sleep();
			myVar = setTimeout(wakeUp, 30000);
		} else {
			try {clearTimeout(myVar);} finally {wakeUp();};
		};
	};
	function sleep() {
		if (alive == 1) {
			hunger = hunger  + 0.5;
			energy = energy + 2;
			happiness = happiness + 1.5;
		};
	};
	function wakeUp() {
		if (alive == 1) {
			document.getElementById("lights").className = "";
			document.getElementById("LampPic").value="On";
			document.getElementById("LampPic").src = "Pictures/lampOn.png";
			document.getElementById("cakeButton").disabled = false;
			document.getElementById("fruitButton").disabled = false;
			document.getElementById("vegFoodButton").disabled = false;
			document.getElementById("petLink").className = "enabled";
			document.getElementById("doorLink").className = "enabled";
		};
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