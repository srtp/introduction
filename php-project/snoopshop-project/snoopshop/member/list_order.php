
 
 <!--start data table-->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js">
</script>
<script>
$(document).ready(function() {
$('#example').DataTable( {
"aaSorting" :[[0,'desc']],
//"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
});
} );
</script>
<!-- end data table -->
<?php include('../admin/backend/connect.php') ?>
<?php include('check.php') ?>
<?php $user = $_SESSION['username'] ;
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
?>

<?php $queryorder = "select *from tb_order where m_user LIKE '$user'";
$rsorder = mysqli_query($con, $queryorder);
// echo '<pre>' ;
// print_r($rowdetail);
?>
<h3>ประวัติการสั่งซื้อ</h3>
<table id="example"class="display table table-bordered table-hover table-striped">
<thead>
<tr>
    <th width="5%"><center>#</center></th>
    <th width="10%"><center>สถานนะสินค้า</center></th>
    <th width="10%"><center>Date</center></th>
    <th width="10%"><center>ยอดรวม</center></th>
    <th width="10%"><center>Tracking</center></th>
    <th width="5%"><center>View</center></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($rsorder as $row){ ?>
    <tr>
    <td><?php echo $row['order_id'];?></td>
    <td><?php $st = $row['order_status'] ;
                // echo '<font color="green">';
                if ($st==1){
                    echo 'รอชำระเงิน';  
                }elseif ($st==2){
                    echo '<font color="green">';
                    echo 'ชำระเงินแล้ว';
                }
                elseif ($st==3){
                    echo '<font color="orage">';
                    echo 'ตรวจสอบเลข EMS';
                } else{
                    echo '<font color="red">';
                    echo 'ยกเลิก';
                }?></td>
    <td><?php echo $row['order_date'];?></td>
    <td align="right"><?php echo number_format($row['total'],2);?></td>
    <td><?php echo $row['o_ems'];?></td>
    <td>
    <?php 
                $o_id= $row['order_id'];
                if ($st==1){
                    echo "<a href='payment.php?order_id=$o_id&do=paymentjhfggf'class ='btn btn-danger btn-sm'>ชำระเงิน</a>";  
                }elseif ($st==2){
                    echo "<a href='payment_detail.php?order_id=$o_id&do=paymentuxomal00akxj12kjx'class ='btn btn-primary btn-sm'>ดูรายละเอียด</a>";  
                }
                elseif ($st==3){
                    echo "<a href='payment_detail.php?order_id=$o_id&do=tracking_token=1og4jxojsa'class ='btn btn-success btn-sm'>Tracking</a>";  
                } else{
                    echo "<a href='cancel_detail.php?order_id=$o_id&do=tracking_token=1111222333xxx3343doooss'class ='btn btn-light btn-sm'>ดูรายละเอียด</a>";  
                }?>
    
    </td>
    </tr>
    <?php } ?>
</table>