
<!DOCTYPE html>
<html>

<head>
    <style>
    body {
        /* overflow: hidden;  */
    }
    </style>
    <?php include('../nav.php') ?>
    <?php include('check.php') ?>
    <?php include('../admin/backend/connect.php') ?>
    <?php $user = $_SESSION['username'] ?>
    <?php $order_id=mysqli_real_escape_string($con,$_GET['order_id']);
    $querycartdetail = "
    select d.*,p.p_img,p.p_name,p.p_price,h.*
    from 
    tb_order_detail as d
    inner join tb_order as h ON d.order_id = h.order_id
    inner join tbl_product as p ON d.p_id = p.p_id
    where d.order_id=$order_id and h.m_user LIKE '$user'";
    $rscartdetail = mysqli_query($con, $querycartdetail);
    $rowdetail = mysqli_fetch_array($rscartdetail);
    // echo '<pre>' ;
    // print_r($rowdetail);
    // echo '</pre>'; ?>

    <head>

    <body>
        <div class="row">
            <div class="col-md-3">
                <!-- Left side column. contains the logo and sidebar -->
                <p></p>
                <?php include('menu_left.php');?>
                <!-- Content Wrapper. Contains page content -->
            </div>
            <div style="margin-top: 100px;
            margin-left: 30px;" class="col-md-8">
                <p> </p>
                <p> </p>
                <p> </p>
                <p> </p>
                <h4>รายละเอียดการสั่งซื้อ</h4>
                <h4> OrderID: <?php echo $rowdetail['order_id'] ?> <br>
                ส่งไปที่ : <?php echo $rowdetail['name'] ?> <br>
                        <?php echo $rowdetail['address'] ?> <br>
                เบอร์โทร :<?php echo $rowdetail['phone'] ?>  Email : <?php echo $rowdetail['email'] ?><br>
                วันที่สั่งซื้อ : <?php echo $rowdetail['order_date'] ?> <br>
                สถานะ : <?php 
                $st = $rowdetail['order_status'] ;
                echo '<font color="green">';
                if ($st==1){
                    echo 'รอชำระเงิน';  
                }elseif ($st==2){
                    echo 'ชำระเงินแล้ว';
                }
                elseif ($st==3){
                    echo 'ตรวจสอบเลข EMS';
                } else{
                    echo 'ยกเลิก';
                }
                ?>
                
                </h4>
                <?php echo $rowdetail['name'] ?>
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
	foreach($rscartdetail as $row){
        $total += $row["total"]; //ราคา total all orders
		echo "<tr>";
		echo "<td bgcolor='F7F9F9'>" . @$i +=1 . "</td>";
		echo "<td>"."<img src ='../admin/backend/p_img/".$row['p_img']."'width='50'>"."</td>";
		echo "<td  bgcolor='F7F9F9'>" . $row["p_name"] . "</td>";
        echo "<td  align='right' bgcolor='F7F9F9'>" .number_format($row["p_price"],2) . "</td>";
        echo "<td  align='right' bgcolor='F7F9F9'>" .number_format($row["p_qty"]) . "</td>";
		echo "<td  align='right' bgcolor='F7F9F9'>".number_format($row["total"],2)."</td>";
		echo "</tr>";
	}//close foeach
	echo "<tr>";
  	echo "<td colspan='5' bgcolor='#F0F3F4' align='center'><b>ราคารวม</b></td>";
  	echo "<td align='right' bgcolor='#F0F3F4'>"."<b>".number_format($total,2)."</b>"."</td>";
  	
	echo "</tr>";
?>
                </table>
            </div>
        </div>
        </div>
    </body>

</html>