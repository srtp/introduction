<head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script></head>
<?php 
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// echo $_FILES['o_slip']['name'];

// [bid] => 2
//     [o_slip_date] => 2020-10-21
//     [o_slip_total] => 300
//     [order_id] => 10
// o_slip
include('../admin/backend/connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
  //สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
  $bid = mysqli_real_escape_string($con,$_POST["bid"]);
  $o_slip_date = mysqli_real_escape_string($con,$_POST["o_slip_date"]);
  $o_slip_toal = mysqli_real_escape_string($con,$_POST["o_slip_total"]);
  $order_id = mysqli_real_escape_string($con,$_POST["order_id"]);

$date1=date("Ymd_his");
$numrand=(mt_rand());
  
$o_slip = (isset($_POST['o_slip']) ?$_POST['o_slip'] : '');
$upload=$_FILES['o_slip']['name'];
if($upload !=''){
    $path= "../img000/";
    $type = strrchr($_FILES['o_slip']['name'],".");
    $newname='slip'.$numrand.$date1.$type;
    $path_copy=$path.$newname;
    $path_link="../img000/".$newname;
    move_uploaded_file($_FILES['o_slip']['tmp_name'],$path_copy);

} else{
    $newname='';
}

$sql="UPDATE tb_order SET
bid='$bid',
o_slip_date='$o_slip_date',
o_slip_total='$o_slip_toal',
order_status=2,
o_slip='$newname'
WHERE order_id=$order_id";

$result = mysqli_query($con,$sql) or die ("Error in query: $sql" .mysqli_error());

mysqli_close($con); 

// if($result){ 
//     echo "<script>
//     Swal.fire({
//         icon: 'success',
//         title: 'แจ้งชำระเงินสำเร็จ',
//         text: 'เราได้รับข้อมูลการชำระเงินของท่านแล้ว',
// 		confirmButtonText: 'ตกลง',
// 		allowEscapeKey: false,
//         footer: '<a href='index.php'>ย้อนกลับไปยังรายการสั่งซ์้อ</a>'
// 	}).then(function() {
//             window.location.href = 'index.php';
//     });
//     </script>";
//  } 
//  elseif($result){ 
//     echo "<script>
//     Swal.fire({
//         icon: 'error',
//         title: 'แจ้งชำระเงินไม่สำเร็จ',
//         text: 'มีบางอย่างผิดปกติกรุณาทำรายการแจ้งชำระเงินใหม่อีกครั้ง',
// 		confirmButtonText: 'ตกลง'	,
// 		allowEscapeKey: false,
//         footer: '<a href='index.php'>ย้อนกลับไปยังรายการสั่งซ์้อ</a>'
// 	}).then(function() {
//             window.location.href = 'index.php';
//     });
//     </script>";
// } 

if($result){
    echo "<script type='text/javascript'>";
    echo "alert('แจ้งชำระเงินสำเร็จ');";
    echo "window.location ='payment_detail.php?order_id=$order_id&do=detail_hugsdjcipdkxuxlswhiopocjmchdd';";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('แจ้งชำระเงินไม่สำเร็จ');";
    echo "window.location ='index.php';";
    echo "</script>";
}

?>



