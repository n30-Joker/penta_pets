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
$sql ="SELECT Pet, Main, Alive, Level FROM pet_details WHERE Username = :username";
if($stmt = $pdo->prepare($sql)){
	// Bind variables to the prepared statement as parameters
	$stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
	
	// Set parameters - constants
	$param_username = $_SESSION["username"];
	
	$stmt -> execute();
	if($row = $stmt->fetchAll()){
		$pet0 = $row[0]["Pet"];
		$main0 = $row[0]["Main"];
		$alive0 = $row[0]["Alive"];
		$level0 = $row[0]["Level"];
		
		$pet1 = $row[1]["Pet"];
		$main1 = $row[1]["Main"];
		$alive1 = $row[1]["Alive"];
		$level1 = $row[1]["Level"];
		
		$pet2= $row[2]["Pet"];
		$main2 = $row[2]["Main"];
		$alive2 = $row[2]["Alive"];
		$level2 = $row[2]["Level"];
		
		$pet3 = $row[3]["Pet"];
		$main3 = $row[3]["Main"];
		$alive3 = $row[3]["Alive"];
		$level3 = $row[3]["Level"];
		
		$pet4 = $row[4]["Pet"];
		$main4 = $row[4]["Main"];
		$alive4 = $row[4]["Alive"];
		$level4 = $row[4]["Level"];
	}
	// Close statement
	unset($stmt);
}
// Close connection
unset($pdo);
$pets = $pet0.$pet1.$pet2.$pet3.$pet4;
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
    </style>
</head>
<body>
	<div class="d-flex col-sm justify-content-center">
		<div class="card" style="width: 1250px; top: 50px; right: 50px;">
			<h5 class="card-header" id="header">Totems: 0</h5>
			<div class="card-group">
			  <div class="card" id="NibbleCard">
				<img class="card-img-top" src="Pictures/Nibble.png" alt="Card image cap">
				<div class="card-body">
				  <h5 class="card-title" id="NibbleTitle">Nibble</h5>
				  <p class="card-text" id="NibbleDetails">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
				  <input type="button" id="Nibble" class="btn btn-info" onclick="option('Nibble')" value="Select"></input>
				  <button type="button" class="btn btn-secondary" id="NibbleTotem" onclick="useTotem('Nibble')" disabled>Use Totem</button>
				</div>
			  </div>
			  
			  <div class="card" id="ChomusukeCard">
				<img class="card-img-top" src="Pictures/Chomusuke.png" alt="Card image cap">
				<div class="card-body">
				  <h5 class="card-title" id="ChomusukeTitle">Chomusuke</h5>
				  <p class="card-text" id="ChomusukeDetails">This card has supporting text below as a natural lead-in to additional content.</p>
				  <input type="button" id="Chomusuke" class="btn btn-info" onclick="option('Chomusuke')" value="Select"></input>
				  <button type="button" class="btn btn-secondary" id="ChomusukeTotem" onclick="useTotem('Chomusuke')" disabled>Use Totem</button>
				</div>
			  </div>
			  
			  <div class="card" id="DogeCard">
				<img class="card-img-top" src="Pictures/Doge.png" alt="Card image cap">
				<div class="card-body">
				  <h5 class="card-title" id="DogeTitle">Doge</h5>
				  <p class="card-text" id="DogeDetails">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
				  <input type="button" id="Doge" class="btn btn-info" onclick="option('Doge')" value="Select"></input>
				  <button type="button" class="btn btn-secondary" id="DogeTotem" onclick="useTotem('Doge')" disabled>Use Totem</button>
				</div>
			  </div>

			  <div class="card" id="HamsterCard">
				<img class="card-img-top" src="Pictures/Hamster.png" alt="Card image cap">
				<div class="card-body">
				  <h5 class="card-title" id="HamsterTitle">Hamster</h5>
				  <p class="card-text" id="HamsterDetails">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
				  <input type="button" id="Hamster" class="btn btn-info" onclick="option('Hamster')" value="Select"></input>
				  <button type="button" class="btn btn-secondary" id="HamsterTotem" onclick="useTotem('Hamster')" disabled>Use Totem</button>
				</div>
			  </div>
			  
			  <div class="card" id="AxolotlCard">
				<img class="card-img-top" src="Pictures/Axolotl.png" alt="Card image cap">
				<div class="card-body">
				  <h5 class="card-title" id="AxolotlTitle">Axolotl</h5>
				  <p class="card-text" id="AxolotlDetails">This card has supporting text below as a natural lead-in to additional content.</p>
				  <input type="button" id="Axolotl" class="btn btn-info" onclick="option('Axolotl')" value="Select"></input>
				  <button type="button" class="btn btn-secondary" id="AxolotlTotem" onclick="useTotem('Axolotl')" disabled>Use Totem</button>
				</div>
			  </div>
			  
			  <div class="card" id="CthulhuCard">
				<img class="card-img-top" src="Pictures/Cthulhu.png" alt="Card image cap">
				<div class="card-body">
				  <h5 class="card-title" id="CthulhuTitle">Cthulhu</h5>
				  <p class="card-text" id="CthulhuDetails">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
				  <input type="button" id="Cthulhu" class="btn btn-info" onclick="option('Cthulhu')" value="Select"></input>
				  <button type="button" class="btn btn-secondary" id="CthulhuTotem" onclick="useTotem('Cthulhu')" disabled>Use Totem</button>
				</div>
			  </div>
			  
			  <div class="card" id="ParrotCard">
				<img class="card-img-top" src="Pictures/Parrot.png" alt="Card image cap">
				<div class="card-body">
				  <h5 class="card-title" id="ParrotTitle">Parrot</h5>
				  <p class="card-text" id="ParrotDetails">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
				  <input type="button" id="Parrot" class="btn btn-info" onclick="option('Parrot')" value="Select"></input>
				  <button type="button" class="btn btn-secondary" id="ParrotTotem" onclick="useTotem('Parrot')" disabled>Use Totem</button>
				</div>
			  </div>
			  
			  <div class="card" id="T-RexCard">
				<img class="card-img-top" src="Pictures/Trex.png" alt="Card image cap">
				<div class="card-body">
				  <h5 class="card-title" id="T-RexTitle">T-Rex</h5>
				  <p class="card-text" id="T-RexDetails">This card has supporting text below as a natural lead-in to additional content.</p>
				  <input type="button" id="T-Rex" class="btn btn-info" onclick="option('T-Rex')" value="Select"></input>
				  <button type="button" class="btn btn-secondary" id="T-RexTotem" onclick="useTotem('T-Rex')" disabled>Use Totem</button>
				</div>
			  </div>
			  
			  <div class="card" id="KuroCard">
				<img class="card-img-top" src="Pictures/kuro.png" alt="Card image cap">
				<div class="card-body">
				  <h5 class="card-title" id="KuroTitle">Kuro</h5>
				  <p class="card-text" id="KuroDetails">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
				  <input type="button" id="Kuro" class="btn btn-info" onclick="option('Kuro')" value="Select"></input>
				  <button type="button" class="btn btn-secondary" id="KuroTotem" onclick="useTotem('Kuro')" disabled>Use Totem</button>
				</div>
			  </div>
			</div>
		</div>
	</div>
