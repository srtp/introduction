
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
error_reporting( error_reporting() & ~E_NOTICE );?>
<head>
  <body>
    <div class="row">
      <div class="col-md-3">
        <!-- Left side column. contains the logo and sidebar -->
        <?php include('menu_left.php');?>
        <!-- Content Wrapper. Contains page content -->
      </div>
      <div class="col-md-6">
          <p>
          <?php
            $act = $_GET['act'];
            if($act == 'add'){
            include('form-type_add.php');
            }elseif ($act == 'edit') {
            include('type_edit_form.php');
            }
            else {
            include('Product-type_list.php');
            }
            ?>
            <a href="product_type.php?act=add" class="btn-info btn-sm">เพิ่ม</a>
        </div>
    </div>
  </div>
  <p></p>
  </body>
</html>