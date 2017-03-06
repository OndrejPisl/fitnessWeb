 <?php
$servername = "localhost";
$username = "root";
$password = "";
$db="fitness";
// Create connection
$connect = mysqli_connect($servername, $username, $password, $db);
mysqli_set_charset($connect,"utf8");
// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>
