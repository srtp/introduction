<?php include('h.php');
error_reporting( error_reporting() & ~E_NOTICE );?>
<!DOCTYPE html>
<html>
<head>
<style>
body {
  overflow-x: hidden;
  overflow-y: scroll;
}  
</style>
<head>
  <body>
    <div class="row">
      <div class="col-md-3">
        <!-- Left side column. contains the logo and sidebar -->
        <?php include('menu_left.php');?>
        <!-- Content Wrapper. Contains page content -->
      </div>
      <div class="col-md-8">
          <p> </p>
          <p> </p>
          <p> </p>
          <p> </p>
          <h4>จัดการผู้ดูแลระบบ</h4>
  

          <?php
            $act = $_GET['act'];
            if($act == 'add'){
            include('admin_form_add.php');
            }elseif ($act == 'edit') {
            include('formedit_admin.php');
          }elseif ($act == 'rwd') {
            include('admin_form_rwd.php');
            }
            else {
            include('pro_list.php');
            }
            ?>
            <a href="adminlog.php?act=add" class="btn-info btn-sm">เพิ่ม</a>
        </div>
    </div>
  </div>
  <p></p>
  </body>
</html>