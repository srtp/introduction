<?php

$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="edoc";

//Create Connect
$conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);

mysqli_set_charset($conn, "utf8");


//check
/*if (!$conn){
    die("Connect fail".mysqli_connect_error());

} else {
    echo "Connect Success";
}*/

?>