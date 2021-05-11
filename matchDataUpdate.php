<?php
session_start();
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);
$conn = mysqli_connect('localhost','saehaana','V00797462','project_saehaana');

function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        die($problem);
    }
    return $data;
}

//get values from editMatch form
$email = $_SESSION['email'];
$Match_ID = check_input($_POST['Match_ID'],"Match ID required");
$emailUpdate = $_POST['emailUpdate'];
$dateUpdate = $_POST['dateUpdate'];
$Game_StatusUpdate = $_POST['Game_StatusUpdate'];
$Game_TypeUpdate = $_POST['Game_TypeUpdate'];
$Combat_ScoreUpdate = $_POST['Combat_ScoreUpdate'];
$AgentUpdate = $_POST['AgentUpdate'];
$MapUpdate = $_POST['MapUpdate'];
$WeaponUpdate = $_POST['WeaponUpdate'];

//associate all agents with their agent type
$AgentTypeUpdate;
if($AgentUpdate == 'Astra' || $AgentUpdate == 'Brimstone' || $AgentUpdate == 'Omen' || $AgentUpdate == 'Viper'){$AgentTypeUpdate = 'Controller';}
if($AgentUpdate == 'Breach' || $AgentUpdate == 'Skye' || $AgentUpdate == 'Sova'){$AgentTypeUpdate = 'Initiator';}
if($AgentUpdate == 'Cypher' || $AgentUpdate == 'Killjoy' || $AgentUpdate == 'Sage'){$AgentTypeUpdate = 'Sentinel';}
if($AgentUpdate == 'Jett' || $AgentUpdate == 'Phoenix' || $AgentUpdate == 'Raze' || $AgentUpdate == '$Reyna' || $AgentUpdate == 'Yoru'){$AgentTypeUpdate = 'Duelist';}

//associate weapons with weapon type
$WeaponTypeUpdate;
if($WeaponUpdate == 'Phantom' || $WeaponUpdate == 'Vandal'){$WeaponTypeUpdate = 'Rifle';}

//submit form to db
if($Match_ID == 1){
if(!empty($emailUpdate)){
$queryUpdate1 = "UPDATE Player SET Email = '$emailUpdate' where Email = '$email'";
mysqli_query($conn,$queryUpdate1);
}
if(!empty($emailUpdate)){
$queryUpdate2a = "UPDATE Match_History SET Email = '$emailUpdate' where Email = '$email'";
mysqli_query($conn,$queryUpdate2a);
}
$queryUpdate2b = "UPDATE Match_History SET Game_Status = '$Game_StatusUpdate' where MatchID = '$Match_ID'";
mysqli_query($conn,$queryUpdate2b);

$queryUpdate2c = "UPDATE Match_History SET Date = '$dateUpdate' where MatchID = '$Match_ID'";
mysqli_query($conn,$queryUpdate2c);

$queryUpdate3 = "UPDATE Game_Type SET Game_Type = '$Game_TypeUpdate' where MatchID = '$Match_ID'";
mysqli_query($conn,$queryUpdate3);

$queryUpdate4 = "UPDATE Combat_Rating SET RatingNumber = '$Combat_ScoreUpdate' where MatchID = '$Match_ID'";
mysqli_query($conn,$queryUpdate4);

$queryUpdate4 = "UPDATE Map SET MapName = '$MapUpdate' where MatchID = '$Match_ID'";
mysqli_query($conn,$queryUpdate4);

$queryUpdate5a = "UPDATE Agent SET AgentName = '$AgentUpdate' where MatchID = '$Match_ID'";
mysqli_query($conn,$queryUpdate5a);

$queryUpdate5b = "UPDATE Agent SET AgentType = '$AgentTypeUpdate' where MatchID = '$Match_ID'";
mysqli_query($conn,$queryUpdate5b);

$queryUpdate6a = "UPDATE Weapon SET WeaponName = '$WeaponUpdate' where MatchID = '$Match_ID'";
mysqli_query($conn,$queryUpdate6a);

$queryUpdate6b = "UPDATE Weapon SET WeaponType = '$WeaponTypeUpdate' where MatchID = '$Match_ID'";
mysqli_query($conn,$queryUpdate6b);

echo "match added successfully, go back to view the match under match history";
}else{
echo "No match found for Match ID: $Match_ID";
}
?>
<!DOCTYPE HTML>
<html>
<body>
<p>
<a href="home.php">Home</a>
</p>
<p>
<a href="editMatch.php">Add another match</a>
</p>
</body>
</html>