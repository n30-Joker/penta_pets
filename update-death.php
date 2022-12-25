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

$sql = "UPDATE pet_details SET Main = :main, Alive = :alive, Energy = :energy, Hunger = :hunger, Happiness = :happiness WHERE Username = :username AND Pet = :pet";

if($stmt = $pdo->prepare($sql)){
	// Bind variables to the prepared statement as parameters
	$stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
	$stmt->bindParam(":pet", $param_pet, PDO::PARAM_STR);
	$stmt->bindParam(":main", $param_main, PDO::PARAM_INT);
	$stmt->bindParam(":alive", $param_alive, PDO::PARAM_INT);
	$stmt->bindParam(":energy", $param_energy, PDO::PARAM_INT);
	$stmt->bindParam(":hunger", $param_hunger, PDO::PARAM_INT);
	$stmt->bindParam(":happiness", $param_happiness, PDO::PARAM_INT);
	// Set parameters
	$param_username = $_SESSION["username"];
	$param_pet = $_POST["pet"];
	$param_main = $_POST["main"];
	$param_alive = $_POST["alive"];
	$param_energy = $_POST["energy"];
	$param_hunger = $_POST["hunger"];
	$param_happiness = $_POST["happiness"];
	$stmt->execute();
	// Close statement
	unset($stmt);
};
// Close connection
unset($pdo);
?>
