<?php
// Initialize the session
session_start();
// Include config file
require_once "config.php";

$sql = "UPDATE pet_details SET Main = :main, Alive = :alive, Points = :points, 
Level = :level, Exp = :exp, LP = :LP, Attack = :attack, Defence = :defence,
Special = :special, Energy = :energy, Hunger = :hunger,
Happiness = :happiness WHERE Username = :username AND Pet = :pet";

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
	// Set parameters
	$param_username = $_SESSION["username"];
	$param_pet = $_POST["pet"];
	$param_main = $_SESSION["main"];
	$param_alive = $_POST["alive"];
	$param_points = $_POST["points"];
	$param_level = $_POST["level"];
	$param_exp = $_POST["exp"];
	$param_LP = $_POST["lp"];
	$param_attack = $_POST["attack"];
	$param_defence = $_POST["defence"];
	$param_special = $_POST["special"];
	$param_energy = $_POST["energy"];
	$param_hunger = $_POST["hunger"];
	$param_happiness = $_POST["happiness"];
	$stmt->execute();
	// Close statement
	unset($stmt);
};
// Close connection
unset($pdo);
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: login.php");
exit;
?>