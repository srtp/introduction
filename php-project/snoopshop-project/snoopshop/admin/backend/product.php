
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
      <div class="col-md-6" style="
    margin-top: 20px;
">
      
      <a href="product.php?act=add" class="btn-success btn-sm">เพิ่มรายการสินค้า</a>
          <p>
          <?php
            $act = $_GET['act'];
            if($act == 'add'){
            include('product_addform.php');
            }elseif ($act == 'edit') {
            include('product_form_edit.php');
            }
            else {
            include('product_list.php');
            }
            ?>

        </div>
    </div>
  </div>
  </body>
</html>