</body>

<script>
	var petsList = <?php echo json_encode($pets)?>;
	var totems = parseInt(sessionStorage.getItem("totems"));
	document.getElementById("header").innerHTML = "Totems: "+totems;
	
	if (totems>0) {
		document.getElementById("NibbleTotem").disabled = false;
		document.getElementById("ChomusukeTotem").disabled = false;
		document.getElementById("DogeTotem").disabled = false;
		document.getElementById("HamsterTotem").disabled = false;
		document.getElementById("AxolotlTotem").disabled = false;
		document.getElementById("CthulhuTotem").disabled = false;
		document.getElementById("ParrotTotem").disabled = false;
		document.getElementById("T-RexTotem").disabled = false;
		document.getElementById("KuroTotem").disabled = false;
		} else {totems=0;};
	
	if (petsList.includes("Chomusuke") == false) {
		$("#ChomusukeCard").hide();
	} else {
		data("Chomusuke");
	};
	if (petsList.includes("Nibble") == false) {
		$("#NibbleCard").hide();
	} else {
		data("Nibble");
	};
	if (petsList.includes("Doge") == false) {
		$("#DogeCard").hide();
	} else {
		data("Doge");
	};
	if (petsList.includes("Hamster") == false) {
		$("#HamsterCard").hide();
	} else {
		data("Hamster");
	};
	if (petsList.includes("Axolotl") == false) {
		$("#AxolotlCard").hide();
	} else {
		data("Axolotl");
	};
	if (petsList.includes("Cthulhu") == false) {
		$("#CthulhuCard").hide();
	} else {
		data("Cthulhu");
	};
	if (petsList.includes("Parrot") == false) {
		$("#ParrotCard").hide();
	} else {
		data("Parrot");
	};
	if (petsList.includes("T-Rex") == false) {
		$("#T-RexCard").hide();
	} else {
		data("T-Rex");
	};
	if (petsList.includes("Kuro") == false) {
		$("#KuroCard").hide();
	} else {
		data("Kuro");
	};
	
	function useTotem(Id) {
		totems = totems -1;
		energy = 100;
		hunger = 0;
		happiness = 100;
		$.ajax({
			url:'update-inventory.php',
			method:'POST',
			data:{
				totems: totems,
				clicks: parseInt(sessionStorage.getItem("clicks")),
				inventory: sessionStorage.getItem("inventory")
			}
		});
		if (Id == <?php echo json_encode($pet0)?>) {main = <?php echo json_encode($main0)?>;
		} else if (Id == <?php echo json_encode($pet1)?>) {main = <?php echo json_encode($main1)?>;
		} else if (Id == <?php echo json_encode($pet2)?>) {main = <?php echo json_encode($main2)?>;
		} else if (Id == <?php echo json_encode($pet3)?>) {main = <?php echo json_encode($main3)?>;
		} else if (Id == <?php echo json_encode($pet4)?>) {main = <?php echo json_encode($main4)?>;};
		$.ajax({
			url:'update-death.php',
			method:'POST',
			data:{
				pet: Id,
				main: main,
				alive: 1,
				energy: energy,
				hunger: hunger,
				happiness: happiness
			}
		});
		sessionStorage.setItem("totems", totems);
		sessionStorage.setItem("hunger", hunger);
		sessionStorage.setItem("energy", energy);
		sessionStorage.setItem("happiness", happiness);
		window.location.reload();
	};
	
	function data(Id) {
		var level = 0;
		var main = 0;
		var alive = 0;
		if (Id == <?php echo json_encode($pet0)?>) {alive = <?php echo json_encode($alive0)?>;
		level = <?php echo json_encode($level0)?>; main = <?php echo json_encode($main0)?>;
		} else if (Id == <?php echo json_encode($pet1)?>) {alive = <?php echo json_encode($alive1)?>;
		level = <?php echo json_encode($level1)?>; main = <?php echo json_encode($main1)?>;
		} else if (Id == <?php echo json_encode($pet2)?>) {alive = <?php echo json_encode($alive2)?>;
		level = <?php echo json_encode($level2)?>; main = <?php echo json_encode($main2)?>;
		} else if (Id == <?php echo json_encode($pet3)?>) {alive = <?php echo json_encode($alive3)?>;
		level = <?php echo json_encode($level3)?>; main = <?php echo json_encode($main3)?>;
		} else if (Id == <?php echo json_encode($pet4)?>) {alive = <?php echo json_encode($alive4)?>;
		level = <?php echo json_encode($level4)?>; main = <?php echo json_encode($main4)?>;};
		if (main==1){document.getElementById(Id+"Title").innerHTML += "(Current)"; mainId = Id; mainStatus = alive;
		if (Number.isNaN(parseInt(sessionStorage.getItem("level"))) != true) {level = parseInt(sessionStorage.getItem("level"))};}
		document.getElementById(Id+"Details").innerHTML = "Level: "+ level;
		if (alive==0){
		document.getElementById(Id+"Details").innerHTML += "<br> Status: Dead";
		} else {document.getElementById(Id+"Details").innerHTML += "<br> Status: Alive";}
	};
	
	function option(Id) {
		$.ajax({
			url:'update-death.php',
			method:'POST',
			data:{
				pet: mainId,
				main: 0,
				alive: mainStatus,
				energy: parseInt(sessionStorage.getItem("energy")),
				hunger: parseInt(sessionStorage.getItem("hunger")),
				happiness: parseInt(sessionStorage.getItem("happiness"))
			}
		});
		if (Id == <?php echo json_encode($pet0)?>) {Alive = <?php echo json_encode($alive0)?>;
		} else if (Id == <?php echo json_encode($pet1)?>) {Alive = <?php echo json_encode($alive1)?>;
		} else if (Id == <?php echo json_encode($pet2)?>) {Alive = <?php echo json_encode($alive2)?>;
		} else if (Id == <?php echo json_encode($pet3)?>) {Alive = <?php echo json_encode($alive3)?>;
		} else if (Id == <?php echo json_encode($pet4)?>) {Alive = <?php echo json_encode($alive4)?>;};
		$.ajax({
			url:'update-death.php',
			method:'POST',
			data:{
				pet: Id,
				main: 1,
				alive: Alive,
				energy: 100,
				hunger: 0,
				happiness: 100
			}
		});
		sessionStorage.setItem("hunger", 0);
		sessionStorage.setItem("energy", 100);
		sessionStorage.setItem("happiness", 100);
		location.href = "home-page.php";
	};

	sessionStorage.setItem("exp", 0);
	sessionStorage.setItem("level", 1);
	sessionStorage.setItem("totems", totems);
	sessionStorage.setItem("hunger", hunger);
	sessionStorage.setItem("energy", energy);
	sessionStorage.setItem("happiness", happiness);
</script>
</html>