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
			<a class="nav-link" id="nav-pet-details-tab" data-bs-toggle="tab" data-bs-target="#nav-pet-details" type="button" role="tab" onclick="document.location='pet-details-page.php'" aria-controls="nav-pet-details" aria-selected="false"><i class="fas fa-pet-details"></i> Pet Details</a>
			<a class="nav-link" id="nav-multiplayer-tab" data-bs-toggle="tab" data-bs-target="#nav-rankings" type="button" role="tab" onclick="document.location='multiplayer-page.php'" aria-controls="nav-multiplayer" aria-selected="false"><i class="fas fa-multiplayer"></i> Multiplayer</a>
			<a class="nav-link active" id="nav-info-tab" data-bs-toggle="tab" data-bs-target="#nav-info" type="button" role="tab" onclick="document.location='info-page.php'"aria-controls="nav-info" aria-selected="true"><i class="fas fa-information"></i> Info</a>
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
						<div class="accordion" id="accordionExample">
						  <div class="card">
							<div class="card-header" id="headingOne">
							  <h2 class="mb-0">
								<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
								  <?php echo htmlspecialchars($_SESSION["username"]); ?> Details
								</button>
							  </h2>
							</div>
							<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
							  <div class="card-body" id="userDetails" style="font-size: 50px;">
							  </div>
							</div>
						  </div>
						  
						  <div class="card">
							<div class="card-header" id="headingTwo">
							  <h2 class="mb-0">
								<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								  Food
								</button>
							  </h2>
							</div>
							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
							    <div class="card-body" style="font-size: 20px;">
									<div class="card-group">
									  <div class="card">
										<img class="card-img-top" src="Pictures/cake.png" alt="Card image cap">
										<div class="card-body">
										  <h2 class="card-title">Cake</h2>
										  <p class="card-text">
											Hunger -2 <br> Energy +8 <br> Happiness +9 <br> Exp +112
										  </p>
										</div>
									  </div>
									  <div class="card">
										<img class="card-img-top" src="Pictures/fruit.png" alt="Card image cap">
										<div class="card-body">
										  <h2 class="card-title">Fruit</h2>
										  <p class="card-text">
										    Hunger -7 <br> Energy +11 <br> Happiness +12 <br> Exp +2850
										  </p>
										</div>
									  </div>
									  <div class="card">
										<img class="card-img-top" src="Pictures/vegetarian.png" style="height: 400px;" alt="Card image cap">
										<div class="card-body">
										  <h2 class="card-title">Vegetarian Pet Food</h2>
										  <p class="card-text">
											Hunger -5 <br> Energy +14 <br> Happiness -5 <br> Exp +45100
										  </p>
										</div>
									  </div>
									</div>
							    </div>
							</div>
						  </div>
						  
						  <div class="card">
							<div class="card-header" id="headingThree">
							  <h2 class="mb-0">
								<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								  Gameplay
								</button>
							  </h2>
							</div>
							<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
							  <div class="card-body" style="font-size: 20px;">
									<div class="card-group">
									  <div class="card">
										<img class="card-img-top" src="Pictures/rodan.png" style="height: 350px;" alt="Card image cap">
										<div class="card-body">
										  <h2 class="card-title">Raids</h2>
										  <p class="card-text">
											Challenge powerful monsters such as Rodan and Mechagodzilla to earn a load of points and experience.
										  </p>
										</div>
									  </div>
									  <div class="card">
										<img class="card-img-top" src="Pictures/ghidorah.png" style="height: 350px;" alt="Card image cap">
										<div class="card-body">
										  <h2 class="card-title">Super Raids</h2>
										  <p class="card-text">
										    Defeat the terrifying kings to quickly level up and gain a generous amount of points.
										  </p>
										</div>
									  </div>
									</div>
									
									<div class="card-group">
									  <div class="card">
										<img class="card-img-top" src="Pictures/chomusukeAttack.gif" alt="Card image cap">
										<div class="card-body">
										  <h2 class="card-title">Specials</h2>
										  <p class="card-text">
											Click your way through to attack the raid boss and fill up your pet's special gauge. Once ready, click on the pet or the special bar to 
											fire a special attack and cause immense damage.
										  </p>
										</div>
									  </div>
									  <div class="card">
										<img class="card-img-top" src="Pictures/mechagodzillaAtomicBreath.png" style="height: 350px;" alt="Card image cap">
										<div class="card-body">
										  <h2 class="card-title">Look out for their attacks!</h2>
										  <p class="card-text">
										    Be prepared for heavy attacks carried out every 30 seconds.
										  </p>
										</div>
									  </div>
									</div>
							    </div>
							</div>
						  </div>
						  
						  <div class="card">
							<div class="card-header" id="headingFour">
							  <h2 class="mb-0">
								<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
								  Updates
								</button>
							  </h2>
							</div>

							<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
							    <div class="card-body" id="updates" style="font-size: 20px;">
									<div class="card text-center">
									  <div class="card-body">
										<p class="card-text">[UPDATE] |King Ghidorah| and |Godzilla| are available as super raid bosses. Good luck defeating these kings!</p>
									  </div>
									</div>

									<div class="card text-center">
									  <div class="card-body">
										<p class="card-text">[UPDATE] The web game now has tool tips to make buttons more clear.</p>
									  </div>
									</div>

									<div class="card text-center">
									  <div class="card-body">
										<p class="card-text">[UPDATE] Added raid games, the first two bosses being |Rodan| and |Mechagodzilla|. Enjoy challenging them!</p>
									  </div>
									</div>
									
									<div class="card text-center">
									  <div class="card-body">
										<p class="card-text">[HELLO!] Welcome to Penta Pets! Enjoy your stay!</p>
									  </div>
									</div>
								</div>
							</div>
						  </div>
						</div>
					</div>
				</div>
		  </div>
		  <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><br>Home</div>
		  <div class="tab-pane fade" id="nav-pet-details" role="tabpanel" aria-labelledby="nav-pet-details-tab"><br>Pet Details</div>
		  <div class="tab-pane fade" id="nav-multiplayer" role="tabpanel" aria-labelledby="nav-multiplayer-tab"><br>Multiplayer</div>
		  <div class="tab-pane fade" id="nav-store" role="tabpanel" aria-labelledby="nav-store-tab"><br>Store</div>
		  <div class="tab-pane fade" id="nav-settings" role="tabpanel" aria-labelledby="nav-settings-tab"><br>Settings</div>
		  </div>
		</div>
		</div>
	</div>
</body>


<script>
document.getElementById("userDetails").innerHTML = "Clicks: " + parseInt(sessionStorage.getItem("clicks")) + "<br> Current Pet Points: " 
+ parseInt(sessionStorage.getItem("points")) + "<br> Totems: " + parseInt(sessionStorage.getItem("totems")) + "<br> Inventory: " + sessionStorage.getItem("inventory");
</script>
</html>