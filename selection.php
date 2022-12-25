<?php
// Initialize the session
session_start();

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$pets = "";
$completed = 0;

class pet {
	public $name;
	public $points;
	public $level;
	public $exp;
	public $energy;
	public $attack;
	public $defence;
	public $special;
	public $hunger;
	public $happiness;
	
	function __construct($name, $points, $level, $exp, $LP, $attack, $defence, $special, $energy, $hunger, $happiness) {
		$this->name = $name;
		$this->points = $points;
		$this->level = $level;
		$this->exp = $exp;
		$this->LP = $LP;
		$this->attack = $attack;
		$this->defence = $defence;
		$this->special = $special;
		$this->energy = $energy;
		$this->hunger = $hunger;
		$this->happiness = $happiness;
	}
};

//name, points, level, exp, LP, attack, defence, special, energy, hunger, happiness
$Nibble = new pet("Nibble", 0, 1, 0, 303, 250, 220, 60, 100, 0, 100);
$Chomusuke = new pet("Chomusuke", 0, 1, 0, 452, 220, 312, 100, 100, 0, 100);
$Doge = new pet("Doge", 0, 1, 0, 218, 393, 176, 71, 100, 0, 100);
$Hamster = new pet("Hamster", 0, 1, 0, 185, 149, 232, 24, 100, 0, 100);
$Axolotl = new pet("Axolotl", 0, 1, 0, 139, 87, 169, 39, 100, 0, 100);
$Cthulhu = new pet("Cthulhu", 0, 1, 0, 487, 318, 393, 69, 100, 0, 100);
$Parrot = new pet("Parrot", 0, 1, 0, 105, 254, 110, 53, 100, 0, 100);
$TRex = new pet("T-Rex", 0, 1, 0, 282, 286, 332, 21, 100, 0, 100);
$Kuro = new pet("Kuro", 0, 1, 0, 381, 298, 250, 86, 100, 0, 100);

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $pets = $_POST["pets"];
	// Prepare an insert statement
	$sql = "INSERT INTO pet_details (Username, Pet, Main, Alive, Points, Level, Exp, LP, Attack, Defence, Special, Energy, Hunger, Happiness) VALUES (:username, :pet, :main, :alive, :points, :level, :exp, :LP, :attack, :defence, :special, :energy, :hunger, :happiness)";
	 
	if($stmt = $pdo->prepare($sql)){
		// Bind variables to the prepared statement as parameters
		$stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
		$stmt->bindParam(":pet", $param_pet, PDO::PARAM_STR);
		$stmt->bindParam(":main", $param_main, PDO::PARAM_INT);
		$stmt->bindParam(":alive", $param_alive, PDO::PARAM_INT);
		$stmt->bindParam(":points", $param_points, PDO::PARAM_INT);
		$stmt->bindParam(":level", $param_level, PDO::PARAM_INT);
		$stmt->bindParam(":exp", $param_exp, PDO::PARAM_INT);
		$stmt->bindParam(":LP", $param_LP, PDO::PARAM_INT);
		$stmt->bindParam(":attack", $param_attack, PDO::PARAM_INT);
		$stmt->bindParam(":defence", $param_defence, PDO::PARAM_INT);
		$stmt->bindParam(":special", $param_special, PDO::PARAM_INT);
		$stmt->bindParam(":energy", $param_energy, PDO::PARAM_INT);
		$stmt->bindParam(":hunger", $param_hunger, PDO::PARAM_INT);
		$stmt->bindParam(":happiness", $param_happiness, PDO::PARAM_INT);
		
		// Set parameters - constants
		$param_username = $_SESSION["username"];
		$param_alive = 1;
		$param_points = 0;
		$param_level = 1;
		$param_exp = 0;
		$param_energy = 100;
		$param_hunger = 0;
		$param_happiness = 100;
		
		// Set parameters - varying
		if(strpos($pets,"Nibble") !== false) {
			$param_pet = $Nibble->name;
			if(strpos($pets,"Nibble-Starter") !== false) {
				$param_main = 1;
			} else {
				$param_main = 0;
			};
			$param_LP = $Nibble->LP;
			$param_attack = $Nibble->attack;
			$param_defence = $Nibble->defence;
			$param_special = $Nibble->special;
			$stmt->execute();
			$completed = $completed + 1;
		};
		
		if(strpos($pets,"Chomusuke") !== false) {
			$param_pet = $Chomusuke->name;
			if(strpos($pets,"Chomusuke-Starter") !== false) {
				$param_main = 1;
			} else {
				$param_main = 0;
			};
			$param_LP = $Chomusuke->LP;
			$param_attack = $Chomusuke->attack;
			$param_defence = $Chomusuke->defence;
			$param_special = $Chomusuke->special;
			$stmt->execute();
			$completed = $completed + 1;
		};
		
		if(strpos($pets,"Doge") !== false) {
			$param_pet = $Doge->name;
			if(strpos($pets,"Doge-Starter") !== false) {
				$param_main = 1;
			} else {
				$param_main = 0;
			};
			$param_LP = $Doge->LP;
			$param_attack = $Doge->attack;
			$param_defence = $Doge->defence;
			$param_special = $Doge->special;
			$stmt->execute();
			$completed = $completed + 1;
		};
		
		if(strpos($pets,"Hamster") !== false) {
			$param_pet = $Hamster->name;
			if(strpos($pets,"Hamster-Starter") !== false) {
				$param_main = 1;
			} else {
				$param_main = 0;
			};
			$param_LP = $Hamster->LP;
			$param_attack = $Hamster->attack;
			$param_defence = $Hamster->defence;
			$param_special = $Hamster->special;
			$stmt->execute();
			$completed = $completed + 1;
		};
		
		if(strpos($pets,"Axolotl") !== false) {
			$param_pet = $Axolotl->name;
			if(strpos($pets,"Axolotl-Starter") !== false) {
				$param_main = 1;
			} else {
				$param_main = 0;
			};
			$param_LP = $Axolotl->LP;
			$param_attack = $Axolotl->attack;
			$param_defence = $Axolotl->defence;
			$param_special = $Axolotl->special;
			$stmt->execute();
			$completed = $completed + 1;
		};
		
		if(strpos($pets,"Cthulhu") !== false) {
			$param_pet = $Cthulhu->name;
			if(strpos($pets,"Cthulhu-Starter") !== false) {
				$param_main = 1;
			} else {
				$param_main = 0;
			};
			$param_LP = $Cthulhu->LP;
			$param_attack = $Cthulhu->attack;
			$param_defence = $Cthulhu->defence;
			$param_special = $Cthulhu->special;
			$stmt->execute();
			$completed = $completed + 1;
		};
		
		if(strpos($pets,"Parrot") !== false) {
			$param_pet = $Parrot->name;
			if(strpos($pets,"Parrot-Starter") !== false) {
				$param_main = 1;
			} else {
				$param_main = 0;
			};
			$param_LP = $Parrot->LP;
			$param_attack = $Parrot->attack;
			$param_defence = $Parrot->defence;
			$param_special = $Parrot->special;
			$stmt->execute();
			$completed = $completed + 1;
		};
		
		if(strpos($pets,"T-Rex") !== false) {
			$param_pet = $TRex->name;
			if(strpos($pets,"T-Rex-Starter") !== false) {
				$param_main = 1;
			} else {
				$param_main = 0;
			};
			$param_LP = $TRex->LP;
			$param_attack = $TRex->attack;
			$param_defence = $TRex->defence;
			$param_special = $TRex->special;
			$stmt->execute();
			$completed = $completed + 1;
		};
		
		if(strpos($pets,"Kuro") !== false) {
			$param_pet = $Kuro->name;
			if(strpos($pets,"Kuro-Starter") !== false) {
				$param_main = 1;
			} else {
				$param_main = 0;
			};
			$param_LP = $Kuro->LP;
			$param_attack = $Kuro->attack;
			$param_defence = $Kuro->defence;
			$param_special = $Kuro->special;
			$stmt->execute();
			$completed = $completed + 1;
		};

		// Close statement
		unset($stmt);
	}
	
    $sql = "INSERT INTO other (Username, Clicks, Totems, Inventory) VALUES (:username, :clicks, :totems, :inventory)";

	if($stmt = $pdo->prepare($sql)){
		// Bind variables to the prepared statement as parameters
		$stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
		$stmt->bindParam(":totems", $param_totems, PDO::PARAM_INT);
		$stmt->bindParam(":clicks", $param_clicks, PDO::PARAM_INT);
		$stmt->bindParam(":inventory", $param_inventory, PDO::PARAM_INT);
		// Set parameters
		$param_username = $_SESSION["username"];
		$param_totems = 1;
		$param_clicks = 0;
		$param_inventory = "0";
		$stmt->execute();
		
		if($completed == 5) {
			header("location: home-page.php");
		};
		// Close statement
		unset($stmt);
	};
    // Close connection
    unset($pdo);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title></title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<style>
        
	</style>
