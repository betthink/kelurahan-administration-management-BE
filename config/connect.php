
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "db_administrasi_kelurahan";
$conn = mysqli_connect($servername, $username, $password, $dbName);
if (!$conn) {
    die('connection failed:' . mysqli_connect_errno());
} 
?>