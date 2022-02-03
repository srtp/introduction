 <!--start data table-->
 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js">
</script>
<script>
$(document).ready(function() {
$('#p').DataTable( {
"aaSorting" :[[0,'desc']],
//"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
});
} );
</script>
<!-- end data table -->
<?php include('connect.php') ?>
<?php include('h.php');?>

<?php $queryorder = "SELECT * FROM tb_order WHERE order_status=2";
$rsorder = mysqli_query($con, $queryorder);
// echo $queryorder
// // echo '<pre>' ;
// // print_r($rowdetail);
?>
<h3>รายการสั่งซื้อที่ชำระเงินแล้ว</h3>
<table id="p"class="display table table-bordered table-hover table-striped">
<thead>
<tr>
    <th width="5%"><center>#</center></th>
    <th width="30%"><center>ชื่อลูกค้า</center></th>
    <th width="10%"><center>Date</center></th>
    <th width="10%"><center>ยอดรวม</center></th>
    <th width="5%"><center>สลิป</center></th>
    <th width="5%"><center>View</center></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($rsorder as $row){ ?>
    <tr>
    <td><?php echo $row['order_id'];?></td>
    <td>
    <?php  echo '<b>';
    echo $row['name'];
    echo '</b><br>';
    echo $row['address'];
    echo '<br>';
    echo 'เบอร์โทร'.$row['phone'].'email'.$row['email'];
    
    ?>
    
    
    </td>
    <td><?php echo $row['order_date'];?></td>
    <td align="right"><?php echo number_format($row['total'],2);?></td>
    <td >
    <a href="../../img000/<?php echo $row['o_slip'];?>" target="_blank">
    <img src="../../img000/<?php echo $row['o_slip'];?>" width="100%"></td>
    </a>
    <td>
    <?php 
                $o_id= $row['order_id'];
                    echo "<a href='payment_detail.php?order_id=$o_id&do=payment_detailtoken_kj41dcg6543'class ='btn btn-primary btn-sm'>ดูรายละเอียด</a>";  
               
               
               
               
               
               ?>
    
    </td>
    </tr>
    <?php } ?>
</table>