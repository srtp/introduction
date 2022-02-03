
<!DOCTYPE html>
<html>
<head>
<style>
body {
  overflow: hidden; 
}  
</style>
<?php include('../nav.php') ?>
<?php include('check.php') ?>
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
               <?php
            $act =(isset($_GET['act']) ? $_GET['act'] : '');
            if ($act=='edit'){
              include('memberedit_form.php');
            }elseif($act=='pwd'){
              include('member_form_rwd.php');
            } else{
            include('list_order.php');
            }
            ?>
      </div>
    </div>
  </div>
  </body>
</html>