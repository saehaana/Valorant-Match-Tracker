<?php
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);

session_start();
$conn = mysqli_connect('localhost','saehaana','V00797462','project_saehaana');

//get values from registration form
$battletag = $_POST['battletag'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];

$password = md5($password); //encrypt password

//check Player table if email already exists
$querySelect = "SELECT * FROM Player WHERE email = '$email' LIMIT 1";
$results = mysqli_query($conn,$querySelect);
$num = mysqli_num_rows($results);
    if($num == 1){
        echo "email already taken,please choose another email";
    }else{ //registers user if no errors exist
        $queryInsert = "insert into Player (Battletag,Username,Password,Email,firstName,lastName)
        values ('$battletag','$username','$password','$email','$firstName','$lastName')";
        mysqli_query($conn,$queryInsert);
        echo "registration successful";
    }
?>