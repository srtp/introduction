<?php  
 session_start();  
 $connect = mysqli_connect("localhost","root","","logadmin");  
 if(isset($_POST["username"]))  
 {  
      $query = "  
      SELECT * FROM tbl_member  
      WHERE m_name = '".$_POST["username"]."'  
      AND m_password = '".$_POST["password"]."'  
      ";  
      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result) > 0)  
      {  
           $_SESSION['username'] = $_POST['username'];  
           echo 'Yes';  
      }  
      else  
      {  
           echo 'No';  
      }  
 }  
 if(isset($_POST["action"]))  
 {  
      unset($_SESSION["username"]);  
 }  
 ?>  
