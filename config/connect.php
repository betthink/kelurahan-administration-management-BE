
<?php
$servername = "localhost";
$username = "root";
$password = "Mag00n4.@";
$dbName = "db_administrasi_kel";
$conn = mysqli_connect($servername, $username, $password, $dbName);
if (!$conn) {
    die('connection failed:' . mysqli_connect_errno());
} 
?>