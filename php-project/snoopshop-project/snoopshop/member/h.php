<?php session_start(); 
include('../admin/backend/connect.php');
 
  $memberuser =$_SESSION['m_user'];
  $member_id =$_SESSION['member_id'];
  $m_name = $_SESSION['m_name'];
 	if($member_id==''){
    Header("Location: logout.php");  
  }  
  else{
  }
?>