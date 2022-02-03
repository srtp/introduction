<?php


	error_reporting( error_reporting() & ~E_NOTICE );
	session_start();  
	include('admin/backend/connect.php');
	if($_SESSION['username']==''){
		header("Location: index.php");
	}
	

	// echo "<pre>";
	// print_r($_SESSION);
	// echo "<hr>";
	// print_r($_POST);
	// echo "</pre>";
	
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirm</title>
</head>
<body>
<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php
   

//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');

	$name = mysqli_real_escape_string($con,$_POST["m_name"]); 
    $address = mysqli_real_escape_string($con,$_POST["m_address"]);
    $Ref_prov_id = mysqli_real_escape_string($con,$_POST["Ref_prov_id"]);
    $Ref_dist_id = mysqli_real_escape_string($con,$_POST["Ref_dist_id"]);
	$Ref_subdist_id = mysqli_real_escape_string($con,$_POST["Ref_subdist_id"]);
	$zipcode = mysqli_real_escape_string($con,$_POST['zip_code']);
	$email = mysqli_real_escape_string($con,$_POST["m_email"]);
	$phone = mysqli_real_escape_string($con,$_POST["m_phone"]);
	$username = mysqli_real_escape_string($con,$_POST["username"]);
	$total = mysqli_real_escape_string($con,$_POST['total']);
	$order_date = date("Y-m-d H:i:s");
	$status = 1;

	
	//บันทึกการสั่งซื้อลงใน order_detail
	mysqli_query($con, 'BEGIN'); 
	$sql1 = "INSERT  INTO tb_order VALUES
	(NULL,  
    '$username',
	'$name',
	'$address',
    '$Ref_prov_id',
    '$Ref_dist_id',
    '$Ref_subdist_id',
	'$zipcode',
	'$email',
	'$phone',
	'$status',
	'', /* bid*/
	'', /* o_slip */
	'0000-00-00', /* o slip date*/
	'', /* slip total*/
	'', /* ems*/
	'0000-00-00', /* ems date*/
	'$total',
	'$order_date' 
	)";
	
	$query1	= mysqli_query($con, $sql1) or die ("Error in query: $sql1 " . mysqli_error());
	

 
 
	$sql2 = "SELECT MAX(order_id) AS order_id FROM tb_order  WHERE phone='$phone'";
	$query2	= mysqli_query($con, $sql2);
	$row = mysqli_fetch_array($query2);
	$order_id = $row['order_id'];
	
	
	foreach($_SESSION['cart'] as $p_id=>$p_qty)
	 
	{
		$sql3	= "SELECT * FROM tbl_product where p_id=$p_id";
		$query3 = mysqli_query($con, $sql3);
		$row3 = mysqli_fetch_array($query3);
		$total=$row3['p_price']*$p_qty;
		
		
		$sql4	= "INSERT INTO  tb_order_detail 
		values(null, 
		'$order_id', 
		'$p_id', 
		'$p_qty', 
		'$total')";
		$query4	= mysqli_query($con, $sql4);
	}
	
	if($query1 && $query4){
		mysqli_query($con, "COMMIT");
		$msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
		foreach($_SESSION['cart'] as $p_id)
		{	
			unset($_SESSION['cart']);
		}
	}
	else{
		mysqli_query($con, "ROLLBACK");  
		$msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";	
	}

?>


<script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='member/payment.php?order_id=<?php echo $order_id;?>&do=payment_token=001kzjzxx982';
</script>


 
</body>
</html>