<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
  $member_id = $_REQUEST["member_id"];
  $m_user = $_REQUEST["m_user"];
  $m_pass = $_REQUEST["m_pass"];
  $m_name = $_REQUEST["m_name"];
  $m_email = $_REQUEST["m_email"];
  $m_tel = $_REQUEST["m_tel"];
  $m_address = $_REQUEST["m_address"];
//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
  
  $sql = "UPDATE tbl_member SET  
      m_user='$m_user', 
      m_pass='$m_pass', 
      m_name='$m_name',
      m_email='$m_email',
      m_tel='$m_tel', 
      m_address='$m_address' 
      WHERE member_id='$member_id' ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('Update Succesfuly');";
  echo "window.location = 'memberSQ.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to Update again');";
  echo "</script>";
}
?>