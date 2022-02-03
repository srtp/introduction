<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('connect.php'); ?>
<?php 
// Array ( [o_ems] => th3343222 [order_id] => 15 )
$o_ems= mysqli_real_escape_string($con,$_POST['o_ems']);
$order_id=mysqli_real_escape_string($con,$_POST['order_id']);
$o_ems_date = date('Y-m-d H:i:s');

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
	
$sql = "UPDATE tb_order SET  
o_ems='$o_ems',
o_ems_date='$o_ems_date',
order_status=3
WHERE order_id='$order_id' ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

// echo $sql;
// exit;
mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if($result){
echo "<script type='text/javascript'>";
echo "alert('Update Succesfuly');";
echo "window.location = 'index.php'; ";
echo "</script>";
}
else{
echo "<script type='text/javascript'>";
echo "alert('Error back to Update again');";
echo "</script>";
}

?>