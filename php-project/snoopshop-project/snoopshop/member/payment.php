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
    // echo '</pre>'; 
    // $p =" SELECT t.prov_id,g.*,a.*,c.*
    // FROM
    // tb_order as t
    // inner join provinces as g ON t.prov_id = g.id
    // inner join amphures as a ON g.id= a.province_id
    // inner join districts as c ON a.id = c.amphure_id
    // where t.order_id=$order_id and t.m_user LIKE '$user'";
    // $rsp = mysqli_query($con, $p);
    // $rsp_detail = mysqli_fetch_array($rsp);
    
    $qurybank = "SELECT *FROM tbl_bank";
    $rsbank = mysqli_query($con,$qurybank);
    ?>

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
                <h3 align="center">แจ้งชำระเงิน</h3>
                <h7> OrderID: <?php echo $rowdetail['order_id'] ?> <br>
                    ส่งไปที่ : <?php echo $rowdetail['name'] ?> <br>
                    บ้านเลขที่: <?php echo $rowdetail['address'] ; ?> <br>
                    เบอร์โทร :<?php echo $rowdetail['phone'] ?> Email : <?php echo $rowdetail['email'] ?><br>
                    วันที่สั่งซื้อ : <?php echo $rowdetail['order_date'] ?> <br>
                    สถานะ : <?php 
                $st = $rowdetail['order_status'] ;
                
                if ($st==1){
                    echo '<font color="red">รอชำระเงิน </font>';  
                }elseif ($st==2){
                    echo '<font color="green">ชำระเงินแล้ว</font>';
                }
                elseif ($st==3){
                    echo '<font color="orage">ตรวจสอบเลข EMS </font>';
                } else{
                    echo '<font color="orange"> ยกเลิก </font>';
                }
                ?>

                </h7>
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
                <h6>เลือกธนาคารที่ต้องการชำระเงิน<h6>
                        <form action="payment_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <table class="table table-bordered table-hover table-striped">
                                <tr>
                                    <th width="10%" bgcolor="#F7F9F9">เลือก</th>
                                    <th width="20%" bgcolor="#F7F9F9">ชื่อธนาคาร</th>
                                    <th width="30%" bgcolor="#F7F9F9">เลขบัญชี</th>
                                    <th width="40%" align="center" bgcolor="#F7F9F9">ชื่อบัญชี</th>
                                </tr>
                                <?php foreach($rsbank as $rsb){
                    $bid =$rsb["bid"];
                    echo '<tr>';
                    echo "<td  bgcolor='F7F9F9'>" . "<input type='radio' name='bid' value='$bid' required>" . "</td>";
                    echo "<td  bgcolor='F7F9F9'>" . $rsb["bname"] . "</td>";
                    echo "<td  bgcolor='F7F9F9'>" . $rsb["bnumber"] . "</td>";
                    echo "<td  bgcolor='F7F9F9'>" . $rsb["bowner"] . "</td>";
                    echo '</tr>';
                    } ?>
                            </table>

                            <div class="form-row">
                                <div class="col-md-4">
                                    วันที่ชำระเงิน <br>
                                    <input type="date" name="o_slip_date" class="form-control" required>
                                </div><div class="col-md-3">
                                    จำนวนเงินที่ชำระ <br>
                                    <input type="number" name="o_slip_total" required min="0" class="form-control" value="<?php echo $total;?>">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4">
                                    อัพโหลดสลิป <br>
                                    <input type="file" name="o_slip" required class="form-control" accept="image/*">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <br>
                                <input type="hidden" name="order_id" value="<?php echo $order_id;?>">
                                <button type="submit" class="btn btn-success">แจ้งชำระเงิน</button>
                                </div>
                        </form>
            </div>
        </div>
        </div>
    </body>

</html>