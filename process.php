<?php
    //get values from form in login.php
    $username = $_POST['username'];
    $password = $_POST['password'];

    //prevent mysql injection
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);

    //connect to server and select database
    mysql_connect("localhost","root","");
    mysql_select_db("login");

    //query database for user
    $result = mysql_query("SELECT * from users where username = '$username' and password = '$password'")
        or die("failed to query database".mysql_error());
    $row = mysql_fetch_array($result);
    if($row['username'] == $username && $row['password'] == $password){
        echo "Login successful Welcome " .$row['username'];
    }else{
        echo "failed to login"
     }

?>