</head>

<body>
	<!-- Modal -->
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div id="modal-body" class="modal-body">Please choose 5 pets to be by your side.</div>
			  <div class="modal-footer">
				<button type="button" id="modal-cancel" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<input type="submit" id="modal-confirm" class="btn btn-primary" onclick="insert()" hidden></input>
				<input type="text" id="petsChosen" name="pets" class="checker" value="<?php echo $pets; ?>" hidden></input>
			  </div>
			</div>
		  </div>
		</div>
	</form>
	
	<h1 class="text-center">Please choose 5 pets to be by your side.</h1>
	<h3 class="text-center">Please choose 1 of the 5 to be your starting pet.</h3>

	<div class="d-flex col-sm justify-content-center">
		<div class="card" style="width: 1250px; top: 50px; right: 50px; height: 550px">
			<!-- Button trigger modal -->
			<button type="button" id="confirmButton" class="btn btn-danger" onclick="confirm()" data-toggle="modal" data-target="#exampleModalCenter" disabled>Confirm choices</button>
			<div class="card-group">
			  <div class="card">
				<img class="card-img-top" src="Pictures/Nibble.png" alt="Card image cap">
				<div class="card-body">
				  <h5 class="card-title">Nibble</h5>
				  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
				  <input type="button" id="Nibble" class="btn btn-info" onclick="option('Nibble')" value="Select"></input>
				  <input type="button" id="Nibble-Starter" class="btn btn-secondary" onclick="starter('Nibble-Starter')" value="Make Starter" hidden></input>
				</div>
			  </div>
			  <div class="card">
				<img class="card-img-top" src="Pictures/Chomusuke.png" alt="Card image cap">
				<div class="card-body">
				  <h5 class="card-title">Chomusuke</h5>
				  <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
				  <input type="button" id="Chomusuke" class="btn btn-info" onclick="option('Chomusuke')" value="Select"></input>
				  <input type="button" id="Chomusuke-Starter" class="btn btn-secondary" onclick="starter('Chomusuke-Starter')" value="Make Starter" hidden></input>
				</div>
			  </div>
			  <div class="card">
				<img class="card-img-top" src="Pictures/Doge.png" alt="Card image cap">
				<div class="card-body">
				  <h5 class="card-title">Doge</h5>
				  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
				  <input type="button" id="Doge" class="btn btn-info" onclick="option('Doge')" value="Select"></input>
				  <input type="button" id="Doge-Starter" class="btn btn-secondary" onclick="starter('Doge-Starter')" value="Make Starter" hidden></input>
				</div>
			  </div>
			</div>
			
			<div class="card-group">
			  <div class="card">
				<img class="card-img-top" src="Pictures/Hamster.png" alt="Card image cap">
				<div class="card-body">
				  <h5 class="card-title">Hamster</h5>
				  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
				  <input type="button" id="Hamster" class="btn btn-info" onclick="option('Hamster')" value="Select"></input>
				  <input type="button" id="Hamster-Starter" class="btn btn-secondary" onclick="starter('Hamster-Starter')" value="Make Starter" hidden></input>
				</div>
			  </div>
			  <div class="card">
				<img class="card-img-top" src="Pictures/Axolotl.png" alt="Card image cap">
				<div class="card-body">
				  <h5 class="card-title">Axolotl</h5>
				  <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
				  <input type="button" id="Axolotl" class="btn btn-info" onclick="option('Axolotl')" value="Select"></input>
				  <input type="button" id="Axolotl-Starter" class="btn btn-secondary" onclick="starter('Axolotl-Starter')" value="Make Starter" hidden></input>
				</div>
			  </div>
			  <div class="card">
				<img class="card-img-top" src="Pictures/Cthulhu.png" alt="Card image cap">
				<div class="card-body">
				  <h5 class="card-title">Cthulhu</h5>
				  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
				  <input type="button" id="Cthulhu" class="btn btn-info" onclick="option('Cthulhu')" value="Select"></input>
				  <input type="button" id="Cthulhu-Starter" class="btn btn-secondary" onclick="starter('Cthulhu-Starter')" value="Make Starter" hidden></input>
				</div>
			  </div>
			</div>
			  
			<div class="card-group">
			  <div class="card">
				<img class="card-img-top" src="Pictures/Parrot.png" alt="Card image cap">
				<div class="card-body">
				  <h5 class="card-title">Parrot</h5>
				  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
				  <input type="button" id="Parrot" class="btn btn-info" onclick="option('Parrot')" value="Select"></input>
				  <input type="button" id="Parrot-Starter" class="btn btn-secondary" onclick="starter('Parrot-Starter')" value="Make Starter" hidden></input>
				</div>
			  </div>
			  <div class="card">
				<img class="card-img-top" src="Pictures/Trex.png" alt="Card image cap">
				<div class="card-body">
				  <h5 class="card-title">T-Rex</h5>
				  <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
				  <input type="button" id="T-Rex" class="btn btn-info" onclick="option('T-Rex')" value="Select"></input>
				  <input type="button" id="T-Rex-Starter" class="btn btn-secondary" onclick="starter('T-Rex-Starter')" value="Make Starter" hidden></input>
				</div>
			  </div>
			  <div class="card">
				<img class="card-img-top" src="Pictures/kuro.png" alt="Card image cap">
				<div class="card-body">
				  <h5 class="card-title">Kuro</h5>
				  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
				  <input type="button" id="Kuro" class="btn btn-info" onclick="option('Kuro')" value="Select"></input>
				  <input type="button" id="Kuro-Starter" class="btn btn-secondary" onclick="starter('Kuro-Starter')" value="Make Starter" hidden></input>
				</div>
			  </div>
			</div>
		</div>
	</div>
