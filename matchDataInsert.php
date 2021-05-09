<?php
session_start();
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);
$conn = mysqli_connect('localhost','saehaana','V00797462','project_saehaana');

//get values from addMatch form
$email = $_SESSION['email'];
$Match_ID = $_POST['Match_ID'];
$date = $_POST['date'];
$Game_Status = $_POST['Game_Status'];
$Game_Type = $_POST['Game_Type'];
$Combat_Score = $_POST['Combat_Score'];
$Agent = $_POST['Agent'];
$Map = $_POST['Map'];
$Weapon = $_POST['Weapon'];

//associate all agents with their agent type
$AgentType;
if($Agent == 'Astra' || $Agent == 'Brimstone' || $Agent == 'Omen' || $Agent == 'Viper'){$AgentType = 'Controller';}
if($Agent == 'Breach' || $Agent == 'Skye' || $Agent == 'Sova'){$AgentType = 'Initiator';}
if($Agent == 'Cypher' || $Agent == 'Killjoy' || $Agent == 'Sage'){$AgentType = 'Sentinel';}
if($Agent == 'Jett' || $Agent == 'Phoenix' || $Agent == 'Raze' || $Agent == '$Reyna' || $Agent == 'Yoru'){$AgentType = 'Duelist';}

//associate weapons with weapon type
$WeaponType;
if($Weapon == 'Phantom' || $Weapon == 'Vandal'){$WeaponType = 'Rifle';}

//submit form to db
if(empty($_POST[""])){}
$queryInsert1 = "insert into Match_History (Email,Game_Status,Date) values ('$email','$Game_Status','$date')";
mysqli_query($conn,$queryInsert1);

$queryInsert2 = "insert into Game_Type (Game_Type) values ('$Game_Type')";
mysqli_query($conn,$queryInsert2);

$queryInsert3 = "INSERT INTO Combat_Rating (RatingNumber) VALUES ('$Combat_Score')";
mysqli_query($conn,$queryInsert3);

$queryInsert4 = "INSERT INTO Map (MapName) VALUES ('$Map')";
mysqli_query($conn,$queryInsert4);

$queryInsert4 = "INSERT INTO Agent (AgentName,AgentType) VALUES ('$Agent','$AgentType')";
mysqli_query($conn,$queryInsert4);

$queryInsert5 = "INSERT INTO Weapon (WeaponName,WeaponType) VALUES ('$Weapon','$WeaponType')";
mysqli_query($conn,$queryInsert5);

echo "match added successfully, click home button below to view the match under match history or add another match";
?>
<!DOCTYPE HTML>
<html>
<body>
<p>
<a href="home.php">Home</a>
</p>
<p>
<a href="addMatch.php">Add another match</a>
</p>
</body>
</html>