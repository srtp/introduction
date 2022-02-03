<?php
session_start();
include 'connect.php';
$errors = array();
$doc_id = $_REQUEST["doc_id"];



        $sql = "UPDATE tbl_doc SET  
        status=3
        WHERE doc_id='$doc_id' ";

$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

mysqli_close($conn);

if($result){
    echo "<script type='text/javascript'>";
    echo "alert('Update Succesfuly');";
    echo "</script>";
    echo "<script>";
    echo "window.location='menu.php?act=mydoc'";
    echo "</script>";
    }
    else{
    echo "<script type='text/javascript'>";
    echo "alert('Error back to Update again');";
    echo "</script>";
  }



?>