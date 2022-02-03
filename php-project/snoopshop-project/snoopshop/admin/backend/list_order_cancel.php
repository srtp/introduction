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
 <?php include('connect.php');?>
 <?php include('h.php');?>

 <?php $queryorder = "SELECT * FROM tb_order WHERE order_status=4";
$rsorder = mysqli_query($con, $queryorder);
// echo $queryorder
// // echo '<pre>' ;
// // print_r($rowdetail);

// echo round(abs(strtotime("2016-11-22") - strtotime("2016-11-29"))/60/60/24);
// echo 'วัน';

?>
 <h3>รายการที่ยกเลิกแล้ว</h3>
 <table id="p" class="display table table-bordered table-hover table-striped">
     <thead>
         <tr>
             <th width="5%">
                 <center>#</center>
             </th>
             <th width="30%">
                 <center>ชื่อลูกค้า</center>
             </th>
             <th width="10%">
                 <center>Date</center>
             </th>
             <th width="10%">
                 <center>ยอดรวม</center>
             </th>
             <th width="10%">
                 <center>ยกเลิก</center>
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
             <td align="center"><?php echo '<a  href=""class="btn btn-dark btn-sm">ยกเลิกแล้ว</a>' ?>
 </td>
             <td>
                 <?php 
                $o_id= $row['order_id'];
                    echo "<a href='cancel_detail.php?order_id=$o_id&do=cancel_token=mnciosjsu8871'class ='btn btn-primary btn-sm'>ดูรายละเอียด</a>";  
               
               
               
               
               
               ?>

             </td>
         </tr>
         <?php } ?>
 </table>