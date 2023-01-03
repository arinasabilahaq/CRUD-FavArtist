<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "music2";

$connection = mysqli_connect($host, $user, $pass);
if ($connection){
    $open = mysqli_select_db($connection, $database);
        // echo "database is connected";
    if (!$open) {
        echo "database is not connected";
    }
}else{
    echo "MySQL is not connected";
}
?>