</body>

<script>
	var pressed = 0; 
	var petsChosen = [];

	function option(Id) {
		var element = document.getElementById(Id);
		if (element.value == "Select") {
			element.className += " active";
			element.value = "Selected";
			pressed ++;
			petsChosen.push(element.id);
			document.getElementById(Id + "-Starter").hidden = false;
			main = 0;
		} else {
			element.className.replace(" active", "");
			element.value = "Select";
			pressed --;
			petsChosen.pop(element.id);
			document.getElementById(Id + "-Starter").hidden = true;
			main = 0;
		};
		if (pressed ==5) {
			document.getElementById("confirmButton").disabled = false;
		} else {
			document.getElementById("confirmButton").disabled = true;
		};
	};
	
	function starter(Id) {
		var element = document.getElementById(Id);
			if (petsChosen.toString().includes("Starter")==false){
			if (element.value == "Make Starter") {
				element.className += " active";
				element.value = "Chosen as starter";
				Id = Id.replace("-Starter", "");
				petsChosen = petsChosen.filter(function(value, index, arr){
					return value != Id;
				});
				petsChosen.push(document.getElementById(Id.replace(Id, Id+"-Starter")).id);
				main=1;
			} else {
				window.location.reload();
			};
		} else {
			window.location.reload();
		};
	};
	
	function confirm() {
		if(pressed==5 && petsChosen.toString().includes("Starter")){
			pets = petsChosen.toString();
			document.getElementById("modal-body").innerHTML = "Confirm these choices as your pets?\n" + pets;
			document.getElementById("modal-cancel").innerHTML = "No";
			document.getElementById("modal-confirm").hidden = false;
			document.getElementById("modal-confirm").value = "Yes";
		} else {
			document.getElementById("modal-body").innerHTML = "Choose 5 pets. 1 also being your starter.";
		};
	};
	
	function insert() {
		pets = petsChosen.toString();
		document.getElementById("petsChosen").value = pets;
	};
</script>
</html>