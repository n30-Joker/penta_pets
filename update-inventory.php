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

$sql = "UPDATE other SET Totems = :totems, Clicks = :clicks, Inventory = :inventory WHERE Username = :username";

if($stmt = $pdo->prepare($sql)){
	// Bind variables to the prepared statement as parameters
	$stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
	$stmt->bindParam(":totems", $param_totems, PDO::PARAM_INT);
	$stmt->bindParam(":clicks", $param_clicks, PDO::PARAM_INT);
	$stmt->bindParam(":inventory", $param_inventory, PDO::PARAM_INT);
	// Set parameters
	$param_username = $_SESSION["username"];
	$param_totems = $_POST["totems"];
	$param_clicks = $_POST["clicks"];
	$param_inventory = $_POST["inventory"];
	$stmt->execute();
	// Close statement
	unset($stmt);
};
// Close connection
unset($pdo);
?>