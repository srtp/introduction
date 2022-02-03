<?php
 include('nav.php'); 
 $con= mysqli_connect("localhost","root","","logadmin") or die("Error: " . mysqli_error($con));
 mysqli_query($con, "SET NAMES 'utf8' ");
 error_reporting( error_reporting() & ~E_NOTICE );
 date_default_timezone_set('Asia/Bangkok');
 
?>


<p></p>
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
    <?php
    $sql_provinces = "SELECT * FROM provinces";
    $query = mysqli_query($con, $sql_provinces);
?>
    <h5 style="margin-top: 100px; margin-left: 270px;"> ยืนยันการสั่งซื้อ <a href="index.php"
            class="btn btn-outline-secondary">กลับไปยังรายการสินค้า</a></h5>
    <!-- Start Cart -->
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <form id="frmcart" name="frmcart" method="post" action="saveorder.php">
                    <table class="table table-bordered table-hover table-striped">
                        <tr>
                            <th width="5%" bgcolor="#F7F9F9">#</th>
                            <th width="10%" bgcolor="#F7F9F9">รูปสินค้า</th>
                            <th width="55%" bgcolor="#F7F9F9">สินค้า</th>
                            <th width="10%" align="center" bgcolor="#F7F9F9">ราคา</th>
                            <th width="10%" align="center" bgcolor="#F7F9F9">จำนวน</th>
                            <th width="5%" align="center" bgcolor="#F7F9F9">รวม(บาท)</th>
                        </tr>
                        <?php
$total=0;
if(!empty($_SESSION['cart']))
{
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql = "select * from tbl_product where p_id=$p_id";
		$query2 = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($query2);
		$sum = $row['p_price'] * $qty;
		$total += $sum;
		echo "<tr>";
		echo "<td bgcolor='F7F9F9'>" . @$i +=1 . "</td>";
		echo "<td>"."<img src ='admin/backend/p_img/".$row['p_img']."'width='50'>"."</td>";
		echo "<td  bgcolor='F7F9F9'>" . $row["p_name"] . "</td>";
		echo "<td  align='right' bgcolor='F7F9F9'>" .number_format($row["p_price"],2) . "</td>";
		echo "<td  align='right' bgcolor='F7F9F9'>";  
		echo "<input type='number' name='amount[$p_id]' value='$qty' class='form-control' readonly/></td>";
		echo "<td  align='right' bgcolor='F7F9F9'>".number_format($sum,2)."</td>";
		echo "</tr>";
	}//close foeach
	echo "<tr>";
  	echo "<td colspan='5' bgcolor='#F0F3F4' align='center'><b>ราคารวม</b></td>";
  	echo "<td align='right' bgcolor='#F0F3F4'>"."<b>".number_format($total,2)."</b>"."</td>";
  	
	echo "</tr>";
}
?>
                    </table>
                    <h3>กรุณากรอกรายละเอียดในการจัดส่งสินค้า</h3>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="inputEmail4">ชื่อ-นามสกุล</label>
                            <input type="text" class="form-control" id="inputEmail4" name="m_name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" name="m_email">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">เบอร์โทรที่ติดต่อสะดวก</label>
                            <input type="text" class="form-control" id="inputEmail4" name="m_phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">ที่อยู่</label>
                        <textarea  type="text" class="form-control" id="inputAddress" name="m_address"></textarea >
                    </div>
                    <input type="hidden" name="total" value="<?php echo $total;?>" >
                    <input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>">

                    <button type="submit" class="btn btn-primary">สั่งซื้อสินค้า</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php include('script.php');?>