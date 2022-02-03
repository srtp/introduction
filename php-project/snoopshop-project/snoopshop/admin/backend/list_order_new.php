 <!--start data table-->
 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
 <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js">
 </script>
 <script>
$(document).ready(function() {
    $('#p').DataTable({
        "aaSorting": [
            [0, 'desc']
        ],
        //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
    });
});
 </script>
 <!-- end data table -->
 <?php include('connect.php') ?>
 <?php include('h.php');?>
 <?php $queryorder = "SELECT * FROM tb_order WHERE order_status=1";
$rsorder = mysqli_query($con, $queryorder);
// echo $queryorder
// // echo '<pre>' ;
// // print_r($rowdetail);

// echo round(abs(strtotime("2016-11-22") - strtotime("2016-11-29"))/60/60/24);
// echo 'วัน';

?>
 <h3>รายการรอชำระเงิน</h3>
 <form action="cancel_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
 <table id="p" class="display table table-bordered table-hover table-striped">
     <thead>
         <tr>
             <th width="5%">
                 <center>#</center>
             </th>
             <th width="20%">
                 <center>ชื่อลูกค้า</center>
             </th>
             <th width="10%">
                 <center>Date</center>
             </th>
             <th width="10%">
                 <center>ยอดรวม</center>
             </th>
             <th width="10%">
                 <center>ผ่านมา</center>
             </th>
             <th width="5%">
                 <center>View</center>
             </th>
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
             <td align="center">
                 <?php $order_date=date('Y-m-d',strtotime($row['order_date']));
    $datenow=date('Y-m-d');

    // echo 'วันที่สั่งซื้อ'.$order_date;
    // echo'<br>';
    // echo 'วันปัจจุบัน'.$datenow;
$caldate = round(abs(strtotime("$order_date") - strtotime("$datenow"))/60/60/24);
echo $caldate.' วัน';
echo '<br>';
$order_id= $row['order_id'];
 if($caldate >4){
     echo  "<input type='hidden' name='order_id' value='$order_id'>
     <button type='submit' class='btn btn-danger btn-sm'>ยกเลิก</button> ";
 }
 else {
     echo '-';
 }

?></td>
             <td>
                 <?php 
               
                    echo "<a href='order_detail.php?order_id=$order_id&do=order_detailuxomal00akxj12kjx'class ='btn btn-primary btn-sm'>ดูรายละเอียด</a> ";  
               
               
               
               
               
               ?>

             </td>
         </tr>
         <?php } ?>
 </table>
 </form>