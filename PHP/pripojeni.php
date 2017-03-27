<?php
/*
$servername = "localhost";
$username = "root";
$password = "";
$db = "fitness";
// Create connection
$connect = mysqli_connect($servername, $username, $password, $db);
mysqli_set_charset($connect, "utf8");
// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

  */
$servername = "wm117.wedos.net";
$username = "a142225_martin";
$password = "Lamalama1+";
$db = "d142225_martin";
// Create connection
$connect = mysqli_connect($servername, $username, $password, $db);
mysqli_set_charset($connect, "utf8");
// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
  foreach ($_GET as $index => $hodnota){
    $_GET[$index]=mysqli_real_escape_string($connect, $_GET[$index]);
    //echo "GET - $index<br>";
  }
  foreach ($_POST as $index => $hodnota){
    $_POST[$index]=mysqli_real_escape_string($connect, $_POST[$index]);
    //echo "POST - $index<br>";
  }
//echo "Connected successfully";
    
   
?>
