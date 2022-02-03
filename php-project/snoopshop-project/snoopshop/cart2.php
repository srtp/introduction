<?php

	include('nav.php');
	error_reporting( error_reporting() & ~E_NOTICE );
	$p_id = $_REQUEST['p_id']; 
	$act = $_REQUEST['act'];

	if($act=='add' && !empty($p_id))
	{
		if(isset($_SESSION['cart'][$p_id]))
		{
			$_SESSION['cart'][$p_id]++;
		}
		else
		{
			$_SESSION['cart'][$p_id]=1;
		}
	}

	if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['cart'][$p_id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $p_id=>$amount)
		{
			$_SESSION['cart'][$p_id]=$amount;
		}
	}
	if($act=='cancel'){
		unset($_SESSION['cart']);
	}
?>

<p></p>
<?php    ?>
<!DOCTYPE html>
<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Shopping Cart</title>
    <?php if($_SESSION['username']=='') { ?>
	
    <script>
    Swal.fire({
        icon: 'error',
        title: 'มีบางอย่างผิดปกติ!',
        text: 'กรุณา login ก่อนทำการสั่งซื้อ',
		confirmButtonText: 'ตกลง'	,
		allowEscapeKey: false,
        footer: '<a href="index.php">ย้อนกลับไปหน้าแรก</a>'
	}).then(function() {
            window.location.href = "index.php";
    });
	
    </script>
	
    <?php } if($_SESSION['username']==''){ // หาก Error ให้ลบอันนี้เป็นอันดับแรก
		unset($_SESSION['cart']); //  หาก Error ให้ลบอันนี้เป็นอันดับแรก
	} ?>
</head>

<body>
    <h5 style="margin-top: 100px; margin-left: 270px;"> ตระกร้าสินค้า <a href="index.php"
            class="btn btn-outline-secondary">กลับไปยังรายการสินค้า</a></h5>
    <!-- Start Cart -->
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <form id="frmcart" name="frmcart" method="post" action="?act=update">
                    <table class="table table-bordered table-hover table-striped">
                        <tr>
                            <th width="5%" bgcolor="#F7F9F9">#</th>
                            <th width="10%" bgcolor="#F7F9F9">รูปสินค้า</th>
                            <th width="55%" bgcolor="#F7F9F9">สินค้า</th>
                            <th width="10%" align="center" bgcolor="#F7F9F9">ราคา</th>
                            <th width="10%" align="center" bgcolor="#F7F9F9">จำนวน</th>
                            <th width="5%" align="center" bgcolor="#F7F9F9">รวม(บาท)</th>
                            <th width="5%" align="center" bgcolor="#F7F9F9">ลบ</th>
                        </tr>
                        <?php
$total=0;
if(!empty($_SESSION['cart']))
{
	include("admin/backend/connect.php");
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql = "select * from tbl_product where p_id=$p_id";
		$query = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($query);
		$sum = $row['p_price'] * $qty;
		$total += $sum;
		echo "<tr>";
		echo "<td bgcolor='F7F9F9'>" . @$i +=1 . "</td>";
		echo "<td>"."<img src ='admin/backend/p_img/".$row['p_img']."'width='50'>"."</td>";
		echo "<td  bgcolor='F7F9F9'>" . $row["p_name"] . "</td>";
		echo "<td  align='right' bgcolor='F7F9F9'>" .number_format($row["p_price"],2) . "</td>";
		echo "<td  align='right' bgcolor='F7F9F9'>";  
		echo "<input type='number' name='amount[$p_id]' value='$qty' class='form-control' min='1'/></td>";
		echo "<td  align='right' bgcolor='F7F9F9'>".number_format($sum,2)."</td>";
		//remove product
		echo "<td  align='center' bgcolor='F7F9F9' ><a href='cart2.php?p_id=$p_id&act=remove' class='btn btn-danger btn-sm' >ลบ</a></td>";
		echo "</tr>";
	}
	echo "<tr>";
  	echo "<td colspan='5' bgcolor='#F0F3F4' align='center'><b>ราคารวม</b></td>";
  	echo "<td align='right' bgcolor='#F0F3F4'>"."<b>".number_format($total,2)."</b>"."</td>";
  	echo "<td align='left' bgcolor='#F0F3F4'></td>";
	echo "</tr>";
}
	if($total > 0){
?>
                        <tr>
                            <td colspan="7" align="right" bgcolor='F7F9F9'>
                                <input type="button" class="btn btn-success" name="Submit2" value="Confirm"
                                    onclick="window.location='confirm2.php';" />
                                <input type="submit" class="btn btn-info" name="button" id="button" value="Update" />
                                <input type="button" class="btn btn-danger" name="btncancel" value="Cancel"
                                    onclick="window.location='cart2.php?act=cancel';" />
                            </td>
                        </tr>
                        <?php } else{
	echo '<div class="alert alert-danger" role="alert">
	ไม่มีสินค้าในตระกร้า กรุณากลับไปเลือกสินค้าใหม่อีกครั้ง <a href="index.php" class="alert-link">กลับไปยังหน้าสินค้า</a>
  </div>'; 
} ?>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>

</html>