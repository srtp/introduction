<?php include('check.php');?>
<!doctype html>
<html lang="en">
  <head>
  <?php /* error_reporting( error_reporting() & ~E_NOTICE ); */?>
  	<title>ระบบของสมาชิก</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar"style="top: 60px;">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	        </button>
        </div>
	  		<div class="img bg-wrap text-center py-4" style="background-color: #2E4053;">
	  			<div class="user-logo">
	  				<div class="img" style="background-image: url(images/astronaut.png);"></div>
	  				<h3>สมาชิก <?php echo $_SESSION['username'];?></h3>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="../index.php"><span class="fa fa-home mr-3"></span>หน้าแรก</a>
          </li>
          <li>
              <a href="index.php"><span class="fa fa-gift mr-3"></span>รายละเอียดการสั่งซื้อ</a>
          </li>
          <li>
              <a href="index.php?act=edit&do=member_token=fdad59683428313d6513f20ea45db86d"><span class="fa fa-user mr-3 notif"></span>จัดการโปรไฟล์ของฉัน</a>
          </li>
          <li>
            <a href="index.php?act=pwd&do=member_token=84307c4df1cb2cf0eb5000a8e497aa38"><span class="fa fa-edit mr-3"></span>แก้ไขรหัสผ่าน</a>
          <li>
            <a href="../logout.php"><span class="fa fa-sign-out mr-3"></span> ออกจากระบบ</a>
          </li>
        </ul>

    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-2 p-md-5 pt-5">
        <h2 class="mb-4"></h2>
        
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>