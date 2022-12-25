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
	<title>Penta-Pets: Raid</title>
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
		  z-index: 3; /* Sit on top */
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
		  background-color: #333;
		}
		
		#raidMessage {
		  z-index: 4;
		  position: absolute;
		  top: 50px;
		  left: 400px;
		  display: block;
		  text-align: center;
		  color: #ffffff;
		  padding: 10px;
		  font-size: 100px;
		}
		
		#pointsANDexp {
		  z-index: 4;
		  position: absolute;
		  top: 200px;
		  left: 400px;
		  display: block;
		  text-align: center;
		  color: #ffffff;
		  padding: 10px;
		  font-size: 50px;
		}
		
		/* again button */
		#again {
		  z-index: 4;
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

		/* leave button */
		#leave {
		  z-index: 4;
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
		.modal-content, #again, #leave {
		  animation-name: zoom;
		  animation-duration: 0.6s;
		}

		@keyframes zoom {
		  from {transform:scale(0)}
		  to {transform:scale(1)}
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

		  <!-- Modal Content (The Image) -->
		  <div class="modal-content" id="img01"></div>
		  
		  <div id="raidMessage">Raid</div>
		  <div id="pointsANDexp"></div>

		  <!-- Again button -->
		  <button id="again" type="button" class="btn btn-warning"><h1>Try again</h1></button>
		  
		  <!-- Leave button -->
		  <button id="leave" type="button" class="btn btn-danger"><h1>Leave</h1></button>
		</div>
		<div class="row">
			<div class="d-flex col-sm justify-content-center">
				<div class="card-group">
					<div class="card" style="position: absolute; width: 1500px; top: -5px; left: -180px; height: 100%">
					    <ul class="list-group list-group-flush">
							<li class="list-group-item" style="height: 30px;">
								<div class="progress">
								  <div id="bossLp" class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Rodan LP: 300000</div>
								</div>
							</li>
							<li class="list-group-item" style="height: 30px;">
								<div class="progress">
								  <div id="petLp" class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Chomusuke LP: 200</div>
								</div>
							</li>
							<li class="list-group-item" style="height: 30px;">
								<div class="progress">
								  <div id="petSp" onclick="special()" class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">Chomusuke SP: 100</div>
								</div>
							</li>
						</ul>
					    <img id="RaidBoss" src="Pictures/background.png" onclick="attack()" class="card-img-bottom" alt="..." style="position: absolute; z-index: 1; top: 90px; height: 650px; width: 1500px;">
					    <img id="PetPic" onclick="special()" src="Pictures/Chomusuke.png" alt="..." style="position: absolute; z-index: 2; top: 316px; right: 430px; width: 480px; height: 320px;">
					</div>
				</div>
			</div>
		</div>
    </div>
	<div class="toast" id="notification" role="alert" aria-live="polite" aria-atomic="false" data-delay="10000" style="position: absolute; z-index: 5; top: 0px; right: 0px; width: 300px;">
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
</body>
<script>
	var petName = sessionStorage.getItem("petName");
	var petPoints = parseInt(sessionStorage.getItem("points"));
	var petExp = parseInt(sessionStorage.getItem("exp"));
	var petLevel = parseInt(sessionStorage.getItem("level"));
	var petAttack = parseInt(sessionStorage.getItem("attack"));
	var petDefence = parseInt(sessionStorage.getItem("defence"));
	var petSpecial = parseInt(sessionStorage.getItem("special"));
	var petLifePoints = parseInt(sessionStorage.getItem("lp"));
	var petMaxLifePoints = parseInt(sessionStorage.getItem("lp"));
	
	var BossName = sessionStorage.getItem("BossName");
	var gameOver = gameWin = gameReady = false;
	var gameClicks = totalClicks = points = exp = multiplier = index = 0;
	
	if (petName=="Chomusuke") {
		document.getElementById("PetPic").src = "Pictures/chomusukeAttack.gif";
		document.getElementById("PetPic").style = "position: absolute; z-index: 2; top: 420px; left: 50px; width: 480px; height: 320px;";
		document.getElementById("petLp").innerHTML = petName+": " + petLifePoints;
		document.getElementById("petLp").style.width = ((petLifePoints/petMaxLifePoints)*100).toFixed(2) + "%";
		
	};
	if (petName=="Kuro") {
		document.getElementById("PetPic").src = "Pictures/kuroAttack.png";
		document.getElementById("PetPic").style = "position: absolute; z-index: 2; top: 425px; left: 50px; width: 234px; height: 312px;";
		document.getElementById("petLp").innerHTML = petName+": " + petLifePoints;
		document.getElementById("petLp").style.width = ((petLifePoints/petMaxLifePoints)*100).toFixed(2) + "%";
	};
	if (petName=="Nibble") {
		document.getElementById("PetPic").src = "Pictures/NibbleAttack.png";
		document.getElementById("PetPic").style = "position: absolute; z-index: 2; top: 381px; left: 50px; width: 480px; height: 360px;";
		document.getElementById("petLp").innerHTML = petName+": " + petLifePoints;
		document.getElementById("petLp").style.width = ((petLifePoints/petMaxLifePoints)*100).toFixed(2) + "%";
	};
	if (petName=="Doge") {
		document.getElementById("PetPic").src = "Pictures/dogeAttack.png";
		document.getElementById("PetPic").style = "position: absolute; z-index: 2; top: 480px; left: 50px; width: 390px; height: 260px;";
		document.getElementById("petLp").innerHTML = petName+": " + petLifePoints;
		document.getElementById("petLp").style.width = ((petLifePoints/petMaxLifePoints)*100).toFixed(2) + "%";
	};
	if (petName=="Hamster") {
		document.getElementById("PetPic").src = "Pictures/HamsterAttack.gif";
		document.getElementById("PetPic").style = "position: absolute; z-index: 2; top: 510px; left: 50px; width: 200px; height: 230px;";
		document.getElementById("petLp").innerHTML = petName+": " + petLifePoints;
		document.getElementById("petLp").style.width = ((petLifePoints/petMaxLifePoints)*100).toFixed(2) + "%";
	};
	if (petName=="Axolotl") {
		document.getElementById("PetPic").src = "Pictures/AxolotlAttack.png";
		document.getElementById("PetPic").style = "position: absolute; z-index: 2; top: 540px; left: 50px; width: 543px; height: 200px;";
		document.getElementById("petLp").innerHTML = petName+": " + petLifePoints;
		document.getElementById("petLp").style.width = ((petLifePoints/petMaxLifePoints)*100).toFixed(2) + "%";
	};
	if (petName=="Cthulhu") {
		document.getElementById("PetPic").src = "Pictures/CthulhuAttack.png";
		document.getElementById("PetPic").style = "position: absolute; z-index: 2; top: 280px; left: 0px; width: 614px; height: 459px;";
		document.getElementById("petLp").innerHTML = petName+": " + petLifePoints;
		document.getElementById("petLp").style.width = ((petLifePoints/petMaxLifePoints)*100).toFixed(2) + "%";
	};
	if (petName=="Parrot") {
		document.getElementById("PetPic").src = "Pictures/ParrotAttack.gif";
		document.getElementById("PetPic").style = "position: absolute; z-index: 2; top: 420px; left: 50px; width: 250px; height: 310px;";
		document.getElementById("petLp").innerHTML = petName+": " + petLifePoints;
		document.getElementById("petLp").style.width = ((petLifePoints/petMaxLifePoints)*100).toFixed(2) + "%";
	};
	if (petName=="T-Rex") {
		document.getElementById("PetPic").src = "Pictures/TrexAttack.png";
		document.getElementById("PetPic").style = "position: absolute; z-index: 2; top: 393px; left: 50px; width: 204px; height: 346px;";
		document.getElementById("petLp").innerHTML = petName+": " + petLifePoints;
		document.getElementById("petLp").style.width = ((petLifePoints/petMaxLifePoints)*100).toFixed(2) + "%";
	};

	class raidBoss {
		constructor (BossName, readySource, mainSource, attackSource, deathSource, lp, attack) {
			this.BossName = BossName;
			this.readySource = readySource;
			this.mainSource = mainSource;
			this.attackSource = attackSource;
			this.deathSource = deathSource;
			this.lp = lp;
			this.attack = attack;
		}
		readyState () {
			return this.readySource;
		}
		mainState () {
			return this.mainSource;
		}
		attackState () {
			return this.attackSource;
		}
		deathState () {
			return this.deathSource;
		}
		getLp () {
			return this.lp;
		}
		getAttack () {
			return this.attack;
		}
	}

	let Rodan = new raidBoss("Rodan", "Pictures/RodanReady.gif", "Pictures/RodanMain.png", "Pictures/RodanAttack.gif", "Pictures/RodanDeath.gif", 300000, 500);	
	let Mechagodzilla = new raidBoss("Mechagodzilla", "Pictures/mechagodzillaReady.gif", "Pictures/mechagodzillaMain.png", "Pictures/mechagodzillaAttack.gif", "Pictures/mechagodzillaDeath.gif", 1000000, 1000);
	let KingGhidorah = new raidBoss("King Ghidorah", "Pictures/ghidorahReady.gif", "Pictures/king ghidorah.png", "Pictures/ghidorahAttack.gif", "Pictures/ghidorahDeath.gif", 5500000, 3000)
	let Godzilla = new raidBoss("Godzilla", "Pictures/godzillaReady.gif", "Pictures/godzillaMain.png", "Pictures/godzillaAttack.gif", "Pictures/godzillaDeath.gif", 5000000, 3500)

	if (BossName=="Rodan") { //do to at least 5 mins
		document.getElementById("RaidBoss").src = Rodan.readyState();
		a = setTimeout(bossMain, 3700, Rodan.mainState());
		b = setTimeout(bossAtk, 33700, Rodan.attackState(), Rodan.getAttack());
		c = setTimeout(bossMain, 35700, Rodan.mainState());
		d = setTimeout(bossAtk, 65700, Rodan.attackState(), Rodan.getAttack());
		e = setTimeout(bossMain, 67700, Rodan.mainState());
		f = setTimeout(bossAtk, 97700, Rodan.attackState(), Rodan.getAttack());
		g = setTimeout(bossMain, 99700, Rodan.mainState());
		h = setTimeout(bossAtk, 129700, Rodan.attackState(), Rodan.getAttack());
		i = setTimeout(bossMain, 131700, Rodan.mainState());
		j = setTimeout(bossAtk, 161700, Rodan.attackState(), Rodan.getAttack());
		k = setTimeout(bossMain, 163700, Rodan.mainState());
		l = setTimeout(bossAtk, 193700, Rodan.attackState(), Rodan.getAttack());
		m = setTimeout(bossMain, 195700, Rodan.mainState());
		n = setTimeout(bossAtk, 225700, Rodan.attackState(), Rodan.getAttack());
		o = setTimeout(bossMain, 227700, Rodan.mainState());
		p = setTimeout(bossAtk, 257700, Rodan.attackState(), Rodan.getAttack());
		q = setTimeout(bossMain, 259700, Rodan.mainState());
		r = setTimeout(bossAtk, 289700, Rodan.attackState(), Rodan.getAttack());
		s = setTimeout(bossMain, 291700, Rodan.mainState());
		t = setTimeout(bossAtk, 321700, Rodan.attackState(), Rodan.getAttack());
		u = setTimeout(bossMain, 323700, Rodan.mainState());
		bossLife = Rodan.getLp();
		maxLp = Rodan.getLp();
		document.getElementById("bossLp").style.width = ((bossLife/maxLp)*100).toFixed(2) + "%";
		document.getElementById("bossLp").innerHTML = BossName+": " + bossLife;
	};
	if (BossName=="Mechagodzilla") { //do to at least 5 mins
		document.getElementById("RaidBoss").src = Mechagodzilla.readyState();
		a = setTimeout(bossMain, 2900, Mechagodzilla.mainState());
		b = setTimeout(bossAtk, 32900, Mechagodzilla.attackState(), Mechagodzilla.getAttack());
		c = setTimeout(bossMain, 36540, Mechagodzilla.mainState());
		d = setTimeout(bossAtk, 66540, Mechagodzilla.attackState(), Mechagodzilla.getAttack());
		e = setTimeout(bossMain, 70180, Mechagodzilla.mainState());
		f = setTimeout(bossAtk, 100180, Mechagodzilla.attackState(), Mechagodzilla.getAttack());
		g = setTimeout(bossMain, 103820, Mechagodzilla.mainState());
		h = setTimeout(bossAtk, 133820, Mechagodzilla.attackState(), Mechagodzilla.getAttack());
		i = setTimeout(bossMain, 137460, Mechagodzilla.mainState());
		j = setTimeout(bossAtk, 167460, Mechagodzilla.attackState(), Mechagodzilla.getAttack());
		k = setTimeout(bossMain, 171100, Mechagodzilla.mainState());
		l = setTimeout(bossAtk, 201100, Mechagodzilla.attackState(), Mechagodzilla.getAttack());
		m = setTimeout(bossMain, 204740, Mechagodzilla.mainState());
		n = setTimeout(bossAtk, 234740, Mechagodzilla.attackState(), Mechagodzilla.getAttack());
		o = setTimeout(bossMain, 238380, Mechagodzilla.mainState());
		p = setTimeout(bossAtk, 268380, Mechagodzilla.attackState(), Mechagodzilla.getAttack());
		q = setTimeout(bossMain, 272020, Mechagodzilla.mainState());
		r = setTimeout(bossAtk, 302020, Mechagodzilla.attackState(), Mechagodzilla.getAttack());
		s = setTimeout(bossMain, 305660, Mechagodzilla.mainState());
		t = setTimeout(bossAtk, 335660, Mechagodzilla.attackState(), Mechagodzilla.getAttack());
		u = setTimeout(bossMain, 339300, Mechagodzilla.mainState());
		bossLife = Mechagodzilla.getLp();
		maxLp = Mechagodzilla.getLp();
		document.getElementById("bossLp").style.width = ((bossLife/maxLp)*100).toFixed(2) + "%";
		document.getElementById("bossLp").innerHTML = BossName+": " + bossLife;
	};
	if (BossName=="King Ghidorah") { //do to at least 5 mins
		document.getElementById("RaidBoss").src = KingGhidorah.readyState();
		a = setTimeout(bossMain, 5400, KingGhidorah.mainState());
		b = setTimeout(bossAtk, 35400, KingGhidorah.attackState(), KingGhidorah.getAttack());
		c = setTimeout(bossMain, 36450, KingGhidorah.mainState());
		d = setTimeout(bossAtk, 66450, KingGhidorah.attackState(), KingGhidorah.getAttack());
		e = setTimeout(bossMain, 67500, KingGhidorah.mainState());
		f = setTimeout(bossAtk, 97500, KingGhidorah.attackState(), KingGhidorah.getAttack());
		g = setTimeout(bossMain, 98550, KingGhidorah.mainState());
		h = setTimeout(bossAtk, 128550, KingGhidorah.attackState(), KingGhidorah.getAttack());
		i = setTimeout(bossMain, 129600, KingGhidorah.mainState());
		j = setTimeout(bossAtk, 159600, KingGhidorah.attackState(), KingGhidorah.getAttack());
		k = setTimeout(bossMain, 160650, KingGhidorah.mainState());
		l = setTimeout(bossAtk, 190650, KingGhidorah.attackState(), KingGhidorah.getAttack());
		m = setTimeout(bossMain, 191700, KingGhidorah.mainState());
		n = setTimeout(bossAtk, 221700, KingGhidorah.attackState(), KingGhidorah.getAttack());
		o = setTimeout(bossMain, 222750, KingGhidorah.mainState());
		p = setTimeout(bossAtk, 252750, KingGhidorah.attackState(), KingGhidorah.getAttack());
		q = setTimeout(bossMain, 253800, KingGhidorah.mainState());
		r = setTimeout(bossAtk, 283800, KingGhidorah.attackState(), KingGhidorah.getAttack());
		s = setTimeout(bossMain, 284850, KingGhidorah.mainState());
		t = setTimeout(bossAtk, 314850, KingGhidorah.attackState(), KingGhidorah.getAttack());
		u = setTimeout(bossMain, 315900, KingGhidorah.mainState());
		bossLife = KingGhidorah.getLp();
		maxLp = KingGhidorah.getLp();
		document.getElementById("bossLp").style.width = ((bossLife/maxLp)*100).toFixed(2) + "%";
		document.getElementById("bossLp").innerHTML = BossName+": " + bossLife;
	};
	if (BossName=="Godzilla") { //do to at least 5 mins
		document.getElementById("RaidBoss").src = Godzilla.readyState();
		a = setTimeout(bossMain, 5200, Godzilla.mainState());
		b = setTimeout(bossAtk, 35200, Godzilla.attackState(), Godzilla.getAttack());
		c = setTimeout(bossMain, 37500, Godzilla.mainState());
		d = setTimeout(bossAtk, 67500, Godzilla.attackState(), Godzilla.getAttack());
		e = setTimeout(bossMain, 69800, Godzilla.mainState());
		f = setTimeout(bossAtk, 99800, Godzilla.attackState(), Godzilla.getAttack());
		g = setTimeout(bossMain, 102100, Godzilla.mainState());
		h = setTimeout(bossAtk, 132100, Godzilla.attackState(), Godzilla.getAttack());
		i = setTimeout(bossMain, 134400, Godzilla.mainState());
		j = setTimeout(bossAtk, 164400, Godzilla.attackState(), Godzilla.getAttack());
		k = setTimeout(bossMain, 166700, Godzilla.mainState());
		l = setTimeout(bossAtk, 196700, Godzilla.attackState(), Godzilla.getAttack());
		m = setTimeout(bossMain, 199000, Godzilla.mainState());
		n = setTimeout(bossAtk, 229000, Godzilla.attackState(), Godzilla.getAttack());
		o = setTimeout(bossMain, 231300, Godzilla.mainState());
		p = setTimeout(bossAtk, 261300, Godzilla.attackState(), Godzilla.getAttack());
		q = setTimeout(bossMain, 263600, Godzilla.mainState());
		r = setTimeout(bossAtk, 293600, Godzilla.attackState(), Godzilla.getAttack());
		s = setTimeout(bossMain, 295900, Godzilla.mainState());
		t = setTimeout(bossAtk, 325900, Godzilla.attackState(), Godzilla.getAttack());
		u = setTimeout(bossMain, 328200, Godzilla.mainState());
		bossLife = Godzilla.getLp();
		maxLp = Godzilla.getLp();
		document.getElementById("bossLp").style.width = ((bossLife/maxLp)*100).toFixed(2) + "%";
		document.getElementById("bossLp").innerHTML = BossName+": " + bossLife;
	};
	
	function bossMain(source){
		document.getElementById("RaidBoss").src = source;
		gameReady = true;
	};
	function bossAtk(source, damage){
		damageCaused = damage-petDefence;
		if (damageCaused<= 0) {
			damageCaused = Math.trunc(petMaxLifePoints*0.1);
		};
		petLifePoints -= damageCaused;
		if (petLifePoints<0) {petLifePoints=0; gameEnd(); outcome(false);};
		document.getElementById("RaidBoss").src = source;
		document.getElementById("petLp").innerHTML = petName+": " + petLifePoints;
		document.getElementById("petLp").style.width = ((petLifePoints/petMaxLifePoints)*100).toFixed(2) + "%";
	};
	
	function attack(){
		if (gameOver == false && gameReady == true) {
			if (bossLife > 0){
				bossLife -= petAttack;
				gameClicks++;
				totalClicks++;
				document.getElementById("bossLp").style.width = ((bossLife/maxLp)*100).toFixed(2) + "%";
				document.getElementById("bossLp").innerHTML = BossName+": " + bossLife;
				if (bossLife <= 0){
					bossLife = 0;
					gameOver = true;
					gameEnd();
					death();
				};
				document.getElementById("petSp").style.width = gameClicks + "%";
				if (gameClicks >= 100) {
					gameClicks = 100;
					document.getElementById("petSp").innerHTML = petName+" SP: Ready";
				} else {
					document.getElementById("petSp").innerHTML = petName+" SP: " + gameClicks + "%";
				};
			};
		};
	};
	function special() {
		if (gameClicks >= 100) {
			gameClicks = 0;
			bossLife -= (petSpecial**2);
			document.getElementById("bossLp").style.width = ((bossLife/maxLp)*100).toFixed(2) + "%";
			document.getElementById("bossLp").innerHTML = BossName+": " + bossLife;
			document.getElementById("petSp").style.width = gameClicks + "%";
			document.getElementById("petSp").innerHTML = petName+" SP: " + gameClicks + "%";
		} else { 
			attack();
		};
	};

	function gameEnd() {
		clearTimeout(a);clearTimeout(b);clearTimeout(c);clearTimeout(d);clearTimeout(e);clearTimeout(f);clearTimeout(g);clearTimeout(h);clearTimeout(i);clearTimeout(j);
		clearTimeout(k);clearTimeout(l);clearTimeout(m);clearTimeout(n);clearTimeout(o);clearTimeout(p);clearTimeout(q);clearTimeout(r);clearTimeout(s);clearTimeout(t);
		clearTimeout(u);
	};
	function death() {
		if (BossName=="Rodan") {
			document.getElementById("RaidBoss").src = Rodan.deathState();
			v = setTimeout(outcome, 4600, true);
		} else if (BossName=="Mechagodzilla") {
			document.getElementById("RaidBoss").src = Mechagodzilla.deathState();
			v = setTimeout(outcome, 10100, true);
		} else if (BossName=="King Ghidorah") {
			document.getElementById("RaidBoss").src = KingGhidorah.deathState();
			v = setTimeout(outcome, 3700, true);
			//5200 for special death
		} else if (BossName=="Godzilla") {
			document.getElementById("RaidBoss").src = Godzilla.deathState();
			v = setTimeout(outcome, 7900, true);
		};
	};
	function outcome(win) {
		if (BossName=="Rodan") {
			multiplier = 1000;
			index = 2;
		} else if (BossName=="Mechagodzilla") {
			multiplier = 10000;
			index = 3;
		} else if (BossName=="King Ghidorah" || BossName=="Godzilla") {
			multiplier = 1000000;
			index = 5;
		};
		if (win == true) {
			points = multiplier * totalClicks * petLevel;
			exp = (multiplier * (petLevel ** index)) + points;
			options("Raid successful", points, exp);
		} else {
			points = multiplier * totalClicks;
			exp = Math.round(((multiplier * petLevel) + points)/4);
			options("Raid failed", points, exp);
		};
	};
	
	// Get the modal
	var modal = document.getElementById("myModal");
	
	function options(message, pointsGain, expGain) {
		petPoints += pointsGain;
		petExp += expGain;
		sessionStorage.setItem("points", petPoints);
		sessionStorage.setItem("exp", petExp);
		
	    modal.style.display = "block";
		document.getElementById("raidMessage").innerHTML = message;
		document.getElementById("pointsANDexp").innerHTML = "Pts +" + pointsGain + " Exp +" + expGain + "<br> Pet Pts: " + petPoints + " Pet Exp: " + petExp;
		experience();
		
		var again = document.getElementById("again");
		var leave = document.getElementById("leave");
		again.onclick = function() {
		  location.reload();
		};
		leave.onclick = function() {	
		  location.replace("home-page-games.php");
		};
	};
	
	function experience() {
		checkLevel = Math.trunc(Math.log10(petExp)) + 1;
		if (checkLevel < 1) {
			checkLevel = 1;
		};
		if (checkLevel > petLevel) {
			levelDiff = checkLevel - petLevel;
			lpUp = Math.trunc(petMaxLifePoints * (1.05**levelDiff));
			attackUp = Math.trunc(petAttack * (1.05**levelDiff));
			defenceUp = Math.trunc(petDefence * (1.05**levelDiff));
			specialUp = Math.trunc(petSpecial * (1.05**levelDiff));
			document.getElementById("notificationTitle").innerHTML = "Level Up!"
			document.getElementById("notificationDetails").innerHTML = "Life points +"+(lpUp-petMaxLifePoints)+"<br> Attack +"+(attackUp-petAttack)+"<br> Defence +"+(defenceUp-petDefence)+"<br> Special +"+(specialUp-petSpecial);
			$("#notification").toast('show');
			sessionStorage.setItem("lp", lpUp);
			sessionStorage.setItem("attack", attackUp);
			sessionStorage.setItem("defence", defenceUp);
			sessionStorage.setItem("special", specialUp);
		};
		petLevel = checkLevel;
		sessionStorage.setItem("exp", petExp);
		sessionStorage.setItem("level", petLevel);
	};
</script>
</html>