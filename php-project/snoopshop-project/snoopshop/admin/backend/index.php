
<!DOCTYPE html>
<html>
<head>
<style>
body {
  overflow-x: hidden;
  overflow-y: scroll;
}  
</style>
<?php include('h.php');
error_reporting( error_reporting() & ~E_NOTICE );

$querystatus1="SELECT order_status, count(order_id) as s1total
FROM tb_order
where order_status=1
GROUP BY order_status";

$rs1=mysqli_query($con,$querystatus1);
$rows1=mysqli_fetch_array($rs1);

$querystatus2="SELECT order_status, count(order_id) as s2total
FROM tb_order
where order_status=2
GROUP BY order_status";

$rs2=mysqli_query($con,$querystatus2);
$rows2=mysqli_fetch_array($rs2);

$querystatus3="SELECT order_status, count(order_id) as s3total
FROM tb_order
where order_status=3
GROUP BY order_status";

$rs3=mysqli_query($con,$querystatus3);
$rows3=mysqli_fetch_array($rs3);

// echo $querystatus1;
// exit();

?>
<head>
  <body>
    <div class="row">
      <div class="col-md-3">
        <!-- Left side column. contains the logo and sidebar -->
        <?php include('menu_left.php');?>
        <!-- Content Wrapper. Contains page content -->
      </div>
      <div class="col-md-8" style="margin-top: 100px;
            margin-left: 30px;">
      <a href="index.php" class="btn btn-warning btn-sm">รอชำระเงิน <span class="badge badge-light"><?php echo $rows1['s1total']; ?></span></a>
      <a href="index.php?act=paid" class="btn btn-success btn-sm">ชำระเงินแล้ว <span class="badge badge-light"><?php echo $rows2['s2total']; ?></span></a>
      <a href="index.php?act=ems" class="btn btn-info btn-sm">จัดส่งเรียบร้อย<span class="badge badge-light"><?php echo $rows3['s3total']; ?></span></a>
      <a href="index.php?act=cancel" class="btn btn-danger btn-sm">รายการที่ยกเลิก</a>
      <?php 
      $act=(isset($_GET['act']) ? $_GET['act'] : '');
      if($act=='paid'){
        include'list_order_paid.php';
        
      }  elseif($act=='ems'){
        include'list_order_ems.php'; 
      } elseif($act=='cancel'){
        include'list_order_cancel.php'; 
      }
      else{
      include'list_order_new.php';
      }  ?>
      </div>
    </div>
  </div>
  </body>
</html>