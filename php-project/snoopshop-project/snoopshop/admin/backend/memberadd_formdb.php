<?php
include('connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
  //สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
  $m_user = $_REQUEST["m_user"];
  $m_pass = ($_REQUEST["m_pass"]);
  $m_name = $_REQUEST["m_name"];
  $m_email = $_REQUEST["m_email"];
  $m_tel = $_REQUEST["m_tel"];
  $m_address = $_REQUEST["m_address"];
  $m_pass = md5($m_pass);

  $sql_user = "SELECT m_user from tbl_member where m_user = '$m_user' ";
  $user = mysqli_query($con, $sql_user) or die ("Error in query: $sql_user " . mysqli_error());

  if(mysqli_num_rows($user) >= 1)
  {
    echo "<script type='text/javascript'>";
    echo "alert('register Fail,register again friend.');";
    echo "window.location = 'memberSQ.php'; ";
    echo "</script>";
  }
  else
  {
    //เพิ่มเข้าไปในฐานข้อมูล
    $sql = "INSERT INTO tbl_member(m_user, m_pass, m_name, m_email, m_tel, m_address)
    VALUES('$m_user', '$m_pass', '$m_name', '$m_email', '$m_tel', '$m_address')";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
    //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
    if($result){
      echo "<script type='text/javascript'>";
      echo "alert('Success Friend.');";
      echo "window.location = 'memberSQ.php'; ";
      echo "</script>";
      }
      else{
      echo "<script type='text/javascript'>";
      echo "alert('register Fail,register again friend.');";
      echo "</script>";
    }
  }
  //ปิดการเชื่อมต่อ database
  mysqli_close($con);
?>