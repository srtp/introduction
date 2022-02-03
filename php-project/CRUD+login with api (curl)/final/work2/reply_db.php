<?php
session_start();
include 'connect.php';
$errors = array();

if (isset($_POST['se'])) {
    $doc_id = mysqli_real_escape_string($conn, $_POST['doc_id']);
    $reply = mysqli_real_escape_string($conn, $_POST['reply']);

    if(empty($_POST['level'])){
      $sql = "UPDATE tbl_doc SET  
      reply='$reply',
      status=4
      WHERE doc_id LIKE '$doc_id' ";
    }

    elseif(empty($_POST['email'])){

      $sql = "UPDATE tbl_doc SET  
      reply='$reply',
      status=4
      WHERE doc_id LIKE '$doc_id' ";

    }


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

}

?>