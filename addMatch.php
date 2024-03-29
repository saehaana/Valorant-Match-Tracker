<?php
session_start();
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);

//if user not logged in, redirect to index.php
if(!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
}

?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Add Match</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <style>
        body{
        background-image: url('cover.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        }
    </style>
    <a href="home.php"> Home </a>
    <br>
    <a href="logout.php"> Logout </a>
    <div id="addMatch">
        <h1>Add Match</h1>
        <p>Please select an option from each drop down box</p>
        <form action="matchDataInsert.php" method="POST">
        <p>
        <label>Match ID:</label>
        <input type="text" placeholder="Top-right corner of your scorecard" name="Match_ID" required>
        </p>
        <p>
        <label>Date:</label>
        <input type="date" placeholder="mm/dd/yyyy" name="date" required>
        </p>
        <label for="Game_Status">Game Status:</label>
        <select id="Game_Status" name="Game_Status" required>
            <option selected disabled hidden style='display: none' value=''></option>
            <option value="Win">Win</option>
            <option value="Loss">Loss</option>
            <option value="Draw">Draw</option>
        </select>
        <label for="Game_Type">Game Type:</label>
        <select id="Game_Type" name="Game_Type" required>
            <option selected disabled hidden style='display: none' value=''></option>
            <option value="Ranked">Ranked</option>
            <option value="Unranked">Unranked</option>
        </select>
        <p>
        <label>Combat Score:</label>
        <input type="text" placeholder="Enter a number up to 3 digits e.g. 253" name="Combat_Score" required>
        </p>
        <p>
        <label>Econ Score:</label>
        <input type="text" placeholder="Enter a number up to 3 digits e.g. 253" name="Econ_Score" required>
        </p>
        <label for="Agent">Agent:</label>
        <select id = "Agent" name="Agent" required>
            <option selected disabled hidden style='display: none' value=''></option>
            <option value="Astra">Astra</option>
            <option value="Breach">Breach</option>
            <option value="Brimstone">Brimstone</option>
            <option value="Cypher">Cypher</option>
            <option value="Jett">Jett</option>
            <option value="Killjoy">Killjoy</option>
            <option value="Omen">Omen</option>
            <option value="Phoenix">Phoenix</option>
            <option value="Raze">Raze</option>
            <option value="Reyna">Reyna</option>
            <option value="Sage">Sage</option>
            <option value="Skye">Skye</option>
            <option value="Sova">Sova</option>
            <option value="Viper">Viper</option>
            <option value="Yoru">Yoru</option>
        </select>
        <label for="Map">Map:</label>
        <select id="Map" name="Map" required>
            <option selected disabled hidden style='display: none' value=''></option>
            <option value="Ascent">Ascent</option>
            <option value="Bind">Bind</option>
            <option value="Breeze">Breeze</option>
            <option value="Haven">Haven</option>
            <option value="Icebox">Icebox</option>
            <option value="Split">Split</option>
        </select>
        <label for="Weapon">Weapon:</label>
        <select id="Weapon" name="Weapon" required>
            <option selected disabled hidden style='display: none' value=''></option>
            <option value="Phantom">Phantom</option>
            <option value="Vandal">Vandal</option>
        </select>
        <br><br>
        <input type="submit">
        </form>
    </div>
</body>
</html>