<?php
session_start();
include 'connect.php';
$errors = array();

if (isset($_POST['se'])) {
    $email2 = mysqli_real_escape_string($conn, $_POST['email']);
    $doc_id = mysqli_real_escape_string($conn, $_POST['doc_id']);
    $level = mysqli_real_escape_string($conn, $_POST['level']);
    $email=$_SESSION['email'];

    if(empty($_POST['level'])){
      $sql = "UPDATE tbl_doc SET  
      email2='$email2',
      email='$email',
      status=1
      WHERE doc_id LIKE '$doc_id' ";
    }

    elseif(empty($_POST['email'])){

      $sql = "UPDATE tbl_doc SET  
      email2='$email2',
      email='$email',
      level=$level,
      status=1
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