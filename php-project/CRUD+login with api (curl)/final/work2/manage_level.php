<!--check login and connect database -->
<?php include 'check.php';?>


<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200;400;500&display=swap" rel="stylesheet">


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="body_home">
    <center>
        <div class="row">
            <div class="col-md-3">
                <!-- Left side column. contains the logo and sidebar -->
                <?php include 'menu.php';?>
                <!-- Content Wrapper. Contains page content -->
            </div>
            <div class="col-lg-7">
            <!--<a href="member.php?act=add" class="btn-info btn-sm">เพิ่ม</a>-->
          <p>
          <?php
            $act = @$_GET['act'];
            if($act == 'add'){
            include('type_user.php');
            }elseif ($act == 'edit') {
            include('memberedit_form.php');
            }
            else {
            include('list_level.php');
            }
            ?>
        </div>

    </center>
</body>

</html>