<?php
session_start();
//error handling
ini_set("display_errors", 1);
ERROR_REPORTING(E_ALL);
//connect to server
$conn = mysqli_connect('localhost','saehaana','V00797462','project_saehaana');

//get values from login form
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

//login the user and redirect to home.php
$query = "SELECT * FROM Player WHERE username='$username' AND password='$password'";
$results = mysqli_query($conn,$query);
$num = mysqli_num_rows($results);
if($num == 1){
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    header('location: home.php');
}else{
    header('location: index.php');
}
?>