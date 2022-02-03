<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
  $a_id = $_REQUEST["a_id"];
  $a_user = $_REQUEST["a_user"];
  $a_pass = $_REQUEST["a_pass"];
  $a_name = $_REQUEST["a_name"];

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
  
  $sql = "UPDATE tbl_admin SET  
      a_user='$a_user' , 
      a_pass='$a_pass' , 
      a_name='$a_name' 
      WHERE a_id='$a_id' ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('Update Success');";
  echo "window.location = 'adminlog.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error try again');";
  echo "</script>";
}
?>