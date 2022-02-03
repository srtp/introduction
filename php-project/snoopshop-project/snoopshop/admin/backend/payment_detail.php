<!DOCTYPE html>
<html>

<head>
    <?php include('h.php') ?>
    <style>
    body {
        /* overflow: hidden;  */
    }
    </style>
    <?php include('connect.php') ?>
    <?php $order_id=mysqli_real_escape_string($con,$_GET['order_id']);
    $querycartdetail = "
    select d.*,p.p_img,p.p_name,p.p_price,h.*,b.bname,b.bnumber
    from 
    tb_order_detail as d
    inner join tb_order as h ON d.order_id = h.order_id
    inner join tbl_product as p ON d.p_id = p.p_id
    inner join tbl_bank as b ON h.bid = b.bid 
    where d.order_id=$order_id";
    $rscartdetail = mysqli_query($con, $querycartdetail);
    $rowdetail = mysqli_fetch_array($rscartdetail);
    // echo '<pre>' ;
    // print_r($rowdetail);
    // echo '</pre>'; 
    
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
                <h3 align="center">รายละเอียดการแจ้งชำระเงิน</h3>
                <h7> OrderID: <?php echo $rowdetail['order_id'] ?> <br>
                    ส่งไปที่ : <?php echo $rowdetail['name'] ?> <br>
                    <?php echo $rowdetail['address'] ?> <br>
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
		echo "<td>"."<img src ='p_img/".$row['p_img']."'width='50'>"."</td>";
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
                <h5>รายละเอียด<h5>
                        <div class=form-row>
                            <div class="col-sm-6">
                                <h6>ธนาคารที่ชำระเงิน : <?php echo $rowdetail['bname'];?><br></h6>
                                <h6>เลขที่บัญชีที่ชำระ : <?php echo $rowdetail['bnumber'];?><br></h6>
                                <h6>ยอดที่ชำระ : <?php echo $rowdetail['o_slip_total'];?><br></h6>
                                <h6>วัน/เดือน/ปี : <?php echo $rowdetail['o_slip_date'];?><br></h6>
                                <br>
                                หลักฐานการชำระเงิน <br>
                                <img src="../../img000/<?php echo $rowdetail['o_slip'];?>" width="40%">
                            </div>
                            <div class="col-md-6">
                                <h6>Add Tracking</h6>
                                <form action="ems_db.php" method="post" class="form-horizontal">
                                    <div class="col-sm-2 control-label">
                                    </div>
                                    <div class="col-md-6" style="padding-left: 0px;">
                                        <input style="background-color:#95A5A6;
                                        color: black; " type="text" name="o_ems" required minlength="4" placeholder="tracking.." class="form-control">
                                        <br>
                                    </div>
                                    <div class="col-md-1" style="padding-left: 0px;">
                                    <input type="hidden" name="order_id" value="<?php echo $order_id ;?>">
                                        <button type="submit" class="btn btn-primary" >บันทึก</button>

                                    </div>
                            </div>
                            </form>
                        </div>
            </div>
        </div>
    </body>

</html>